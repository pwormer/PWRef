<?php       //>
   /*
    *  Search database for authors of whom last_name starts with one more
    *  characters passed in query string $_GET["q"].
    *
    *  Echo:
    *
    *      last_name, first_name
    *
    *  in alphabetic order on last_name and contained in <ul> ... </ul>
    */

    require_once "../../Setup.php";
    Setup(1);      // Open database, set table and column names
    require_once $filenames['clean2'];
    global $pubDB;

    $q      = $_GET["q"];                                         //  From query part of URL.
    $q      = htmlentities(clean_html($q), ENT_COMPAT,  'UTF-8'); //  Stuff is stored in database in purified,
    $q      = $pubDB->real_escape_string($q);                     //  escaped, and escaped form.

    $sql    = "SELECT DISTINCT author_first_name, author_last_name
               FROM authors
               WHERE author_last_name LIKE '$q%'
               ORDER BY author_last_name";

    $result =  $pubDB->query($sql) or die($pubDB->error);

    if ($result->num_rows === 0) {
        return;
    }

    $hint   = "";
    while  ( $row = $result->fetch_row() ) {
        //$row[0] = clean_html($row[0]);   // If database
        //$row[1] = clean_html($row[1]);   //     is compromised
        $hint .= "<li style='color: grey'>" . $row[1] . ", " . $row[0] . "</li>\n";
    }

    // Output the response
    echo("<br /><ul style='list-style-type: none; font-style: normal; padding-left: 0px; background-color: white;' >");
    echo $hint;
    echo("</ul>");
?>
