<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>PWRef database search </title>
    <meta   http-equiv = "content-type" content = "text/html; charset=UTF-8" />
    <script src  = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src  = "search.js" type = "text/javascript"></script>
    <link   href = "../../PWRef.css" rel = "stylesheet" type = "text/css" />
<!--
    Warning: <base> + fragment identifier(#)  gives problems.

    External references.
        Hitting:
            <button id = "SubmitA" class = "goBtn" type = "submit" >
            <button id = "SubmitB" class = "goBtn" type = "submit" >
            <button id = "SubmitC" class = "goBtn" type = "submit" >
        calls search.php (through jQuery/Ajax load, method GET).
-->
</head>

<body>
<?php
    session_start();
    global $filenames;
    include "../../topmenu.html";
    require_once "../../Setup.php";
    Setup();      // Open database, set table and column names
?>

<style>
    .headline #query:hover {
        border-bottom: solid white  2px;
        background-color: gray;
    }
</style>

<style>
    #formA div ul {
        float: left;
        margin: -5px 5px 0px 0px;
        font-size: 10pt;
        font-weight: bold;
        overflow: visible;
    }
    #formA input {
        float: left;
    }
</style>

<div class = "title">
    <span style = "padding-left: 10px;">
        Search for articles
    </span>
</div>

<div id = "search_menu" style = "width: auto;  margin: 5px 0px 5px 200px;">
    <div style = "padding: 10px 100px 0px 10px;" >
        <i>Choose any of the following possible queries:</i>
    </div>

    <div id = "search_info" style = "width: auto;">
        <img src = "../../shared/info.jpg" class = "info"
            style = "float: right; padding: 0px; margin-right: 0px;" />
        <div id = "tooltip"  class = "subhelp">
            <ul>
            <li>Choose "Author(s)" if you want:</li>
                <ul style = "padding-left: 20px">
                    <li>All articles of author <b>1</b> between certain years.</li>
                    &nbsp; plus
                    <li>All articles of author <b>2</b> between certain years.</li>
                    &nbsp; plus
                    <li>All articles of author <b>3</b>, etc.</li>
                </ul>
            <li>
                [This is a database "OR" query: duplicates (cases of coauthoring) are removed].
            <li>    Choose "Coauthors" if you want all articles that contain
                    two or more specified authors among the authors of the articles.
                    [This is a database "AND" query].
            <li>    Choose "Time interval" if you want <em>all</em> articles of <em>all</em> authors
                    in a given time interval.  Empty fields gives all of history (the whole
                    database).
            </li>
            <li>    Choose the format of the results of the query. Results are shown below the bottom line.
            </ul>
        </div>
    </div>

    <hr style = "width: auto;">

    <ul id = "search_methods" style = "margin-top: 10px;">
        <li> <a href = "#MethodA">&nbsp;&nbsp;&nbsp;&nbsp;Author(s)</a></li>
        <li> <a href = "#MethodB">Coauthors</a></li>
        <li> <a href = "#MethodC">Time interval</a></li>
        <li> <a href = "#Clear">Clear&nbsp;input</a></li>         <!-- MUST BE LAST LIST ITEM -->
    </ul>

</div>

<br>

