<?php                //>
/*
 *  Called by input.js, which is called by "PWRef_input.php".
 *
 *  Server script that inspects database for suggestion of journal.
 *  Echoes output to "PWRef_input.php"
 */

    require_once "../../Setup.php";
    Setup(1);
    global $filenames;
    require_once $filenames['clean2'];

    $q      = $_GET["q"];                                         //  From query part of URL.
    $q      = htmlentities(clean_html($q), ENT_COMPAT,  'UTF-8'); //  Stuff is stored in purified, encoded,
    $q      = $pubDB->real_escape_string($q);                     //              and escaped form.

    $sql    =  "SELECT      $tab_journals_name
                    FROM    $tab_journals
                    WHERE   $tab_journals_name
                    LIKE   '$q%'
               ";
    $result =  $pubDB->query($sql) or die($pubDB->error);

    if ($result->num_rows === 0) return;

    $hint = "";
    while  ( $row = $result->fetch_row() ) {
        $hint .= "<li style='color: grey'>" . clean_html($row[0]) . "</li>\n";
    }

    // Output the response
    echo("<br /><ul style='list-style-type: none; font-style: normal;  background-color: white;' >");
    echo $hint;
    echo("</ul>");
?>
