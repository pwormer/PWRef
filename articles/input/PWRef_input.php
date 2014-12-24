<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>PWRef article input preparation </title>
    <meta http-equiv = "content-type" content = "text/html; charset=UTF-8" />
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"
                type = "text/javascript"></script>
    <!--
    <base href  = "http://localhost/PWRef/articles/" />
     -->
    <base href  = "http://www.theochem.ru.nl/~pwormer/PWRef/articles/" />
    <script src = "input/input.js" type = "text/javascript"></script>
    <link  href = "../PWRef.css" rel = "stylesheet" type = "text/css">

</head>

<body>
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include "../../topmenu.html";
    $_SESSION['self'] = $_SERVER['PHP_SELF'];
?>

<style>
    .headline #input:hover {
        border-bottom: solid white  2px;
        background-color: gray;
    }
</style>
<style>
    #artinp_header {
        margin-top:  30px;
        margin-left: 50px;
    }
</style>

<div class = "title">
    <span style = "margin-left: 30px;">
        Input for a journal article (not for books or other publications).
    </span>
</div>
<br>
<fieldset style = "margin-top: 10px;">
    <div id = "input_getTextArea">
        <span class = "input_hint">
            Paste&ndash;or type&ndash;authors into the following  <i>author scratchpad</i>
            (last names required):
        </span>
        <div id = "input_help" >
            <img src = "../shared/info.jpg" class = "info" />
            <div  id = "input_subhelp"  class = "subhelp" >
                <ul>
                    <li>Enter a  "raw" list of authors into the <em>author scratchpad</em>.
                        When you know the DOI (digital object identifier), you may start by
                        filling out the DOI field, open the digital object and copy + paste the authors from
                        there.
                    </li>
                    <li>Different authors are separated by comma, "and", or "&amp;". </li>
                    <li>When the "Edit" button is hit, an <em>author list</em> is generated
                        from the author scratchpad in which:
                    <ul style = "list-style-type: square; padding-left: 15px;">
                        <li>Footnote marks and author separators are removed. </li>
                        <li>The strings: "Ph.D.,", "M.D.,", "M.Sc.,", "M.A.,", "M.Phil.,", "M.S.",
                            "B.S,", "B.Sc.,"  and "D.Phil."  are removed.  </li>
                        <li>Author names are split in first names/initials and last names. This is not
                            foolproof, fine tuning of the author list may be necessary. </li>
                    </ul>
                    <li>When the button "Review" is hit while the <em>author list</em> is not shown,
                        it is generated automatically. (This automatically
                        generated author list may be visible very briefly).
                </ul>
            </div>
        </div>

        <textarea id = "input_textAreaInp"  rows = "5">
        </textarea>
        <div      id = "input_textAreaHint" class = "input_hint">
            Hit Edit to generate an <i>author list</i> from the <i>author scratchpad</i>.
            The author list may be updated and will be stored in the database in the next step.
            <br>
            <button    id = "textAreaBtn" class = "goBtn" type = "button">
                Edit authors
            </button>
        </div>
        <br />
    </div>

    <!-- form has "position: relative" to define a frame for subhelp1 -->
    <form id = "input_inputAll"  action = "input/input.php" method = "POST" >
        <input id = "PWRef_input" type = "hidden" name = "PWRef_input" value = "Unchecked" />

        <!--  Div "id=authorsHolder"  serves as holder for all author div's; it must be child of form.
              This div will contain as many input fields as there are authors (2 fields/author).
              The fields are created and filled (from input in "id=input_texAreaInp") by input.js
        -->
        <div id = "authorsHolder">
        </div>

        <div  id = "input_editDiv" class = "input_hint" >
            <span  id = "authorsRedo" class = "input_hint">
                Inspect the author list for correct splitting in first and last names and other minor errors.
                Edit if  necessary.<br>
                <b>Note:</b>&nbsp;the author list is meant for "last minute edits" only.
                Hitting "Redo"    <i>scratches the author list</i>,
                but leaves the <i>author scratchpad intact</i>.  <br><br />
            </span>
            <button id = "authorsRedoBtn" class = "goBtn"  type = "button">
                Redo authors
            </button>

            <div id = "input_help1" >
                <img src = "../shared/info.jpg" class = "info" />
                <div id = "input_subhelp1" class ="subhelp" >
                    <ul style = "padding-left: 20px;">
                        <li>Fine tunings (such as incorrect splitting of first and last names)
                             can be made in the author list.
                        <li>Hitting "Redo" removes the author list and returns focus to the author scratchpad.
                        <li>For larger edits (such as removal or addition of authors)  hit "Redo" and
                             adapt the content of the author scratchpad. Hit then "Edit" again. <br />
                        <li> Repeat until the author list is correct.
                    </ul>
                </div>
            </div>

        </div>

        <p></p>

        <!-- Style must be in-line to serve as reference frame for #suggestions -->
        <div id = "input_getArticle" style = "position: relative; top: 0px; left: 0px;">
            <br />
            <label for = "Title"     >Title:&nbsp; &nbsp; &nbsp;    </label>
            <input id  = "Title"      name = "Title"   type = "text"   size = "80" maxlength = "512"/>
            <br /> <br />
            <label for = "Journal"  >Journal:&nbsp;    </label>
            <input id  = "Journal"    name = "Journal"  type = "text"  size = "50" maxlength = "70"/>
            &nbsp; &nbsp;&nbsp;
            <label for = "issn">ISSN:&nbsp;      </label>
            <input id  = "issn"  name = "issn" type = "text"  size = "9" maxlength = "9">
            <div id = "input_suggestions"></div>
            <br /> <br />
            <label for = "Volume"    >Volume:&nbsp;     </label>
            <input id  = "Volume"     name = "Volume"     size = "5"  maxlength = "15" />
            &nbsp; &nbsp;&nbsp;
            <label for = "begin_page">Pages:&nbsp;      </label>
            <input id  = "begin_page"  name = "begin_page"  size = "8"  maxlength = "10" />
            &thinsp;&ndash;&thinsp;
            <input id  = "end_page"    name = "end_page"    size = "6"  maxlength = "10" />
            &nbsp; &nbsp;&nbsp;
            &nbsp; &nbsp;&nbsp;
            <label for = "Year"      >Year:&nbsp;        </label>
            <input id  = "Year"       name = "Year"       size = "4"  maxlength = "4" />
            <br /><br />
            <label for = "Project"  >Project:&nbsp;    </label>
            <input id  = "Project"    name = "Project"    size = "40" maxlength = "70"/>
            <br /><br />
            <label for = "url"  >URL:&nbsp; &nbsp;   </label>
            <input id  = "url"    name = "url"    size = "45" maxlength = "255"/>
            <br /><br />
            <label for = "arXiv">arXiv:&nbsp;</label>
            <input id  = "arXiv"      name = "arXiv"      size = "12" maxlength = "12"/>
            &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
            <label for = "DOI">DOI:&nbsp;</label>
            <input id  = "DOI"         name = "DOI"       size = "36" maxlength = "50"/>
            <button  id = "openDOIBtn"   style = "color: blue;" class = "input_doiBtn" type = "button">
                Open DOI in<br />new browser tab
            </button>
            <br /><br />
        </div>

        <br />
        <button class = "goBtn">
                Review
        </button>
    </form>

    <button  id = "input_clearAllBtn"  class = "restartBtn"  type = "button">
        Restart
    </button>

</fieldset>

</body>
</html>

<!--
External references:
    (68 )   <form     id = "input_inputAll"   > refers to "input/input.php" (method= "POST");
                                                           onsubmit sets sessionStorage
Through input.js (Ajax):
    (82 )   <button  id = "authorsRedoBtn"    > closes author list
    (113)   <input   id = "Journal"           > refers to suggest_journals.php
    (138)   <button  id = "openDOIBtn"        > opens  DOI
    (158)   <button  id = "input_clearAllBtn" > self-reference    [location.reload()]
-->