<div id = "search_content" >
    <div id = "MethodA" style = "width: auto;  border: solid lightblue 1px; padding: 10px;">

        <div id = "search_info1">
            <div style = "height: 25px; width: 40px; float: right;">
                <img src = "../../shared/info.jpg" class = "info"  style = "margin-right: 0px" />
            </div>
            <div id = "tooltip1" class = "subhelp">
                <h4 style = "margin-bottom: -10px;">Input</h4>
                <ul style = "list-style-type: disc;">
                    <li>For a <em>new author input line</em>: hit Enter in lowest non-empty author field. </li>
                    <li>To <em>terminate author input</em>:  hit Enter in empty author input line. </li>
                    <li>To move between the input fields: use Mouse or Tab/Backward-Tab . </li>
                    <li>An empty first year field gives all references beginning from the year one.</li>
                    <li>An empty second year field gives all references up to 10 years from now. </li>
                    <li>Two empty year fields give <em>all</em> references in the <em>whole</em> database.</li>
                </ul>
                <h4 style = "margin-bottom: 0px;">Author suggestion</h4>
                As soon as you enter one or more characters in the <em>Last name field</em> a list of
                suggested authors pops up on the right of the screen. By clicking an author in this list the
                <em>name input fields</em> are filled with the name of chosen author.
                <h4 style = "margin-bottom: 0px;">Notes</h4>
                Pick an author <em>before</em> opening another author input line.
                Once an author has been picked, suggestions end. Hit "Clear input" to reenable suggestions.
                <br>
                <br>
            </div>
        </div>
        <div id = "formA" style ="clear: both;">
            <div id = "templateA1">
                <span style = "text-align: left;"><b>Author 1:</b></span>
                <br><br>
                <ul><li>First<li>name</ul>
                <input  name = "FirstA_1"  value = "" type="text" size = "15" maxlength =  "50" />
                 &nbsp;&nbsp;
                <ul><li>Last*<li>name</ul>
                <input  name = "LastA_1"   value = "" type="text" size = "25" maxlength = "100" />
                 &nbsp;&nbsp;
                <ul><li>Begin<li>year</ul>
                <input  name = "BeginA_1"  value = "" type="text" size =  "4" maxlength =   "4" />
                 &nbsp;&nbsp;
                 <ul><li>End<li>year</ul>
                <input  name = "EndA_1"    value = "" type="text" size =  "4" maxlength =   "4" />
                <br>
            </div>
        </div>  <!-- formA -->

        <input name = "Method"  value = "A"  type="hidden"/>
        <br>
        <div style = "clear: both"> <b>*Required field</b></div>

        <div class = "format">
            <table  class = "radio_table"  frame = "void" >
                <tr class = "caption"><th rowspan ="6">Choose format of query results:</th></tr>
                <tr><td> Pretty printed output:                </td> <td>  <input  type="radio" name="formatA" value="pretty" checked> </td></tr>
                <tr><td> HTML output:                          </td> <td>  <input  type="radio" name="formatA" value="html"            </td></tr>
                <tr><td> Use output in php input script:       </td> <td>  <input  type="radio" name="formatA" value="add">            </td></tr>
                <tr><td> Input for PWRef:                      </td> <td>  <input  type="radio" name="formatA" value="input">          </td></tr>
                <tr><td> Output as bibTeX:                     </td> <td>  <input  type="radio" name="formatA" value="bibTeX">         </td></tr>
            </table>
        </div>
        <br>
        <button id = "SubmitA" class = "goBtn" type = "button" >
            Search
        </button>
        <div id = "suggestionBoxA" style = "position: relative; top: -340px; left: 445px; z-index: 10;
                                            font-size: 10pt;">
        </div>

    </div>  <!-- MethodA -->

    <div id = "MethodB" style = "width: auto;  border: solid lightblue 1px; padding: 10px; ">
        <div id = "search_info2">
            <div style = "height: 25px; width: 40px; float: right;">
                <img src = "../../shared/info.jpg" class = "info"  style = "margin-right: 0px" />
            </div>
            <div id = "tooltip2" class = "subhelp">
                <h4 style = "margin-bottom: -10px;">Input</h4>
                <ul style = "list-style-type: disc;">
                    <li>For a <em>new author input line</em>: hit Enter in lowest non-empty author field. </li>
                    <li>To <em>terminate author input</em>:  hit Enter in empty author input line. </li>
                    <li>Input co-authors and (optionally) years to be searched. </li>
                    <li>To move between the input fields: use Mouse or Tab/Backward-Tab . </li>
                    <li>An empty first year field gives all references beginning from the year one.</li>
                    <li>An empty second year field gives all references up to 10 years from now. </li>
                    <li>Two empty year fields give all references in the whole database.</li>
                </ul>
                <h4 style = "margin-bottom: 0px;">Author suggestion</h4>
                As soon as you enter one or more characters in the <em>Last name field</em> a list of
                suggested authors pops up on the right of the screen. By clicking an author in this list the
                <em>name input fields</em> are filled with the name of chosen author.
                <h4 style = "margin-bottom: 0px;">Note</h4>
                Pick an author <em>before</em> opening another author input line.
                <br>
                <br>
            </div>
        </div>
        <br> <br>
        <div id = "formB" style ="clear: both;">
            <div id = "templateB1">
                <span><b>Coauthor 1:</b></span><br><br>
                <label style = "margin-left: 20px">First name:&nbsp;</label>
                <input  name = "FirstB_1"  value = "" type="text" size = "15"  maxlength =  "50"  />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>Last name: *&nbsp;</label>
                <input  name = "LastB_1"   value = "" type="text" size = "25"  maxlength = "100" />
                <br><br>
            </div>
            <br>
            <label>* Required field</label>
                <br><br>
                <div style = "margin-left: 150px;">
                    <label style = "margin-left: 10px">Begin year:&nbsp;</label>
                    <input name = "BeginB" type="text" size = "4"  maxlength = "4"/>
                    &nbsp;&nbsp;
                    <label>End year:&nbsp;</label>
                    <input name = "EndB"   type="text" size = "4"  maxlength = "4"/>
                </div>
                <br>
        </div>  <!-- formB -->
        <input name = "Method"  value = "B"  type="hidden" />
        <div class = "format">
            <table  class = "radio_table"  frame = "void" >
                <tr class = "caption"><th rowspan ="6">Choose format of query results:</th></tr>
                <tr><td> Pretty printed output:                </td> <td>  <input  type="radio" name="formatB" value="pretty"  checked> </td></tr>
                <tr><td> HTML output:                          </td> <td>  <input  type="radio" name="formatB" value="html"             </td></tr>
                <tr><td> Use output in php input script:       </td> <td>  <input  type="radio" name="formatB" value="add">             </td></tr>
                <tr><td> Input for PWRef:                      </td> <td>  <input  type="radio" name="formatB" value="input">           </td></tr>
                <tr><td> Output as bibTeX:                     </td> <td>  <input  type="radio" name="formatB" value="bibTeX">          </td></tr>
            </table>
        </div>
        <br>
        <button id = "SubmitB" class = "goBtn" type = "submit" >
            Search
        </button>
        <div id = "suggestionBoxB" style = "position: relative; top: -400px; left: 445px; z-index: 10;
                                            font-size: 10pt;">
        </div>
    </div>  <!-- MethodB -->

    <div id = "MethodC" style = "width: auto;  border: solid lightblue 1px; padding: 10px; ">
        <div id = "search_info3">
            <img src = "../../shared/info.jpg" class = "info" />
            <div id = "tooltip3" class = "subhelp">
                <ul>
                    <li>Input (type or paste)  years to be searched. </li>
                    <li>An empty second field gives all references up to 10 years from now. </li>
                    <li>An empty first field gives all references beginning from the year one.</li>
                    <li>Two empty year fields give the whole database.</li>
                </ul>
            </div>
        </div>
        <br><br>
        <div id = "formC" style ="clear: both;">
            <br>
            <label style = "margin-left: 175px">Begin year:&nbsp;</label>
            <input name = "BeginC_1" type="text" size = "4" maxlength = "4" />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>End year:&nbsp;</label>
            <input name = "EndC_1"   type="text" size = "4" maxlength = "4" />
        </div>  <!-- formC -->
        <input name = "Method"  value = "C"  type="hidden"  />
        <div class = "format">
            <table  class = "radio_table"  frame = "void" >
                <tr class = "caption"><th rowspan ="6">Choose format of query results:</th></tr>
                <tr><td> Pretty printed output:                </td> <td>  <input  type="radio" name="formatC" value="pretty"  checked> </td></tr>
                <tr><td> HTML output:                          </td> <td>  <input  type="radio" name="formatC" value="html"             </td></tr>
                <tr><td> Use output in php input script:       </td> <td>  <input  type="radio" name="formatC" value="add">             </td></tr>
                <tr><td> Input for PWRef:                      </td> <td>  <input  type="radio" name="formatC" value="input">           </td></tr>
                <tr><td> Output as bibTeX:                     </td> <td>  <input  type="radio" name="formatC" value="bibTeX">          </td></tr>
            </table>
        </div>
        <br>
        <button id = "SubmitC" class = "goBtn" type = "submit" >
            Search
        </button>
    </div>
    <div id = "Clear">
    </div>
</div>    <!-- search_content -->

<div id = "outDiv" class = "bottom" style="margin-top: 0px; clear: both;">
    <hr style = "margin-left: -50px;">
</div>

</body>
</html>
