DROP   TABLE IF EXISTS link_articles_authors;
DROP   TABLE IF EXISTS articles;
DROP   TABLE IF EXISTS journals;
DROP   TABLE IF EXISTS link_books_authors;
DROP   TABLE IF EXISTS link_books_editors;
DROP   TABLE IF EXISTS books;
DROP   TABLE IF EXISTS authors;

CREATE TABLE IF NOT EXISTS   articles
        (article_id            INT  NOT NULL AUTO_INCREMENT,
         PRIMARY KEY (article_id),
         journal_id            MEDIUMINT,
         year                  SMALLINT,
         volume                VARCHAR(15),
         title                 VARCHAR(1024) NOT NULL DEFAULT '',
         begin_page            VARCHAR(10),
         end_page              VARCHAR(10),
         project               VARCHAR(70),
         arXiv                 VARCHAR(12),
         doi                   VARCHAR(50),
         url                   VARCHAR(255)
        )
        ENGINE = InnoDB
        CHARACTER SET utf8;

CREATE TABLE IF NOT EXISTS   authors
        (author_id             INT NOT NULL AUTO_INCREMENT,
         PRIMARY KEY (author_id),
         author_last_name      VARCHAR(100)  NOT NULL DEFAULT '',
         author_first_name     VARCHAR(50)
        )
        ENGINE = InnoDB
        CHARACTER SET utf8;

CREATE TABLE IF NOT EXISTS   journals
        (journal_id            MEDIUMINT NOT NULL AUTO_INCREMENT,
         PRIMARY KEY (journal_id),
         journal_name          VARCHAR(70) NOT NULL DEFAULT '',
         journal_issn          VARCHAR(9)
        )
        ENGINE = InnoDB
        CHARACTER SET utf8;


CREATE TABLE IF NOT EXISTS   link_articles_authors
        (author_id   INT,
         article_id  INT,
         INDEX(article_id),
         FOREIGN KEY(author_id) REFERENCES authors(author_id)
        )
         ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS   books
        (book_id               INT  NOT NULL AUTO_INCREMENT,
         PRIMARY KEY (book_id),
         organization          VARCHAR(255)  DEFAULT '',
         publisher             VARCHAR(255)  DEFAULT '',
         title                 VARCHAR(512) NOT NULL DEFAULT '',
         second_title          VARCHAR(512)  DEFAULT '',
         page                  VARCHAR(10)   DEFAULT '',
         type                  VARCHAR(20),
         year                  SMALLINT,
         url                   VARCHAR(255),
         project               VARCHAR(70),
         isbn                  VARCHAR(20),
         book_key              VARCHAR(105)  DEFAULT '',
         book_note             VARCHAR(1024) DEFAULT ''
        )
        ENGINE = InnoDB
        CHARACTER SET utf8;



CREATE TABLE IF NOT EXISTS   link_books_authors
        (book_id         INT,
         author_id       INT,
         INDEX(book_id),
         FOREIGN KEY(author_id) REFERENCES authors(author_id)
        )
        ENGINE = InnoDB
        CHARACTER SET utf8;


CREATE TABLE IF NOT EXISTS   link_books_editors
        (book_id         INT,
         editor_id       INT,
         INDEX(book_id),
         FOREIGN KEY(editor_id) REFERENCES authors(author_id)
        )
        ENGINE = InnoDB
        CHARACTER SET utf8;
