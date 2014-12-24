<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>PWRef update article reference </title>
    <meta http-equiv = "content-type" content = "text/html; charset=UTF-8" />
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"
                type = "text/javascript"></script>
    <!--
    <base href = "http://localhost/PWRef/articles/" />
    -->
    <base href = "http://www.theochem.ru.nl/~pwormer/PWRef/articles/" />
    <link href = "../PWRef.css" rel = "stylesheet" type = "text/css" />
    <style>
        .headline #replace:hover {
            border-bottom: solid white  2px;
            background-color: gray;
        }
    </style>
    <script src = "shared/suggest.js"></script>
</head>

<body>
<?php        //>
   /*
    *   Update a reference to an article in the database.
    *
    *   Only the content of an entry in table "articles" (title, year, etc.)
    *   can be updated, journal and author(s) cannot.
    *
    *   This script sets and processes consecutive html input forms.
    *
    *   Function "set_formx" sets
    *          <form id = "formx"> ... </form>
    *   in conjunction with a submit button.  Clicking the submit button
    *   invokes "process_formx" (x = 1, 2, ..).
    *
    *   Function "process_formx" processes $_POST parameters passed
    *   from "set_formx"  (x = 1, 2, ...) and invokes "set_form{x+1}".
    */
    session_start();
    include "../../topmenu.html";
    require_once "../../Setup.php";
    Setup(1);           // Open database, set table- and column-names
?>
    <div class="title">
        <span style="padding-left: 30px;">
            Update a reference to a journal article.
        </span>

    </div>
