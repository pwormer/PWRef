<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>PWRef Logon</title>
    <meta http-equiv = "content-type" content = "text/html; charset = UTF-8" />
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link  href = "../PWRef.css" rel = "stylesheet" type = "text/css">
</head>

<body>
<style>
    .headline #home:hover {
        border-bottom: solid white  2px;
        background-color: gray;
   }
    .center {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }
    .margin150 {
        margin-left: 150px;
        margin-top: 0px;
    }
</style>
<?php           // >
    session_start();
    include "../topmenu.html";
    /*
     * set $_SESSION['credentials'] = $creds
     * $creds = array('host'     => $host,
     *                'username' => $username,
     *                'password' => $password,
     *                'database' => $database
     *               )
     *
     */
    $clean = "../shared/clean_html.php";
    if (file_exists($clean)) {
        require_once "../shared/clean_html.php";
    }
    else {
        echo $clean . " does not exist, execution stops. <br>\n";
        exit();
    }

    $host      = "p:mysql-pwref.science.ru.nl";
    //$host      = "p:localhost";
    $database  = "pwref";
    //$database  = "prototype";      // existing directory in xampp\mysql\data

    if (key_exists('error', $_SESSION) ) {
        echo  "<h3 class = 'margin150' style = 'color: red;'>{$_SESSION['error']}</h3><br>\n";
    }

    $_SESSION['database_status'] = "closed";

    if (key_exists('submitted', $_POST) && $_POST['submitted'] === "True") {
        if (empty($_POST['username']) ) {
            $_SESSION['error'] = " Username not set, try again";
            echo "<script>location.assign(\"" . $_SERVER['PHP_SELF'] .  "\")</script>";
        }
        if (empty($_POST['password']) ) {
            $_SESSION['error'] = " Password not set, try again";
            echo "<script>location.assign(\"" . $_SERVER['PHP_SELF'] .  "\")</script>";
        }
        $password = clean_html(trim($_POST['password']));
        $username = clean_html($_POST['username']);
        $creds = array (
                    'host'     => $host,
                    'username' => $username,
                    'password' => $password,
                    'database' => $database
                );

        $_SESSION['credentials'] = $creds;

        /* Check if we can open   */
        require_once "../Setup.php";
        Setup();
        $_SESSION['database_status'] = 'open';
        echo "<div style = 'margin-top: 40px; margin-left: 50px;'>";
        echo "<b>Database is open for use.</b> You may now click on any tab ... <br>\n";
        echo "</div>";
    }

    if ( $_SESSION['database_status'] === "closed") {
        unset($_SESSION['error']);
?>
        <div style = "width: 100%;">
        <br>
        <h2  class = "center">Open database</h2>

        <form method = "POST" action =  "<?= $_SERVER['PHP_SELF']; ?>" class = "center"
            style = "line-height: 3em; background-color: rgb(190, 226, 255); width: 350px;">
            <div style = "height: 2em;"></div>
            <b>Username:&nbsp; </b> <input type = "text"     name = "username" ><br />
            <b>Password:&nbsp; </b> <input type = "password" name = "password" ><br />
                                    <input type = "hidden"   name = "submitted" value = "True"><br />
                                    <input type = "Submit"   name = "submit"    value = "Open" style = "color: blue;">
        </form>





        </div>
        <br><br>
<?php
    }
?>
</body>
</html>
