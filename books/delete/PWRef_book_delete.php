<?php     //>
    session_start();
    require_once "../../Setup.php";
    Setup(1);      // Open database, set table and column names

?>
<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>PWRef delete books, booklets, etc, </title>
    <meta http-equiv = "content-type" content = "text/html; charset=UTF-8" />
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type = "text/javascript">
        "use strict";
        $(function() {
            //  Check validity of year input (class = "year")
            $("input.year").bind("change", checkYear);
            function checkYear() {
                var yF = $(this).val();
                if (yF && !yF.match(/^\d+$/) || yF.length > 4) {
                    alert("Warning: year must consist of up to 4 digits, no letters or other characters");
                }
            }

            // Help info:
            $(".tooltip_book_inp").load("tooltip_book_delete.html");

            // Event handlers:
            $("input[name = author11]").keydown(catchEnter);
            $("input[name = author11]").keyup(suggest);

            function setClick() {
            /*
             *  Set function "setClick" as click-event handler on the output of
             *  script "suggest_author.php". Output is contained in the <div> "suggestionBox".
             *  Handler fills out first and last name of clicked author.
             */
                $("#suggestionBox  ul  li").click( function() {
                        var suggestedName = $(this).html().split(", ");
                        $("input[name = author10]").val( suggestedName[1] );
                        $("input[name = author11]").val( suggestedName[0] );
                        $("#suggestionBox").text("");   // Clear suggestionBox
                        $("input[name = author11]").unbind("keyup");
                    });
            }

            function suggest() {
            /*  Pickup string from <input name = "author11"> and pass
             *  it on to "suggest_author.php". This script searches the
             *  database for "author_last_name" beginning with the string.
             *  Call "setClick" upon return.
             */
                var str = encodeURIComponent($(this).val());
                if (str.length <= 0)  return;             //>
                $("#suggestionBox").load("suggest_author.php?q="+str, setClick);
            }

            function catchEnter(event) {
            /*  Catch key 13 */
                if (event.keyCode === 13) {
                    event.preventDefault();
                }
            }

        });
    </script>

    <!--
    <base href   = "http://www.theochem.ru.nl/~pwormer/PWRef/books/delete/" />
    <base href   = "http://localhost/PWRef/books/delete/" />
     -->

    <link href   = "../../PWRef.css" rel = "stylesheet" type = "text/css">

    <style>
        .tooltip_book_inp {
            display: none;
            position: absolute;
            right:  250px;
            top:    100px;
        }
        .book_inp_info:hover > .tooltip_book_inp {
            display: block;
        }
    </style>

</head>

<body>
<?php     //>
    // Invoking session_start at this point in the code gave problems, it is now before <html>.
    include "../../topmenu.html";

    if ( !key_exists('credentials', $_SESSION) ) {
        echo "<div style = 'margin: 50px 0 0 75px;'><b>You forgot to logon!</b> </div>\n";
        exit();
    }
?>

<style>
    .headline #input:hover {
        border-bottom: solid white  2px;
        background-color: gray;
    }
</style>

<div class = "title">
    <span style = "margin-left: 30px;">
        Delete book-type publications from the database.
    </span>
    <br>
</div>

