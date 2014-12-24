<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv = "content-type" content = "text/html; charset=UTF-8" />
    <title> PWRef article input review </title>
<!--
    <base   href = "http://localhost/PWRef/" />
-->
    <base   href = "http://www.theochem.ru.nl/~pwormer/PWRef/" />
    <link   href = "PWRef.css" rel= "stylesheet" type = "text/css">
</head>
<body>
<?php
    session_start();
    include "../../topmenu.html";
?>

<style>
    .headline #input {
        border-bottom: solid white  2px;
        background-color: gray;
    }
</style>
    <div class = "menu">
<?php    //>
    require_once "../../Setup.php";
    Setup(1);         // Open database; set globals
    global $filenames;

    global $tab_arts;

    $art_add = $filenames['art_add2'];
    if ( file_exists($art_add) ) {
        require_once $art_add;
    }
    else {
        echo "File not found: {$art_add}. Execution stops/ <br>\n";
        exit();
    }

    // Check if caller is allowed
    $checkfile = $filenames['check2'];
    if ( file_exists($checkfile) ) {
        require_once $checkfile;
    }
    else {
        echo "File not found: {$checkfile}. Execution stops/ <br>\n";
        exit();
    }

    $allowed_callers = array('PWRef_input.php', 'input.php');
    check_callers($allowed_callers);

    //  Clean $_POST (remove most HTML tags) containing user input:
    $cleanfile = $filenames['clean2'];
    if ( file_exists($cleanfile) ) {
        require_once $cleanfile;
    }
    else {
        echo "File not found: {$cleanfile}. Execution stops/ <br>\n";
        exit();
    }

    foreach ($_POST as $key => $val) {
        //echo $key . " => " . $val . "<br>";
        $_POST[$key] = clean_html($_POST[$key]);
    }

    if ( $_POST["PWRef_input"] === "Unchecked" ) {  // true if we get here by <form> submissal in PWRef_input

        // Set $authors[nr]['first_name', 'last_name']:  (nr = 0, 1, ...)
        $authors = array();
        foreach ($_POST as $key => $value) {
            if (substr($key, 0, 10) == "firstName_") {
                $author_nr = substr($key, 10);
                $authors[$author_nr][0] = $value;
            }
            if (substr($key, 0, 9) == "lastName_") {
                $author_nr = substr($key, 9);
                $authors[$author_nr][1] = $value;
            }
        };

        //  Set remaining input and save input for later invocations
        $_SESSION['Authors']   = $authors;
        $title      = $_SESSION['Title']      = $_POST['Title'];
        $journal    = $_SESSION['Journal']    = $_POST['Journal'];
        $issn       = $_SESSION['issn']       = $_POST['issn'];
        $volume     = $_SESSION['Volume']     = $_POST['Volume'];
        $begin_page = $_SESSION['begin_page'] = $_POST['begin_page'];
        $end_page   = $_SESSION['end_page']   = $_POST['end_page'];
        $year       = $_SESSION['Year']       = $_POST['Year'];
        $project    = $_SESSION['Project']    = $_POST['Project'];
        $url        = $_SESSION['url']        = $_POST['url'];
        $arXiv      = $_SESSION['arXiv']      = $_POST['arXiv'];
        $doi        = $_SESSION['DOI']        = $_POST['DOI'];

        //  Replace white spaces in $title  by blanks
        $title = $_SESSION['Title'] = preg_replace("/\s+/", " ", $title);

        if  ( !empty($authors[0][0]) or !empty($authors[0][1]) ) {
            $nr_authors = count($authors);
        }
        else {
            $nr_authors = 0;
            echo   "<div style = 'margin-left: 50px;'>
                        <b>No author specified!</b><br><br>\n
                        You may go back to previous page by hitting:
                        <br>
                        <a href =  {$_SESSION['self']}>
                            <button class = 'backBtn' >
                                Back
                            </button>
                        </a>
                        <br><br>
                    </div>
                   ";
            exit();
        };
        echo("<b>$nr_authors  author(s):</b><br>\n");

        //  List authors in a table of 4 columns. All input is cleaned, it is safe
        //  to output it (clean_html also decodes, so it is in pretty form):
        if ($nr_authors === 1) $width = 50;
        if ($nr_authors === 2) $width = 50;
        if ($nr_authors === 3) $width = 75;
        if ($nr_authors  >  3) $width = 100;

        $authors_out       = "<table width='{$width}%'>\n<tr>";
        for ($i=0; $i < $nr_authors; $i++) {
            $authors_out  .=
            "<td>" . $authors[$i][1] . ", " . $authors[$i][0] . "</td>";
            if (($i+1)%4 === 0)
            $authors_out  .= "</tr>\n<tr>";
        }
        $authors_out      .= "\n</table>\n";
        echo($authors_out);
        echo "<br>";

        //  List remaining input
        echo
           "<table width = '80%'>". "<tr><td width='12%'>\n" .
               "        <b> Title:      </b> </td><td>".$title     ."</td></tr>\n".
               "<tr><td><b> Journal:    </b> </td><td>".$journal   ."</td></tr>\n".
               "<tr><td><b> ISSN:       </b> </td><td>".$issn      ."</td></tr>\n".
               "<tr><td><b> Volume:     </b> </td><td>".$volume    ."</td></tr>\n".
               "<tr><td><b> Begin page: </b> </td><td>".$begin_page."</td></tr>\n".
               "<tr><td><b> End page:   </b> </td><td>".$end_page  ."</td></tr>\n".
               "<tr><td><b> Year:       </b> </td><td>".$year      ."</td></tr>\n".
               "<tr><td><b> Project:    </b> </td><td>".$project   ."</td></tr>\n".
               "<tr><td><b> URL:        </b> </td><td>".$url       ."</td></tr>\n".
               "<tr><td><b> arXiv:      </b> </td><td>".$arXiv     ."</td></tr>\n".
               "<tr><td><b> DOI:        </b> </td><td>".$doi       ."</td></tr>\n".
           "</table>\n";
?>
<br><hr><br>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    When the input above is <i>correct</i>, hit the green button to store the input in the database:
        <br />
        <button type="submit" name = "PWRef_input" value = "STORE" class = "goBtn" >
             Store
        </button>
</form>
<br>
When the input above is <i>incorrect</i>, hit the red button to go back to the input page
and correct the values.
<br>
Regarding the correction of <b>author names</b>:&nbsp;
you may either edit the <i>author scratchpad</i> or the <i>author list</i>.
(Edits in the <i>author scratchpad</i> are persistent; edits in the <i>author list</i>
 are volatile).
<br><br>
<a href = "<?php echo $_SERVER['HTTP_REFERER'] ?>">
        <button class = "backBtn" >
            Back
        </button>
</a>
<?php     //>
    }   // End of:  ($_POST["PWRef_input"] === "Unchecked")

    elseif ($_POST["PWRef_input"] === "STORE") {  // true if we get here by <form> submissal in this script
        if (count($_SESSION) === 0) die("<b>Nothing to store in database</b>.<br>
            Probable cause: refreshing of web page after succesful storing in database.");

        //  Retrieve saved variables.
        //  Cleaning was done  above on $_POST entries.
        //  Encoding will be done later in Add_article.

        $authors    = $_SESSION['Authors'];      // An array
        $title      = $_SESSION['Title'];
        $journal    = $_SESSION['Journal'];
        $issn       = $_SESSION['issn'];
        $volume     = $_SESSION['Volume'];
        $begin_page = $_SESSION['begin_page'];
        $end_page   = $_SESSION['end_page'];
        $year       = $_SESSION['Year'];
        $project    = $_SESSION['Project'];
        $url        = $_SESSION['url'];
        $arXiv      = $_SESSION['arXiv'];
        $doi        = $_SESSION['DOI'];

        echo " Will store in database ... <br>\n";
        echo "</div>";
        $resultOK   =   Add_article($authors, $title, $journal, $issn, $volume, $begin_page, $end_page,
                                    $year, $project, $url, $arXiv, $doi);
        echo "<div class = 'menu'>";
        if ($resultOK) {
            unset( $authors, $title, $journal, $issn, $volume, $begin_page, $end_page,
                   $year, $project, $url, $arXiv, $doi);
            unset( $_POST['PWRef_input']);
            unset( $_SERVER['HTTP_REFERER']);
            clear_JSsession();
        ?>

            Stored successfully in database
            <br>

            <form action = "<?=$_SESSION['self']?>" method = "POST">
                <button class = 'restartBtn'>
                    Restart
                </button>
            </form>
        <?php
        }
        else {
            echo "<br><b>Unexpected error while storing in database</b><br>\n";
        }
    }
    else {
        echo "<b>Error:</b>  We should have never gotten here: <br> ";
        echo  var_dump($_POST);
    }

    echo "</div>";
    function clear_JSsession() {
    /* Clear JavaScript session storage */
?>
    <script>
        sessionStorage.clear();
    </script>
<?php
    }
?>
</div>
</body>
</html>
<!--
External references:
      <a href = $_SERVER['HTTP_REFERER']>  No author specified, back to PWRef_input.php
      <a href = $_SERVER['HTTP_REFERER']>  Back to PWRef_input.php for more editing
      <form method="POST" action=$_SERVER['PHP_SELF']> Self_reference for storing
-->
