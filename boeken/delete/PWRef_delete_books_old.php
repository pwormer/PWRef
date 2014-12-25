<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>PWRef deletion of book references </title>
    <meta http-equiv = "content-type" content = "text/html; charset=UTF-8" />
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"
                type = "text/javascript"></script>
    <base href = "http://localhost/PWRef/books/" />
    <!--
    <base href = "http://www.theochem.ru.nl/~pwormer/PWRef/books/" />
    -->
    <link href = "../PWRef.css" rel = "stylesheet" type = "text/css" />
    <style>
        .headline #replace:hover {
            border-bottom: solid white  2px;
            background-color: gray;
        }
    </style>
</head>

<body>
<?php        //>
   /*
    *   Remove references to books and similar publications from
    *   database. Publisher and author(s) are NOT removed.
    *
    *   This script sets and processes multiple html input forms.
    *
    *   Function "set_formx" sets <form>...</form>  in conjunction
    *   with a submit button.  Clicking the submit button
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
            Delete a reference to a publication other than a journal article.
        </span>

    </div>
<?php    //>
    $self   = $_SERVER['PHP_SELF'];

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
            set_form3($self);       //  sets $_POST['switch'] = "post3" or "form2"
            break;

        case "post3":
            process_form3($self);   //  returns to top
            break;

        default:
            echo "<br><b>Error:</b>, {$switch} not defined";
            exit();

    }   // end switch statement

    function set_switch() {
    /*
     *  Set $switch  depending on $_SESSION['switch'] and $_POST['switch'].
     *  Unset $_SESSION['switch'] and $_POST['switch']
     */

        if (!empty($_SESSION['switch'])) {
            $switch =  $_SESSION['switch'];
            $_SESSION['switch'] = "";
        }
        elseif (!empty($_POST['switch'])) {
            $switch =  $_POST['switch'];
            $_POST['switch'] = "";
        }
        else {
            $switch = "form1";
        }
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
                        'title'         => '',
                        'year'          => ''
                      );
        }

        ?>
        <div class = "menu">
            The search for one or more references to be deleted proceeds in two stages.<br>
            First step, perform a global search for one or more existing references:
        </div>
        <br><br>

        <fieldset>
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
                        <b>Publication title:</b>
                        <br>
                        <span style = "font-size: 70%;">(may be a substring)</span>
                    </td>
                    <td colspan = 3>
                        <input  type  = "text" name = "title"
                                value = "<?=$search['title']?>"
                                size  = "70" maxlength = "512"  />
                    </td>
                </tr>
                <tr>
                    <td style = "line-height: 1em">
                        <b>Year of publication:</b>
                        <br>
                        <span style = "font-size: 70%; margin-left: 20px;">(up to 4 digits)</span>
                    </td>
                    <td><input  type  = "text" name = "year"
                                value = "<?=$search['year']?>"
                                size  = "4" maxlength = "4"     />
                    </td>
                </tr>
            </table>
            <br>
            <button class = "goBtn" type = "submit"  name = "switch" value = "post1"
                    style = "position: relative; top: 0px; float: right;">
                Search
            </button>
        </form>

        <button class = "backBtn"
            onclick = 'window.location.href="<?=$self?>?reset=erase"' >
            Reset
        </button>

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

        //  To avoid sql injection:
        foreach ($_POST as $key => $val) {
            $_POST[$key] = clean_html($val);
        }

        //  Truncate to avoid buffer overflow attacks:
        $search = array (
                    'first_name' => substr( $_POST['first_name'], 0, $maxlength['first_name']),
                    'last_name'  => substr( $_POST['last_name'],  0, $maxlength['last_name' ]),
                    'title'      => substr( $_POST['title'],      0, $maxlength['title'     ]),
                    'year'       => substr( $_POST['year'],       0, $maxlength['year'      ])
                  );

        $_SESSION['search'] = $search;  //  Remember array $search for revised search attempts

        //  unset POST
        foreach ($_POST as $key => $val) {
            unset($_POST[$key]);
        }


        //  Consists  $year of digits and is it in required range?
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
                    &nbsp; &nbsp;
                    <button class = "backBtn"
                            onclick = "window.location.href = '<?=$self?>'">
                        Back
                    </button>
                </div>
            <?php       //>
            exit();
        }


        $candidates_to_del  = search_to_del($search);  // Search for candidates to delete.

        if (count($candidates_to_del) === 0) {
            $_SESSION['switch'] = "form1";
            ?>
                <div class = 'menu'>
                    <br><br>
                    <b>Error:</b> No references found, hit button to return to previous form.
                    &nbsp; &nbsp;
                    <button class = "backBtn"
                            onclick = "window.location.href = '<?=$self?>'">
                        Back
                    </button>
                </div>
            <?php        //>
            exit();
        }
        else {
            $_SESSION['to_del'] =  $candidates_to_del;
            $_SESSION['switch'] =  "form2";

            // Jump unconditionally to set_form2:
            echo "<script>window.location.href = '{$self}';</script>";
        }
    }

    function set_form2($self) {
    /*
     *  List book entries (candidates to delete) with checkboxes.
     */
        global $filenames;
        require_once $filenames['Book_class2'];

        $ids_to_del = $_SESSION['to_del'];
        $nr_to_del  = count($ids_to_del);

        $books = array();
        //  for ($i = 0; $i < $nr_to_del; $i++) {   //>
        $i = 0;
        foreach ($ids_to_del as $key => $val ) {   //>
            $book_id    = $val;
            $books[$i]  = new Book($book_id);
            $books[$i] -> Retrieve_book($book_id);
            $i++;
        }

    ?>
        <div class = "menu">
            <h4>Choose one or more publications to delete: </h4>
            <form action = "<?= $self ?>" method = "POST">
            <?php
                // for ($i = 0; $i < $nr_to_del ; $i++) {
                //    echo $ids_to_del[$i];

                $i = 0;
                foreach ($ids_to_del as $key => $val ) {
                    echo $val;
                    echo "&nbsp;
                          <input type = 'checkbox' name = '{$val}'  />
                         ";
                    $auth = $books[$i]->authors;

                    $nr_coauth =  count($auth)-1;
                    for ($j = 0; $j < $nr_coauth; $j++) {    //>
                        echo $auth[$j][0] . ' ' . $auth[$j][1] . ', ';
                    }

                    echo $auth[$nr_coauth][0] . ' ' . $auth[$nr_coauth][1].": ";
                    echo "<i>" . $books[$i]->title . "</i>";
                    echo "&nbsp;(" . $books[$i]->year . ").<br><br>";
                    $i++;
                }
            ?>
                <button class = "goBtn" type = "submit" name = "switch" value = "post2"
                        style = "position: relative; top: 0px; float: right; right: 100px;">
                    Proceed
                </button>
            </form>

            <button class = "backBtn"
                    onclick = 'window.location.href="<?=$self?>?reset=erase"' >
                Reset
            </button>

        </div>
    <?php   //>
    }

    function process_form2($self) {
    /*
     *  Remember parameters inputted by form2 (checked references)
     *  and unset them.
     *
     *  Set $_SESSION['switch'] = "form2" to  return to checkboxed form,
     *  or
     *  set $_SESSION['switch'] = "form3" to  invoke "set_form3".
     */

        global $filenames;
        require_once $filenames['Book_class2'];

        unset($_POST['switch']);    // To not include in next loop

        // Store id's of checked references in $to_del:
        $to_del = array();
        $i      = 0;
        foreach ($_POST as $id => $val) {
            $to_del[$i] = $id;
            $i++;
        }

        if ($i === 0) {
            $_SESSION['switch'] = "form2";  // Back to checkboxed form
            ?>
            <div class = "menu">
                <br>
                <b>Error:</b> Nothing to delete!
                Did you forget to checkmark a reference?
                <br><br>
                Hit button to go back and search again: &nbsp;
                    <button class   = "backBtn"
                            onclick = "window.location.href = '<?=$self?>'">
                        Again
                    </button>
            </div>
            <?php       //>
            exit();
        }

        $_SESSION['book_to_del'] = $to_del;
        $_SESSION['switch']      = "form3";      // To next form

        echo "<script>window.location.href = '{$self}';</script>";
    }

    function set_form3($self) {
    /*
     *  List references to be deleted as a final check.
     *  Give two forms with respective choices: back or delete.
     */
        global $filenames;
        require_once $filenames['Book_class2'];
        ?>
        <div class = 'menu'>
            Will delete the following publications
            (listed are: book_id, first author, possibly second author,  title, year):
            <br><br>
            <?php           //>
            $to_del = $_SESSION['book_to_del'];

            for ($i = 0; $i < count($to_del); $i++) {       //>
                $book_id =  $to_del[$i];
                $book    =  new Book();
                $book    -> Retrieve_book($book_id);
                $auth    =  $book -> authors;
                $title   =  $book -> title;
                $year    =  $book -> year;

                printf("<b>%5d</b>. &nbsp; %s %s",
                        $book_id, $auth[0][0], $auth[0][1]);

                if ( !empty($auth[1][1]) ) {
                    printf(", %s %s, <i>%s</i>&nbsp; (%4d)%s",
                             $auth[1][0], $auth[1][1], $title, $year, "<br>");
                }
                else {
                    printf(" <i>%s</i>&nbsp; (%4d)%s", $title, $year, "<br>");
                }
            }

            ?>
            <br><br>

            <form action = "<?=$self?>"  method = "POST" >
                If you <em>do not</em> want to delete these references, hit:
                <button class = "backBtn" name = 'switch' value = "form2">
                    back
                </button>
            </form>

            <br><br>

            <form action = "<?=$self?>"  method = "POST" >
                If you <em>do</em> want to delete these references, hit:
                <button class = "goBtn" name = 'switch' value = "post3">
                    delete
                </button>
            </form>

        </div>

        <?php       //>
        exit();
    }

    function process_form3($self) {
    /*
     *  Process $_POST parameters inputted by form3,
     *  i.e., perform actual deletion from database.
     *
     */
        global $filenames;
        require_once $filenames['Book_class2'];

        echo "<div class = 'menu'>";
            $to_del    = $_SESSION['book_to_del'];
            $nr_to_del = count($to_del);

            //  There they go:
            for ($i = 0; $i < $nr_to_del; $i++) {    //>
                $book = new Book();
                $book -> Delete_book($to_del[$i]);
            }

            echo "<br><br>Removed <b>{$nr_to_del}</b> records<br><br>";

            $creds = $_SESSION['credentials'];
            foreach ($_SESSION as $key =>$val ) {
                unset($_SESSION[$key]);
            }
            $_SESSION['credentials'] = $creds;

            $_SESSION['switch'] = "form1";      // return to begin

        ?>
            <br>
            Hit restart button to start a new delete action: &nbsp;
            <button class = "goBtn"  onclick = 'window.location.href = "<?=$self?>"' >
                Restart
            </button>

        </div>
    <?php       //>
        exit();
    }

    function inspect_reset_button($self) {
    /*
     *  Function inspects reset button that
     *  unsets $_SESSION and $_POST and restarts with
     *  setting up the default form <form id = "form1">.
     *
     */
        if  ( key_exists('reset', $_GET) && $_GET['reset'] === 'erase') {

            unset($_GET['reset']);

            foreach ($_POST as $key=>$val) {
                unset($_POST[$key]);
            }

            // Clear $_SESSION, but save credentials
            $creds = $_SESSION['credentials'];
            foreach ($_SESSION as $key=>$val) {
                unset($_SESSION[$key]);
            }
            $_SESSION['credentials'] = $creds;
        }
    }

    function search_to_del($search) {
    /*
     *  Search for candidates to delete.
     *
     *  Query database for records with one or more of the four values
     *  specified in array $search.
     *
     *  Return array with book_id's satisfying the search values.
     *  Array indices are integers but not necessarily contiguous/
     */

        global  $pubDB;
        global  $tab_books, $tab_authors,  $tab_BA;

        global  $tab_authors_id, $tab_authors_first_name,  $tab_authors_last_name;

        global  $tab_books_id, $tab_books_title, $tab_books_year;

        global  $tab_BA_book_id, $tab_BA_author_id;

        //  Encoding by htmlentities is needed because storage is in html-encoded form:
        //  < as &lt;, > as &gt;. Accented characters are stored as mnemonic html
        //  character entities  (as far  as they exist).

        $search['first_name'] = htmlentities($search['first_name'], ENT_COMPAT,  'UTF-8');
        $search['first_name'] = $pubDB->real_escape_string($search['first_name'] );

        $search['last_name']  = htmlentities($search['last_name'], ENT_COMPAT,  'UTF-8');
        $search['last_name']  = $pubDB->real_escape_string($search['last_name'] );

        $search['title']      = htmlentities($search['title'], ENT_COMPAT,  'UTF-8');
        $search['title']      = $pubDB->real_escape_string($search['title'     ] );
        $search['year']       = $pubDB->real_escape_string($search['year'      ] );

        $sql = "SELECT       b.$tab_books_id
                FROM         $tab_books       AS b
                INNER JOIN   $tab_authors     AS a
                INNER JOIN   $tab_BA          AS l
                ON           b.$tab_books_id     = l.$tab_BA_book_id
                AND          l.$tab_BA_author_id = a.$tab_authors_id
                WHERE
                ";

        // Build up WHERE condition
        $and = "";
        if (!empty($search['first_name'])) {
            $sql .= "a.{$tab_authors_first_name}      = \"{$search['first_name']}\"";
            $and  = "AND";
        }
        if (!empty($search['last_name']))  {
            $sql .= "$and a.{$tab_authors_last_name}  = \"{$search['last_name' ]}\"";
            $and  = "AND";
        }
        if (!empty($search['title']))      {
            $sql .= "$and b.{$tab_books_title}  LIKE   \"%{$search['title'     ]}%\"";
            $and  = "AND";
        }
        if (!empty($search['year']))       {
            $sql .= "$and b.{$tab_books_year}         = \"{$search['year'      ]}\"";
        }

        if (preg_match ('/WHERE\s+$/', $sql)) {     // Null WHERE string?
            return array();
        }

        $results = $pubDB->query($sql) or
            die("<b>Select Error in PWRef_delete_book.php:</b>"  . $pubDB->error);


        $book_ids = array();
        $i = 0;
        while ($ids = $results->fetch_array(MYSQLI_NUM) ) {
            $book_ids[$i] = $ids[0];
            $i++;
        }

        $book_ids = array_unique($book_ids);
        $nr_hits  = count($book_ids);

        if ($nr_hits === 0 ) {
            return array();
        }
        else {
            return  $book_ids;
        }
    }
    ?>
</body>
</html>
