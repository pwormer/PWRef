<?php   //>
/* Maximum lengths of input fields (used in protection against bufer overflow attacks) */
    $maxlength['year'         ]    =    4;  //  Will be checked elsewhere on legal bounds
    $maxlength['volume'       ]    =   15;
    $maxlength['title'        ]    =  512;
    $maxlength['second_title' ]    =  512;
    $maxlength['begin_page'   ]    =   10;
    $maxlength['end_page'     ]    =   10;
    $maxlength['project'      ]    =   70;
    $maxlength['arXiv'        ]    =   12;
    $maxlength['doi'          ]    =   50;
    $maxlength['issn'         ]    =    9;
    $maxlength['last_name'    ]    =  100;
    $maxlength['first_name'   ]    =   50;
    $maxlength['journal'      ]    =   70;
    $maxlength['type'         ]    =   20;  // type of publication: book, booklet, etc.
    $maxlength['publisher'    ]    =  255;
    $maxlength['city'         ]    =   30;
    $maxlength['isbn'         ]    =   20;
    $maxlength['url'          ]    =  255;
    $maxlength['file'         ]    =  512;
    $maxlength['book_note'    ]    = 1024;
    $maxlength['address'      ]    =  100;
    $maxlength['school'       ]    =  255;
    $maxlength['book_key'     ]    =  105;
    $maxlength['organization' ]    =  255;

    $max_authors = 250;
?>
