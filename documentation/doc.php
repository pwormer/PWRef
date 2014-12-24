<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>PWRef Documentation</title>
    <meta http-equiv = "content-type" content = "text/html; charset = UTF-8" />
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link  href = "../PWRef.css" rel = "stylesheet" type = "text/css">
    <style>
        .headline #home:hover {
            border-bottom: solid white  2px;
            background-color: gray;
       }
       #show {
           position: absolute;
           margin-left: 490px;
           margin-top: 20px;
           background-color: white;
           z-index: 1;
           width: 400px;
       }
           section {
               margin-left: 50px;
       }
    </style>
</head>

<!--
<body contenteditable="true" spellcheck="true">
-->
<body>

<?php
    include "../topmenu.html";
?>

<div class = "title">
    <span style = " margin-left: 100px;">
        Documentation
    </span>
</div>
<div class = "main">

<section>
<h4>General structure</h4>
PWRef distinguishes two types of references: <b>articles</b> (usually published in a scientific journal)
and <b>book-type publications</b>. Articles can have an unlimited number of authors.
The book-type category consists of ten subtypes: book,  incollection,
misc,  booklet,  phdthesis,  inproceedings, inbook, unpublished, manual, and  mastersthesis. Book-type
publications can have an unlimited number of authors and/or editors. Book editors and book authors are stored in the same
database table as article authors.
<h4>Database</h4>
The heart of PWRef is a mySQL database consisting of the following 8 tables:
<br>
<table width = "70%">
    <tr>
    <td colspan = "3"><hr></td>
    </tr>
    <tr>
    <td><b>1.</b> </td>  <td> articles              </td>  <td> art_id, journal_id, title, year, pages, DOI, etc.     </td>
    </tr>
    <tr>
    <td><b>2.</b> </td>  <td> books                 </td>  <td> book_id, type, title, year, ISBN, etc.   </td>
    </tr>
    <tr>
    <td><b>3.</b> </td>  <td> authors               </td>  <td> author_id, author_first_name, author_last_name   </td>
    </tr>
    <tr>
    <td><b>5.</b> </td>  <td> journals              </td>  <td> journal_id, journal_name                         </td>
    </tr>
    <tr>
    <td><b>6.</b> </td>  <td> link_articles_authors&nbsp;&nbsp; </td>  <td> links from art_id to author_id and back          </td>
    </tr>
    <tr>
    <td><b>7.</b> </td>  <td> link_books_authors    </td>  <td> links from book_id to author_id and back         </td>
    <tr>
    <tr>
    <td><b>8.</b> </td>  <td> link_books_editors    </td>  <td> links from book_id to author_id and back         </td>
    <tr>
    </tr>
</table>
</section>

<section>
<h4>Subcommands</h4>
PWRef has the following subcommands:
<dl>
    <dt><b>Logon:</b></dt>
        <dd>Prompt for user name and password of the mySQL database containing the references. </dd>

    <dt><b>Input:</b></dt>
        <dd>Separate  web pages for input of book-type and article references. </dd>

    <dt><b>Search:</b></dt>
        <dd>Separate search of book-type and article references. Article search for different authors ("OR"),  <br>
            search for coauthors ("AND"), and time periods. </dd>

    <dt><b>Update:</b></dt>
        <dd>Update article references (for things like change of status  from submitted to accepted, etc.).
            Subcommand is not available for book-type references. </dd>

    <dt><b>Replace:</b></dt>
        <dd>Copy and edit existing record, optionally delete original record.<br>
            Separate web pages for book-type and article references. </dd>

    <dt><b>Delete:</b></dt>
        <dd>Delete record from database. Separate web pages for book-type and article references. </dd>

</dl>
<br>
</section>

<section>
<h4>Security</h4>
For security reasons, PWRef forbids input of most HTML tags. Allowed (white-listed) are:
    <pre>
        &lt;b>,  &lt;em>, &lt;i>, &lt;sub>, &lt;sup>, &lt;small>, &lt;strong>
    </pre>
The program <tt>HTMLPurifier.php</tt>, downloaded from
<a href = "http://htmlpurifier.org">HTML Purifier</a>, filters out other
tags and encodes HTML entities. This prohibits XSS injections. Before storing, all info is passed
through the mySQLi method <tt>real_escape_string()</tt> that defends against mySQL  injections. The lengths
of all input is limited (against buffer overflow attacks). Input is passed from web forms
to input handlers through the POST method (no visible query strings).
<br><br>
</section>

<section>
<h4>Directories and files </h4>
<small>
<pre>
(Sub)directory    Programs               nr_of_lines    Description
==============    ========               ===========    ===========
PWRef (root)
                  index.php                   67        Home
                  topmenu.html               140        Top for all web pages
                  PWRef.css                  408        Style sheet
                  Setup.php                  166        Opens database, sets globals
                  tooltip_home.html           38        Tooltip help
logon
                  logon.php                  113        Sets database user name and password

shared
                  check_callers.php           38        Checks validity of callers (security)
                  clean_html.php              93        Whitelists HTML tags and cleans input (security)
                  closeDB.php                 39        Close database
                  maxlength.php               29        Maximum lengths of input fields (security)
                  UTF2TeX.php                 88        UTF-8 characters to TeX
                  UTF2ASCII.php               84        UTF-8 characters to ASCII (drop diacritics)
                  info.jpg                              Info symbol

articles/input
                  PWRef_input.php            197        Input driver for article references
                  input.php                  252        Actual article input
                  input.js                   370        JavaScript code for article input
                  suggest_journals.php        36        Journal lookup in the mySQL database
article/search
                  PWRef_search.php           288        Driver for database queries of articles
                  search.php                 393        Actual queries
                  search.js                  181        JavaScript code for queries
                  suggest_author.php          44        Author suggestion box

articles/update
                  PWRef_update_article.php   798        Inplace-update of article reference
articles/replace
                  PWRef_replace_article.php  858        Copy/replace of article references
articles/delete
                  PWRef_delete_articles.php  752        Deletion of article reference
articles/shared
                  Articles.class            1305        Class for article objects

books/input
                  PWRef_bookinp.php         3329        Input of book-type reference
                  tooltip.html                16        Tooltip
books/replace
                  PWRef_replace_book.php    1269        Copy or replacement of book-type reference
                  suggest_author.php          44        Suggests authors
                  tooltip1_book_replace.html  42        Tooltip
                  tooltip2_book_replace.html  13        Tooltip
books/delete
                  PWRef_book_delete.php      638        Deletion of book-type reference
                  suggest_author.php          44        Author suggestion box
                  tooltip_book_delete.html    19        Tooltip

books/shared
                  Book.class                1049        Class for book objects
documentation
                  doc.php                    177        Documentation (present page).

Total number of lines                      13417
</pre>
</small>

</section>
</div>

</body>
</html>
