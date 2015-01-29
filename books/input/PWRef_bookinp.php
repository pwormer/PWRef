<?php     //>
    session_start();
    require_once "../../Setup.php";
    Setup(1);      // Open database, set table and column names

?>
<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>PWRef book input preparation </title>
    <meta http-equiv = "content-type" content = "text/html; charset=UTF-8" />
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type = "text/javascript">
        "use strict";
        window.PWRef = {type:   "",
                        maxAuthors: 0};   // This becomes value of $max_authors (set in maxlength.php).
        $(function() {
            var type       = window.PWRef.type;
            var masterForm = "#form" + type + " ";
            var maxCounter = window.PWRef.maxAuthors;

            function disableEnter(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                }
            }

            function addInp(actor) {
           /*
            *   1.  Set `counter` equal to the index of the last actor,
            *       where actor is either `author` or `editor`.
            *
            *   2.  Create <div id = "actorDiv+`counter`"> and add it just before
            *       <div id = "lastDivActorType">.
            *
            *   3.  Invoke the Ajax script `add_actor_inp.php` with parameter `counter`. (The script
            *       `addInp_actor_inp.php outputs  <input value = "actor name"> to the body
            *       of the newly created <div>).
            *
            *   4.  Protection on maximum number of authors (buffer overflow attack).
            */
                var x, y;
                if (actor === "author") {
                    var lastAuthor  = $(masterForm + "#authorDivs > div").eq(-2).attr("id");
                    var counter = Number( lastAuthor.match(/^authorDiv(\d+)/)[1] ) + 1;
                    if (counter > maxCounter) {
                        alert("Warning: Maximum number of authors reached");
                        throw new Error("Warning: Maximum number of authors reached");
                        return;
                    }
                    var lastDiv = $("<div></div>").insertBefore($("#lastDivAuthor"+type));
                    lastDiv.attr("id", "authorDiv" + counter);
                    lastDiv.load("add_author_inp.php",  {counter: counter},
                            function(x, y){if (y === 'error') alert("Wrong URL in addInp")} );  //Ajax POST method
                }
                else if (actor === "editor") {
                    var lastEditor  = $(masterForm + "#editorDivs > div").eq(-2).attr("id");
                    var counter = Number( lastEditor.match(/^editorDiv(\d+)/)[1] ) + 1;
                    if (counter > maxCounter) {
                        alert("Warning: Maximum number of editors reached");
                        throw new Error("Warning: Maximum number of editors reached");
                        return;
                    }
                    var lastDiv = $("<div></div>").insertBefore($("#lastDivEditor"+type));
                    lastDiv.attr("id", "editorDiv" + counter);
                    lastDiv.load("add_editor_inp.php",  {counter: counter},
                            function(x, y){if (y === 'error') alert("Wrong URL in addInp")} );  //Ajax POST method
                }
                else {
                    throw new Error("Wrong actor encountered in JavaScript function addInp");
                    die("<b>Fatal error:</b> Wrong actor encountered in JavaScript function addInp");
                }
                return lastDiv;
            }

            function inpEnter(event) {
           /*
            *   Catch enter key in an input field.
            *
            *   If any key (except the Enter Key) is hit in an input field this
            *   function performs the default action associated with the key.
            *
            *   If the Enter Key is hit in an input field the function does one of the following
            *   alternatives:
            *       1.  If input field is non-empty, disable the enter key on the field
            *           and invoke function `addInp` to add a new input line.
            *       2.  If the input field is empty, remove it.
            *
            */
                if ( event.keyCode === 13 ) {
                    event.preventDefault();     // To not perform default action before anything else

                    var lastInp = $(this).parent().find("input");
                    var actor   = lastInp.attr("name").trim().substring(0,6);
                    if ( lastInp.eq(0).val() !== '' || lastInp.eq(1).val() !== '' ) {
                        lastInp.unbind("keypress");
                        lastInp.bind("keypress", disableEnter);
                        var lastDiv = addInp(actor);

                        //  Some wall-clock time is needed to update the DOM:
                        setTimeout( function() {
                           /*
                            *   Reassign lastInp to input fields added in `addInp`
                            *   and bind `inpEnter` to them.
                            */
                            lastInp = lastDiv.find("input");
                            lastInp.first().focus();
                            lastInp.bind("keypress", inpEnter);} , 250 );
                    }
                    else {
                        lastInp.parent().prev().find("input").unbind("keypress", disableEnter);
                        lastInp.parent().prev().find("input").bind("keypress", inpEnter);
                        lastInp.parent().remove();
                    }
                }
            }

            //  Check validity of year input (class = "year")
            $("input.year").bind("change", checkYear);
            function checkYear() {
                var yF = $(this).val();
                if (yF && !yF.match(/^\d+$/) || yF.length > 4) {
                    alert("Warning: year must consist of up to 4 digits, no letters or other characters");
                }
            }

            //  Disable enter for all input fields except last author input.
            $(masterForm + "input").bind("keypress", disableEnter);


            //  Entering in last author input field invokes `inpEnter`:
            var lastAuthor = $(masterForm + "#authorDivs > div").eq(-2).find("input");
            lastAuthor.unbind("keypress", disableEnter);
            lastAuthor.bind("keypress", inpEnter);
            lastAuthor.first().focus();

            //  Entering in last editor input field invokes `inpEnter`:
            var lastEditor = $(masterForm + "#editorDivs > div").eq(-2).find("input");
            lastEditor.unbind("keypress", disableEnter);
            lastEditor.bind("keypress", inpEnter);

            // Help info:
            $(".tooltip_book_inp").load("tooltip.html")
        })
    </script>
    <base href   = "http://www.theochem.ru.nl/~pwormer/PWRef/books/input/" />
    <!--
     Input through PHP does not know about <base>: prefix with ../../
     Input through HTML recognizes <base>: prefix with ../../ (when base ends with input/)
    -->
    <!--
    <base href   = "http://localhost/PWRef/books/input/" />
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
    if (!key_exists('credentials', $_SESSION) ) {
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
    <span style = "margin-left: 75px;">
        Input for reference to a book or to another kind of publication
    </span>
    <br>
</div>

<?php     //>
   /*
    *   The first time in a session that this script is invoked, it is with an empty
    *   query string and an empty array $_POST.  Later in a session this script is invoked
    *   by hitting a button that either sets $_POST['type'] (by a green submit button)
    *   or a query string (by a red restart/back button).
    *
    *   The variabele $_SESSION['count'] counts the number of invocations from the
    *   beginning, or after a restart.
    *
    *   On a restart by hitting F5  $_SESSION['count'] still exists, therefore it is unset
    *   if we haven't arrived here by hitting a submit, back, or restart button.
    *
    *   For safety the "entrance value" of $_GET is unset as soon as it is no longer needed.
    *
    *   The publication type ('book', 'inproceedings', etc.) is passed to JavaScript
    *   and is used to add author input lines at the right place in the DOM.
    *
    *   The maximum number of authors is passed to JavaScript. When the maximum is reached
    *   JS gives a warning and refuses to add more author input lines.
    */

    global $filenames;
    require_once $filenames['clean2'];        // file clean2 contains protection against XSS attacks

    // Pass maximum allowed number of authors to JavaScript:
    require $filenames['maxlength2'];         // file maxlength.php sets $max_authors
    echo "<script>window.PWRef.maxAuthors = $max_authors;</script>";

    if ( $_SERVER['QUERY_STRING'] === "" and !isset($_POST['type']) ) {
        unset($_SESSION['count']);
    }

    //  Restart?
    if (key_exists('q', $_GET)) {
        if ($_GET['q'] === 'restart') {
            foreach($_GET as $k => $val) {
                unset($_GET[$k]);
            }
            $creds  = $_SESSION['credentials'];
            foreach($_SESSION as $k => $val) {
                unset($_SESSION[$k]);
            }
            $_SESSION['credentials'] = $creds;
        }
        else {
            foreach($_GET as $k => $val) {
                unset($_GET[$k]);
            }
            unset($_SESSION['count']);
        }
    }

    // Back? (saving input).
    if (key_exists('r', $_GET)) {
        if ($_GET['r'] === 'back') {
            $_POST['type'] = clean_html($_GET['type']);
            foreach($_GET as $k => $val) {
                unset($_GET[$k]);
            }
        }
        else {
            foreach($_GET as $k => $val) {
                unset($_GET[$k]);
            }
            unset($_SESSION['count']);
        }
    }

    $_SESSION['count']  = isset($_SESSION['count']) ? ++$_SESSION['count'] : 0;

    $self = $_SERVER['PHP_SELF'];

    if ($_SESSION['count'] === 0) {
        Initial_choice($self);
    }
    else {
        $switch = $_POST['type'];

        switch ($switch) {

            case 'book':
                echo "<script>window.PWRef.type = 'Book';</script>";
                book_form($self);
                break;
            case 'review_book':
                review_book($self);
                break;
            case 'store_book':
                $type = 'book';
                store_publication($self, $type);
                break;

            case 'incollection':
                echo "<script>window.PWRef.type = 'Incollection';</script>";
                incollection_form($self);
                break;
            case 'review_incollection':
                review_incollection($self);
                break;
            case 'store_incollection':
                $type = 'incollection';
                store_publication($self, $type);
                break;

            case 'misc':
                echo "<script>window.PWRef.type = 'Misc';</script>";
                misc_form($self);
                break;
            case 'review_misc':
                review_misc($self);
                break;
            case 'store_misc':
                $type = 'misc';
                store_publication($self, $type);
                break;

            case 'booklet':
                echo "<script>window.PWRef.type = 'Booklet';</script>";
                booklet_form($self);
                break;
            case 'review_booklet':
                review_booklet($self);
                break;
            case 'store_booklet':
                $type = 'booklet';
                store_publication($self, $type);
                break;

            case 'phdthesis':
                echo "<script>window.PWRef.type = 'Phdthesis';</script>";
                phdthesis_form($self);
                break;
            case 'review_phdthesis':
                review_phdthesis($self);
                break;
            case 'store_phdthesis':
                $type = 'phdthesis';
                store_publication($self, $type);
                break;

            case 'inproceedings':
                echo "<script>window.PWRef.type = 'Inproceedings';</script>";
                inproceedings_form($self);
                break;
            case 'review_inproceedings':
                review_inproceedings($self);
                break;
            case 'store_inproceedings':
                $type = 'inproceedings';
                store_publication($self, $type);
                break;

            case 'inbook':
                echo "<script>window.PWRef.type = 'Inbook';</script>";
                inbook_form($self);
                break;
            case 'review_inbook':
                review_inbook($self);
                break;
            case 'store_inbook':
                $type = 'inbook';
                store_publication($self, $type);
                break;

            case 'unpublished':
                echo "<script>window.PWRef.type = 'Unpublished';</script>";
                unpublished_form($self);
                break;
            case 'review_unpublished':
                review_unpublished($self);
                break;
            case 'store_unpublished':
                $type = 'unpublished';
                store_publication($self, $type);
                break;

            case 'manual':
                echo "<script>window.PWRef.type = 'Manual';</script>";
                manual_form($self);
                break;
            case 'review_manual':
                review_manual($self);
                break;
            case 'store_manual':
                $type = 'manual';
                store_publication($self, $type);
                break;

            case 'mastersthesis':
                echo "<script>window.PWRef.type = 'Mastersthesis';</script>";
                mastersthesis_form($self);
                break;
            case 'review_mastersthesis':
                review_mastersthesis($self);
                break;
            case 'store_mastersthesis':
                $type = 'mastersthesis';
                store_publication($self, $type);
                break;

            default:
                die("<span style = 'margin-left: 50px;'>
                        <b>Error in main.</b>&nbsp; Invalid switch with value: {$switch}
                     </span>");
        }   // end switch
    }

    function Initial_choice($self) {
    ?>
    <div class = "menu">
        <h4>Choose a publication type (other than a journal article): </h4>
        <form action = "<?=$self?>" method = "POST">
            <table  frame = "void" width = "100%" >
                <colgroup>
                    <col width = "30"></col>
                    <col width = "100"></col>
                    <col width = "*"></col>
                </colgroup>
                <tr> <td>  <input  type="radio" name="type" value="book" checked>   </td><td> book              </td>
                     <td> [<em>Author(s) or Editor(s), title, publisher, year, isbn, url, project, note</em>] </td>
                </tr>
                <tr> <td>  <input  type="radio" name="type" value="incollection">   </td><td> incollection      </td>
                     <td> [<em>Author(s), Editor(s), title, book title, page, publisher, year, isbn, url, project, note </em>] </td>
                </tr>
                <tr> <td>  <input  type="radio" name="type" value="misc">           </td><td> misc </td>
                     <td> [<em>Author(s), address, title, key, note, year, url, project</em>] </td>
                </tr>
                <tr> <td>  <input  type="radio" name="type" value="booklet">        </td><td> booklet           </td>
                     <td> [<em>Author(s), address, title, year, url, project</em>] </td>
                </tr>
                <tr> <td>  <input  type="radio" name="type" value="phdthesis">      </td><td> phdthesis         </td>
                     <td> [<em>Author (one!), school, title, year, url, project</em>] </td>
                </tr>
                <tr> <td>  <input  type="radio" name="type" value="inproceedings">  </td><td> inproceedings     </td>
                     <td> [<em>Author(s), title, booktitle,publisher, year,  url, project, note </em>] </td>
                </tr>
                <tr> <td>  <input  type="radio" name="type" value="inbook">         </td><td> inbook            </td>
                     <td> [<em>Author(s), Editor(s), booktitle, title, publisher, year,  project </em>] </td>
                </tr>
                <tr> <td>  <input  type="radio" name="type" value="unpublished">    </td><td> unpublished       </td>
                     <td> [<em>Author(s), title, year, note, project </em>] </td>
                </tr>
                <tr> <td>  <input  type="radio" name="type" value="manual">         </td><td> manual            </td>
                     <td> [<em>Author(s), organization, year, key,  note, url </em>] </td>
                </tr>
                <tr> <td>  <input  type="radio" name="type" value="mastersthesis">  </td><td> mastersthesis     </td>
                     <td> [<em>Author (one!), school, title, year, url, project</em>] </td>
                </tr>
            </table>
            <br>
            <button class = "goBtn"                                      type = "submit">
                Select type
            </button>
        </form>
        <br>
    </div>
<?php   //>
    }

    function book_form($self) {
   /*
    *   Input form for  publication type "book"
    */
        // Initialize $authors
        $first_author = array();
        if ( !key_exists('authors', $_SESSION) ) {
           $authors = array();
           $authors[0][0] = "";
           $authors[0][1] = "";
           $_SESSION['authors'] = $authors;
        }
        else {
           $authors = $_SESSION['authors'];
        }
        $nr_of_authors = count($authors);

        $first_author[0] = $authors[0][0];
        $first_author[1] = $authors[0][1];


        // Initialize $editors
        $first_editor = array();
        if ( !key_exists('editors', $_SESSION) ) {
           $editors = array();
           $editors[0][0] = "";
           $editors[0][1] = "";
           $_SESSION['editors'] = $editors;
        }
        else {
           $editors = $_SESSION['editors'];
        }
        $nr_of_editors = count($editors);

        $first_editor[0] = $editors[0][0];
        $first_editor[1] = $editors[0][1];

        // Initialize remaining input
        if ( !key_exists('title', $_SESSION) ) {
            $_SESSION['title'] = "" ;
        }
        $title = $_SESSION['title'];

        if ( !key_exists('publisher', $_SESSION) ) {
            $_SESSION['publisher'] = "" ;
        }
        $publisher = $_SESSION['publisher'];

        if ( !key_exists('year', $_SESSION) ) {
            $_SESSION['year'] = 1;
        }
        $year = $_SESSION['year'];

        if ( !key_exists('isbn', $_SESSION) ) {
            $_SESSION['isbn'] = "" ;
        }
        $isbn = $_SESSION['isbn'];

        if ( !key_exists('url', $_SESSION) ) {
            $_SESSION['url'] = "" ;
        }
        $url = $_SESSION['url'];

        if ( !key_exists('project', $_SESSION) ) {
            $_SESSION['project'] = "" ;
        }
        $project = $_SESSION['project'];

        if ( !key_exists('book_note', $_SESSION) ) {
            $_SESSION['book_note'] = "" ;
        }
        $book_note = trim($_SESSION['book_note']);
    ?>
        <div class = "menu">
            <h4>Enter properties of publication type 'book'</h4>

            <form  id = "formBook" action = "<?= $self ?>" method = "POST">
                <div id = "authorDivs">
                    <div id = 'authorDiv1'>
                        <label>Author&nbsp;1&nbsp;</label> <br>
                        <label>First name:</label>&nbsp;
                        <input name = 'author10' value = "<?=$first_author[0]?>" size = "19" maxlength = "50"  />
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <label>Last name:</label>
                        <input name = 'author11' value = "<?=$first_author[1]?>" size = "34" maxlength = "100"/>
                    </div>
                <?php             //>
                    for ($i = 2; $i <= $nr_of_authors; $i++) {
                        $val[0] = $authors[$i - 1][0];
                        $val[1] = $authors[$i - 1][1];
                        echo "
                            <br>
                            <div id = 'authorDiv{$i}'>
                                <label>Author&nbsp;{$i}&nbsp;</label> <br>
                                <label>First name:</label>&nbsp;&nbsp;
                                <input name = 'author{$i}0' value = '{$val[0]}'
                                        size = '19' maxlength = '50' />
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <label>Last name:</label>
                                <input name = 'author{$i}1' value = '{$val[1]}'
                                        size = '34' maxlength = '100'/>
                                <br>
                                <br>
                            </div>
                            ";
                    }
                ?>
                    <!-- New author input fields are put just before here. Note
                         that the last part of the id contains the publication type (Book) -->
                    <div id = "lastDivAuthorBook">
                    </div>
                </div>
            <!-- Help info -->
            <div class = "book_inp_info">
                <img  src = "../../shared/info.jpg" class = "info"  />
                <div  class = "tooltip_book_inp subhelp">
                </div>
            </div>
            <br>
            <!-- End Help info -->

                <br>
                <div id = "editorDivs">
                    <div id = 'editorDiv1'>
                        <label>Editor&nbsp;1&nbsp;</label> <br>
                        <label>First name:</label>&nbsp;
                        <input name = 'editor10' value = "<?=$first_editor[0]?>" size = "19" maxlength = "50"  />
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <label>Last name:</label>
                        <input name = 'editor11' value = "<?=$first_editor[1]?>" size = "34" maxlength = "100"/>
                    </div>

                <?php             //>
                    for ($i = 2; $i <= $nr_of_editors; $i++) {
                        $val[0] = $editors[$i - 1][0];
                        $val[1] = $editors[$i - 1][1];
                        echo "
                            <br>
                            <div id = 'editorDiv{$i}'>
                                <label>Editor&nbsp;{$i}&nbsp;</label> <br>
                                <label>First name:</label>&nbsp;&nbsp;
                                <input name = 'editor{$i}0' value = '{$val[0]}'
                                        size = '19' maxlength = '50' />
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <label>Last name:</label>
                                <input name = 'editor{$i}1' value = '{$val[1]}'
                                        size = '34' maxlength = '100'/>
                                <br>
                                <br>
                            </div>
                            ";
                    }
                ?>
                    <!-- New editor input fields are put just before here. Note that the last
                         part of the id contains publication type (Book) -->
                    <div id = "lastDivEditorBook">
                    </div>
                </div>  <!-- editorDivs -->
                <br><br><br>

                <label>Title:</label>&nbsp;
                <input name = "title" value = "<?=$title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Publisher:</label>&nbsp;
                <input name = "publisher" value = "<?=$publisher?>" size = "60" maxlength = "255" >
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>Year:</label>&nbsp;
                <input name = "year" value = "<?=$year?>" size =  "4" maxlength =   "4" class = "year" >
                <br><br>

                <label>ISBN:</label>&nbsp;
                <input name = "isbn" value = "<?=$isbn?>" size = "15" maxlength = "20">
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

                <button class = "goBtn"  name = "type" value = "review_book" type = "submit">
                    Review input
                </button>
            </form>

            <button onclick = "window.location.href = '<?=$self?>?q=restart'"
                    class = "restartBtn" >
                Restart
            </button>

        </div>
    <?php    //>
        exit();
    }
    function review_book($self) {
   /*
    *   Updates entries $_SESSION['author'+`counter`] with the corresponding
    *   values in cleaned values $_POST.
    *
    *   Other input variables are cleaned and set.
    *
    */

        global $filenames;
        require_once $filenames['clean2'];
        require_once $filenames['check2'];
        require      $filenames['maxlength2'];

        //Check if caller is allowed
        $allowed_callers = array('PWRef_bookinp.php' );
        check_callers($allowed_callers);

        echo
       "<div class = 'menu'>";

            //  Clean up $_SESSION (remove author and editor keys):
            foreach ($_SESSION as $counter => $val) {
                if ( preg_match('/^author/', $counter) ) {
                    unset($_SESSION[$counter]);
                }
                if ( preg_match('/^editor/', $counter) ) {
                    unset($_SESSION[$counter]);
                }
            }

            $name    = array();
            $authors = array();
            // Loop over first names present in $_POST:
            $nr_of_authors = 1;
            while ( key_exists("author".$nr_of_authors."0", $_POST) ) {
                $index0 = "author".$nr_of_authors."0";  //first name
                $index1 = "author".$nr_of_authors."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_book");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                $authors[$nr_of_authors - 1][0] = $name[0];
                $authors[$nr_of_authors - 1][1] = $name[1];
                $nr_of_authors++;
            }
            $nr_of_authors--;

            // Test against buffer overflow:
            if ($nr_of_authors > $max_authors) {
                die("<b>Error:</b> The number of authors is: {$nr_of_authors}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }
            if ( $nr_of_authors > 0 ) $_SESSION['authors'] = $authors;

            $editors = array();
            // Loop over first names present in $_POST:
            $nr_of_editors = 1;
            while ( key_exists("editor".$nr_of_editors."0", $_POST) ) {
                $index0 = "editor".$nr_of_editors."0";  //first name
                $index1 = "editor".$nr_of_editors."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_book");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                $editors[$nr_of_editors - 1][0] = $name[0];
                $editors[$nr_of_editors - 1][1] = $name[1];
                $nr_of_editors++;
            }
            $nr_of_editors--;
            // Test against buffer overflow:
            if ($nr_of_editors > $max_authors) {
                die("<b>Error:</b> The number of editors is: {$nr_of_editors}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }
            if ( $nr_of_editors > 0 ) $_SESSION['editors'] = $editors;

            // Now the other input:
            $_POST["title"    ] = substr( clean_html($_POST["title"    ]), 0, $maxlength["title"    ]);
            $_POST["publisher"] = substr( clean_html($_POST["publisher"]), 0, $maxlength["publisher"]);
            $_POST["year"     ] = substr( clean_html($_POST["year"     ]), 0, $maxlength["year"     ]);
            $_POST["isbn"     ] = substr( clean_html($_POST["isbn"     ]), 0, $maxlength["isbn"     ]);
            $_POST["url"      ] = substr( clean_html($_POST["url"      ]), 0, $maxlength["url"      ]);
            $_POST["project"  ] = substr( clean_html($_POST["project"  ]), 0, $maxlength["project"  ]);
            $_POST["book_note"] = substr( clean_html($_POST["book_note"]), 0, $maxlength["book_note"]);

            $title     = $_SESSION["title"]     = $_POST["title"]    ; unset($_POST["title"]    );
            $publisher = $_SESSION["publisher"] = $_POST["publisher"]; unset($_POST["publisher"]);
            $year      = $_SESSION["year"]      = $_POST["year"]     ; unset($_POST["year"]     );
            $isbn      = $_SESSION["isbn"]      = $_POST["isbn"]     ; unset($_POST["isbn"]     );
            $url       = $_SESSION["url"]       = $_POST["url"]      ; unset($_POST["url"]      );
            $project   = $_SESSION["project"]   = $_POST["project"]  ; unset($_POST["project"]  );
            $book_note = $_SESSION["book_note"] = $_POST["book_note"]; unset($_POST["book_note"]);

            $i = 0;
        ?>
            <h4 class = "center" style = "margin-top: -20px;">Review the following input of type 'book'          </h4>
            <br>
            <table width = '50%'>
        <?php
            for ($i = 0; $i < $nr_of_authors; $i++) {
                $i1 = $i+1;
                echo "<tr><td><b>Author  $i1:</b></td>
                      <td>{$authors[$i][0]}</td>
                      <td>{$authors[$i][1]}</td></tr>\n
                ";
            }
        ?>
            </table>
            <br><br>
            <table width = '50%'>
        <?php
            for ($i = 0; $i < $nr_of_editors; $i++) {
                $i1 = $i+1;
                echo "<tr><td><b>Editor  $i1:</b></td>
                      <td>{$editors[$i][0]}</td>
                      <td>{$editors[$i][1]}</td></tr>\n
                ";
            }
        ?>
            </table>
            <br><br>

            <label>Title:</label>&nbsp;<?=$title?>
            <br><br>

            <label>Publisher:</label>&nbsp;<?=$publisher?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label>Year:</label>&nbsp; <?=$year?>
            <br><br>

            <label>ISBN:</label>&nbsp; <?=$isbn?>
            <br><br>

            <label>URL:</label>&nbsp; <?=$url?>
            <br><br>

            <label>Project:</label>&nbsp; <?=$project?>
            <br><br>

            <label>Note:</label><br>
            <textarea class ="book_textAreaInp" readonly rows = "5" style = "background-color: lightgrey;"><?=$book_note?></textarea>
            <br>
            <button onclick = "window.location.href = '<?=$self?>?r=back&type=book'"
                    class = "backBtn" >
                Back
            </button>

            <form action = "<?= $self ?>" method = "POST">
                    <button class = "goBtn"  name = "type" value = "store_book" type = "submit">
                        Store
                    </button>
            </form>
            <br>
        </div>
    <?php       //>
        exit();
    }
/***************  END type book ***********************************************/

    function incollection_form($self) {
   /*
    *   Input form for  publication type "incollection"
    *   Author(s), book title,  title, page, publisher, year, isbn, url, project, note
    */
        // Initialize $authors
        $first_author = array();
        if ( !key_exists('authors', $_SESSION) ) {
           $authors = array();
           $authors[0][0] = "";
           $authors[0][1] = "";
           $_SESSION['authors'] = $authors;
        }
        else {
           $authors = $_SESSION['authors'];
        }
        $nr_of_authors = count($authors);

        $first_author[0] = $authors[0][0];
        $first_author[1] = $authors[0][1];

        // Initialize $editors
        $first_editor = array();
        if ( !key_exists('editors', $_SESSION) ) {
           $editors = array();
           $editors[0][0] = "";
           $editors[0][1] = "";
           $_SESSION['editors'] = $editors;
        }
        else {
           $editors = $_SESSION['editors'];
        }
        $nr_of_editors = count($editors);

        $first_editor[0] = $editors[0][0];
        $first_editor[1] = $editors[0][1];


        // Remaining input
        if ( !key_exists('title', $_SESSION) ) {
            $_SESSION['title'] = "" ;
        }
        $title = $_SESSION['title'];

        if ( !key_exists('second_title', $_SESSION) ) {
            $_SESSION['second_title'] = "" ;
        }
        $second_title = $_SESSION['second_title'];

        if ( !key_exists('begin_page', $_SESSION) ) {
            $_SESSION['begin_page'] = "" ;
        }
        $begin_page = $_SESSION['begin_page'];

        if ( !key_exists('publisher', $_SESSION) ) {
            $_SESSION['publisher'] = "" ;
        }
        $publisher = $_SESSION['publisher'];

        if ( !key_exists('year', $_SESSION) ) {
            $_SESSION['year'] = 1;
        }
        $year = $_SESSION['year'];

        if ( !key_exists('isbn', $_SESSION) ) {
            $_SESSION['isbn'] = "" ;
        }
        $isbn = $_SESSION['isbn'];

        if ( !key_exists('url', $_SESSION) ) {
            $_SESSION['url'] = "" ;
        }
        $url = $_SESSION['url'];

        if ( !key_exists('project', $_SESSION) ) {
            $_SESSION['project'] = "" ;
        }
        $project = $_SESSION['project'];

        if ( !key_exists('book_note', $_SESSION) ) {
            $_SESSION['book_note'] = "" ;
        }
        $book_note = trim($_SESSION['book_note']);
    ?>
        <div class = "menu">
            <h4>Enter properties of publication type 'incollection'</h4>

            <form  id = "formIncollection" action = "<?= $self ?>" method = "POST">
                <div id = "authorDivs">
                    <div id = 'authorDiv1'>
                        <label>Author&nbsp;1&nbsp;</label> <br>
                        <label>First name:</label>&nbsp;
                        <input name = 'author10' value = "<?=$first_author[0]?>" size = "19" maxlength = "50"  />
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <label>Last name:</label>
                        <input name = 'author11' value = "<?=$first_author[1]?>" size = "34" maxlength = "100"/>
                    </div>

                <?php             //>
                    for ($i = 2; $i <= $nr_of_authors; $i++) {
                        $val[0] = $authors[$i - 1][0];
                        $val[1] = $authors[$i - 1][1];
                        echo "
                            <br>
                            <div id = 'authorDiv{$i}'>
                                <label>Author&nbsp;{$i}&nbsp;</label> <br>
                                <label>First name:</label>&nbsp;&nbsp;
                                <input name = 'author{$i}0' value = '{$val[0]}'
                                        size = '19' maxlength = '50' />
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <label>Last name:</label>
                                <input name = 'author{$i}1' value = '{$val[1]}'
                                        size = '34' maxlength = '100'/>
                                <br>
                                <br>
                            </div>
                            ";
                    }
                ?>

                    <!-- New author input fields are put just before here. Note
                         that the last part of the id contains the publication type (Incollection) -->
                    <div id = "lastDivAuthorIncollection">
                    </div>
                </div>

                <!-- Help info -->
                <div class = "book_inp_info">
                    <img  src = "../../shared/info.jpg" class = "info"  />
                    <div  class = "tooltip_book_inp subhelp">
                    </div>
                </div>
                <br>
                <!-- End Help info -->

                <br>
                <div id = "editorDivs">
                    <div id = 'editorDiv1'>
                        <label>Editor&nbsp;1&nbsp;</label> <br>
                        <label>First name:</label>&nbsp;
                        <input name = 'editor10' value = "<?=$first_editor[0]?>" size = "19" maxlength = "50"  />
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <label>Last name:</label>
                        <input name = 'editor11' value = "<?=$first_editor[1]?>" size = "34" maxlength = "100"/>
                    </div>

                <?php             //>
                    for ($i = 2; $i <= $nr_of_editors; $i++) {
                        $val[0] = $editors[$i - 1][0];
                        $val[1] = $editors[$i - 1][1];
                        echo "
                            <br>
                            <div id = 'editorDiv{$i}'>
                                <label>Editor&nbsp;{$i}&nbsp;</label> <br>
                                <label>First name:</label>&nbsp;&nbsp;
                                <input name = 'editor{$i}0' value = '{$val[0]}'
                                        size = '19' maxlength = '50' />
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <label>Last name:</label>
                                <input name = 'editor{$i}1' value = '{$val[1]}'
                                        size = '34' maxlength = '100'/>
                                <br>
                                <br>
                            </div>
                            ";
                    }
                ?>
                    <!-- New editor input fields are put just before here. Note that the last
                         part of the id contains publication type (Incollection) -->
                    <div id = "lastDivEditorIncollection">
                    </div>
                </div>  <!-- editorDivs -->
                <br><br><br>

                <label>Title:</label>&nbsp;
                <input name = "title" value = "<?=$title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Book title:</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input name = "second_title" value = "<?=$second_title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Page:</label>&nbsp;
                <input name = "begin_page" value = "<?=$begin_page?>" size = "8" maxlength = "10" >
                <br><br>

                <label>Publisher:</label>&nbsp;
                <input name = "publisher" value = "<?=$publisher?>" size = "60" maxlength = "255" >
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>Year:</label>&nbsp;
                <input name = "year" value = "<?=$year?>" size =  "4" maxlength =   "4" class = "year" >
                <br><br>

                <label>ISBN:</label>&nbsp;
                <input name = "isbn" value = "<?=$isbn?>" size = "15" maxlength = "20">
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

                <button class = "goBtn" name = "type" value = "review_incollection"  type = "submit">
                    Review input
                </button>
            </form>

            <div>
                <button onclick = "window.location.href = '<?=$self?>?q=restart'"
                        class = "restartBtn" >
                    Restart
                </button>
            </div>

        </div>
    <?php    //>
        exit();
    }

    function review_incollection($self) {
   /*
    *   Updates entries $_SESSION['author'+`counter`] with the corresponding
    *   values in cleaned values $_POST.
    *
    *   Other input variables are cleaned and set.
    *
    */

        global $filenames;
        require_once $filenames['clean2'];
        require_once $filenames['check2'];
        require      $filenames['maxlength2'];

        //Check if caller is allowed
        $allowed_callers = array('PWRef_bookinp.php' );
        check_callers($allowed_callers);

        echo
       "<div class = 'menu'>";

            //  Clean up $_SESSION (remove author and editor keys):
            foreach ($_SESSION as $counter => $val) {
                if ( preg_match('/^author/', $counter) ) {
                    unset($_SESSION[$counter]);
                }
                if ( preg_match('/^editor/', $counter) ) {
                    unset($_SESSION[$counter]);
                }
            }

            $name    = array();
            $authors = array();
            // Loop over first names present in $_POST:
            $nr_of_authors = 1;
            while ( key_exists("author".$nr_of_authors."0", $_POST) ) {
                $index0 = "author".$nr_of_authors."0";  //first name
                $index1 = "author".$nr_of_authors."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_incollection");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                $authors[$nr_of_authors - 1][0] = $name[0];
                $authors[$nr_of_authors - 1][1] = $name[1];
                $nr_of_authors++;
            }
            $nr_of_authors--;

            // Test against buffer overflow:
            if ($nr_of_authors > $max_authors) {
                die("<b>Error:</b> The number of authors is: {$nr_of_authors}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }
            if ( $nr_of_authors > 0 ) $_SESSION['authors'] = $authors;


            $editors = array();
            // Loop over first names present in $_POST:
            $nr_of_editors = 1;
            while ( key_exists("editor".$nr_of_editors."0", $_POST) ) {
                $index0 = "editor".$nr_of_editors."0";  //first name
                $index1 = "editor".$nr_of_editors."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_incollection");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                $editors[$nr_of_editors - 1][0] = $name[0];
                $editors[$nr_of_editors - 1][1] = $name[1];
                $nr_of_editors++;
            }
            $nr_of_editors--;
            // Test against buffer overflow:
            if ($nr_of_editors > $max_authors) {
                die("<b>Error:</b> The number of editors is: {$nr_of_editors}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }
            if ( $nr_of_editors > 0 ) $_SESSION['editors'] = $editors;

            // Now the other input:
            $_POST["title"       ] = substr( clean_html($_POST["title"       ]), 0, $maxlength["title"       ]);
            $_POST["second_title"] = substr( clean_html($_POST["second_title"]), 0, $maxlength["second_title"]);
            $_POST["begin_page"  ] = substr( clean_html($_POST["begin_page"  ]), 0, $maxlength["begin_page"  ]);
            $_POST["publisher"   ] = substr( clean_html($_POST["publisher"   ]), 0, $maxlength["publisher"   ]);
            $_POST["year"        ] = substr( clean_html($_POST["year"        ]), 0, $maxlength["year"        ]);
            $_POST["isbn"        ] = substr( clean_html($_POST["isbn"        ]), 0, $maxlength["isbn"        ]);
            $_POST["url"         ] = substr( clean_html($_POST["url"         ]), 0, $maxlength["url"         ]);
            $_POST["project"     ] = substr( clean_html($_POST["project"     ]), 0, $maxlength["project"     ]);
            $_POST["book_note"   ] = substr( clean_html($_POST["book_note"   ]), 0, $maxlength["book_note"   ]);

            $title        = $_SESSION["title"]        = $_POST["title"]       ; unset($_POST["title"]       );
            $second_title = $_SESSION["second_title"] = $_POST["second_title"]; unset($_POST["second_title"]);
            $begin_page   = $_SESSION["begin_page"]   = $_POST["begin_page"]  ; unset($_POST["begin_page"]  );
            $publisher    = $_SESSION["publisher"]    = $_POST["publisher"]   ; unset($_POST["publisher"]   );
            $year         = $_SESSION["year"]         = $_POST["year"]        ; unset($_POST["year"]        );
            $isbn         = $_SESSION["isbn"]         = $_POST["isbn"]        ; unset($_POST["isbn"]        );
            $url          = $_SESSION["url"]          = $_POST["url"]         ; unset($_POST["url"]         );
            $project      = $_SESSION["project"]      = $_POST["project"]     ; unset($_POST["project"]     );
            $book_note    = $_SESSION["book_note"]    = $_POST["book_note"]   ; unset($_POST["book_note"]   );

            $i = 0;
        ?>
            <h4 class = "center" style = "margin-top: -20px;">Review the following input of type 'in-collection' </h4>
            <br>
            <table width = '50%'>
        <?php
            for ($i = 0; $i < $nr_of_authors; $i++) {
                $i1 = $i+1;
                echo "<tr><td><b>Author  $i1:</b></td>
                      <td>{$authors[$i][0]}</td>
                      <td>{$authors[$i][1]}</td></tr>\n
                ";
            }
        ?>
            </table>

            <br><br>
            <table width = '50%'>
        <?php
            for ($i = 0; $i < $nr_of_editors; $i++) {
                $i1 = $i+1;
                echo "<tr><td><b>Editor  $i1:</b></td>
                      <td>{$editors[$i][0]}</td>
                      <td>{$editors[$i][1]}</td></tr>\n
                ";
            }
        ?>
            </table>
            <br><br>

            <label>Title:</label>&nbsp; <?=$title?>
            <br><br>

            <label>Book title:</label>&nbsp; &nbsp; &nbsp; &nbsp;<?=$second_title?>
            <br><br>

            <label>Page:</label>&nbsp; <?=$begin_page?>
            <br><br>

            <label>Publisher:</label>&nbsp; <?=$publisher?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label>Year:</label>&nbsp; <?=$year?>
            <br><br>

            <label>ISBN:</label>&nbsp; <?=$isbn?>
            <br><br>

            <label>URL:</label>&nbsp; <?=$url?>
            <br><br>

            <label>Project:</label>&nbsp; <?=$project?>
            <br><br>

            <label>Note:</label><br>
            <textarea class ="book_textAreaInp" readonly rows = "5" style = "background-color: lightgrey;"><?=$book_note?></textarea>
            <br>
            <button onclick = "window.location.href = '<?=$self?>?r=back&type=incollection'"
                    class = "backBtn">
                Back
            </button>

            <form action = "<?= $self ?>" method = "POST">
                <button class = "goBtn" name = "type" value = "store_incollection"  type = "submit">
                    Store
                </button>
            </form>
            <br>
        </div>
    <?php       //>
        exit();
    }

/***************  END type incollection ***********************************************/
    function misc_form($self) {
   /*
    *   Input form for  publication type "misc"
    *   Author(s), address (=organization), title, year, book_key, url, project, book_note
    */

        $first_author = array();
        if ( !key_exists('authors', $_SESSION) ) {
           $authors = array();
           $authors[0][0] = "";
           $authors[0][1] = "";
           $_SESSION['authors'] = $authors;
        }
        else {
           $authors = $_SESSION['authors'];
        }
        $nr_of_authors = count($authors);

        $first_author[0] = $authors[0][0];
        $first_author[1] = $authors[0][1];
        if ( !key_exists('organization', $_SESSION) ) {
            $_SESSION['organization'] = "" ;
        }

        $organization = $_SESSION['organization'];

        if ( !key_exists('title', $_SESSION) ) {
            $_SESSION['title'] = "" ;
        }
        $title = $_SESSION['title'];

        if ( !key_exists('year', $_SESSION) ) {
            $_SESSION['year'] = 1;
        }
        $year = $_SESSION['year'];

        if ( !key_exists('book_key', $_SESSION) ) {
            $_SESSION['book_key'] = "" ;
        }
        $book_key = $_SESSION['book_key'];

        if ( !key_exists('url', $_SESSION) ) {
            $_SESSION['url'] = "" ;
        }
        $url = $_SESSION['url'];

        if ( !key_exists('project', $_SESSION) ) {
            $_SESSION['project'] = "" ;
        }
        $project = $_SESSION['project'];

        if ( !key_exists('book_note', $_SESSION) ) {
            $_SESSION['book_note'] = "" ;
        }
        $book_note = trim($_SESSION['book_note']);
    ?>
        <div class = "menu">
            <h4>Enter properties of publication type 'misc'</h4>

            <!-- Help info -->
            <div class = "book_inp_info">
                <img  src = "../../shared/info.jpg" class = "info"  />
                <div  class = "tooltip_book_inp subhelp">
                </div>
            </div>
            <br>
            <!-- End Help info -->

            <form  id = "formMisc" action = "<?= $self ?>" method = "POST">
                <div id = "authorDivs">
                    <div id = 'authorDiv1'>
                        <label>Author&nbsp;1&nbsp;</label> <br>
                        <label>First name:</label>&nbsp;
                        <input name = 'author10' value = "<?=$first_author[0]?>" size = "19" maxlength = "50"  />
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <label>Last name:</label>
                        <input name = 'author11' value = "<?=$first_author[1]?>" size = "34" maxlength = "100"/>
                    </div>

                <?php             //>
                    for ($i = 2; $i <= $nr_of_authors; $i++) {
                        $val[0] = $authors[$i - 1][0];
                        $val[1] = $authors[$i - 1][1];
                        echo "
                            <br>
                            <div id = 'authorDiv{$i}'>
                                <label>Author&nbsp;{$i}&nbsp;</label> <br>
                                <label>First name:</label>&nbsp;&nbsp;
                                <input name = 'author{$i}0' value = '{$val[0]}'
                                        size = '19' maxlength = '50' />
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <label>Last name:</label>
                                <input name = 'author{$i}1' value = '{$val[1]}'
                                        size = '34' maxlength = '100'/>
                                <br>
                                <br>
                            </div>
                            ";
                    }
                ?>

                    <!-- new author input fields are put just before here. Note
                         that the last part of the id contains the publication type (Misc) -->
                    <div id = "lastDivAuthorMisc">
                    </div>
                </div>
                <br><br><br>

                <label>Address:</label>&nbsp;
                <input name = "organization" value = "<?=$organization?>" size = "60" maxlength = "255" >
                <br><br>

                <label>Title:</label>&nbsp;
                <input name = "title" value = "<?=$title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Year:</label>&nbsp;
                <input name = "year" value = "<?=$year?>" size =  "4" maxlength =   "4" class = "year" >
                <br><br>

                <label>Key:</label>&nbsp;
                <input name = "book_key" value = "<?=$book_key?>"  size = "50" maxlength = "105" value = ""/>
                    &nbsp;&nbsp; (Unique id)
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

                <button class = "goBtn" name = "type" value = "review_misc"  type = "submit">
                    Review input
                </button>
            </form>

            <div>
                <button onclick = "window.location.href = '<?=$self?>?q=restart'"
                        class = "restartBtn">
                    Restart
                </button>
            </div>

        </div>
    <?php    //>
        exit();
    }

    function review_misc($self) {
   /*
    *   Updates entries $_SESSION['author'+`counter`] with the corresponding
    *   values in cleaned values $_POST.
    *
    *   Other input variables are cleaned and set.
    *
    */
        global $filenames;
        require_once $filenames['clean2'];
        require_once $filenames['check2'];
        require      $filenames['maxlength2'];

        //Check if caller is allowed
        $allowed_callers = array('PWRef_bookinp.php' );
        check_callers($allowed_callers);

        echo
       "<div class = 'menu'>";

            //  Clean up $_SESSION (remove author keys):
            foreach ($_SESSION as $counter => $val) {
                if ( preg_match('/^author/', $counter) ) {
                    unset($_SESSION[$counter]);
                }
            }

            $name    = array();
            $authors = array();
            // Loop over first names present in $_POST:
            $nr_of_authors = 1;
            while ( key_exists("author".$nr_of_authors."0", $_POST) ) {
                $index0 = "author".$nr_of_authors."0";  //first name
                $index1 = "author".$nr_of_authors."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_book");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                $authors[$nr_of_authors - 1][0] = $name[0];
                $authors[$nr_of_authors - 1][1] = $name[1];
                $nr_of_authors++;
            }
            $nr_of_authors--;
            if ($nr_of_authors > $max_authors) {
                die("<b>Error:</b> The number of authors is: {$nr_of_authors}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }
            if ( $nr_of_authors > 0 ) $_SESSION['authors'] = $authors;

            // Now the other input:
            $_POST["organization"] = substr( clean_html($_POST["organization"]), 0, $maxlength["organization"]);
            $_POST["title"       ] = substr( clean_html($_POST["title"       ]), 0, $maxlength["title"       ]);
            $_POST["year"        ] = substr( clean_html($_POST["year"        ]), 0, $maxlength["year"        ]);
            $_POST["book_key"    ] = substr( clean_html($_POST["book_key"    ]), 0, $maxlength["book_key"    ]);
            $_POST["url"         ] = substr( clean_html($_POST["url"         ]), 0, $maxlength["url"         ]);
            $_POST["project"     ] = substr( clean_html($_POST["project"     ]), 0, $maxlength["project"     ]);
            $_POST["book_note"   ] = substr( clean_html($_POST["book_note"   ]), 0, $maxlength["book_note"   ]);

            $organization = $_SESSION["organization"] = $_POST["organization"]; unset($_POST["organization"]);
            $title        = $_SESSION["title"]        = $_POST["title"]       ; unset($_POST["title"]       );
            $year         = $_SESSION["year"]         = $_POST["year"]        ; unset($_POST["year"]        );
            $book_key     = $_SESSION["book_key"]     = $_POST["book_key"]    ; unset($_POST["book_key"]    );
            $url          = $_SESSION["url"]          = $_POST["url"]         ; unset($_POST["url"]         );
            $project      = $_SESSION["project"]      = $_POST["project"]     ; unset($_POST["project"]     );
            $book_note    = $_SESSION["book_note"]    = $_POST["book_note"]   ; unset($_POST["book_note"]   );

            $i = 0;
        ?>
            <h4 class = "center" style = "margin-top: -20px;">Review the following input of type 'misc'          </h4>
            <br>
            <table width = '25%'>
        <?php
            for ($i = 0; $i < $nr_of_authors; $i++) {
                $i1 = $i+1;
                echo "<tr><td><b>Author  $i1:</b></td>
                      <td>{$authors[$i][0]}</td>
                      <td>{$authors[$i][1]}</td></tr>\n
                ";
            }
        ?>
            </table>
            <br><br>

            <label>Address:</label>&nbsp; <?=$organization?>
            <br><br>

            <label>Title:</label>&nbsp; <?=$title?>
            <br><br>

            <label>Year:</label>&nbsp; <?=$year?>
            <br><br>

            <label>Key:</label>&nbsp; <?=$book_key?>
            <br><br>

            <label>URL:</label>&nbsp; <?=$url?>
            <br><br>

            <label>Project:</label>&nbsp; <?=$project?>
            <br><br>

            <label>Note:</label><br>
            <textarea class ="book_textAreaInp" readonly rows = "5" style = "background-color: lightgrey;"><?=$book_note?></textarea>
            <br>
            <button onclick = "window.location.href = '<?=$self?>?r=back&type=misc'"
                    class = "backBtn">
                Back
            </button>

            <form action = "<?= $self ?>" method = "POST">
                <button class = "goBtn"  name = "type" value = "store_misc" type = "submit">
                    Store
                </button>
            </form>
            <br>
        </div>
    <?php       //>
        exit();
    }

/***************  END type misc ***********************************************/

    function booklet_form($self) {
   /*
    *   Input form for  publication type "booklet"
    *   Author(s), address (=organization), title, year, url, project, note
    */

        $first_author = array();
        if ( !key_exists('authors', $_SESSION) ) {
           $authors = array();
           $authors[0][0] = "";
           $authors[0][1] = "";
           $_SESSION['authors'] = $authors;
        }
        else {
           $authors = $_SESSION['authors'];
        }
        $nr_of_authors = count($authors);

        $first_author[0] = $authors[0][0];
        $first_author[1] = $authors[0][1];
        if ( !key_exists('organization', $_SESSION) ) {
            $_SESSION['organization'] = "" ;
        }

        $organization = $_SESSION['organization'];

        if ( !key_exists('title', $_SESSION) ) {
            $_SESSION['title'] = "" ;
        }
        $title = $_SESSION['title'];

        if ( !key_exists('year', $_SESSION) ) {
            $_SESSION['year'] = 1;
        }
        $year = $_SESSION['year'];

        if ( !key_exists('url', $_SESSION) ) {
            $_SESSION['url'] = "" ;
        }
        $url = $_SESSION['url'];

        if ( !key_exists('project', $_SESSION) ) {
            $_SESSION['project'] = "" ;
        }
        $project = $_SESSION['project'];

    ?>
        <div class = "menu">
            <h4>Enter properties of publication type 'booklet'</h4>

            <!-- Help info -->
            <div class = "book_inp_info">
                <img  src = "../../shared/info.jpg" class = "info"  />
                <div  class = "tooltip_book_inp subhelp">
                </div>
            </div>
            <br>
            <!-- End Help info -->

            <form  id = "formBooklet" action = "<?= $self ?>" method = "POST">
                <div id = "authorDivs">
                    <div id = 'authorDiv1'>
                        <label>Author&nbsp;1&nbsp;</label> <br>
                        <label>First name:</label>&nbsp;
                        <input name = 'author10' value = "<?=$first_author[0]?>" size = "19" maxlength = "50"  />
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <label>Last name:</label>
                        <input name = 'author11' value = "<?=$first_author[1]?>" size = "34" maxlength = "100"/>
                    </div>

                <?php             //>
                    for ($i = 2; $i <= $nr_of_authors; $i++) {
                        $val[0] = $authors[$i - 1][0];
                        $val[1] = $authors[$i - 1][1];
                        echo "
                            <br>
                            <div id = 'authorDiv{$i}'>
                                <label>Author&nbsp;{$i}&nbsp;</label> <br>
                                <label>First name:</label>&nbsp;&nbsp;
                                <input name = 'author{$i}0' value = '{$val[0]}'
                                        size = '19' maxlength = '50' />
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <label>Last name:</label>
                                <input name = 'author{$i}1' value = '{$val[1]}'
                                        size = '34' maxlength = '100'/>
                                <br>
                                <br>
                            </div>
                            ";
                    }
                ?>

                    <div id = "lastDivAuthorBooklet">       <!-- new author input fields are put just before here -->
                    </div>
                </div>
                <br><br><br>

                <label>Address:</label>&nbsp;
                <input name = "organization" value = "<?=$organization?>" size = "60" maxlength = "255" >
                <br><br>

                <label>Title:</label>&nbsp;
                <input name = "title" value = "<?=$title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Year:</label>&nbsp;
                <input name = "year" value = "<?=$year?>" size =  "4" maxlength =   "4" class = "year" >
                <br><br>

                <label>URL:</label>&nbsp;
                <input name = "url" value = "<?=$url?>"  size = "60" maxlength = "255" value = ""/>
                    &nbsp;&nbsp; (Web address)
                <br><br>

                <label>Project:</label>&nbsp;
                <input name = "project" value = "<?=$project?>"  size = "25" maxlength = "70" value = ""/>
                <br><br>

                <button class = "goBtn"  name = "type" value = "review_booklet" type = "submit">
                    Review input
                </button>
            </form>

            <div>
                <button onclick = "window.location.href = '<?=$self?>?q=restart'"
                        class = "restartBtn">
                    Restart
                </button>
            </div>

        </div>
    <?php    //>
        exit();
    }
    function review_booklet($self) {
   /*
    *   Updates entries $_SESSION['author'+`counter`] with the corresponding
    *   values in cleaned values $_POST.
    *
    *   Other input variables are cleaned and set.
    *
    */

        global $filenames;
        require_once $filenames['clean2'];
        require_once $filenames['check2'];
        require      $filenames['maxlength2'];

        //Check if caller is allowed
        $allowed_callers = array('PWRef_bookinp.php' );
        check_callers($allowed_callers);

        echo
       "<div class = 'menu'>";

            //  Clean up $_SESSION (remove author keys):
            foreach ($_SESSION as $counter => $val) {
                if ( preg_match('/^author/', $counter) ) {
                    unset($_SESSION[$counter]);
                }
            }

            $name    = array();
            $authors = array();
            // Loop over first names present in $_POST:
            $nr_of_authors = 1;
            while ( key_exists("author".$nr_of_authors."0", $_POST) ) {
                $index0 = "author".$nr_of_authors."0";  //first name
                $index1 = "author".$nr_of_authors."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_book");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                $authors[$nr_of_authors - 1][0] = $name[0];
                $authors[$nr_of_authors - 1][1] = $name[1];
                $nr_of_authors++;
            }
            $nr_of_authors--;
            if ($nr_of_authors > $max_authors) {
                die("<b>Error:</b> The number of authors is: {$nr_of_authors}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }
            if ( $nr_of_authors > 0 ) $_SESSION['authors'] = $authors;

            // Now the other input:
            $_POST["organization"] = substr( clean_html($_POST["organization"]), 0, $maxlength["organization"]);
            $_POST["title"       ] = substr( clean_html($_POST["title"       ]), 0, $maxlength["title"       ]);
            $_POST["year"        ] = substr( clean_html($_POST["year"        ]), 0, $maxlength["year"        ]);
            $_POST["url"         ] = substr( clean_html($_POST["url"         ]), 0, $maxlength["url"         ]);
            $_POST["project"     ] = substr( clean_html($_POST["project"     ]), 0, $maxlength["project"     ]);

            $organization = $_SESSION["organization"] = $_POST["organization"]; unset($_POST["organization"]);
            $title        = $_SESSION["title"]        = $_POST["title"]       ; unset($_POST["title"]       );
            $year         = $_SESSION["year"]         = $_POST["year"]        ; unset($_POST["year"]        );
            $url          = $_SESSION["url"]          = $_POST["url"]         ; unset($_POST["url"]         );
            $project      = $_SESSION["project"]      = $_POST["project"]     ; unset($_POST["project"]     );

            $i = 0;
        ?>
            <h4 class = "center" style = "margin-top: -20px;">Review the following input of type 'booklet'       </h4>
            <br>
            <table width = '25%'>
        <?php
            for ($i = 0; $i < $nr_of_authors; $i++) {
                $i1 = $i+1;
                echo "<tr><td><b>Author  $i1:</b></td>
                      <td>{$authors[$i][0]}</td>
                      <td>{$authors[$i][1]}</td></tr>\n
                ";
            }
        ?>
            </table>
            <br><br>

            <label>Address:</label>&nbsp; <?=$organization?>
            <br><br>

            <label>Title:</label>&nbsp; <?=$title?>
            <br><br>

            <label>Year:</label>&nbsp; <?=$year?>
            <br><br>

            <label>URL:</label>&nbsp; <?=$url?>
            <br><br>

            <label>Project:</label>&nbsp; <?=$project?>
            <br><br>

            <button onclick = "window.location.href = '<?=$self?>?r=back&type=booklet'"
                    class = "backBtn" >
                Back
            </button>

            <form action = "<?= $self ?>" method = "POST">
                <button class = "goBtn"  name = "type" value = "store_booklet" type = "submit">
                    Store
                </button>
            </form>
            <br>
        </div>
    <?php       //>
        exit();
    }

/***************  END type booklet ***********************************************/

    function phdthesis_form($self) {
   /*
    *   Input form for  publication type "phdthesis"
    *   Author(s), school (=organization), title, year, url, project.
    */

        $first_author = array();
        if ( !key_exists('authors', $_SESSION) ) {
           $authors = array();
           $authors[0][0] = "";
           $authors[0][1] = "";
           $_SESSION['authors'] = $authors;
        }
        else {
           $authors = $_SESSION['authors'];
        }
        $nr_of_authors = count($authors);

        $first_author[0] = $authors[0][0];
        $first_author[1] = $authors[0][1];

        if ( !key_exists('organization', $_SESSION) ) {
            $_SESSION['organization'] = "" ;
        }
        $organization = $_SESSION['organization'];

        if ( !key_exists('title', $_SESSION) ) {
            $_SESSION['title'] = "" ;
        }
        $title = $_SESSION['title'];

        if ( !key_exists('year', $_SESSION) ) {
            $_SESSION['year'] = 1;
        }
        $year = $_SESSION['year'];

        if ( !key_exists('url', $_SESSION) ) {
            $_SESSION['url'] = "" ;
        }
        $url = $_SESSION['url'];

        if ( !key_exists('project', $_SESSION) ) {
            $_SESSION['project'] = "" ;
        }
        $project = $_SESSION['project'];

    ?>
        <div class = "menu">
            <h4>Enter properties of publication type 'phdthesis'</h4>

            <form  id = "formPhdthesis" action = "<?= $self ?>" method = "POST">

                <label>Author</label><br>
                <label>First name:</label>&nbsp;
                <input name = 'author10' value = "<?=$first_author[0]?>" size = "19" maxlength = "50"  />
                &nbsp;&nbsp; &nbsp;&nbsp;
                <label>Last name:</label>
                <input name = 'author11' value = "<?=$first_author[1]?>" size = "34" maxlength = "100"/>
                <br><br><br>

                <label>School:</label>&nbsp;
                <input name = "organization" value = "<?=$organization?>" size = "60" maxlength = "255" >
                <br><br>

                <label>Title:</label>&nbsp;
                <input name = "title" value = "<?=$title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Year:</label>&nbsp;
                <input name = "year" value = "<?=$year?>" size =  "4" maxlength =   "4" class = "year" >
                <br><br>

                <label>URL:</label>&nbsp;
                <input name = "url" value = "<?=$url?>"  size = "60" maxlength = "255" value = ""/>
                    &nbsp;&nbsp; (Web address)
                <br><br>

                <label>Project:</label>&nbsp;
                <input name = "project" value = "<?=$project?>"  size = "25" maxlength = "70" value = ""/>
                <br><br>

                <button class = "goBtn"  name = "type" value = "review_phdthesis" type = "submit">
                    Review input
                </button>
            </form>

            <div>
                <button onclick = "window.location.href = '<?=$self?>?q=restart'"
                        class = "restartBtn">
                    Restart
                </button>
            </div>

        </div>
    <?php    //>
        exit();
    }

    function review_phdthesis($self) {
   /*
    *   Updates entries $_SESSION['author'+`counter`] with the corresponding
    *   values in cleaned values $_POST.
    *
    *   Other input variables are cleaned and set.
    *
    */

        global $filenames;
        require_once $filenames['clean2'];
        require_once $filenames['check2'];
        require      $filenames['maxlength2'];

        //Check if caller is allowed
        $allowed_callers = array('PWRef_bookinp.php' );
        check_callers($allowed_callers);

        echo
       "<div class = 'menu'>";

            //  Clean up $_SESSION (remove author keys):
            foreach ($_SESSION as $counter => $val) {
                if ( preg_match('/^author/', $counter) ) {
                    unset($_SESSION[$counter]);
                }
            }

            $name    = array();
            $authors = array();
            // Loop over first names present in $_POST:
            $nr_of_authors = 1;
            while ( key_exists("author".$nr_of_authors."0", $_POST) ) {
                $index0 = "author".$nr_of_authors."0";  //first name
                $index1 = "author".$nr_of_authors."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_book");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                $authors[$nr_of_authors - 1][0] = $name[0];
                $authors[$nr_of_authors - 1][1] = $name[1];
                $nr_of_authors++;
            }
            $nr_of_authors--;
            if ($nr_of_authors > $max_authors) {
                die("<b>Error:</b> The number of authors is: {$nr_of_authors}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }
            if ( $nr_of_authors > 0 ) $_SESSION['authors'] = $authors;

            // Now the other input:
            $_POST["organization"] = substr( clean_html($_POST["organization"]), 0, $maxlength["organization"]);
            $_POST["title"       ] = substr( clean_html($_POST["title"       ]), 0, $maxlength["title"       ]);
            $_POST["year"        ] = substr( clean_html($_POST["year"        ]), 0, $maxlength["year"        ]);
            $_POST["url"         ] = substr( clean_html($_POST["url"         ]), 0, $maxlength["url"         ]);
            $_POST["project"     ] = substr( clean_html($_POST["project"     ]), 0, $maxlength["project"     ]);

            $organization = $_SESSION["organization"] = $_POST["organization"]; unset($_POST["organization"]);
            $title        = $_SESSION["title"]        = $_POST["title"]       ; unset($_POST["title"]       );
            $year         = $_SESSION["year"]         = $_POST["year"]        ; unset($_POST["year"]        );
            $url          = $_SESSION["url"]          = $_POST["url"]         ; unset($_POST["url"]         );
            $project      = $_SESSION["project"]      = $_POST["project"]     ; unset($_POST["project"]     );

        ?>
            <h4 class = "center" style = "margin-top: -20px;">Review the following input of type 'phdthesis'     </h4>
            <br>
            <table width = '25%'>
                <tr><td><b>Author:</b></td>
                    <td><?=$authors[0][0]?></td>
                    <td><?=$authors[0][1]?></td></tr>
                </tr>
            </table>
            <br>

            <label>School:</label>&nbsp; <?=$organization?>
            <br><br>

            <label>Title:</label>&nbsp; <?=$title?>
            <br><br>

            <label>Year:</label>&nbsp; <?=$year?>
            <br><br>

            <label>URL:</label>&nbsp; <?=$url?>
            <br><br>

            <label>Project:</label>&nbsp; <?=$project?>
            <br><br>

            <button onclick = "window.location.href = '<?=$self?>?r=back&type=phdthesis'"
                    class = "backBtn">
                Back
            </button>

            <form action = "<?= $self ?>" method = "POST">
                <button class = "goBtn"  name = "type" value = "store_phdthesis" type = "submit">
                    Store
                </button>
            </form>
            <br>
        </div>
    <?php       //>
        exit();
    }

/***************  END type phdthesis ***********************************************/

    function inproceedings_form($self) {
   /*
    *   Input form for  publication type "inproceedings"
    *   Author(s), title, second_title, publisher, year,  url, project, note
    */

        $first_author = array();
        if ( !key_exists('authors', $_SESSION) ) {
           $authors = array();
           $authors[0][0] = "";
           $authors[0][1] = "";
           $_SESSION['authors'] = $authors;
        }
        else {
           $authors = $_SESSION['authors'];
        }
        $nr_of_authors = count($authors);

        $first_author[0] = $authors[0][0];
        $first_author[1] = $authors[0][1];
        if ( !key_exists('second_title', $_SESSION) ) {
            $_SESSION['second_title'] = "" ;
        }

        $second_title = $_SESSION['second_title'];

        if ( !key_exists('title', $_SESSION) ) {
            $_SESSION['title'] = "" ;
        }
        $title = $_SESSION['title'];

        if ( !key_exists('publisher', $_SESSION) ) {
            $_SESSION['publisher'] = "" ;
        }
        $publisher = $_SESSION['publisher'];

        if ( !key_exists('year', $_SESSION) ) {
            $_SESSION['year'] = 1;
        }
        $year = $_SESSION['year'];

        if ( !key_exists('url', $_SESSION) ) {
            $_SESSION['url'] = "" ;
        }
        $url = $_SESSION['url'];

        if ( !key_exists('project', $_SESSION) ) {
            $_SESSION['project'] = "" ;
        }
        $project = $_SESSION['project'];

        if ( !key_exists('book_note', $_SESSION) ) {
            $_SESSION['book_note'] = "" ;
        }
        $book_note = trim($_SESSION['book_note']);
    ?>
        <div class = "menu">
            <h4>Enter properties of publication type 'inproceedings'</h4>

            <!-- Help info -->
            <div class = "book_inp_info">
                <img  src = "../../shared/info.jpg" class = "info"  />
                <div  class = "tooltip_book_inp subhelp">
                </div>
            </div>
            <br>
            <!-- End Help info -->

            <form  id = "formInproceedings" action = "<?= $self ?>" method = "POST">
                <div id = "authorDivs">
                    <div id = 'authorDiv1'>
                        <label>Author&nbsp;1&nbsp;</label> <br>
                        <label>First name:</label>&nbsp;
                        <input name = 'author10' value = "<?=$first_author[0]?>" size = "19" maxlength = "50"  />
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <label>Last name:</label>
                        <input name = 'author11' value = "<?=$first_author[1]?>" size = "34" maxlength = "100"/>
                    </div>

                <?php             //>
                    for ($i = 2; $i <= $nr_of_authors; $i++) {
                        $val[0] = $authors[$i - 1][0];
                        $val[1] = $authors[$i - 1][1];
                        echo "
                            <br>
                            <div id = 'authorDiv{$i}'>
                                <label>Author&nbsp;{$i}&nbsp;</label> <br>
                                <label>First name:</label>&nbsp;&nbsp;
                                <input name = 'author{$i}0' value = '{$val[0]}'
                                        size = '19' maxlength = '50' />
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <label>Last name:</label>
                                <input name = 'author{$i}1' value = '{$val[1]}'
                                        size = '34' maxlength = '100'/>
                                <br>
                                <br>
                            </div>
                            ";
                    }
                ?>

                    <div id = "lastDivAuthorInproceedings"> <!-- new author input fields are put just before here -->
                    </div>
                </div>
                <br><br><br>

                <label>Title:</label>&nbsp;&nbsp; &nbsp; &nbsp;
                <input name = "title" value = "<?=$title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Book title:</label>&nbsp; &nbsp; &nbsp;
                <input name = "second_title" value = "<?=$second_title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Publisher:</label>&nbsp;
                <input name = "publisher" value = "<?=$publisher?>" size = "60" maxlength = "255" >
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>Year:</label>&nbsp;
                <input name = "year" value = "<?=$year?>" size =  "4" maxlength =   "4" class = "year" >
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

                <button class = "goBtn"  name = "type" value = "review_inproceedings"   type = "submit">
                    Review input
                </button>
            </form>

            <div>
                <button onclick = "window.location.href = '<?=$self?>?q=restart'"
                        class = "restartBtn">
                    Restart
                </button>
            </div>

        </div>
    <?php    //>
        exit();
    }
    function review_inproceedings($self) {
   /*
    *   Updates entries $_SESSION['author'+`counter`] with the corresponding
    *   values in cleaned values $_POST.
    *
    *   Other input variables are cleaned and set.
    *
    */

        global $filenames;
        require_once $filenames['clean2'];
        require_once $filenames['check2'];
        require      $filenames['maxlength2'];

        //Check if caller is allowed
        $allowed_callers = array('PWRef_bookinp.php' );
        check_callers($allowed_callers);

        echo
       "<div class = 'menu'>";

            //  Clean up $_SESSION (remove author keys):
            foreach ($_SESSION as $counter => $val) {
                if ( preg_match('/^author/', $counter) ) {
                    unset($_SESSION[$counter]);
                }
            }

            $name    = array();
            $authors = array();
            // Loop over first names present in $_POST:
            $nr_of_authors = 1;
            while ( key_exists("author".$nr_of_authors."0", $_POST) ) {
                $index0 = "author".$nr_of_authors."0";  //first name
                $index1 = "author".$nr_of_authors."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_book");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                $authors[$nr_of_authors - 1][0] = $name[0];
                $authors[$nr_of_authors - 1][1] = $name[1];
                $nr_of_authors++;
            }
            $nr_of_authors--;
            if ($nr_of_authors > $max_authors) {
                die("<b>Error:</b> The number of authors is: {$nr_of_authors}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }
            if ( $nr_of_authors > 0 ) $_SESSION['authors'] = $authors;

            // Now the other input:
            $_POST["second_title" ] = substr( clean_html($_POST["second_title"]), 0, $maxlength["second_title"]);
            $_POST["title"        ] = substr( clean_html($_POST["title"       ]), 0, $maxlength["title"       ]);
            $_POST["publisher"    ] = substr( clean_html($_POST["publisher"   ]), 0, $maxlength["publisher"   ]);
            $_POST["year"         ] = substr( clean_html($_POST["year"        ]), 0, $maxlength["year"        ]);
            $_POST["url"          ] = substr( clean_html($_POST["url"         ]), 0, $maxlength["url"         ]);
            $_POST["url"          ] = substr( clean_html($_POST["url"         ]), 0, $maxlength["url"         ]);
            $_POST["project"      ] = substr( clean_html($_POST["project"     ]), 0, $maxlength["project"     ]);
            $_POST["book_note"    ] = substr( clean_html($_POST["book_note"   ]), 0, $maxlength["book_note"   ]);

            $second_title  = $_SESSION["second_title"]  = $_POST["second_title"] ; unset($_POST["second_title"]);
            $title         = $_SESSION["title"]         = $_POST["title"]        ; unset($_POST["title"       ]);
            $publisher     = $_SESSION["publisher"]     = $_POST["publisher"]    ; unset($_POST["publisher"   ]);
            $year          = $_SESSION["year"]          = $_POST["year"]         ; unset($_POST["year"        ]);
            $url           = $_SESSION["url"]           = $_POST["url"]          ; unset($_POST["url"         ]);
            $project       = $_SESSION["project"]       = $_POST["project"]      ; unset($_POST["project"     ]);
            $book_note     = $_SESSION["book_note"]     = $_POST["book_note"]    ; unset($_POST["book_note"   ]);

            $i = 0;
        ?>
            <h4 class = "center" style = "margin-top: -20px;">Review the following input of type 'inproceedings' </h4>
            <br>
            <table width = '25%'>
        <?php
            for ($i = 0; $i < $nr_of_authors; $i++) {
                $i1 = $i+1;
                echo "<tr><td><b>Author  $i1:</b></td>
                      <td>{$authors[$i][0]}</td>
                      <td>{$authors[$i][1]}</td></tr>\n
                ";
            }
        ?>
            </table>
            <br><br>

            <label>Title:</label>&nbsp; <?=$title?>
            <br><br>

            <label>Book title:</label>&nbsp; &nbsp; &nbsp; &nbsp;<?=$second_title?>
            <br><br>

            <label>Publisher:</label>&nbsp; <?=$publisher?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label>Year:</label>&nbsp; <?=$year?>
            <br><br>

            <label>URL:</label>&nbsp; <?=$url?>
            <br><br>

            <label>Project:</label>&nbsp; <?=$project?>
            <br><br>

            <label>Note:</label><br>
            <textarea class ="book_textAreaInp" readonly rows = "5" style = "background-color: lightgrey;"><?=$book_note?></textarea>
            <br>
            <button onclick = "window.location.href = '<?=$self?>?r=back&type=inproceedings'"
                    class = "backBtn" >
                Back
            </button>

            <form action = "<?= $self ?>" method = "POST">
                <button class = "goBtn" name = "type" value = "store_inproceedings" type = "submit">
                    Store
                </button>
            </form>
            <br>
        </div>
    <?php       //>
        exit();
    }

/***************  END type inproceedings ***********************************************/

    function inbook_form($self) {
   /*
    *   Input form for  publication type "inbook"
    *   Author(s), Editor(s), title, second_title,  publisher, year,  project
    */

        // Initialize $authors
        $first_author = array();
        if ( !key_exists('authors', $_SESSION) ) {
           $authors = array();
           $authors[0][0] = "";
           $authors[0][1] = "";
           $_SESSION['authors'] = $authors;
        }
        else {
           $authors = $_SESSION['authors'];
        }
        $nr_of_authors = count($authors);

        $first_author[0] = $authors[0][0];
        $first_author[1] = $authors[0][1];

        // Initialize $editors
        $first_editor = array();
        if ( !key_exists('editors', $_SESSION) ) {
           $editors = array();
           $editors[0][0] = "";
           $editors[0][1] = "";
           $_SESSION['editors'] = $editors;
        }
        else {
           $editors = $_SESSION['editors'];
        }
        $nr_of_editors = count($editors);

        $first_editor[0] = $editors[0][0];
        $first_editor[1] = $editors[0][1];

        if ( !key_exists('second_title', $_SESSION) ) {
            $_SESSION['second_title'] = "" ;
        }
        $second_title = $_SESSION['second_title'];

        if ( !key_exists('title', $_SESSION) ) {
            $_SESSION['title'] = "" ;
        }
        $title = $_SESSION['title'];

        if ( !key_exists('publisher', $_SESSION) ) {
            $_SESSION['publisher'] = "" ;
        }
        $publisher = $_SESSION['publisher'];

        if ( !key_exists('year', $_SESSION) ) {
            $_SESSION['year'] = 1;
        }
        $year = $_SESSION['year'];

        if ( !key_exists('project', $_SESSION) ) {
            $_SESSION['project'] = "" ;
        }
        $project = $_SESSION['project'];

    ?>
        <div class = "menu">
            <h4>Enter properties of publication type 'inbook'</h4>


            <form  id = "formInbook" action = "<?= $self ?>" method = "POST">
                <div id = "authorDivs">
                    <div id = 'authorDiv1'>
                        <label>Author&nbsp;1&nbsp;</label> <br>
                        <label>First name:</label>&nbsp;
                        <input name = 'author10' value = "<?=$first_author[0]?>" size = "19" maxlength = "50"  />
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <label>Last name:</label>
                        <input name = 'author11' value = "<?=$first_author[1]?>" size = "34" maxlength = "100"/>
                    </div>

                <?php             //>
                    for ($i = 2; $i <= $nr_of_authors; $i++) {
                        $val[0] = $authors[$i - 1][0];
                        $val[1] = $authors[$i - 1][1];
                        echo "
                            <br>
                            <div id = 'authorDiv{$i}'>
                                <label>Author&nbsp;{$i}&nbsp;</label> <br>
                                <label>First name:</label>&nbsp;&nbsp;
                                <input name = 'author{$i}0' value = '{$val[0]}'
                                        size = '19' maxlength = '50' />
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <label>Last name:</label>
                                <input name = 'author{$i}1' value = '{$val[1]}'
                                        size = '34' maxlength = '100'/>
                                <br>
                                <br>
                            </div>
                            ";
                    }
                ?>

                    <div id = "lastDivAuthorInbook">        <!-- new author input fields are put just before here -->
                    </div>
                </div>  <!-- authorDivs -->

                <!-- Help info -->
                <div class = "book_inp_info">
                    <img  src = "../../shared/info.jpg" class = "info"  />
                    <div  class = "tooltip_book_inp subhelp">
                    </div>
                </div>
                <br>
                <!-- End Help info -->

                <br>
                <div id = "editorDivs">
                    <div id = 'editorDiv1'>
                        <label>Editor&nbsp;1&nbsp;</label> <br>
                        <label>First name:</label>&nbsp;
                        <input name = 'editor10' value = "<?=$first_editor[0]?>" size = "19" maxlength = "50"  />
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <label>Last name:</label>
                        <input name = 'editor11' value = "<?=$first_editor[1]?>" size = "34" maxlength = "100"/>
                    </div>

                <?php             //>
                    for ($i = 2; $i <= $nr_of_editors; $i++) {
                        $val[0] = $editors[$i - 1][0];
                        $val[1] = $editors[$i - 1][1];
                        echo "
                            <br>
                            <div id = 'editorDiv{$i}'>
                                <label>Editor&nbsp;{$i}&nbsp;</label> <br>
                                <label>First name:</label>&nbsp;&nbsp;
                                <input name = 'editor{$i}0' value = '{$val[0]}'
                                        size = '19' maxlength = '50' />
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <label>Last name:</label>
                                <input name = 'editor{$i}1' value = '{$val[1]}'
                                        size = '34' maxlength = '100'/>
                                <br>
                                <br>
                            </div>
                            ";
                    }
                ?>

                    <!-- New editor input fields are put just before here. Note
                         that the last part of the id contains the publication type (Inbook) -->
                    <div id = "lastDivEditorInbook">
                    </div>
                </div>  <!-- editorDivs -->
                <br><br><br>

                <label>Title contribution:</label>&nbsp;
                <input name = "title" value = "<?=$title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Book title:</label>&nbsp;
                <input name = "second_title" value = "<?=$second_title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Publisher:</label>&nbsp;
                <input name = "publisher" value = "<?=$publisher?>" size = "60" maxlength = "255" >
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>Year:</label>&nbsp;
                <input name = "year" value = "<?=$year?>" size =  "4" maxlength =   "4" class = "year" >
                <br><br>

                <label>Project:</label>&nbsp;
                <input name = "project" value = "<?=$project?>"  size = "25" maxlength = "70" value = ""/>
                <br><br>

                <button class = "goBtn" name = "type" value = "review_inbook" type = "submit">
                    Review input
                </button>
            </form>

            <div>
                <button onclick = "window.location.href = '<?=$self?>?q=restart'"
                        class = "restartBtn">
                    Restart
                </button>
            </div>

        </div>
    <?php    //>
        exit();
    }
    function review_inbook($self) {
   /*
    *   Updates entries $_SESSION['author'+`counter`] with the corresponding
    *   values in cleaned values $_POST.
    *
    *   Updates entries $_SESSION['editor'+`counter`] with the corresponding
    *   values in cleaned values $_POST.
    *
    *   Other input variables are cleaned and set.
    *
    */

        global $filenames;
        require_once $filenames['clean2'];
        require_once $filenames['check2'];
        require      $filenames['maxlength2'];

        //Check if caller is allowed
        $allowed_callers = array('PWRef_bookinp.php' );
        check_callers($allowed_callers);

        echo
       "<div class = 'menu'>";

            //  Clean up $_SESSION (remove actor keys):
            foreach ($_SESSION as $counter => $val) {
                if ( preg_match('/^author/', $counter) ) {
                    unset($_SESSION[$counter]);
                }
                if ( preg_match('/^editor/', $counter) ) {
                    unset($_SESSION[$counter]);
                }
            }

            $name    = array();
            $authors = array();
            // Loop over first names present in $_POST:
            $nr_of_authors = 1;
            while ( key_exists("author".$nr_of_authors."0", $_POST) ) {
                $index0 = "author".$nr_of_authors."0";  //first name
                $index1 = "author".$nr_of_authors."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_book");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                $authors[$nr_of_authors - 1][0] = $name[0];
                $authors[$nr_of_authors - 1][1] = $name[1];
                $nr_of_authors++;
            }
            $nr_of_authors--;
            if ($nr_of_authors > $max_authors) {
                die("<b>Error:</b> The number of authors is: {$nr_of_authors}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }
            if ( $nr_of_authors > 0 ) $_SESSION['authors'] = $authors;

            $editors = array();
            // Loop over first names present in $_POST:
            $nr_of_editors = 1;
            while ( key_exists("editor".$nr_of_editors."0", $_POST) ) {
                $index0 = "editor".$nr_of_editors."0";  //first name
                $index1 = "editor".$nr_of_editors."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_book");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                $editors[$nr_of_editors - 1][0] = $name[0];
                $editors[$nr_of_editors - 1][1] = $name[1];
                $nr_of_editors++;
            }
            $nr_of_editors--;
            if ( $nr_of_editors > 0 ) $_SESSION['editors'] = $editors;

            // Now the other input:
            $_POST["second_title"] = substr( clean_html($_POST["second_title"]),  0, $maxlength["second_title"]);
            $_POST["title"       ] = substr( clean_html($_POST["title"       ]),  0, $maxlength["title"       ]);
            $_POST["publisher"   ] = substr( clean_html($_POST["publisher"   ]),  0, $maxlength["publisher"   ]);
            $_POST["year"        ] = substr( clean_html($_POST["year"        ]),  0, $maxlength["year"        ]);
            $_POST["project"     ] = substr( clean_html($_POST["project"     ]),  0, $maxlength["project"     ]);

            $second_title = $_SESSION["second_title"] = $_POST["second_title"]; unset($_POST["second_title"]);
            $title        = $_SESSION["title"]        = $_POST["title"]       ; unset($_POST["title"]       );
            $publisher    = $_SESSION["publisher"]    = $_POST["publisher"]   ; unset($_POST["publisher"]   );
            $year         = $_SESSION["year"]         = $_POST["year"]        ; unset($_POST["year"]        );
            $project      = $_SESSION["project"]      = $_POST["project"]     ; unset($_POST["project"]     );

        ?>
            <h4 class = "center" style = "margin-top: -20px;">Review the following input of type 'inbook' </h4>
            <br>
            <table width = '25%'>
        <?php
            for ($i = 0; $i < $nr_of_authors; $i++) {
                $i1 = $i+1;
                echo "<tr><td><b>Author  $i1:</b></td>
                      <td>{$authors[$i][0]}</td>
                      <td>{$authors[$i][1]}</td></tr>\n
                ";
            }
        ?>
            </table>
            <br><br>

            <table width = '25%'>
        <?php
            for ($i = 0; $i < $nr_of_editors; $i++) {
                $i1 = $i+1;
                echo "<tr><td><b>Editor  $i1:</b></td>
                      <td>{$editors[$i][0]}</td>
                      <td>{$editors[$i][1]}</td></tr>\n
                ";
            }
        ?>
            </table>
            <br><br>

            <label>Title contribution:</label>&nbsp; <?=$title?>
            <br><br>

            <label>Book title:</label>&nbsp; <?=$second_title?>
            <br><br>

            <label>Publisher:</label>&nbsp; <?=$publisher?>
            &nbsp;&nbsp;&nbsp;&nbsp;

            <label>Year:</label>&nbsp; <?=$year?>
            <br><br>

            <label>Project:</label>&nbsp; <?=$project?>
            <br><br>

            <button onclick = "window.location.href = '<?=$self?>?r=back&type=inbook'"
                    class = "backBtn">
                Back
            </button>

            <form action = "<?= $self ?>" method = "POST">
                <button class = "goBtn" name = "type" value = "store_inbook" type = "submit">
                    Store
                </button>
            </form>
        </div>
    <?php       //>
        exit();
    }

/***************  END type inbook ***********************************************/

    function unpublished_form($self) {
   /*
    *   Input form for  publication type "unpublished"
    *   Author(s), title, year, note, project
    */
        $first_author = array();
        if ( !key_exists('authors', $_SESSION) ) {
           $authors = array();
           $authors[0][0] = "";
           $authors[0][1] = "";
           $_SESSION['authors'] = $authors;
        }
        else {
           $authors = $_SESSION['authors'];
        }
        $nr_of_authors = count($authors);

        $first_author[0] = $authors[0][0];
        $first_author[1] = $authors[0][1];

        if ( !key_exists('title', $_SESSION) ) {
            $_SESSION['title'] = "" ;
        }
        $title = $_SESSION['title'];

        if ( !key_exists('year', $_SESSION) ) {
            $_SESSION['year'] = 1;
        }
        $year = $_SESSION['year'];

        if ( !key_exists('project', $_SESSION) ) {
            $_SESSION['project'] = "" ;
        }
        $project = $_SESSION['project'];

        if ( !key_exists('book_note', $_SESSION) ) {
            $_SESSION['book_note'] = "" ;
        }
        $book_note = trim($_SESSION['book_note']);
    ?>
        <div class = "menu">
            <h4>Enter properties of publication type 'unpublished'</h4>

            <!-- Help info -->
            <div class = "book_inp_info">
                <img  src = "../../shared/info.jpg" class = "info"  />
                <div  class = "tooltip_book_inp subhelp">
                </div>
            </div>
            <br>
            <!-- End Help info -->

            <form  id = "formUnpublished" action = "<?= $self ?>" method = "POST">
                <div id = "authorDivs">
                    <div id = 'authorDiv1'>
                        <label>Author&nbsp;1&nbsp;</label> <br>
                        <label>First name:</label>&nbsp;
                        <input name = 'author10' value = "<?=$first_author[0]?>" size = "19" maxlength = "50"  />
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <label>Last name:</label>
                        <input name = 'author11' value = "<?=$first_author[1]?>" size = "34" maxlength = "100"/>
                    </div>
                <?php             //>
                    for ($i = 2; $i <= $nr_of_authors; $i++) {
                        $val[0] = $authors[$i - 1][0];
                        $val[1] = $authors[$i - 1][1];
                        echo "
                            <br>
                            <div id = 'authorDiv{$i}'>
                                <label>Author&nbsp;{$i}&nbsp;</label> <br>
                                <label>First name:</label>&nbsp;&nbsp;
                                <input name = 'author{$i}0' value = '{$val[0]}'
                                        size = '19' maxlength = '50' />
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <label>Last name:</label>
                                <input name = 'author{$i}1' value = '{$val[1]}'
                                        size = '34' maxlength = '100'/>
                                <br>
                                <br>
                            </div>
                            ";
                    }
                ?>
                    <div id = "lastDivAuthorUnpublished">       <!-- new author input fields are put just before here -->
                    </div>
                </div>
                <br><br><br>

                <label>Title:</label>&nbsp;
                <input name = "title" value = "<?=$title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Year:</label>&nbsp;
                <input name = "year" value = "<?=$year?>" size =  "4" maxlength =   "4" class = "year" >
                <br><br>

                <label>Project:</label>&nbsp;
                <input name = "project" value = "<?=$project?>"  size = "25" maxlength = "70" value = ""/>
                <br><br>

                <label>Note (maximum 1024 characters):</label><br>
                <textarea class ="book_textAreaInp" name = "book_note" rows = "5" ><?=$book_note?></textarea>

                <button class = "goBtn"   name = "type" value = "review_unpublished" type = "submit">
                    Review input
                </button>
            </form>

            <div>
                <button onclick = "window.location.href = '<?=$self?>?q=restart'"
                        class = "restartBtn">
                    Restart
                </button>
            </div>

        </div>
    <?php    //>
        exit();
    }
    function review_unpublished($self) {
   /*
    *   Updates entries $_SESSION['author'+`counter`] with the corresponding
    *   values in cleaned values $_POST.
    *
    *   Other input variables are cleaned and set.
    *
    */

        global $filenames;
        require_once $filenames['clean2'];
        require_once $filenames['check2'];
        require      $filenames['maxlength2'];

        //Check if caller is allowed
        $allowed_callers = array('PWRef_bookinp.php' );
        check_callers($allowed_callers);

        echo
       "<div class = 'menu'>";

            //  Clean up $_SESSION (remove author keys):
            foreach ($_SESSION as $counter => $val) {
                if ( preg_match('/^author/', $counter) ) {
                    unset($_SESSION[$counter]);
                }
            }

            $name    = array();
            $authors = array();
            // Loop over first names present in $_POST:
            $nr_of_authors = 1;
            while ( key_exists("author".$nr_of_authors."0", $_POST) ) {
                $index0 = "author".$nr_of_authors."0";  //first name
                $index1 = "author".$nr_of_authors."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_book");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                $authors[$nr_of_authors - 1][0] = $name[0];
                $authors[$nr_of_authors - 1][1] = $name[1];
                $nr_of_authors++;
            }
            $nr_of_authors--;
            if ($nr_of_authors > $max_authors) {
                die("<b>Error:</b> The number of authors is: {$nr_of_authors}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }
            if ( $nr_of_authors > 0 ) $_SESSION['authors'] = $authors;

            // Now the other input:
            $_POST["title"    ] = substr( clean_html($_POST["title"    ]), 0, $maxlength["title"    ]);
            $_POST["year"     ] = substr( clean_html($_POST["year"     ]), 0, $maxlength["year"     ]);
            $_POST["project"  ] = substr( clean_html($_POST["project"  ]), 0, $maxlength["project"  ]);
            $_POST["book_note"] = substr( clean_html($_POST["book_note"]), 0, $maxlength["book_note"]);

            $title     = $_SESSION["title"]     = $_POST["title"]    ; unset($_POST["title"]    );
            $year      = $_SESSION["year"]      = $_POST["year"]     ; unset($_POST["year"]     );
            $project   = $_SESSION["project"]   = $_POST["project"]  ; unset($_POST["project"]  );
            $book_note = $_SESSION["book_note"] = $_POST["book_note"]; unset($_POST["book_note"]);

            $i = 0;
        ?>
            <h4 class = "center" style = "margin-top: -20px;">Review the following input of type 'unpublished'       </h4>
            <br>
            <table width = '25%'>
        <?php
            for ($i = 0; $i < $nr_of_authors; $i++) {
                $i1 = $i+1;
                echo "<tr><td><b>Author  $i1:</b></td>
                      <td>{$authors[$i][0]}</td>
                      <td>{$authors[$i][1]}</td></tr>\n
                ";
            }
        ?>
            </table>
            <br><br>

            <label>Title:</label>&nbsp; <?=$title?>
            <br><br>

            <label>Year:</label>&nbsp; <?=$year?>
            <br><br>

            <label>Project:</label>&nbsp; <?=$project?>
            <br><br>

            <label>Note:</label><br>
            <textarea class ="book_textAreaInp" readonly rows = "5" style = "background-color: lightgrey;"><?=$book_note?></textarea>
            <br>
            <button onclick = "window.location.href = '<?=$self?>?r=back&type=unpublished'"
                    class = "backBtn">
                Back
            </button>

            <form action = "<?= $self ?>" method = "POST">
                <button class = "goBtn"  name = "type" value = "store_unpublished" type = "submit">
                    Store
                </button>
            </form>
            <br>
        </div>
    <?php       //>
        exit();
    }

/***************  END type unpublished ***********************************************/

    function manual_form($self) {
   /*
    *   Input form for  publication type "manual"
    *   Author(s), organization, year, note, url
    */
        $first_author = array();
        if ( !key_exists('authors', $_SESSION) ) {
           $authors = array();
           $authors[0][0] = "";
           $authors[0][1] = "";
           $_SESSION['authors'] = $authors;
        }
        else {
           $authors = $_SESSION['authors'];
        }
        $nr_of_authors = count($authors);

        $first_author[0] = $authors[0][0];
        $first_author[1] = $authors[0][1];


        if ( !key_exists('organization', $_SESSION) ) {
            $_SESSION['organization'] = "" ;
        }
        $organization = $_SESSION['organization'];

        if ( !key_exists('year', $_SESSION) ) {
            $_SESSION['year'] = 1;
        }
        $year = $_SESSION['year'];

        if ( !key_exists('book_key', $_SESSION) ) {
            $_SESSION['book_key'] = "";
        }
        $book_key = $_SESSION['book_key'];

        if ( !key_exists('url', $_SESSION) ) {
            $_SESSION['url'] = "" ;
        }
        $url = $_SESSION['url'];

        if ( !key_exists('book_note', $_SESSION) ) {
            $_SESSION['book_note'] = "" ;
        }
        $book_note = trim($_SESSION['book_note']);
    ?>
        <div class = "menu">
            <h4>Enter properties of publication type 'manual'</h4>

            <!-- Help info -->
            <div class = "book_inp_info">
                <img  src = "../../shared/info.jpg" class = "info"  />
                <div  class = "tooltip_book_inp subhelp">
                </div>
            </div>
            <br>
            <!-- End Help info -->

            <form  id = "formManual" action = "<?= $self ?>" method = "POST">
                <div id = "authorDivs">
                    <div id = 'authorDiv1'>
                        <label>Author&nbsp;1&nbsp;</label> <br>
                        <label>First name:</label>&nbsp;
                        <input name = 'author10' value = "<?=$first_author[0]?>" size = "19" maxlength = "50"  />
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <label>Last name:</label>
                        <input name = 'author11' value = "<?=$first_author[1]?>" size = "34" maxlength = "100"/>
                    </div>
                <?php             //>
                    for ($i = 2; $i <= $nr_of_authors; $i++) {
                        $val[0] = $authors[$i - 1][0];
                        $val[1] = $authors[$i - 1][1];
                        echo "
                            <br>
                            <div id = 'authorDiv{$i}'>
                                <label>Author&nbsp;{$i}&nbsp;</label> <br>
                                <label>First name:</label>&nbsp;&nbsp;
                                <input name = 'author{$i}0' value = '{$val[0]}'
                                        size = '19' maxlength = '50' />
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <label>Last name:</label>
                                <input name = 'author{$i}1' value = '{$val[1]}'
                                        size = '34' maxlength = '100'/>
                                <br>
                                <br>
                            </div>
                            ";
                    }
                ?>
                    <div id = "lastDivAuthorManual">       <!-- new author input fields are put just before here -->
                    </div>
                </div>
                <br><br><br>

                <label>Organization:</label>&nbsp;
                <input name = "organization" value = "<?=$organization?>"  size = "25" maxlength = "255" value = ""/>
                <br><br>

                <label>Key:</label>&nbsp;
                <input name = "book_key" value = "<?=$book_key?>"  size = "50" maxlength = "105" value = ""/>
                <br><br>

                <label>Year:</label>&nbsp;
                <input name = "year" value = "<?=$year?>" size =  "4" maxlength =   "4" class = "year" >
                <br><br>

                <label>URL:</label>&nbsp;
                <input name = "url" value = "<?=$url?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Note (maximum 1024 characters):</label><br>
                <textarea class ="book_textAreaInp" name = "book_note" rows = "5" ><?=$book_note?></textarea>

                <button class = "goBtn"  name = "type" value = "review_manual"  type = "submit">
                    Review input
                </button>
            </form>

            <div>
                <button onclick = "window.location.href = '<?=$self?>?q=restart'"
                        class = "restartBtn" >
                    Restart
                </button>
            </div>

        </div>
    <?php    //>
        exit();
    }

    function review_manual($self) {
   /*
    *   Updates entries $_SESSION['author'+`counter`] with the corresponding
    *   values in cleaned values $_POST.
    *
    *   Other input variables are cleaned and set.
    *
    */

        global $filenames;
        require_once $filenames['clean2'];
        require_once $filenames['check2'];
        require      $filenames['maxlength2'];

        //Check if caller is allowed
        $allowed_callers = array('PWRef_bookinp.php' );
        check_callers($allowed_callers);

        echo
       "<div class = 'menu'>";

            //  Clean up $_SESSION (remove author keys):
            foreach ($_SESSION as $counter => $val) {
                if ( preg_match('/^author/', $counter) ) {
                    unset($_SESSION[$counter]);
                }
            }

            $name    = array();
            $authors = array();
            // Loop over first names present in $_POST:
            $nr_of_authors = 1;
            while ( key_exists("author".$nr_of_authors."0", $_POST) ) {
                $index0 = "author".$nr_of_authors."0";  //first name
                $index1 = "author".$nr_of_authors."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_book");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                $authors[$nr_of_authors - 1][0] = $name[0];
                $authors[$nr_of_authors - 1][1] = $name[1];
                $nr_of_authors++;
            }
            $nr_of_authors--;
            if ($nr_of_authors > $max_authors) {
                die("<b>Error:</b> The number of authors is: {$nr_of_authors}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }
            if ( $nr_of_authors > 0 ) $_SESSION['authors'] = $authors;

            // Now the other input:
            $_POST["organization"] = substr( clean_html($_POST["organization"]), 0, $maxlength["organization"]);
            $_POST["year"        ] = substr( clean_html($_POST["year"        ]), 0, $maxlength["year"        ]);
            $_POST["book_key"    ] = substr( clean_html($_POST["book_key"    ]), 0, $maxlength["book_key"    ]);
            $_POST["url"         ] = substr( clean_html($_POST["url"         ]), 0, $maxlength["url"         ]);
            $_POST["book_note"   ] = substr( clean_html($_POST["book_note"   ]), 0, $maxlength["book_note"   ]);

            $organization = $_SESSION["organization"] = $_POST["organization"]; unset($_POST["organization"]);
            $year         = $_SESSION["year"        ] = $_POST["year"        ]; unset($_POST["year"        ]);
            $book_key     = $_SESSION["book_key"    ] = $_POST["book_key"    ]; unset($_POST["book_key"    ]);
            $url          = $_SESSION["url"         ] = $_POST["url"         ]; unset($_POST["url"         ]);
            $book_note    = $_SESSION["book_note"   ] = $_POST["book_note"   ]; unset($_POST["book_note"   ]);

            $i = 0;
        ?>
            <h4 class = "center" style = "margin-top: -20px;">Review the following input of type 'manual'       </h4>
            <br>
            <table width = '25%'>
        <?php
            for ($i = 0; $i < $nr_of_authors; $i++) {
                $i1 = $i+1;
                echo "<tr><td><b>Author  $i1:</b></td>
                      <td>{$authors[$i][0]}</td>
                      <td>{$authors[$i][1]}</td></tr>\n
                ";
            }
        ?>
            </table>
            <br><br>

            <label>Organization:</label>&nbsp; <?=$organization?>
            <br><br>

            <label>Year:</label>&nbsp; <?=$year?>
            <br><br>

            <label>Key:</label>&nbsp; <?=$book_key?>
            <br><br>

            <label>URL:</label>&nbsp; <?=$url?>
            <br><br>

            <label>Note:</label><br>
            <textarea class ="book_textAreaInp" readonly rows = "5" style = "background-color: lightgrey;"><?=$book_note?></textarea>
            <br>
            <button onclick = "window.location.href = '<?=$self?>?r=back&type=manual'"
                    class = "backBtn">
                Back
            </button>

            <form action = "<?= $self ?>" method = "POST">
                <button class = "goBtn"  name = "type" value = "store_manual" type = "submit">
                    Store
                </button>
            </form>
            <br>
        </div>
    <?php       //>
        exit();
    }

/***************  END type manual ***********************************************/

    function mastersthesis_form($self) {
   /*
    *   Input form for  publication type "mastersthesis"
    *   Author(s), school (=organization), title, year, url, project.
    */

        $first_author = array();
        if ( !key_exists('authors', $_SESSION) ) {
           $authors = array();
           $authors[0][0] = "";
           $authors[0][1] = "";
           $_SESSION['authors'] = $authors;
        }
        else {
           $authors = $_SESSION['authors'];
        }
        $nr_of_authors = count($authors);

        $first_author[0] = $authors[0][0];
        $first_author[1] = $authors[0][1];
        if ( !key_exists('organization', $_SESSION) ) {
            $_SESSION['organization'] = "" ;
        }

        $organization = $_SESSION['organization'];

        if ( !key_exists('title', $_SESSION) ) {
            $_SESSION['title'] = "" ;
        }
        $title = $_SESSION['title'];

        if ( !key_exists('year', $_SESSION) ) {
            $_SESSION['year'] = 1;
        }
        $year = $_SESSION['year'];

        if ( !key_exists('url', $_SESSION) ) {
            $_SESSION['url'] = "" ;
        }
        $url = $_SESSION['url'];

        if ( !key_exists('project', $_SESSION) ) {
            $_SESSION['project'] = "" ;
        }
        $project = $_SESSION['project'];

        if ( !key_exists('book_note', $_SESSION) ) {
            $_SESSION['book_note'] = "" ;
        }
        $book_note = trim($_SESSION['book_note']);
    ?>
        <div class = "menu">
            <h4>Enter properties of publication type 'mastersthesis'</h4>

            <form  id = "formMastersthesis" action = "<?= $self ?>" method = "POST">

                <label>Author</label><br>
                <label>First name:</label>&nbsp;
                <input name = 'author10' value = "<?=$first_author[0]?>" size = "19" maxlength = "50"  />
                &nbsp;&nbsp; &nbsp;&nbsp;
                <label>Last name:</label>
                <input name = 'author11' value = "<?=$first_author[1]?>" size = "34" maxlength = "100"/>
                <br><br><br>

                <label>School:</label>&nbsp;
                <input name = "organization" value = "<?=$organization?>" size = "60" maxlength = "255" >
                <br><br>

                <label>Title:</label>&nbsp;
                <input name = "title" value = "<?=$title?>" size = "80" maxlength = "512" >
                <br><br>

                <label>Year:</label>&nbsp;
                <input name = "year" value = "<?=$year?>" size =  "4" maxlength =   "4" class = "year" >
                <br><br>

                <label>URL:</label>&nbsp;
                <input name = "url" value = "<?=$url?>"  size = "60" maxlength = "255" value = ""/>
                    &nbsp;&nbsp; (Web address)
                <br><br>

                <label>Project:</label>&nbsp;
                <input name = "project" value = "<?=$project?>"  size = "25" maxlength = "70" value = ""/>
                <br><br>

                <button class = "goBtn"  name = "type" value = "review_mastersthesis" type = "submit">
                    Review input
                </button>
            </form>

            <div>
                <button onclick = "window.location.href = '<?=$self?>?q=restart'"
                        class = "restartBtn">
                    Restart
                </button>
            </div>

        </div>
    <?php    //>
        exit();
    }

    function review_mastersthesis($self) {
   /*
    *   Updates entries $_SESSION['author'+`counter`] with the corresponding
    *   values in cleaned values $_POST.
    *
    *   Other input variables are cleaned and set.
    *
    */

        global $filenames;
        require_once $filenames['clean2'];
        require_once $filenames['check2'];
        require      $filenames['maxlength2'];

        //Check if caller is allowed
        $allowed_callers = array('PWRef_bookinp.php' );
        check_callers($allowed_callers);

        echo
       "<div class = 'menu'>";

            //  Clean up $_SESSION (remove author keys):
            foreach ($_SESSION as $counter => $val) {
                if ( preg_match('/^author/', $counter) ) {
                    unset($_SESSION[$counter]);
                }
            }

            $name    = array();
            $authors = array();
            // Loop over first names present in $_POST:
            $nr_of_authors = 1;
            while ( key_exists("author".$nr_of_authors."0", $_POST) ) {
                $index0 = "author".$nr_of_authors."0";  //first name
                $index1 = "author".$nr_of_authors."1";  //last name

                if ( !key_exists($index1, $_POST) ) {
                    die("$index1 does not exist in function review_book");
                }

                $name[0] = substr( clean_html($_POST[$index0]), 0, $maxlength["first_name"]);
                $name[1] = substr( clean_html($_POST[$index1]), 0, $maxlength["last_name"]);
                unset($_POST[$index0]);
                unset($_POST[$index1]);
                $authors[$nr_of_authors - 1][0] = $name[0];
                $authors[$nr_of_authors - 1][1] = $name[1];
                $nr_of_authors++;
            }
            $nr_of_authors--;
            if ($nr_of_authors > $max_authors) {
                die("<b>Error:</b> The number of authors is: {$nr_of_authors}.
                    This more than the allowed maximum {$max_authors}. Execution stops. <br>\n");
            }
            if ( $nr_of_authors > 0 ) $_SESSION['authors'] = $authors;

            // Now the other input:
            $_POST["organization"] = substr( clean_html($_POST["organization"]), 0, $maxlength["organization"]);
            $_POST["title"       ] = substr( clean_html($_POST["title"       ]), 0, $maxlength["title"       ]);
            $_POST["year"        ] = substr( clean_html($_POST["year"        ]), 0, $maxlength["year"        ]);
            $_POST["url"         ] = substr( clean_html($_POST["url"         ]), 0, $maxlength["url"         ]);
            $_POST["project"     ] = substr( clean_html($_POST["project"     ]), 0, $maxlength["project"     ]);

            $organization = $_SESSION["organization"] = $_POST["organization"]; unset($_POST["organization"]);
            $title        = $_SESSION["title"]        = $_POST["title"]       ; unset($_POST["title"]       );
            $year         = $_SESSION["year"]         = $_POST["year"]        ; unset($_POST["year"]        );
            $url          = $_SESSION["url"]          = $_POST["url"]         ; unset($_POST["url"]         );
            $project      = $_SESSION["project"]      = $_POST["project"]     ; unset($_POST["project"]     );

        ?>
            <h4 class = "center" style = "margin-top: -20px;">Review the following input of type 'mastersthesis'     </h4>
            <br>
            <table width = '25%'>
                <tr><td><b>Author:</b></td>
                    <td><?=$authors[0][0]?></td>
                    <td><?=$authors[0][1]?></td></tr>
                </tr>
            </table>
            <br>

            <label>School:</label>&nbsp; <?=$organization?>
            <br><br>

            <label>Title:</label>&nbsp; <?=$title?>
            <br><br>

            <label>Year:</label>&nbsp; <?=$year?>
            <br><br>

            <label>URL:</label>&nbsp; <?=$url?>
            <br><br>

            <label>Project:</label>&nbsp; <?=$project?>
            <br><br>

            <button onclick = "window.location.href = '<?=$self?>?r=back&type=mastersthesis'"
                    class = "backBtn">
                Back
            </button>

            <form action = "<?= $self ?>" method = "POST">
                <button class = "goBtn" name = "type" value = "store_mastersthesis" type = "submit">
                    Store
                </button>
            </form>
            <br>
        </div>
    <?php       //>
        exit();
    }

/***************  END type mastersthesis ***********************************************/

    function store_publication($self, $type) {
    /*
     *  Copy relevant entries of $_SESSION to object of class `Book`.
     *  Store object in database.
     */
        global $filenames;
        require_once $filenames['Book_class2'];

        $publication  = new Book();
        $publication -> type = $type;
        //echo  $publication -> type . "<br>\n";

        //  Copy $_SESSION to object $publication (instance of class Book) ...
        $keys  = array_keys($_SESSION);
        foreach ($keys as $k => $val) {
            $publication -> $keys[$k] = $_SESSION[$keys[$k]];
        }
        //  ... while discarding the following entries:
        unset($publication -> credentials);
        unset($publication -> count);

        //  Actual storing:
        $publication -> Store();

    ?>

        <div class = "menu">
            <b>Reference to publication of type <?=$type?> is stored </b>
            <br>
            <button onclick = "window.location.href = '<?=$self?>?q=restart'"
                    class = "restartBtn">
                Restart
            </button>
        </div>
    <?php     //>
        exit();
    }

    ?>

</body>
</html>
