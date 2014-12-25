<?php                     //>
/*
 *  Search database.
 *
 *  Script is called through jQuery-Ajax in search.js, parameters are passed in array $_GET.
 *
 *      MethodA:    (author "AND" interval) "OR" (author "AND" interval) "OR" ...
 *      MethodB:    (author "AND" author "AND" author ... ) "AND" interval
 *      MethodC:    From 1 until now+10      (empty - empty)
 *                  From 1 until given       (empty - given)
 *                  From given until now+10  (given - empty)
 *                  From given until given   (given - given)
 *
 *  Script invokes the principal query functions:
 *      query_articles_A()
 *      query_articles_B()
 *      query_articles_C()
 *
 *  and the auxiliary functions:
 *      Get_article_interval()
 *      Get_article_author_interval
 *      list_articles
 *
 *  Note: this script predates Article.class
 */

    require_once "../../Setup.php";
    Setup();      // Open database, set table and column names
    global $filenames;
    require_once $filenames['Art_class2'];
    require_once $filenames['clean2'];
    require_once $filenames['check2'];

    global $tab_arts;        // table 'articles'

    // Check if caller is allowed
    $allowed_callers = array('PWRef_search.php');
    check_callers($allowed_callers);

    //  Clean  $_GET
    foreach ($_GET as $key => $val) {
        $_GET[$key] = clean_html($_GET[$key]);
    }

    /* Query method */
    $method =  $_GET["Method"];
    switch ($method) {
        case "A":
            query_articles_A();
            break;
        case "B":
            query_articles_B();
            break;
        case "C":
            query_articles_C();
            break;
        default:
            die("<b>Error: We should not have gotten here.</b><br>\n");
    };

    function query_articles_A() {
    /*
     *  Handle search of different authors, each with his own time span (logic OR).
     */

        global $filenames;
        require $filenames['maxlength2'];
        $nr_of_authors = (count($_GET) - 2)/4;

        // Test against buffer overflow injection:
        if ( !is_int($nr_of_authors) or $nr_of_authors <= 0 or $nr_of_authors > $max_authors) {
            die("<b>Error: Invalid number of authors!</b><br>\n");
        }

        $author   = array();
        $interval = array();
        $arts     = array();

        for ($i = 1; $i <= $nr_of_authors; $i++) {  //>
            $F = trim($_GET["FirstA_$i"]);
            $L = trim($_GET["LastA_$i"]);
            $B = trim($_GET["BeginA_$i"]);
            $E = trim($_GET["EndA_$i"]);
            $author    = array($F, $L);
            $interval  = array($B,  $E);

            // Get array $art_i  containing article identifiers of $author $i in period $interval
            $art_i     = Get_article_author_interval($author, $interval);
            if ( empty($art_i) && !empty($L) ) {
                echo("<br><b>No articles found</b> for author " .
                     $F . " " . $L . " in period: " .
                     $B . "&ndash;" . $E )."<br>\n";;
            }
            $arts = array_merge($arts, $art_i);
        };

        $arts       = array_unique($arts);    // Remove duplicates (case of coauthors).
        $nr_of_arts = count($arts);
        if ($nr_of_arts === 0) return;

        @$format = $_GET["formatA"];
        list_articles($arts, $format);
    };

    function query_articles_B() {
    /*
     *  Handle search of co-authors published within given time span (logic AND).
     */
        global $filenames;
        require $filenames['maxlength2'];

        // Subtract 4 from count because of: BeginB, EndB, Method, format:
        $nr_of_authors = (count($_GET) - 4)/2;

        // Test against buffer overflow:
        if ( !is_int($nr_of_authors) or $nr_of_authors <= 0 or $nr_of_authors > $max_authors) {
            die("<b>Error: Wrong number of authors!</b><br>\n");
        }

        $interval        = array(trim($_GET["BeginB"]), trim($_GET["EndB"]) );
        $selected_author = array(trim($_GET["FirstB_1"]), trim($_GET["LastB_1"]) );
        $arts            = Get_article_author_interval($selected_author, $interval);

        for ($i = 2; $i <= $nr_of_authors; $i++) {  //>
            $selected_author = array(trim($_GET["FirstB_$i"]), trim($_GET["LastB_$i"]) );
            $art_idx         = Get_article_author_interval($selected_author, $interval);
            $arts            = array_intersect($arts, $art_idx);
        };

        if ( empty($arts) ) {
            echo("<br><b> Authors do not have common articles in
                database in the years specified</b>");
            return;
        }

        @$format = $_GET["formatB"];
        list_articles($arts, $format);

    };

    function query_articles_C() {
    /*
     *  All articles within a given time span.
     */
        $B = trim($_GET["BeginC_1"]);
        $E = trim($_GET["EndC_1"]);

        if ($B === '' and $E === '' ) {
            $arts = Get_article_interval();
        }
        else if  ($B !== '' and $E  === '' ) {
            $arts = Get_article_interval($B);
        }
        else if  ($B === '' and $E !== '' ) {
            $arts = Get_article_interval(1, $E);
        }
        else if  ($B !== '' and $E !== '' ) {
            $arts = Get_article_interval($B, $E);
        }

        if ( count($arts) === 0) {
            //echo("<b>No articles between years $B and $E.</br>");
            return;
        }

        @$format = $_GET["formatC"];
        list_articles($arts, $format);
    };

    function Get_article_interval() {
    /*
     *  Return art_ids of articles published in given time interval.
     *
     *  Function may be called with zero, one, or two arguments (years).
     *
     *      Zero arguments: From year 1 to 10 years from now (basically eternity).
     *      One argument:   Articles of the input year onward.
     *      Two arguments:  Lower ($arg_1) and upper ($arg_2) bounds of the time interval $arg_1 <= year <= $arg_2.
     *
     */
        global $database, $pubDB, $tab_arts;
        global $tab_arts_art_id, $tab_arts_year;
        global $filenames;
        require_once $filenames['clean2'];

        $num_args =  func_num_args();

        switch ($num_args) {
            case 0:
                $year0 = 1;
                $year1 = date("Y") + 10;
                break;
            case 1:
                $year0 = func_get_arg(0);
                $year1 = date("Y") + 10;
                if ( ($year0 > $year1) or ($year0 < 1) ) {
                    echo $year0 . " " . $year1 . "<br>\n";
                    die("<br><b>Error: </b> Wrong lower year");
                }
                break;
            case 2:
                $year0 = func_get_arg(0);
                $year1 = func_get_arg(1);
                if ( ($year1 > date("Y") + 10) or  ($year0 < 1) ) {
                    die("<br><b>Error: </b> Invalid range");
                }
                if ($year1 < $year0) {
                    die("<br><b>Error: </b> Begin year must be less than or equal to End year.<br>
                                Execution stops in function \"Get_article_interval\"\n");
                }
                break;
            default:
                die("<br><b>Error: </b>" .
                "Wrong invocation of function \"Get_article_interval\", less than 3 arguments allowed. Execution stops.<br>");
        }

        if (!preg_match('/^\d{1,4}$/', $year0)) {
            die("<br><b>Error: </b>" .
            " Begin year must be integer. Execution stops in function \"Get_article_interval\"       .<br>");
        }

        if (!preg_match('/^\d{1,4}$/', $year1)) {
            die("<br><b>Error: </b>" .
            " End  year must be integer. Execution stops in function \"Get_article_interval\"        <br>");
        }

        $sql = "SELECT        $tab_arts_art_id
                    FROM      $tab_arts  AS p
                    WHERE     p.$tab_arts_year >= $year0
                    AND       p.$tab_arts_year <= $year1
                    ORDER BY  p.$tab_arts_year
               ";

        $results = $pubDB->query($sql) or
                    die('<b>Select Error in function Get_article_interval:</b> ' . $pubDB->error);

        $art_years_ids = array();

        if ($results->num_rows === 0) {
            echo("<b>No articles between years $year0 and $year1 in table \"{$tab_arts}\" of database \"$database\".</br>");
            return $art_years_ids;
        }
        $i = 0;
        while ( $arts =  $results->fetch_row() ) {
            $art_years_ids[$i] =  clean_html($arts[0]);
            $i++;
        }

        return $art_years_ids;

    }   // End Get_article_interval()


    function Get_article_author_interval($selected_author, $interval) {
    /*
     *  Return array art_ids of articles of author in published in time-interval.
     *  If no articles in database return empty array.
     */
        global $pubDB;
        global $tab_arts, $tab_authors, $tab_AA;
        global $tab_arts_art_id, $tab_arts_year;
        global $tab_AA_art_id, $tab_AA_aut_id;
        global $tab_authors_id, $tab_authors_last_name, $tab_authors_first_name;
        global $filenames;
        require_once $filenames['clean2'];

        if ( empty($interval[0]) and empty($interval[1]) ) {
            $year0 = 1;
            $year1 = date("Y")+10;
        }
        else if  ( $interval[0] and empty($interval[1]) ) {
            $year0 = $interval[0];
            $year1 = date("Y")+10;
        }
        else if  ( empty($interval[0]) and $interval[1] ) {
            $year0 = 1;
            $year1 = $interval[1];
        }
        else if  ( $interval[0]  and $interval[1] ) {
            $year0 = $interval[0];
            $year1 = $interval[1];
        }

        if (!preg_match('/^\d{1,4}$/', $year0)) {
            die("<br><b>Error: </b>" .
            " Begin year must be integer. Execution stops in function \"Get_article_author_interval\".<br>");
        }

        if (!preg_match('/^\d{1,4}$/', $year1)) {
            die("<br><b>Error: </b>" .
            " End  year must be integer. Execution stops in function \"Get_article_author_interval\" <br>");
        }

        $last_name  = htmlentities($selected_author[1], ENT_COMPAT,  'UTF-8');
        $last_name  = $pubDB->real_escape_string($last_name);

        $first_name = htmlentities($selected_author[0], ENT_COMPAT,  'UTF-8');
        $first_name = $pubDB->real_escape_string($first_name);

        $sql = "SELECT        p.$tab_arts_art_id
                    FROM        $tab_authors  AS a
                    INNER JOIN  $tab_AA       AS l
                    INNER JOIN  $tab_arts     AS p
                    ON        p.$tab_arts_art_id       = l.$tab_AA_art_id
                    AND       l.$tab_AA_aut_id         = a.$tab_authors_id
                    WHERE     a.$tab_authors_last_name = '$last_name'
                    AND       p.$tab_arts_year >= $year0
                    AND       p.$tab_arts_year <= $year1
               ";
        if (!empty($selected_author[0])) {
            $sql .= " AND  a.$tab_authors_first_name = '$first_name'";
        }
        $sql .= " ORDER BY p.$tab_arts_year";


        $results = $pubDB->query($sql) or
            die('<b>Select Error in function Get_article_author_interval:</b> ' . $pubDB->error);

        $art_ids = array();
        if ($results->num_rows >= 1) {
            $i = 0;
            while ( $arts = $results->fetch_row() ) {
                $art_ids[$i] = clean_html($arts[0]);
                $i++;
            }
        }
        else {
            $first_n = html_entity_decode($first_name, ENT_COMPAT,  'UTF-8');
            $last_n  = html_entity_decode($last_name,  ENT_COMPAT,  'UTF-8');
            // echo "$first_n $last_n does NOT appear in database! ";
        }
        return $art_ids;
    }

    function list_articles($arts, $format) {
    /*
     *  List articles according to $format
     */
        switch ($format) {
            case "add":
                $type = "add";
                break;
            case "pretty":
                $type = "pretty";
                break;
            case "bibTeX":
                $type = "bibTeX";
                break;
            case "input":
                $type = "input";
                break;
            case "html":
                $type = "html";
                break;
            default:
                die("<b>Error: Choose an output format!</b><br>\n");
        };

        if ($type === "pretty") {
            echo "<ul style = 'list-style-type: decimal'>\n";
            foreach($arts as $val) {
                echo "<li>";
                $article  = new Article();
                $article -> Retrieve_article($val);
                $article -> List_art_properties($type);
                echo "</li>";
            };
            echo "</ul><br>\n";
        }
        elseif ($type === "html") {
            echo "&lt;ul style = 'list-style-type: decimal'&gt;<br>\n";
            foreach($arts as $val) {
                echo "&lt;li&gt;";
                $article  = new Article();
                $article -> Retrieve_article($val);
                $article->List_art_properties($type);
                echo "&lt;/li&gt;<br>\n";
            };
            echo "&lt;/ul&gt;&lt;br&gt;\n";
            echo "<br><br>";
        }
        else {
            foreach($arts as $val) {
                $article  = new Article();
                $article -> Retrieve_article($val);
                $article->List_art_properties($type);
            };
        };


    }   // End of list_articles

?>
