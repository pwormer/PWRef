<?php    //>
function Setup() {
/*
 *  Set globals specifying names of:
 *          database, its tables, and its table columns
 *
 *  Set global $filenames (names of shared files).
 *
 *  Prompt for user name and password, if necessary.
 *
 *  Open database
 */
    if (!isset($_SESSION)) {
        session_start();
    }
    ini_set("max_execution_time", 999);
    global $database, $pubDB, $host;

    // Tables
    global $tab_arts, $tab_authors, $tab_journals, $tab_AA, $tab_books, $tab_BA, $tab_BE;
        $tab_arts       = "articles";
        $tab_authors    = "authors";
        $tab_journals   = "journals";
        $tab_AA         = "link_articles_authors";
        $tab_books      = "books";
        $tab_BA         = "link_books_authors";
        $tab_BE         = "link_books_editors";

    // Columns of $tab_arts
    global $tab_arts_art_id,   $tab_arts_journal_id, $tab_arts_year,
           $tab_arts_volume,   $tab_arts_title,      $tab_arts_begin_page,
           $tab_arts_end_page, $tab_arts_project,    $tab_arts_arXiv,
           $tab_arts_doi,      $tab_arts_url;

        $tab_arts_art_id     = "article_id";
        $tab_arts_journal_id = "journal_id";
        $tab_arts_year       = "year";
        $tab_arts_volume     = "volume";
        $tab_arts_title      = "title";
        $tab_arts_begin_page = "begin_page";
        $tab_arts_end_page   = "end_page";
        $tab_arts_project    = "project";
        $tab_arts_arXiv      = "arXiv";
        $tab_arts_doi        = "doi";
        $tab_arts_url        = "url";

    // Columns of $tab_authors
    global $tab_authors_id, $tab_authors_last_name,  $tab_authors_first_name;

        $tab_authors_id         = "author_id";
        $tab_authors_last_name  = "author_last_name";
        $tab_authors_first_name = "author_first_name";

    // Columns of $tab_journals
    global $tab_journals_id, $tab_journals_name, $tab_journals_issn;
        $tab_journals_id   = "journal_id";
        $tab_journals_name = "journal_name";
        $tab_journals_issn = "journal_issn";

   // Columns of $tab_AA   (table links Articles and Authors)
    global  $tab_AA_art_id, $tab_AA_aut_id;

        $tab_AA_art_id = "article_id";
        $tab_AA_aut_id = "author_id";

   // Columns of $tab_books
    global  $tab_books_id,           $tab_books_organization, $tab_books_publisher,
            $tab_books_title,        $tab_books_second_title, $tab_books_page,
            $tab_books_type,         $tab_books_year,         $tab_books_url,
            $tab_books_project,      $tab_books_isbn,         $tab_books_key,
            $tab_books_note;

        $tab_books_id           =   "book_id";
        $tab_books_organization =   "organization";
        $tab_books_publisher    =   "publisher";
        $tab_books_title        =   "title";
        $tab_books_second_title =   "second_title";
        $tab_books_page         =   "page";
        $tab_books_type         =   "type";       // book, thesis, report, etc.
        $tab_books_year         =   "year";
        $tab_books_url          =   "url";
        $tab_books_project      =   "project";
        $tab_books_isbn         =   "isbn";
        $tab_books_key          =   "book_key";
        $tab_books_note         =   "book_note";


   // Columns of $tab_BA   (table links Books and Authors)
    global  $tab_BA_book_id, $tab_BA_author_id;

        $tab_BA_book_id    = "book_id";
        $tab_BA_author_id  = "author_id";

   // Columns of $tab_BE   (table links Books and Authors= Editors)
    global  $tab_BE_book_id, $tab_BE_editor_id;

        $tab_BE_book_id    = "book_id";
        $tab_BE_editor_id  = "editor_id";


   // Set absolute addresses of files required in PHP. This has the advantage
   // that upon relocation of files only the present file has to be adapted.
   // The present file must be in the root, directory "PWRef".
   // (Paths of files required in HTML are dictated by <base href = "..." />)

    global $filenames;
    //$base = "http://localhost/PWRef/";
    $base = "http://www.theochem.ru.nl/~pwormer/PWRef/";

    $once  = "../";
    $twice = "../../";
    $filenames =    array(
                        'clean1'         => $once   . "shared/clean_html.php",
                        'clean2'         => $twice  . "shared/clean_html.php",
                        'maxlength1'     => $once   . "shared/maxlength.php",
                        'maxlength2'     => $twice  . "shared/maxlength.php",
                        'UTF2TeX1'       => $once   . "shared/UTF2TeX.php",
                        'UTF2TeX2'       => $twice  . "shared/UTF2TeX.php",
                        'UTF2ASCII1'     => $once   . "shared/UTF2ASCII.php",
                        'UTF2ASCII2'     => $twice  . "shared/UTF2ASCII.php",
                        'check1'         => $once   . "shared/check_callers.php",
                        'check2'         => $twice  . "shared/check_callers.php",
                        'Art_class1'     => $once   . "articles/shared/Articles.class",
                        'Art_class2'     => $twice  . "articles/shared/Articles.class",
                        'art_add1'       => $once   . "articles/shared/Add_article.php",
                        'art_add2'       => $twice  . "articles/shared/Add_article.php",
                        'Book_class1'    => $once   . "books/shared/Book.class",
                        'Book_class2'    => $twice  . "books/shared/Book.class",
                        'base'           => $base
                     );

    // Open database
    if (!key_exists('credentials', $_SESSION)) {
        echo "<br><b style = 'margin-left: 50px;'>Session not opened yet. You must first logon!</b><br>\n";
        exit();
    }
        $creds     = $_SESSION['credentials'];
        $host      = $creds['host'];
        $username  = $creds['username'];
        $password  = $creds['password'];
        $database  = $creds['database'];

        $pubDB = new mysqli($host, $username, $password, $database);
        $errno =  $pubDB->connect_errno;
        if  ($errno) {
             echo "<div style = 'margin-top: -20px; margin-left: 50px;'>";
             echo "<br><b>Execution stops </b>";
             echo " with error number " .  $errno . ".";
             if ($errno === 1044) echo " Probable cause: incorrect username or password.<br>\n";
             if ($errno === 1045) echo " Probable cause: incorrect password or username.<br>\n";
             echo "<table width = '30%'> ";
             echo "<tr><td><b>Host:             </b></td><td> " . substr($host,2)   . "</td></tr><br>\n";
             echo "<tr><td><b>Username:         </b></td><td> " . $username         . "</td></tr><br>\n";
             echo "<tr><td><b>Database:         </b></td><td> " . $database         . "</td></tr><br>\n";
             echo "<tr><td><b>Length password:  </b></td><td> " . strlen($password) . "</td></tr><br>\n";
             echo "</table>";
             echo "</div>";
             exit();
        }

        $pubDB->set_charset('utf8');

        //echo "<h4 style = 'margin-left: 50px; margin-top: 0px;' >Opened database {$database}</h4>\n";

};
?>
