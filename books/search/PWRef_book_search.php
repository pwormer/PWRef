<?php     //>
    session_start();
    require_once "../../Setup.php";
    Setup(1);      // Open database, set table and column names

?>
<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>PWRef search for books, booklets, etc, </title>
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
            $(".tooltip_book_inp").load("tooltip_book_search.html");


            // Set event handlers
            $("input[name = author11]").keydown(catchEnter);  // Catch enter key (13)
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
        })
    </script>

    <!--
    <base href   = "http://localhost/PWRef/books/search/" />
     -->
    <base href   = "http://www.theochem.ru.nl/~pwormer/PWRef/books/search/" />

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
        Search for references to book-type publications.
    </span>
    <br>
</div>

<?php   // >
    global $filenames;
    require_once $filenames['clean2'];
    require $filenames['maxlength2'];

    $self = $_SERVER['PHP_SELF'];
    //echo $self . "<br>\n";
    //print_r($_POST);

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
                'book_key'     => '',
                'format'       => '' );

    //  At this point $_POST indicates one of 4 mutually exclusive cases:
    //      $_POST not set:     set SESSION to defaults, invoke `search_form`
    //      $_POST['restart']:  set SESSION to defaults, clear $_POST,  invoke `search_form`
    //      $_POST['refine']:   do no touch SESSION,  invoke `search_form`
    //      $_POST['submit']:   copy POST to SESSION, invoke `search_results`
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
        unset($_POST['submit']);
        $_SESSION['author10'] = substr( clean_html($_POST['author10']), 0, $maxlength['first_name']);
        $_SESSION['author11'] = substr( clean_html($_POST['author11']), 0, $maxlength['last_name' ]);
        $_SESSION['title'   ] = substr( clean_html($_POST['title'   ]), 0, $maxlength['title'     ]);
        $_SESSION['year0'   ] = substr( clean_html($_POST['year0'   ]), 0, $maxlength['year'      ]);
        $_SESSION['year1'   ] = substr( clean_html($_POST['year1'   ]), 0, $maxlength['year'      ]);
        $_SESSION['type'    ] = substr( clean_html($_POST['type'    ]), 0, $maxlength['type'      ]);
        $_SESSION['book_key'] = substr( clean_html($_POST['book_key']), 0, $maxlength['book_key'  ]);
        $_SESSION['format'  ] =                    $_POST['format'  ];

        foreach ($_POST as $k => $val) {
            unset($_POST[$k]);
        }

        search_results($self);
    }
    else if (!key_exists('submit', $_POST) and count($_POST) > 1 ) {
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
        $form  = "#".$_SESSION['format'];
        echo "<script>$('#selectType').val(\"{$_SESSION['type']}\")</script>";
        echo "<script>$('table.radio_table  {$form}').attr('checked',true);</script>";
    }

    function search_form($self) {
   /*
    *   Set up form with search parameters.
    */
        $author10 = $_SESSION['author10'];
        $author11 = $_SESSION['author11'];
        $title    = $_SESSION['title'   ];
        $year0    = $_SESSION['year0'   ];
        $year1    = $_SESSION['year1'   ];
        $type     = $_SESSION['type'    ];
        $book_key = $_SESSION['book_key'];
        $format   = $_SESSION['format'  ];
?>
        <br><br>
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
                    <option  value = "any"  selected >All types      </option>
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

                <!-- Choose output format  -->
                <div class = "format" style = "margin-top: 40px;">
                    <table  class = "radio_table" style = "margin-bottom: 10px; width: 550px;" frame = "void" >
                        <tr class = "caption"><th rowspan ="6">Choose format of search results:</th></tr>

                        <tr><td> Pretty printed output:  </td>
                            <td>  <input id = "pretty" type = "radio" name = "format" value = "pretty" checked> </td>
                        </tr>

                        <tr><td> HTML output:  </td>
                            <td>  <input id = "html"   type = "radio" name = "format" value = "html"    </td>
                        </tr>

                        <tr><td> Use output in php input script:  </td>
                            <td>  <input id = "add"    type = "radio" name = "format" value = "add">    </td>
                        </tr>

                        <tr><td> Input for PWRef:  </td>
                            <td>  <input id = "input"  type = "radio" name = "format" value = "input">  </td>
                        </tr>

                        <tr><td> Output as bibTeX:  </td>
                            <td>  <input id = "bibTeX" type = "radio" name = "format" value = "bibTeX"> </td>
                        </tr>

                    </table>
                </div>
                <br>
                <!-- Submit button -->
                    <button class = "goBtn" id = "submit" name = "submit" value = "SUBMIT">
                        Search
                    </button>

            </form>

            <!-- Restart button -->
            <form action = "<?= $self ?>" method = "POST" >
                <button  class = "restartBtn" id = "restart" name = 'restart' value = 'RESTART'>
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
    *   are be the first and last name, respectively, of either an author or an editor.
    */
        global  $pubDB;
        global  $filenames;
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

        echo
       "<div class = 'menu' style = 'margin-top: 0px;'>";

            $author10    =  $_SESSION['author10' ];
            $author11    =  $_SESSION['author11' ];
            $title       =  $_SESSION['title'    ];
            $year0       =  $_SESSION['year0'    ];
            $year1       =  $_SESSION['year1'    ];
            $type        =  $_SESSION['type'     ];
            $book_key    =  $_SESSION['book_key' ];
            $format      =  $_SESSION['format'   ];
            if ($type === "any") {$type = "";}

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
                $stmt->bind_param("sss", $bind_title,  $bind_type, $bind_key);
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
                $stmt->bind_param("sssss", $bind_author0, $bind_author1, $bind_title,
                                           $bind_type, $bind_key);
            }


            // Assign values to bind parameters:
            $bind_author0 = $author10."%";
            $bind_author1 = $author11."%";
            $bind_title   = "%".$title."%";
            $bind_type    = "%".$type;
            $bind_key     = "%".$book_key."%";

            // Send template plus values of bind parameters to sql server
            $stmt -> execute();
            $stmt -> bind_result($book_id);

            // Collect author id's
            $author_ids = array();
            while ( $stmt->fetch() ) {
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
            $bind_type    = "%".$type;
            $bind_key     = "%".$book_key."%";

            // Send template plus values of bind parameters to sql server
            $stmt -> execute();
            $stmt -> bind_result($book_id);

            // Collect editor id's
            $editor_ids = array();
            while ( $stmt -> fetch() ) {
                $editor_ids[] = $book_id;
            }

            // Merge authors and editors
            $found = array_unique(array_merge($author_ids, $editor_ids));
            $nr_found  = count($found);
            echo "<br><b>Number of references: " . $nr_found ."</b><br>\n";

            // Set objects of class `Book` and print first authors and then editors
            Book::Open();
            for ($i = 0; $i < $nr_found; $i++ ) {   //>
                $book = new Book();
                $book -> Retrieve($found[$i]);
                echo "<br>\n";
                $book -> List_properties($format);
            }

            // Free storage:
            $stmt -> close();

?>
            <!-- Button restart -->
            <form action = "<?= $self ?>" method = "POST" >
                    <button  class = "restartBtn" id = "restart" name = "restart" value = "RESTART">
                        Restart
                    </button>
            </form>

            <!-- Button refine -->
            <form action = "<?= $self ?>" method = "POST" >
                <button  class = "backBtn" id = "refine" name = 'refine' value = 'REFINE'>
                    Back
                </button>
            </form>
            <br><br>

        </div>

<?php
    }
?>

</body>
</html>