<?php   // >
    global $filenames;
    require_once $filenames['clean2'];
    require $filenames['maxlength2'];

    $self = $_SERVER['PHP_SELF'];

    /*
    echo $self . "<br>\n";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    */

    // Set defaults for inputs:
    $y0 = date("Y") - 1;        // Last year
    $y1 = date("Y");            // This year

    $inputs = array (
                'author10'     => '',
                'author11'     => '',
                'title'        => '',
                'year0'        => $y0,
                'year1'        => $y1,
                'type'         => '',
                'book_key'     => '');

    //  At this point $_POST indicates one of 5 mutually exclusive cases:
    //      $_POST not set:     set SESSION to defaults, invoke `search_form`
    //      $_POST['restart']:  set SESSION to defaults, clear $_POST,  invoke `search_form`
    //      $_POST['refine']:   do no touch SESSION,  invoke `search_form`
    //      $_POST['submit']:   copy POST (if set) to SESSION, invoke `search_results`
    //      $_POST['delete']:   Value is an array, delete its entries from tables $tab_books, $tab_BA, and $tab_BE.
    //  Only upon submittal is it possible that $_POST has more than one entry

    if (count($_POST) === 0) {
        // $_POST not set
        foreach ($inputs as $k => $val) {
            $_SESSION[$k] = $val;
        }
        search_form($self);
    }
    else if (key_exists('submit', $_POST) ) {
        // Submitted search request, set search parameters
        search_results($self);
    }
    else if (!key_exists('submit', $_POST) and !key_exists('delete', $_POST) and count($_POST) > 1 ) {
        // Not submitted, yet more than one $_POST entry set, error
        echo ("<span style = 'margin-top:30px; margin-left: 75px'>
                    <b> ERROR: </b> Too many \$_POST entries (is a bug or a hack). Execution stops.
              </span>\n");
        echo
        "<div style = 'margin-top:20px; margin-left: 75px;'>";
            echo "<b>Post mortem dump of \$_POST:</b><br> \n";
            var_dump($_POST);
        echo
        "</div>";
        foreach ($_POST as $k => $val) {
            unset($_POST[$k]);
        }
        exit(1);
    }
    else if (key_exists('restart', $_POST) ) {
        // Restart, begin with clearing $_SESSION
        $save = $_SESSION['credentials'];
        foreach ($_SESSION as $k => $val) {
            unset($_SESSION[$k]);
        }
        $_SESSION['credentials'] = $save;
        unset($save);

        // then set parameters to defaults
        foreach ($inputs as $k => $val) {
            $_SESSION[$k] = $val;
        }

        //  Clear $_POST
        foreach ($_POST as $k => $val) {
            unset($_POST[$k]);
        }

        search_form($self);
    }
    else if (key_exists('refine', $_POST) ) {
        // Back to search form, search parameters were saved, set them into form
        unset($_POST['refine']);
        search_form($self);

        //  Set previous values of select input and radio input through jQuery:
        echo "<script>$('#selectType').val(\"{$_SESSION['type']}\")</script>";
    }
    else if (key_exists('delete', $_POST) ){
        unset($_POST['delete']);

        $to_del = array();
        foreach ($_POST as $k => $val) {
            $to_del[] = $k;
        }

        $_SESSION['to_delete'] = $to_del;

        delete_references($self);
    }
    function search_form($self) {
   /*
    *   Set up form for the input of search parameters.
    *   Sets, among others, $_POST['submit'].
    */
        $author10 = $_SESSION['author10'];
        $author11 = $_SESSION['author11'];
        $title    = $_SESSION['title'   ];
        $year0    = $_SESSION['year0'   ];
        $year1    = $_SESSION['year1'   ];
        $type     = $_SESSION['type'    ];
        $book_key = $_SESSION['book_key'];
?>
        <div class = "menu">

            <!-- Help info -->
            <div class = "book_inp_info">
                <img  src = "../../shared/info.jpg" class = "info"  />
                <div  class = "tooltip_book_inp subhelp">
                </div>
            </div>
            <!-- End Help info -->

            <form id = "form1" action = "<?= $self ?>" method = "POST" >

                <div style = "margin-bottom: 20px;"><b>Enter the name of an author or  editor:</b></div>
                <div id = 'authorDiv1'>
                    <label>First name:</label>&nbsp;
                    <input name = 'author10' value = "<?=$author10?>" size = "20" maxlength = "50"  />
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    <label>Last name:</label>
                    <input name = 'author11' value = "<?=$author11?>" size = "40" maxlength = "100"/>
                </div>
                <div id = "suggestionBox" style = "position: relative; top: 10px; left: 500px; z-index: 10;
                                                   font-size: 10pt; ">
                </div>
                <br><br><br>

                <div style = "margin-bottom: 20px;"><b>Title of publication:</b></div>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input name = "title" value = "<?=$title?>" size = "80" maxlength = "512" >
                <br><br><br>

                <label>Begin year:</label>&nbsp;
                <input name = 'year0' value = "<?=$year0?>" size =  "4" maxlength =   "4" class = "year" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>End year:</label>&nbsp;
                <input name = 'year1' value = "<?=$year1?>" size =  "4" maxlength =   "4" class = "year" >
                <div style = "float: right; width: 300px; margin-right: 100px;">
                <label>Select publication type:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <select id = "selectType" size="1" name="type">
                    <option  value = ""  selected    >All types      </option>
                    <option  value = "book"          >Book           </option>
                    <option  value = "incollection"  >In collection  </option>
                    <option  value = "misc"          >Miscellaneous  </option>
                    <option  value = "booklet"       >Booklet        </option>
                    <option  value = "phdthesis"     >PhD thesis     </option>
                    <option  value = "inproceedings" >In proceedings </option>
                    <option  value = "inbook"        >In book        </option>
                    <option  value = "unpublished"   >Unpublished    </option>
                    <option  value = "manual"        >Manual         </option>
                    <option  value = "mastersthesis" >Master's thesis </option>
                </select>
                </div>

                <br><br><br>

                <label>Key:</label>
                <input name = 'book_key' value = "<?=$book_key?>" size = "30" maxlength = "105" />
                <br><br>
                <!-- Submit button -->
                <button class = "goBtn" id = "submit" name = 'submit' value = "SUBMIT">
                    Search
                </button>

            </form>

            <!-- Restart button -->
            <form action = "<?= $self ?>" method = "POST" >
                <button class = "restartBtn" id = "restart" name = 'restart' value = 'RESTART'>
                    Restart
                </button>
            </form>
            <br><br>

        </div>

<?php      //>
    }

    function search_results($self) {
   /*
    *   Search database. Search parameters are in $_SESSION. Note that
    *      $_SESSION['author10' ],  $_SESSION['author11' ]
    *   are the first and last name, respectively, of either an author or an editor.
    */
        /*
        echo "<pre>";
        print_r($_POST);
        print_r($_SESSION);
        echo "</pre>";
        */

        global  $pubDB;
        global  $filenames;
        require_once $filenames['Book_class2'];
        require $filenames['maxlength2'];

        global  $tab_authors;
        global  $tab_authors_id, $tab_authors_last_name,  $tab_authors_first_name;

        global  $tab_books;
        global  $tab_books_id,      $tab_books_organization, $tab_books_publisher,
                $tab_books_title,   $tab_books_second_title, $tab_books_page,
                $tab_books_type,    $tab_books_year,         $tab_books_url,
                $tab_books_project, $tab_books_isbn,         $tab_books_key,
                $tab_books_note;

        global  $tab_BA;
        global  $tab_BA_book_id, $tab_BA_author_id;

        global  $tab_BE;
        global  $tab_BE_book_id, $tab_BE_editor_id;
        echo
       "<span style = 'margin-left: 275px;'>
            2. Choice of references to be deleted.
        </span>
       ";
        echo
       "<div class = 'menu' style = 'margin-top: 0px;'>";
            //  Reset $_SESSION with values from $_POST if $_POST set,
            //  else do not touch $_SESSION.
            unset($_POST['submit']);
            if ( count($_POST) > 0 ) {
                $_SESSION['author10'] = substr( clean_html($_POST['author10']), 0, $maxlength['first_name']);
                $_SESSION['author11'] = substr( clean_html($_POST['author11']), 0, $maxlength['last_name' ]);
                $_SESSION['title'   ] = substr( clean_html($_POST['title'   ]), 0, $maxlength['title'     ]);
                $_SESSION['year0'   ] = substr( clean_html($_POST['year0'   ]), 0, $maxlength['year'      ]);
                $_SESSION['year1'   ] = substr( clean_html($_POST['year1'   ]), 0, $maxlength['year'      ]);
                $_SESSION['type'    ] = substr( clean_html($_POST['type'    ]), 0, $maxlength['type'      ]);
                $_SESSION['book_key'] = substr( clean_html($_POST['book_key']), 0, $maxlength['book_key'  ]);

                foreach ($_POST as $k => $val) {
                    unset($_POST[$k]);
                }
            }
            $author10    =  $_SESSION['author10' ];
            $author11    =  $_SESSION['author11' ];
            $title       =  $_SESSION['title'    ];
            $year0       =  $_SESSION['year0'    ];
            $year1       =  $_SESSION['year1'    ];
            $type        =  $_SESSION['type'     ];
            $book_key    =  $_SESSION['book_key' ];

            $stmt = $pubDB -> stmt_init();     // Create object $stmt

            // Create query template. When authors are not specified, do not join tables.
            if ($author10 == "" and $author11 == "") {
                $sql = "SELECT DISTINCT book_id
                        FROM   $tab_books
                        WHERE  $tab_books_year BETWEEN $year0 AND $year1
                        AND    $tab_books_title LIKE  ?
                        AND    $tab_books_type  LIKE  ?
                        AND    $tab_books_key   LIKE  ?
                       ";
                // Bind template parameters to names of internal variables
                if ( !$stmt -> prepare($sql) ) {   // Prepare template from $sql
                    die("Error in preparing MySQL statement");
                }
                $stmt -> bind_param("sss", $bind_title,  $bind_type, $bind_key);
            }
            else {
                $sql = "SELECT DISTINCT b.book_id
                        FROM   $tab_books    AS b
                        JOIN   $tab_BA       AS l
                        JOIN   $tab_authors  AS a
                        ON     b.$tab_books_id     =  l.$tab_BA_book_id
                        AND    l.$tab_BA_author_id =  a.$tab_authors_id
                        WHERE  a.$tab_authors_first_name LIKE ?
                        AND    a.$tab_authors_last_name  LIKE ?
                        AND    b.$tab_books_year BETWEEN $year0 AND $year1
                        AND    b.$tab_books_title LIKE  ?
                        AND    b.$tab_books_type  LIKE  ?
                        AND    b.$tab_books_key   LIKE  ?
                       ";
                // Bind template parameters to names of internal variables
                if ( !$stmt -> prepare($sql) ) {   // Prepare template from $sql
                    die("Error in preparing MySQL statement");
                }
                $stmt -> bind_param("sssss", $bind_author0, $bind_author1, $bind_title,
                                           $bind_type, $bind_key);
            }


            // Assign values to bind parameters:
            $bind_author0 = $author10."%";
            $bind_author1 = $author11."%";
            $bind_title   = "%".$title."%";
            if (mb_strlen($type, "UTF8") > 0 ) {
                $bind_type    =     $type;
            }
            else {
                $bind_type    =     "%";
            }
            $bind_key     = "%".$book_key."%";

            // Send template plus values of bind parameters to sql server
            $stmt -> execute();
            $stmt -> bind_result($book_id);

            // Collect author id's
            $author_ids = array();
            while ( $stmt -> fetch() ) {
                $author_ids[] = $book_id;
            }

            // Editors
            if ($author10 !== "" or $author11 !== "") {
                $sql = "SELECT DISTINCT b.book_id
                        FROM   $tab_books    AS b
                        JOIN   $tab_BE       AS l
                        JOIN   $tab_authors  AS a
                        ON     b.$tab_books_id     =  l.$tab_BE_book_id
                        AND    l.$tab_BE_editor_id =  a.$tab_authors_id
                        WHERE  a.$tab_authors_first_name LIKE ?
                        AND    a.$tab_authors_last_name  LIKE ?
                        AND    b.$tab_books_year BETWEEN $year0 AND $year1
                        AND    b.$tab_books_title LIKE  ?
                        AND    b.$tab_books_type  LIKE  ?
                        AND    b.$tab_books_key   LIKE  ?
                       ";
                // Bind template parameters to names of internal variables
                if ( !$stmt -> prepare($sql) ) {   // Prepare template from $sql
                    die("Error in preparing MySQL statement");
                }
                $stmt -> bind_param("sssss", $bind_author0, $bind_author1, $bind_title,
                                           $bind_type, $bind_key);
            }

            // Assign values to bind parameters:
            $bind_author0 = $author10."%";
            $bind_author1 = $author11."%";
            $bind_title   = "%".$title."%";
            if (mb_strlen($type, "UTF8") > 0 ) {
                $bind_type    =     $type;
            }
            else {
                $bind_type    =     "%";
            }
            $bind_key     = "%".$book_key."%";

            // Send template plus values of bind parameters to sql server
            $stmt -> execute();
            $stmt -> bind_result($book_id);



            // Collect editor id's
            $editor_ids = array();
            while ( $stmt -> fetch() ) {
                $editor_ids[] = $book_id;
            }

            // Free storage:
            $stmt -> close();

            $ids_del = array_unique(array_merge($author_ids, $editor_ids));
            echo "<br>Number of references found in database: <b>" . count($ids_del) ."</b><br>\n";

            if (count($ids_del) ===  0 ) {

                //  Set previous values of select input through jQuery:
                echo "<script>$('#selectType').val(\"{$_SESSION['type']}\")</script>";
                echo
                   "<br><b>No references found in the database
                        that satisfy the search parameters.</b><br><br>\n";
                echo
                   "<form action = $self method = 'POST'>
                        <button class = 'backBtn' id = 'refine' name = 'refine' value = 'REFINE' >
                            Back
                        </button>
                    </form>
                   ";
                exit();
            }


            $books_del = array();   // collect book objects that are candidate to delete

            // Set objects of class `Book`
            Book::Open();
            for ($i = 0; $i < count($ids_del); $i++ ) {
                $books_del[$i] = new Book();
                $books_del[$i] -> Retrieve($ids_del[$i]);
                //$books_del[$i] -> List_properties("pretty");
            }

?>
            <h4>Check one or more publications to delete
                (the bold number is the database identification of the reference):
            </h4>
            <form action = "<?= $self ?>" method = "POST">
                <ul style = "margin-left: 1.5em; text-indent: -3.7em; ">
            <?php
                    $i = 0;
                    foreach ($books_del as $key => $val ) {
                        echo
                       "<li>
                        <input type = 'checkbox' name = '{$ids_del[$i]}'  />
                       ";
                        echo "&nbsp;<b>{$ids_del[$i]}.</b>&nbsp;";
                        $auth = $val -> authors;
                        $nr_coauth =  count($auth);
                        if ( $nr_coauth > 0 ) {
                            for ($j = 0; $j < $nr_coauth-1; $j++) {    //>
                                echo $auth[$j][0] . ' ' . $auth[$j][1] . ', ';
                            }
                            echo $auth[$nr_coauth-1][0] . ' ' . $auth[$nr_coauth-1][1].". ";
                        }

                        $editors    = $val -> editors;
                        $nr_editors =  count($editors);
                        if ( $nr_editors > 0 and $nr_coauth === 0 ) {
                            for ($j = 0; $j < $nr_editors-1; $j++) {    //>
                                echo $editors[$j][0] . ' ' . $editors[$j][1] . ', ';
                            }
                            echo $editors[$nr_editors-1][0] . ' ' . $editors[$nr_editors-1][1].". ";
                            echo " (Editors) ";
                        }

                        $title = $val -> title;
                        $key   = $val -> book_key;
                        if (!empty($title)) echo " <i>" . $title . "</i>. ";
                        if (!empty($key))   echo " <i>"   . $key . "</i>";
                        echo
                       "&nbsp;(" . $val -> type . ": " . $val -> year . ").
                        </li>
                        <br><br>";
                        $i++;
                    }
            ?>
                </ul>
                <!-- Button delete -->
                <button class = "goBtn" type = "submit" name = 'delete' value = 'DELETE'>
                    Delete
                </button>
            </form>

            <!-- Button refine -->
            <form action = "<?= $self ?>" method = "POST" >
                <button class = "backBtn" id = "refine" name = 'refine' value = 'REFINE' >
                    Back
                </button>
            </form>
            <!-- Button restart -->
            <form action = "<?= $self ?>" method = "POST" >
                    <button class = "restartBtn" id = "restart1" name = 'restart' value = "RESTART">
                        Restart
                    </button>
            </form>


        </div>

<?php   //>
    }
    function delete_references($self) {
        global $filenames;
        require_once $filenames['Book_class2'];

        echo
       "<div class = 'menu'>";
            //print_r($_SESSION);
            $to_del = $_SESSION['to_delete'];

            $nr_to_del = count($to_del);
            if ($nr_to_del === 0) {
        ?>
                Nothing to delete, did you forget to checkmark one or more references?
                <!-- Button refine -->
                <br>
                <form action = "<?= $self ?>" method = "POST" >
                    <!--
                    <button class = "backBtn" id = "restart2" name = 'refine' value = 'REFINE'>
                     -->
                    <button class = "backBtn" id = "restart2" name = 'submit' value = 'SUBMIT'>
                        Back
                    </button>
                </form>
        <?php
                return;
            }

            //  There they go:
            Book::Open();
            for ($i = 0; $i < $nr_to_del; $i++) {    //>
                $book = new Book();
                $book -> Delete_book($to_del[$i]);
            }
            echo "<br><br>Removed <b>{$nr_to_del}</b> records<br><br>";

            // Clean up $_SESSION
            $save = $_SESSION['credentials'];
            foreach ($_SESSION as $k => $val) {
                unset($_SESSION[$k]);
            }
            $_SESSION['credentials'] = $save;
            unset($save);
?>
            <!-- Restart button -->
            <form action = "<?= $self ?>" method = "POST" >
                <button class = "restartBtn" id = "restart2" name = 'restart' value = 'RESTART'>
                    Restart
                </button>
            </form>
        </div>
<?php
    }
?>

</body>
</html>
