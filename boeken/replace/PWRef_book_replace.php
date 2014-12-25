<?php     //>
    session_start();
    require_once "../../Setup.php";
    Setup(1);      // Open database, set table and column names

?>
<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>PWRef replace books, booklets, etc, </title>
    <meta http-equiv = "content-type" content = "text/html; charset=UTF-8" />
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type = "text/javascript">
        "use strict";
        window.PWRef = {maxAuthors: 0};   // This becomes value of $max_authors (set in maxlength.php).
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
            $("#tip1").load("tooltip1_book_replace.html",
                            function(x,y){if (y === 'error') alert(x);} );
            $("#tip2").load("tooltip2_book_replace.html",
                            function(x,y){if (y === 'error') alert(x);} );

            // Add author input line */
            var maxCounter = window.PWRef.maxAuthors;
            var first = true;
            var nr = 0;

            // Event handlers:
            $("#input_new").keydown(catchEnter);   // No submission when Enter is hit in input fields
            $("#addAuthorBtn").click(addAuthorLine);
            $("#addEditorBtn").click(addEditorLine);
            $("input[name = author11]").keydown(catchEnter);
            $("input[name = author11]").keyup(suggest);


            function addAuthorLine(event) {
            /*
             *  Add author input line
             */

                //Event handler for click on addAuthorBtn
                event.preventDefault();

                var lastAuthorInput = $("#input_new > input[name^='author']").last();
                if (lastAuthorInput.attr("name")) {
                    // Get number last author
                    var nr_of_authors = lastAuthorInput.attr("name").match(/^author(\d+)1$/)[1];
                    var i = nr_of_authors*1 + 1;
                    // Build up input line
                    var inputLine = "<br><br><b>Author&nbsp;" + i + "</b><br>";
                        inputLine += "First name:&nbsp;";
                        inputLine += "<input name = \'author" + i + "0\' value = \'\' size = \'19\' maxlength = \'50\'  />";
                        inputLine += "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        inputLine += "Last  name:&nbsp;";
                        inputLine += "<input name = \'author" + i + "1\' value = \'\' size = \'34\' maxlength = \'100\'  />";
                        // Insert input line
                        lastAuthorInput.after(inputLine);
                }
                else {
                    var i = 1;
                    var inputLine = "<br><b>Author&nbsp;" + i + "</b><br>";
                        inputLine += "First name:&nbsp;";
                        inputLine += "<input name = \'author" + i + "0\' value = \'\' size = \'19\' maxlength = \'50\'  />";
                        inputLine += "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        inputLine += "Last  name:&nbsp;";
                        inputLine += "<input name = \'author" + i + "1\' value = \'\' size = \'34\' maxlength = \'100\'  />";
                        inputLine += "<br><br>";
                    $("#addAuthorBtn").before(inputLine);
                }

            }

            function addEditorLine(event) {
            /*
             *  Add editor input line
             */

                //Event handler for click on addEditorBtn
                event.preventDefault();

                var lastEditorInput = $("#input_new > input[name^='editor']").last();
                if (lastEditorInput.attr("name")) {
                    // Get number last editor
                    var nr_of_editors = lastEditorInput.attr("name").match(/^editor(\d+)1$/)[1];
                    var i = nr_of_editors*1 + 1;
                    // Build up input line
                    var inputLine = "<br><br><b>Editor&nbsp;" + i + "</b><br>";
                        inputLine += "First name:&nbsp;";
                        inputLine += "<input name = \'editor" + i + "0\' value = \'\' size = \'19\' maxlength = \'50\'  />";
                        inputLine += "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        inputLine += "Last  name:&nbsp;";
                        inputLine += "<input name = \'editor" + i + "1\' value = \'\' size = \'34\' maxlength = \'100\'  />";

                        // Insert input line
                        lastEditorInput.after(inputLine);
                }
                else {
                    var i = 1;
                    var inputLine = "<b>Editor&nbsp;" + i + "</b><br>";
                        inputLine += "First name:&nbsp;";
                        inputLine += "<input name = \'editor" + i + "0\' value = \'\' size = \'19\' maxlength = \'50\'  />";
                        inputLine += "&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        inputLine += "Last  name:&nbsp;";
                        inputLine += "<input name = \'editor" + i + "1\' value = \'\' size = \'34\' maxlength = \'100\'  />";
                        inputLine += "<br>";
                    $("#addEditorBtn").before(inputLine);
                }

            }


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
    <base href   = "http://localhost/PWRef/books/replace/" />
     -->
    <base href   = "http://www.theochem.ru.nl/~pwormer/PWRef/books/replace/" />

    <link href   = "../../PWRef.css" rel = "stylesheet" type = "text/css">

    <style>
        .tooltip_book_inp {
            display: none;
            position: absolute;
            right:  100px;
            top:    100px;
            width: 450px;
        }
        .book_inp_info:hover > .tooltip_book_inp {
            display: block;
        }
        form {
            width: 825px;
        }
        .restart {
            position: relative;
            left: 0px;
            top: 20px;
        }
        .restart > form {
            position: relative;
            left: 0px;
            top:  0px;
        }
        .formRight {
            width: 360px;
            float: right;
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
        Replace book-type publications in the database.
    </span>
    <br>
</div>

<?php   // >
   /*
    *   Copy old reference to new reference. Optionally delete old reference.
    *
    *   Step1: Input form for search parameters
    *          $_POST['action'] = "search_form";
               If $_POST['action'] not set or equal to 'restart' clear $_SESSION
               else prefill form with $_SESSION.
    *   Step2: Checkbox form containing references satisfying the search parameters
    *          $_POST['action'] = "checkbox_form";
               Checkmark one reference, do not touch $_SESSION, set $_POST[$book_id] = "ON"
    *   Step3: Input of all fields  prefilled with values from checked reference or from $_SESSION
    *          $_POST['action'] = "input_new";
    *   Step4: Summarizing of input  fields of new reference
    *          $_POST['action'] = "summarize_new";
    *   Step5: Storing of new references
    *          $_POST['action'] = "store_new";
    *   Step6: Prompt for deletion of original references
    *          $_POST['action'] = "delete_old";
    *
    */

    //print_r($_POST);
    //echo "<br>\n";

    // Pass maximum allowed number of authors to JavaScript:
    require $filenames['maxlength2'];         // file maxlength.php sets $max_authors
    echo "<script>window.PWRef.maxAuthors = $max_authors;</script>";

    $self = $_SERVER['PHP_SELF'];

    if ( !key_exists('action', $_POST)  or $_POST['action'] === 'restart' ) {
        $switch = "search_form";

        $save = $_SESSION['credentials'];
        foreach ($_SESSION as $k => $val) {
            unset($_SESSION[$k]);
        }
        $_SESSION['credentials'] = $save;

    }
    else {
        $switch = $_POST['action'];
    }

    switch ($switch) {
        case "search_form";
            search_form($self);
            break;
        case "checkbox_form":
            checkbox_form($self);
            break;
        case "input_new":
            input_new($self);
            break;
        case "summarize_new":
            summarize_new($self);
            break;
        case "store_new":
            store_new($self);
            break;
        case "delete_old":
            delete_old($self);
            break;
        default:
            echo "<b>Error: </b> Wrong value in \$_POST, execution stops <br>\n";
            echo "Post mortem dumps: <br>\n<pre>";
            print_r($_POST);
            echo "<br>\n";
            print_r($_SESSION);
            echo "</pre><br>\n";
            break;
    }
    foreach ($_POST as $k => $val ) {
        unset ($_POST[$k]);
    };

    function search_form($self) {
   /*
    *   Input search parameters
    */

        if ( !key_exists('action', $_POST)  or $_POST['action'] === 'restart' ) {
            // Set defaults:
            $author10 =   '';
            $author11 =   '';
            $title    =   '';
            $year0    =  date("Y") - 1;        // Last year
            $year1    =  date("Y");            // This year
            $type     =   '';
            $book_key =   '';
        }
        else {
            $author10 = $_SESSION['author10'];
            $author11 = $_SESSION['author11'];
            /*
            $author10 = $_SESSION['authors'][1][0];
            $author11 = $_SESSION['authors'][1][1];
            */
            $title    = $_SESSION['title'   ];
            $year0    = $_SESSION['year0'   ];
            $year1    = $_SESSION['year1'   ];
            $type     = $_SESSION['type'    ];
            $book_key = $_SESSION['book_key'];
        }

?>
        <div class = "menu">
            <span style = "margin-left: 200px;">
                1. Search the database for a reference to be replaced/copied.
            </span>
            <br><br>

            <!-- Help info -->
            <div class = "book_inp_info">
                <img  src = "../../shared/info.jpg" class = "info"  />
                <div id = "tip1" class = "tooltip_book_inp subhelp">
                </div>
            </div>
            <!-- End Help info -->

            <form id = "form1" action = "<?= $self ?>" method = "POST" >

                <div style = "margin-bottom: 20px;"><b>Enter the name of an author or editor:</b></div>
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
                        <option  value = ""              >All types      </option>
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
                <?php    //>
                    // Select type
                    if ( key_exists('type', $_SESSION) and mb_strlen($_SESSION['type'], "UTF8") > 0 ) {
                        echo "<script>$('#selectType').val(\"{$_SESSION['type']}\")</script>";
                    }
                    else {
                        echo "<script>$('#selectType').val('')</script>";
                    }
                ?>
                </div>

                <br><br><br>

                <label>Key:</label>
                <input name = 'book_key' value = "<?=$book_key?>" size = "30" maxlength = "105" />
                <br><br>
                <button class = "goBtn" name = "action" value = "checkbox_form">
                    Search
                </button>
            </form>
            <form action = "<?=$self?>" method = "POST">
                <button class = "restartBtn" name = "action" value = "restart">
                    Restart
                </button>
            </form>
        </div>

<?php   //>
    }

    function checkbox_form($self) {
   /*
    *   Output form with references found and checkboxes attached.
    */
        global $pubDB;
        global $filenames;
        require_once $filenames['clean2'];
        require $filenames['maxlength2'];
        require_once $filenames['Book_class2'];

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

        /*
        echo "<pre>";
        print_r($_POST);
        print_r($_SESSION);
        echo "</pre>";
        */

        // Submitted search request, set search parameters
        unset($_POST['action']);
        if ( count($_POST) > 0 ) {
            $author10    = $_SESSION['author10'] = substr( clean_html($_POST['author10']), 0, $maxlength['first_name']);
            $author11    = $_SESSION['author11'] = substr( clean_html($_POST['author11']), 0, $maxlength['last_name' ]);
            $title       = $_SESSION['title'   ] = substr( clean_html($_POST['title'   ]), 0, $maxlength['title'     ]);
            $year0       = $_SESSION['year0'   ] = substr( clean_html($_POST['year0'   ]), 0, $maxlength['year'      ]);
            $year1       = $_SESSION['year1'   ] = substr( clean_html($_POST['year1'   ]), 0, $maxlength['year'      ]);
            $type        = $_SESSION['type'    ] = substr( clean_html($_POST['type'    ]), 0, $maxlength['type'      ]);
            $book_key    = $_SESSION['book_key'] = substr( clean_html($_POST['book_key']), 0, $maxlength['book_key'  ]);

            foreach ($_POST as $k => $val) {
                unset($_POST[$k]);
            }
        }
        else {
            $author10    = $_SESSION['author10'];
            $author11    = $_SESSION['author11'];
            $title       = $_SESSION['title'   ];
            $year0       = $_SESSION['year0'   ];
            $year1       = $_SESSION['year1'   ];
            $type        = $_SESSION['type'    ];
            $book_key    = $_SESSION['book_key'];
        }


?>
        <div class = "menu">
<?php
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
                    echo ("Error 1 in preparing MySQL statement");
                    echo "<br>$sql<br>\n";
                    return;
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
                    echo ("Error 2 in preparing MySQL statement");
                    return;
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

            if ( !$stmt -> execute() ) {
                echo "<b>Error 1E:</b> execute failed in checkbox_form: (" .
                    $stmt -> errno . ") " . $stmt -> error;
            }
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
                    echo ("Error 3 in preparing MySQL statement");
                    return;
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
            if (!$stmt -> execute()) {
                echo "<b>Error 2E:</b> execute failed in checkbox_form: (" .
                    $stmt -> errno . ") " . $stmt->error;
            }

            $stmt -> bind_result($book_id);

            // Collect editor id's
            $editor_ids = array();
            while ( $stmt -> fetch() ) {
                $editor_ids[] = $book_id;
            }

            // Free storage:
            $stmt -> close();

            $ids_replace = array_unique(array_merge($author_ids, $editor_ids));
            echo "<br>Number of references found in database: <b>" . count($ids_replace) ."</b><br>\n";

            if (count($ids_replace) ===  0 ) {

                //  Set previous values of select input through jQuery:
                echo "<script>$('#selectType').val(\"{$_SESSION['type']}\")</script>";
                echo
                   "<br><b>No references found in the database
                        that satisfy the search parameters.</b><br><br>\n";
                echo
                   "<form action = $self method = 'POST'>
                        <button  class = 'backBtn' name = 'action' value = 'search_form'>
                            Back
                        </button>
                    </form>
                   ";
                exit();
            }
            $books_replace = array();   // collect book objects that are candidate to delete

            // Set objects of class `Book`
            Book::Open();
            for ($i = 0; $i < count($ids_replace); $i++ ) {
                $books_replace[$i] = new Book();
                $books_replace[$i] -> Retrieve($ids_replace[$i]);
            }
?>
            <br>
            <b>Check one publication to replace</b>  (the bold number is the database identification of the reference):
            <br>
            <form action = "<?= $self ?>" method = "POST">
                <ul style = "margin-left: 1.5em; text-indent: -3.7em; ">
                <?php
                    $i = 0;
                    foreach ($books_replace as $key => $val ) {
                        echo
                       "<li>
                        <input type = 'checkbox' name = '{$ids_replace[$i]}'  />
                       ";
                        echo "&nbsp;<b>{$ids_replace[$i]}.</b>&nbsp;";
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
                        echo "&nbsp;(" . $val -> type . ": " . $val -> year . ").
                              </li>
                              <br><br>";
                        $i++;

                    }
                ?>
                </ul>
                <button  class = "goBtn" name = "action" value = "input_new">
                    Edit
                </button>
            </form>
            <form action = "<?=$self?>" method = "POST">
                <button class = "backBtn" name = "action" value = "search_form">
                    Back
                </button>
            </form>

            <form action = "<?=$self?>" method = "POST">
                <button class = "restartBtn" name = "action" value = "restart" >
                    Restart
                </button>
            </form>
            <br>
        </div>

<?php   //>
    }

    function input_new($self) {
   /*
    *   Input form for checked reference  prefilled with values from database
    */
        global $filenames;
        require_once $filenames['Book_class2'];

        echo
       "<div class = 'menu'>";
            /*
            echo "<pre>";
            print_r($_POST);
            print_r($_SESSION);
            echo "</pre>";
            */

            unset ($_POST['action']);

            $to_replace =  array();
            foreach ($_POST as $k => $val ) {
                if ($val !== "on") {
                    echo "<br> Invalid value of \$_POST in  function input_new <br>\n";
                }
                $to_replace[] = $k;
            }

            foreach ($_POST as $k => $val ) {
                unset($_POST[$k]);
            }

            if (count($to_replace) === 0) {
                echo "<br>No references checkmarked<br>\n";
            ?>
                <form action = "<?=$self?>" method = "POST">
                    <button class = "backBtn" name = "action" value = "checkbox_form">
                        Back
                    </button>
                </form>
            <?php
                exit();
            }
            else if (count($to_replace) > 1 ) {
                echo "<br>Warning: More than one reference checkmarked. Will only consider the first.<br>\n";
            }

            $book_id =  $to_replace[0];
            $_SESSION['book_id'] = $book_id;
            $book    =  new Book();
            $book    -> retrieve($book_id);

            // Set defaults authors  from $_SESSION (if exist) else from Book object
            $authors = ( key_exists('authors', $_SESSION) and count($_SESSION['authors']) > 0 ) ?
                      $_SESSION['authors'] : $book -> authors;
            $_SESSION['authors'] = $authors;
            $nr_of_authors = count($authors);

            /*
            for ($i = 1; $i <= $nr_of_authors; $i++ ) { // >
                $j = $i - 1;
                $index0 = "author" . $i . "0";
                $index1 = "author" . $i . "1";
                $_SESSION[$index0] = $authors[$j][0];
                $_SESSION[$index1] = $authors[$j][1];
            }
            */

            // Set defaults editors  from $_SESSION (if exist) else from Book object
            $editors = ( key_exists('editors', $_SESSION) and count($_SESSION['editors']) > 0 ) ?
                        $_SESSION['editors'] : $book -> editors;
            $_SESSION['editors'] = $editors;
            $nr_of_editors = count($editors);

            /*
            for ($i = 1; $i <= $nr_of_editors; $i++ ) { // >
                $j = $i - 1;
                $index0 = "editor" . $i . "0";
                $index1 = "editor" . $i . "1";
                $_SESSION[$index0] = $editors[$j][0];
                $_SESSION[$index1] = $editors[$j][1];
            }
            */

            // Title
            $title = ( key_exists('title', $_SESSION) and mb_strlen($_SESSION['title'], "UTF8") > 0 ) ?
                      $_SESSION['title'] : $book -> title;
            $_SESSION['title'] = $title;

            // Book title
            $second_title = ( key_exists('second_title', $_SESSION) and mb_strlen($_SESSION['second_title'], "UTF8") > 0 ) ?
                      $_SESSION['second_title'] : $book -> second_title;
            $_SESSION['second_title'] = $second_title;

            // Publisher
            $publisher = ( key_exists('publisher', $_SESSION) and mb_strlen($_SESSION['publisher'], "UTF8") > 0 ) ?
                      $_SESSION['publisher'] : $book -> publisher;
            $_SESSION['publisher'] = $publisher;

            // Organization/address/school
            $organization = ( key_exists('organization', $_SESSION) and mb_strlen($_SESSION['organization'], "UTF8") > 0 ) ?
                      $_SESSION['organization'] : $book -> organization;
            $_SESSION['organization'] = $organization;

            // Year
            $year = ( key_exists('year', $_SESSION) and mb_strlen($_SESSION['year'], "UTF8") > 0 ) ?
                      $_SESSION['year'] : $book -> year;
            $_SESSION['year' ] = $year;

            // Page
            $page = ( key_exists('page', $_SESSION) and mb_strlen($_SESSION['page'], "UTF8") > 0 ) ?
                      $_SESSION['page'] : $book -> page;
            $_SESSION['page' ] = $page;

            // ISBN
            $isbn = ( key_exists('isbn', $_SESSION) and mb_strlen($_SESSION['isbn'], "UTF8") > 0 ) ?
                      $_SESSION['isbn'] : $book -> isbn;
            $_SESSION['isbn'] = $isbn;

            // URL
            $url = ( key_exists('url', $_SESSION) and mb_strlen($_SESSION['url'], "UTF8") > 0 ) ?
                      $_SESSION['url'] : $book -> url;
            $_SESSION['url'] = $url;

            // Project
            $project = ( key_exists('project', $_SESSION) and mb_strlen($_SESSION['project'], "UTF8") > 0 ) ?
                      $_SESSION['project'] : $book -> project;
            $_SESSION['project'] = $project;

            // Key
            $book_key = ( key_exists('book_key', $_SESSION) and mb_strlen($_SESSION['book_key'], "UTF8") > 0 ) ?
                      $_SESSION['book_key'] : $book -> book_key;
            $_SESSION['book_key'] = $book_key;

            // Type
            $type = ( key_exists('type', $_SESSION) and mb_strlen($_SESSION['type'], "UTF8") > 0 ) ?
                      $_SESSION['type'] : $book -> type;
            $_SESSION['type'] = $type;

            // Note
            $book_note = ( key_exists('book_note', $_SESSION) and mb_strlen($_SESSION['book_note'], "UTF8") > 0 ) ?
                      $_SESSION['book_note'] : $book -> book_note;
            $_SESSION['book_note'] = $book_note;

            // Publication type
            $type = ( key_exists('type', $_SESSION) and mb_strlen($_SESSION['type'], "UTF8") > 0 ) ?
                      $_SESSION['type'] : $book -> type;
            $_SESSION['type'] = $type;

            // Time interval
            $_SESSION['year0'] = $year - 1;
            $_SESSION['year1'] = $year + 1;
        ?>

            <!-- Help info -->
            <div class = "book_inp_info">
                <img  src = "../../shared/info.jpg" class = "info"  />
                <div id = "tip2" class = "tooltip_book_inp subhelp">
                </div>
            </div>
            <!-- End Help info -->

            <h4 class = 'center'>
                Edit the following properties of the publication
                with database id = <?=$book_id?> of type '<?=$type?>':
           </h4>
        <?php     // >
            // Input of individual  authors: authori0 and authori1, i = 1, 2, ..
            echo
           "<form  id = 'input_new' action = '$self'  method = 'POST'>";
                for ($i = 1; $i <= count($authors); $i++ ) {
                    $j = $i - 1;
                    echo   "<b>Author&nbsp;{$i}&nbsp;</b> <br>";
                    echo   "First name:&nbsp;
                            <input name = 'author{$i}0' value = '{$authors[$j][0]}' size = '19' maxlength = '50'  />
                            &nbsp;&nbsp; &nbsp;&nbsp;
                            Last name:
                            <input name = 'author{$i}1' value = '{$authors[$j][1]}' size = '34' maxlength = '100'/>
                            <br><br>
                           ";
                }
                echo
                   "<button id = 'addAuthorBtn'  type= 'button'
                    style = 'margin-left: 250px; color: blue;'>
                    Add author
                    </button>
                   ";

                // Input of individual  editors: editori0 and editori1, i = 1, 2, ..
                if (  count($editors)  > 0 ) echo "<br><br>";
                for ($i = 1; $i <= count($editors); $i++ ) {
                    $j = $i - 1;
                    echo   "<b>Editor&nbsp;{$i}&nbsp;</b> <br>";
                    echo   "First name:&nbsp;
                            <input name = 'editor{$i}0' value = '{$editors[$j][0]}' size = '19' maxlength = '50'  />
                            &nbsp;&nbsp; &nbsp;&nbsp;
                            Last name:
                            <input name = 'editor{$i}1' value = '{$editors[$j][1]}' size = '34' maxlength = '100'/>
                            <br><br>
                           ";
                }
                echo
                   "<br><br><button id = 'addEditorBtn'  type= 'button'
                    style = 'margin-left: 250px; color: blue;'>
                    Add editor
                    </button>
                   ";
        ?>
                <br><br><br>

                <label>Title:</label>&nbsp;
                <input name = "title" value = "<?=$title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Book title:</label>&nbsp;
                <input name = "second_title" value = "<?=$second_title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Publisher:</label>&nbsp;
                <input name = "publisher" value = "<?=$publisher?>" size = "60" maxlength = "255" >
                <br><br>

                <label>Publication type</label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <select id = "selectType" size="1" name="type">
                    <option  value = ""              >All types      </option>
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
                <script>$('#selectType').val("<?=$type?>")</script>
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>Year:</label>&nbsp;
                <input name = "year" value = "<?=$year?>" size =  "4" maxlength =   "4" class = "year" >
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>Page:</label>&nbsp;
                <input name = "page" value = "<?=$page?>" size =  "10" maxlength =   "4" class = "page" >
                <br><br>

                <label>Organization/address:</label>&nbsp;
                <input name = "organization" value = "<?=$organization?>" size = "60" maxlength = "255" >
                <br><br>

                <label>ISBN:</label>&nbsp;
                <input name = "isbn" value = "<?=$isbn?>" size = "15" maxlength = "20">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>Key:</label>&nbsp;
                <input name = "book_key" value = "<?=$book_key?>" size =  "30" maxlength =   "105" />
                <br><br>

                <label>URL:</label>&nbsp;
                <input name = "url" value = "<?=$url?>"  size = "60" maxlength = "255" value = ""/>
                    &nbsp;&nbsp; (Web address)
                <br><br>

                <label>Project:</label>&nbsp;
                <input name = "project" value = "<?=$project?>"  size = "25" maxlength = "70" value = ""/>
                <br><br>

                <label>Note (maximum 1024 characters):</label><br>
                <textarea class ="book_textAreaInp" name = "book_note" rows = "5" ><?=$book_note?></textarea>

                <button class = "goBtn" name = "action" value = "summarize_new">
                    Review
                </button>
            </form>

            <form action = "<?=$self?>" method = "POST">
                <button class = "restartBtn" name = "action" value = "restart" >
                    Restart
                </button>
            </form>
        </div>

<?php   // >
    }

    function summarize_new($self) {
   /*
    *   Print summary of new values of reference before storing
    */
        global $filenames;
        require_once $filenames['clean2'];
        require      $filenames['maxlength2'];

        echo
       "<div class = 'menu'>";
            /*
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            */

            unset($_POST['action']);

            $name    = array();
            $authors = array();

            // Loop over first names present in $_POST, collect individual authors in array $authors
            $author_counter = 0;
            $k  = 1;
            while ( key_exists("author".$k."0", $_POST) ) {
                $index0 = "author".$k."0";  //first name
                $index1 = "author".$k."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_book");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                if ( mb_strlen($name[0]) > 0 or mb_strlen($name[1]) > 0 ) {
                    $authors[$author_counter][0] = $name[0];
                    $authors[$author_counter][1] = $name[1];
                    $author_counter++;
                }
                $k++;
            }
            $author_counter--;

            $editors = array();
            // Loop over first names present in $_POST, collect individual editors in array $editors
            $editor_counter = 0;
            $k  = 1;
            while ( key_exists("editor".$k."0", $_POST) ) {
                $index0 = "editor".$k."0";  //first name
                $index1 = "editor".$k."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_book");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                if ( mb_strlen($name[0]) > 0 or mb_strlen($name[1]) > 0 ) {
                    $editors[$editor_counter][0] = $name[0];
                    $editors[$editor_counter][1] = $name[1];
                    $editor_counter++;
                }
                $k++;
            }
            $editor_counter--;

            // Test against buffer overflow:
            if ($author_counter > $max_authors) {
                die("<b>Error:</b> The number of authors is: {$author_counter}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }

            $_SESSION['authors'] = $authors;

            // Test against buffer overflow:
            if ($editor_counter > $max_authors) {
                die("<b>Error:</b> The number of editors is: {$editor_counter}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }

            $_SESSION['editors'] = $editors;

            // Now the other input:
            $_POST["title"       ] = substr( clean_html($_POST["title"       ]), 0, $maxlength["title"       ]);
            $_POST["second_title"] = substr( clean_html($_POST["second_title"]), 0, $maxlength["second_title"]);
            $_POST["publisher"   ] = substr( clean_html($_POST["publisher"   ]), 0, $maxlength["publisher"   ]);
            $_POST["organization"] = substr( clean_html($_POST["organization"]), 0, $maxlength["organization"]);
            $_POST["year"        ] = substr( clean_html($_POST["year"        ]), 0, $maxlength["year"        ]);
            $_POST["page"        ] = substr( clean_html($_POST["page"        ]), 0, $maxlength["begin_page"  ]);
            $_POST["url"         ] = substr( clean_html($_POST["url"         ]), 0, $maxlength["url"         ]);
            $_POST["book_key"    ] = substr( clean_html($_POST["book_key"    ]), 0, $maxlength["book_key"    ]);
            $_POST["project"     ] = substr( clean_html($_POST["project"     ]), 0, $maxlength["project"     ]);
            $_POST["book_note"   ] = substr( clean_html($_POST["book_note"   ]), 0, $maxlength["book_note"   ]);

            $title        = $_SESSION["title"       ] = $_POST["title"       ]; unset($_POST["title"]       );
            $second_title = $_SESSION["second_title"] = $_POST["second_title"]; unset($_POST["second_title"]);
            $publisher    = $_SESSION["publisher"   ] = $_POST["publisher"   ]; unset($_POST["publisher"]   );
            $organization = $_SESSION["organization"] = $_POST["organization"]; unset($_POST["organization"]);
            $year         = $_SESSION["year"        ] = $_POST["year"        ]; unset($_POST["year"]        );
            $page         = $_SESSION["page"        ] = $_POST["page"        ]; unset($_POST["page"]        );
            $isbn         = $_SESSION["isbn"        ] = $_POST["isbn"        ]; unset($_POST["isbn"]        );
            $url          = $_SESSION["url"         ] = $_POST["url"         ]; unset($_POST["url"]         );
            $book_key     = $_SESSION["book_key"    ] = $_POST["book_key"    ]; unset($_POST["book_key"]    );
            $project      = $_SESSION["project"     ] = $_POST["project"     ]; unset($_POST["project"]     );
            $book_note    = $_SESSION["book_note"   ] = $_POST["book_note"   ]; unset($_POST["book_note"]   );
            $type         = $_SESSION["type"        ] = $_POST["type"        ]; unset($_POST["type"     ]   );


            $i = 0;
        ?>
            <h4 class = "center" style = "margin-top: -20px;">Review the following input of type
                '<?= $type ?>'
            </h4>
            <br>
        <?php
            if (count($authors) > 0 ){
                echo "<b>Authors:</b>";
                echo "<ol>";
                for ($i = 0; $i < count($authors); $i++) {
                    $i1 = $i+1;
                    echo
                   "<li>
                        {$authors[$i][1]}, &nbsp;{$authors[$i][0]}
                    </li>
                   ";
                }
                echo "</ol>";
            }
        ?>
        <?php
            if (count($editors) > 0 ){
                echo "<b>Editors:</b>";
                echo "<ol>";
                for ($i = 0; $i < count($editors); $i++) {
                    $i1 = $i+1;
                    echo
                   "<li>
                        {$editors[$i][1]}, &nbsp;{$editors[$i][0]}
                    </li>
                   ";
                }
                echo "</ol>";
            }
        ?>

            <label>Title:</label>&nbsp;<?=$title?>
            <br><br>

            <label>Book title:</label>&nbsp;<?=$second_title?>
            <br><br>

            <label>Publisher:</label>&nbsp;<?=$publisher?>
            <br><br>

            <label>Year:</label>&nbsp; <?=$year?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Page:</label>&nbsp; <?=$page?>
            <br><br>

            <label>Organization/address:</label>&nbsp;<?=$organization?>
            <br><br>

            <label>ISBN:</label>&nbsp; <?=$isbn?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Key:</label>&nbsp; <?=$book_key?>
            <br><br>

            <label>URL:</label>&nbsp; <?=$url?>
            <br><br>

            <label>Project:</label>&nbsp; <?=$project?>
            <br><br>

            <label>Note:</label><br>
            <textarea class ="book_textAreaInp" readonly rows = "5" style = "background-color: lightgrey;"><?=$book_note?></textarea>
            <br>

            <!-- Store button -->
            <form action = "<?=$self?>" method = "POST">
                <button class = "goBtn" name = "action" value = "store_new">
                    Store
                </button>
            </form>

            <!-- Back button -->
            <form action = "<?=$self?>" method = "POST">
                <input type = "hidden" name = "<?=$_SESSION['book_id']?>" value = "on">
                <button class = "backBtn" name = "action" value = "input_new">
                    Back
                </button>
            </form>

            <!-- Restart button -->
                <form action = "<?=$self?>" method = "POST">
                    <button class = "restartBtn" name = "action" value = "restart" >
                        Restart
                    </button>
                </form>
            <br>
        </div>
<?php       //>
        exit();
    }
    function store_new($self) {
   /*
    *   Store new reference.
    *   Copy relevant entries of $_SESSION to object of class `Book`.
    *   Store object in database.
    */
        /*
        echo "<pre>";
        print_r($_POST);
        print_r($_SESSION);
        echo "</pre>";
        */

        global $filenames;
        require_once $filenames['Book_class2'];

        // Unset stuff that we don't want in the database:
        $book_id = $_SESSION['book_id'];
        $save    = $_SESSION['credentials'];
        unset($_SESSION['book_id']);
        unset($_SESSION['credentials']);
        unset($_SESSION['author10']);
        unset($_SESSION['author11']);
        unset($_SESSION['year0']);
        unset($_SESSION['year1']);

        $publication  = new Book();
        $publication -> nr_of_authors = count($_SESSION['authors']);
        $publication -> nr_of_editors = count($_SESSION['editors']);

        //  Copy $_SESSION to object $publication (instance of class Book) ...
        $keys  = array_keys($_SESSION);
        foreach ($keys as $k => $val) {
            $publication -> $keys[$k] = $_SESSION[$keys[$k]];
        }

        $_SESSION['book_id']     = $book_id;
        $_SESSION['credentials'] = $save;

        //  Actual storing:
        $publication -> Store();

    ?>

        <div class = "menu">
            Stored new reference. Hit delete button to delete original reference with database id = <b><?=$book_id?></b>.
            <br> <br>
            <form action = "<?=$self?>" method = "POST">
                <button class = "goBtn" name = "action" value = "delete_old">
                    Delete
                </button>
            </form>
            <form action = "<?=$self?>" method = "POST">
                <button  class = "restartBtn" name = "action" value = "restart">
                    Restart
                </button>
            </form>
        </div>

<?php       // >
    }

    function delete_old($self) {
   /*
    *   Delete old (original) reference
    */
        global $filenames;
        require_once $filenames['Book_class2'];

        $book_id =  $_SESSION['book_id'];
        $book = new Book();
        $book -> Delete_book($book_id);
?>
        <div class = "menu">
            Deleted old reference with id = <b><?= $book_id?></b>
             <br> <br>
            <br><br>
            <br>
            <form action = "<?=$self?>" method = "POST">
                <button class = "restartBtn" name = "action" value = "restart">
                    Restart
                </button>
            </form>
        </div>
<?php
    }
?>

</body>
</html>