<?php    //>
    $self   = $_SERVER['PHP_SELF'];
    $_SESSION['self'] = $self;

    inspect_reset_button($self);        // Reset wanted?

    //  Sets $switch depending on values in
    //  $_SESSION['switch'] and $_POST['switch']:
    $switch = set_switch();

    switch ($switch) {
        case "form1":
            set_form1($self);       //  sets $_POST['switch'] = "post1"
            break;

        case "post1":
            process_form1($self);   //  sets $_SESSION['switch'] = "form2"
            break;

        case "form2":
            set_form2($self);       //  sets $_POST['switch'] = "post2"
            break;

        case "post2":
            process_form2($self);   //  sets $_SESSION['switch'] = "form3"
            break;

        case "form3":
            set_form3($self);       //  sets $_POST['switch'] = "post3"
            break;

        case "post3":
            process_form3($self);   //  sets $_SESSION['switch'] = "form4"
            break;

        case "form4":
            set_form4($self);       //  Finalizes, sets $_SESSION['switch'] = "form1"
            break;

        default:
            echo "<br>Took default switch, {$switch} not defined";
            exit();

    }   // end switch statement

    function set_switch() {
    /*
     *  Set $switch  depending on $_SESSION['switch'] and $_POST['switch'].
     *  Unset $_SESSION['switch'] and $_POST['switch']
     */

        if (!empty($_SESSION['switch'])) {
            $switch =  $_SESSION['switch'];
        }
        elseif (!empty($_POST['switch'])) {
            $switch =  $_POST['switch'];
        }
        else {
            $switch = "form1";
        }
        unset($_SESSION['switch']);
        unset($_POST['switch']);
        return $switch;
    }

    function set_form1($self) {
    /*
     *  First form, user input of global search parameters
     */
        if ( isset($_SESSION['search']) ) {
            $search = $_SESSION['search'];      // array with search values
        }
        else {                                  // default empty
            $search = array (
                        'first_name'    => '',
                        'last_name'     => '',
                        'journal'       => '',
                        'volume'        => '',
                        'begin_page'    => '',
                        'year'          => '',
                        'title'         => ''
                      );
        }
        ?>
        <div class = "menu">
            The search for a reference to be updated proceeds in two stages.<br>
            First step, perform a global search for  existing references:
        </div>
        <br><br>

        <fieldset>
            <img src = "../shared/info.jpg" id = "info" class = "info"/>
            <!-- Tooltip -->
            <div  id = "tooltip_prelim"  class = "subhelp">
                <ul style = "list-style-type: disc">
                <li>Entering one or more initial characters of an author's last name in the last name field
                    causes the pop up of a suggestion box containing names extracted from the database.
                <li>The clicking on an entry in the suggestion box fills out the first and last name
                    in the author input fields; the suggestion box is erased.
                <li>A suggestion can be followed only once. Hit the reset button to start over and receive
                    a new list of suggestions.
                <li>Hitting the Enter Key in the last name field erases the suggestion box.
                </ul>

            </div>  <!-- End tooltip -->
            <form id = "form1" action = "<?= $self ?>" method = "POST">
                <table style = "line-height: 5em; width: 100%;"  >

                    <tr>
                        <td><b>First name author:</b>&nbsp;</td>
                        <td><input  type  = "text" name = "first_name"
                                    value = "<?=$search['first_name']?>"
                                    size  = "20" maxlength = "50"  />
                        </td>
                        <td><b>Last name:</b></td>
                        <td><input  type  = "text" name = "last_name"
                                    value = "<?=$search['last_name']?>"
                                    size  = "30" maxlength = "100"  />
                        </td>
                    </tr>
                    <tr>
                        <td style = "line-height: 1em">
                            <b>Journal:</b>
                            <br>
                            <span style = "font-size: 70%;">(may be a substring)</span>
                        </td>
                        <td>
                            <input  type  = "text" name = "journal"
                                    value = "<?=$search['journal']?>"
                                    size  = "20" maxlength = "70"  />
                        </td>
                        <td style = "line-height: 1em">
                            <b>Volume:</b>
                        </td>
                        <td>
                            <input  type  = "text" name = "volume"
                                    value = "<?=$search['volume']?>"
                                    size  = "6" maxlength = "15"  />
                        </td>
                    </tr>
                    <tr>
                        <td style = "line-height: 1em">
                            <b>Year:</b>
                            <br>
                            <span style = "font-size: 70%; margin-left: 0px;">(up to 4 digits)</span>
                        </td>
                        <td><input  type  = "text" name = "year"
                                    value = "<?=$search['year']?>"
                                    size  = "4" maxlength = "4"     />
                        </td>
                        <td style = "line-height: 1em">
                            <b>Begin page:</b>
                        </td>
                        <td>
                            <input  type  = "text" name = "begin_page"
                                    value = "<?=$search['begin_page']?>"
                                    size  = "10" maxlength = "10"  />
                        </td>
                    </tr>
                    <tr>
                        <td style = "line-height: 1em" colspan = "1">
                            <b>Title:</b>
                            <br>
                            <span style = "font-size: 70%; margin-left: 0px;">(may be substring)</span>
                        </td>
                        <td colspan = "3"><input  type  = "text" name = "title"
                                    value = "<?=$search['title']?>"
                                    size  = "60" maxlength = "512"     />
                        </td>
                    </tr>

                </table>

                <br>
                <button class = "goBtn" type = "submit"  name = "switch" value = "post1">
                    Search
                </button>
            </form>
            <button class = "restartBtn"
                onclick = 'window.location.href="<?=$self?>?reset=erase"' >
                Restart
            </button>

            <div  id = "suggestionBox"
                  style = "position: relative; top: -350px; left: 670px; z-index: 10;
                           font-size: 10pt;">
            </div>

        </fieldset>
    <?php        //>
    }

    function process_form1($self) {
    /*
     *  Process parameters inputted by form1 (global search parameters)
     *  and then unset them.
     *
     *  Set $_SESSION['switch'] = "form2" to invoke "set_form2".
     */

        global $filenames;
        require_once $filenames['clean2'];
        require_once $filenames['maxlength2'];

        // Clean against sql injection and truncate to avoid buffer overflow attacks:
        $search = array();

        if ($_POST['first_name']) {
            $tmp  = clean_html($_POST['first_name']);
            $search['first_name']  = substr($tmp, 0, $maxlength['first_name']);
        }
        else {
            $search['first_name']  = "";
        }

        if ($_POST['last_name']) {
            $tmp  = clean_html($_POST['last_name']);
            $search['last_name']  = substr($tmp, 0, $maxlength['last_name']);
        }
        else {
            $search['last_name']  = "";
        }

        if ($_POST['journal']) {
            $tmp  = clean_html($_POST['journal']);
            $search['journal']  = substr($tmp, 0, $maxlength['journal']);
        }
        else {
            $search['journal']  = "";
        }

        if ($_POST['volume']) {
            $tmp  = clean_html($_POST['volume']);
            $search['volume']  = substr($tmp, 0, $maxlength['volume']);
        }
        else {
            $search['volume']  = "";
        }

        if ($_POST['begin_page']) {
            $tmp  = clean_html($_POST['begin_page']);
            $search['begin_page']  = substr($tmp, 0, $maxlength['begin_page']);
        }
        else {
            $search['begin_page']  = "";
        }

        if ($_POST['year']) {
            $tmp  = clean_html($_POST['year']);
            $search['year']  = substr($tmp, 0, $maxlength['year']);
        }
        else {
            $search['year']  = "";
        }

        if ($_POST['title']) {
            $tmp  = clean_html($_POST['title']);
            $search['title']  = substr($tmp, 0, $maxlength['title']);
        }
        else {
            $search['title']  = "";
        }

        $_SESSION['search'] = $search;  //  Remember clean array $search for revised search attempts

        //  unset POST
        foreach ($_POST as $key => $val) {
            unset($_POST[$key]);
        }

        //  Does $year consist of digits and is it in required range?
        $future = date("Y") + 10;          // 10 years from now.
        $year   = $search['year'];
        if ( !empty($year) and (!preg_match('/^\d+$/', $year) or $year > $future) ) {
            $_SESSION['switch'] = "form1";
            ?>
                <div class = 'menu'> <br>
                    <b>Error: </b>Year must consist of digits only and be before <?=$future?>.
                    Input year is: <?= $year ?>.
                    <br>
                    Hit button to return to previous form
                    <br>
                    <button class = "backBtn"
                            onclick = "window.location.href = '<?=$self?>'">
                        Back
                    </button>
                </div>
            <?php       //>
            exit();
        }

        $candidates_to_upd  = search_to_upd($search);  // Search for a candidate to update.

        if (count($candidates_to_upd) === 0) {
            $_SESSION['switch'] = "form1";
            ?>
                <div class = 'menu'>
                    <br><br>
                    <b>Error:</b> No references found, hit button to return to previous form.
                    <br>
                    <button class = "backBtn"
                            onclick = "window.location.href = '<?=$self?>'">
                        Back
                    </button>
                </div>
            <?php        //>
            exit();
        }
        else {
            $_SESSION['to_upd'] =  $candidates_to_upd;
            $_SESSION['switch'] =  "form2";
            // Jump unconditionally to set_form2:
            echo "<script>window.location.href = '{$self}';</script>";
        }
    }

    function set_form2($self) {
    /*
     *  List article entries (candidates to update) with checkboxes.
     */
        global $filenames;
        require_once $filenames['Art_class2'];

        $ids_to_upd = $_SESSION['to_upd'];

        $articles = array();
        $i = 0;
        foreach ($ids_to_upd as $key => $val ) {   //>
            $articles[$i]  = new Article();
            $articles[$i] -> Retrieve_article($val);
            $i++;
        }

    ?>
        <div class = "menu" style = "margin-top: 0px; font-size: 10pt;";>
            <h4>As the second step, choose the reference to update: </h4>
            <form action = "<?= $self ?>" method = "POST">
            <?php       //>
                $i = 0;
                foreach ($ids_to_upd as $key => $val ) {
                    // List art_id
                    echo $val;

                    // List checkbox
                    echo "&nbsp;
                          <input type = 'checkbox' name = '{$val}'  />
                         ";

                    // List authors
                    $auth = $articles[$i]->authors;
                    $nr_coauth =  count($auth)-1;
                    $nr_coauth =  count($auth)-1;
                    for ($j = 0; $j < $nr_coauth; $j++) {    //>
                        echo $auth[$j][0] . ' ' . $auth[$j][1] . ', ';
                    }
                    echo $auth[$nr_coauth][0] . ' ' . $auth[$nr_coauth][1].": ";

                    // List journal
                    echo $articles[$i]->journal . ", ";

                    // List begin page
                    echo $articles[$i]->begin_page . ", ";

                    // List volume
                    echo "<b>" . $articles[$i]->volume . "</b>, ";

                    // List title
                    echo "&nbsp;<i>" . $articles[$i]->title . "</i>";

                    // List year
                    echo "&nbsp;(" . $articles[$i]->year . ").<br><br>";
                    $i++;
                }
            ?>
                <button class = "goBtn" type = "submit" name = "switch" value = "post2">
                    Edit
                </button>
                <br>
                <button class = "restartBtn"  type = "button"
                        onclick = 'window.location.href="<?=$self?>?reset=erase"' >
                    Restart
                </button>
            </form>


        </div>
    <?php   //>
    }


    function process_form2($self) {
    /*
     *  Process parameters input by form2 (checkboxed references)
     *  and unset them.
     *
     *  Set $_SESSION['switch'] = "form2" to  return to checkboxed form,
     *  or
     *  set $_SESSION['switch'] = "form3" to  invoke "set_form3".
     */

        unset($_POST['switch']);  // To not get this entry in the next loop!

        $to_edit = array();
        $i = 0;
        foreach ($_POST as $id => $val) {
            $to_edit[$i] = $id;
            $i++;
        }

        //  unset rest of POST
        foreach ($_POST as $key => $val) {
            unset($_POST[$key]);
        }

        if ($i === 0) {
            $_SESSION['switch'] = "form2";  // Back to form being processed
            ?>
                <div class = "menu">
                    <br>
                    <b>Error:</b> Nothing to update!
                    Did you forget to checkmark a reference?
                    <br><br>
                    Hit button to go back and search again:
                    <br>
                    <button class   = "backBtn"
                            onclick = "window.location.href = '<?=$self?>'">
                        Back
                    </button>
                </div>
            <?php       //>
            exit();
        }

        if ($i > 1) {
            $_SESSION['article_to_edit'] = $to_edit[0];  // Pass article_id to set_form3
            $_SESSION['switch']          = "form3";      // To next form
            ?>
                <div class = "menu">
                    <br>
                    <b>Warning:</b> You checked <?=$i?>  references, will update the first only.
                    Hit button to continue: &nbsp;
                        <button class   = "goBtn"
                                onclick = "window.location.href = '<?=$self?>'">
                            Continue
                        </button>
                    <br><br>
                </div>
            <?php       //>
            exit();
        }

        // ($i = 1) {proceed without print to screen}:
        $_SESSION['article_to_edit'] = $to_edit[0];  // Pass article_id to set_form3
        $_SESSION['switch']          = "form3";      // To next form

        echo "<script>window.location.href = '{$self}';</script>";
    }

    function set_form3($self) {
    /*
     *  List form with editable input fields of first reference checked.
     *
     */
        global $filenames;
        require_once $filenames['Art_class2'];

        $article_id =  $_SESSION['article_to_edit'];
        $article    =  new Article();
        $article    -> Retrieve_article($article_id);
        echo "<div class = 'menu' style = 'margin-top: -20px;'>";
            echo "<br>You have chosen to update reference <b>{$article_id}</b>.&nbsp;
                      Its first  few (up to and including 4) authors are:<br>";
            echo "<div style = 'margin: 10px 0px 10px 50px; font-weight: bold'>";
            for ($i=0; $i < 4; $i++) {
                if ( empty($article->authors[$i][1]) && empty($article->authors[$i][0]) ) break;
                echo $article->authors[$i][0] . "&nbsp;" . $article->authors[$i][1] . ", &nbsp;";
            }
            echo "</div>published in:&nbsp;<b>" .  $article->journal . "</b>. (If you want to change authorlist or journal use Replace.)";

        ?>

            <br>
            <h4 class="headings">You may edit the fields below before the database record is overwritten</h4>
            <?php       // >
                // Setup edit-form containing info from record $article_id:
                // Tabulate as <form method = "POST" action = "$self">
                $article -> Tabulate_article_notall_properties($self, "post3");
            ?>
            <br>
            To start all over, hit:
            <br>
            <button class = "restartBtn"  onclick = 'window.location.href="<?= $self ?>?reset=erase"' >
                Restart
            </button>
        </div>
        <?php        //>
    }

    function process_form3($self) {
    /*
     *  Process $_POST parameters inputted by form3
     *  (editable input fields of first checked reference) and unset them.
     *
     *  Set $_SESSION['switch'] = "form4" to setup next form.
     *  This function does not write to screen.
     */
        global $filenames;
        require_once $filenames['Art_class2'];
        require_once $filenames['clean2'];

        $article_id =  $_SESSION['article_to_edit'];

        // $_POST contains updated input, sanitize and assign entries to variables

        $year       =  clean_html($_POST['year']);
        $volume     =  clean_html($_POST['volume']);
        $title      =  clean_html($_POST['title']);
        $begin_page =  clean_html($_POST['begin_page']);
        $end_page   =  clean_html($_POST['end_page']);
        $project    =  clean_html($_POST['project']);
        $arXiv      =  clean_html($_POST['arXiv']);
        $doi        =  clean_html($_POST['doi']);
        $url        =  clean_html($_POST['url']);

        // Create object $article
        $article =  new Article();

        $article -> year       = $year;
        $article -> volume     = $volume;
        $article -> title      = $title;
        $article -> begin_page = $begin_page;
        $article -> end_page   = $end_page;
        $article -> project    = $project;
        $article -> arXiv      = $arXiv;
        $article -> doi        = $doi;
        $article -> url        = $url;

        $article -> Update_article($article_id);
        $_SESSION['switch'] = "form4";
    ?>

        <div class = "menu">
            <b>Updated reference <?=$article_id?>.</b>
            <br><br><br>
            Hit button to go to the beginning of a new update operation:
            <br>
            <button class = "restartBtn"
                onclick = "window.location.href = '<?=$self?>'" >
                Restart
            </button>
        </div>

    <?php   //>
    }

    function set_form4($self) {
    /*
     *  Finalizes:
     *
     *      Unset $_SESSION, but save $creds
     */
        $creds = $_SESSION['credentials'];

        foreach ($_SESSION as $key =>$val ) {
            unset($_SESSION[$key]);
        }

        $_SESSION['credentials'] = $creds;

        // Back to set_form1:
        $_SESSION['switch'] = "form1";
        echo "<script>window.location.href = '{$self}';</script>";
    }

    function inspect_reset_button($self) {
    /*
     *  Function handles reset button that requests
     *  unsetting of $search, $_SESSION, and $_POST.
     */
        if  ( key_exists('reset', $_GET) && $_GET['reset'] === 'erase') {

            unset($_GET['reset']);

            foreach ($_POST as $key=>$val) {
                unset($_POST[$key]);
            }

            // Clear $search and $_SESSION, but save credentials

            if (key_exists('search', $_SESSION)) {
                $search = $_SESSION['search'];
                foreach ($search as $key=>$val) {
                    $search[$key] = "";
                }
            }

            $creds = $_SESSION['credentials'];
            foreach ($_SESSION as $key=>$val) {
                unset($_SESSION[$key]);
            }
            $_SESSION['credentials'] = $creds;
        }
    }

    function search_to_upd($search) {
    /*
     *  Search for candidates to update.
     *
     *  Query database for records with one or more of the seven values
     *  specified in array $search.
     *
     *  Return array with article_id's satisfying the search values.
     *  Array indices are integers but not necessarily contiguous.
     */

        global  $pubDB;

        global  $tab_authors,      $tab_journals,           $tab_arts, $tab_AA;

        global  $tab_authors_id,   $tab_authors_first_name, $tab_authors_last_name;

        global  $tab_arts_art_id,  $tab_arts_journal_id,    $tab_arts_year,
                $tab_arts_volume,  $tab_arts_title,         $tab_arts_begin_page;

        global  $tab_journals_id,  $tab_journals_name;

        global  $tab_AA_art_id,    $tab_AA_aut_id;



        //  Encode  values before querying database, because the (non-compromised)
        //  database contains encoded values only:
        //  < is stored as &lt;, > as &gt;, etc. . Accented characters are stored as mnemonic html
        //  character entities  (as far  as they exist).
        //  In addition, escape \x00, \n, \r, \, ', " and \x1a in mySQL commands.

        $search['first_name'] = htmlentities($search['first_name'], ENT_COMPAT,  'UTF-8');
        $search['first_name'] = $pubDB->real_escape_string($search['first_name'] );

        $search['last_name']  = htmlentities($search['last_name'] , ENT_COMPAT,  'UTF-8');
        $search['last_name']  = $pubDB->real_escape_string($search['last_name'] );

        $search['journal']    = htmlentities($search['journal']   , ENT_COMPAT,  'UTF-8');
        $search['journal']    = $pubDB->real_escape_string($search['journal'] );

        $search['begin_page'] = htmlentities($search['begin_page'], ENT_COMPAT,  'UTF-8');
        $search['begin_page'] = $pubDB->real_escape_string($search['begin_page'] );

        $search['volume']     = htmlentities($search['volume']    , ENT_COMPAT,  'UTF-8');
        $search['volume']     = $pubDB->real_escape_string($search['volume'] );

        $search['year']       = htmlentities($search['year']      , ENT_COMPAT,  'UTF-8');
        $search['year']       = $pubDB->real_escape_string($search['year'] );

        $search['title']      = htmlentities($search['title']     , ENT_COMPAT,  'UTF-8');
        $search['title']      = $pubDB->real_escape_string($search['title'] );

        $first_name           = $search['first_name'];
        $last_name            = $search['last_name'];
        $journal              = $search['journal'];
        $begin_page           = $search['begin_page'];
        $volume               = $search['volume'];
        $year                 = $search['year'];
        $title                = $search['title'];

        // Build query string according to search criteria:
        $sql =
           "SELECT
                    p.$tab_arts_art_id
            FROM          $tab_authors   AS a
            INNER JOIN    $tab_journals  AS j
            INNER JOIN    $tab_arts      AS p
            INNER JOIN    $tab_AA        AS l
            ON  a.$tab_authors_id      = l.$tab_AA_aut_id    AND
                l.$tab_AA_art_id       = p.$tab_arts_art_id  AND
                p.$tab_arts_journal_id = j.$tab_journals_id
            WHERE
          ";

        //    Build up WHERE condition
        $and = "";
        if ($last_name) {
            $sql .= "a.$tab_authors_last_name       = '$last_name' ";
            $and = "AND";
        };
        if ($first_name) {
            $sql .= "$and a.$tab_authors_first_name = '$first_name' ";
            $and = "AND";
        };
        if ($journal) {
            $sql .= "$and j.$tab_journals_name  LIKE  '%$journal%' ";
            $and = "AND";
        };
        if ($begin_page) {
            $sql .= "$and p.$tab_arts_begin_page    = '$begin_page' ";
            $and = "AND";
        };
        if ($volume) {
            $sql .= "$and p.$tab_arts_volume        = '$volume' ";
            $and = "AND";
        };
        if ($year) {
            $sql .= "$and p.$tab_arts_year          = '$year' ";
            $and = "AND";
        };
        if ($title) {
            $sql .= "$and p.$tab_arts_title     LIKE '%$title%'; ";
        };


        // Null WHERE string?
        if (preg_match ('/WHERE\s+$/', $sql)) {
            $self = $_SESSION['self'];
        ?>
            <div class = 'menu'>
                <b>No search criteria specified!</b>
            </div>
            <br>
            <button class = "restartBtn"
                onclick = "window.location.href = '<?=$self?>'" >
                Restart
            </button>
        <?php
            exit(-1);
        }

        $results = $pubDB->query($sql) or
            die("<b>Select Error in  PWREF_update_article.php:</b>"  . $pubDB->error);

        $article_ids = array();
        $i = 0;
        while ($ids = $results->fetch_array(MYSQLI_NUM) ) {
            $article_ids[$i] = $ids[0];
            $i++;
        }
        $article_ids = array_unique($article_ids);
        $nr_hits  = count($article_ids);

        if ($nr_hits === 0 ) {
            return array();
        }
        else {
            return  $article_ids;
        }
    }
    ?>
</body>
</html>
