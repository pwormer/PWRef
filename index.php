<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>PWRef Home</title>
    <meta http-equiv = "content-type" content = "text/html; charset = UTF-8" />
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link  href = "PWRef.css" rel = "stylesheet" type = "text/css">
    <script>
        $(function() {
            // Help info:
            $(".tooltip_home").load("tooltip_home.html",
                            function(x,y){if (y === 'error') alert(x);} );
        });
    </script>
</head>

<body>

<style>
    .headline #home:hover {
        border-bottom: solid white  2px;
        background-color: gray;
    }
    .tooltip_home {
        display: none;
        position: absolute;
        right:  150px;
        top:    100px;
        width: 450px;
        padding: 20px;
    }
    .home_info:hover > .tooltip_home {
        display: block;
    }
</style>
<?php
    include "topmenu.html";
?>

<!-- home_menu: tinted box with blue border -->
<div id = "home_menu" style = "margin-top: 75px; margin-left: 150px;"  >
    <h4 style="margin-bottom: -10px; margin-top:-5px;">&nbsp;Main features of PWRef:</h4>

    <!-- Help info -->
    <div class = "home_info">
        <img  src = "./shared/info.jpg" class = "info"  />
        <div  class = "tooltip_home subhelp">
        </div>
    </div>
    <!-- End Help info -->

    <ul>
        <li> User-friendly web-based input: enter manually or copy-paste from online journals.
        <li> User-friendly web-based queries with several export formats.
        <li> Unlimited number of authors and editors per reference.
        <li> Protected against  XSS and buffer-overflow attacks and  SQL injections.
        <li> Two kinds of references can be handled: journal and "book".
             ("Book" is of ten <br> <span style = "margin-left: 50px;"> subtypes: books, proceedings, PhD theses, etc.)</span>
        <li> No user manual: relevant instructions are made visible by hovering on nearby info button.
        <li> Use of a GNU General Public License MySQL database.
        <li> A hobby project, no commercial intents.
        <li> All  <span style = 'font-variant: small-caps;'>html, css, javascript, php</span> sources are freely available, but ...
        <li> <span style = "margin-left: 50px;"><i>no warranties: Paul Wormer is a rooky web programmer.</i></span>
    </ul>
</div>
</body>
</html>
