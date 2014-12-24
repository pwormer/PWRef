<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>PWRef closeDB </title>
    <!--
    <base href  = "http://localhost" />
    -->
    <base href  = "http://www.theochem.ru.nl/~pwormer" />
    <style>
        .center {
            text-align: center;
        }
        .margin150 {
            margin-left: 150px;
        }
    </style>
</head>
<body>
    <a href = "<?=$_SERVER['PHP_SELF']?>?mode=logout">Close database</a>
<?php   //>
    session_start();
    $database = 'pwref';
    //$host     = 'p:localhost';
    $host      = "p:mysql-pwref.science.ru.nl";
    $pubDB    =  $_SESSION['database_object'];

    if (key_exists('mode', $_GET) && $_GET['mode'] === "logout") {
        $pubDB = new mysqli();
        $pubDB->close();
        $_GET     = array();
        $_POST    = array();
        //$_SESSION = array();
        //session_destroy();
        exit;
    }
?>
</body>
</html>
