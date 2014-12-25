<?php         //>
    function Add_article($authors, $title, $journal, $issn, $volume, $begin_page, $end_page,
                         $year, $project, $url, $arXiv, $doi) {
    /*
     *  Function exists for historical reasons (later replaced by Articles.class).
     *
     *  Add one row to database table "$tab_arts"  describing  a new reference to an article.
     *  Add as many rows to table $tab_AA as the new article has authors.
     *  Check if $tab_journals and $tab_authors need to be augmented, if so add
     *  new journal or author to these database tables.
     *
     *  Function uses Articles.class.
     *
     */
        require_once "Articles.class";
        $article = new Article();
        $article -> Create_article($authors, $title, $journal, $issn, $volume, $begin_page, $end_page,
                                   $year, $project, $url, $arXiv, $doi);
        $article -> Store_article();
        return 1;    // OK
        }
?>
