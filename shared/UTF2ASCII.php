<?php
        function UTF2ASCII($code) {
       /*
        *   Non-ASCII UTF-8 characters contained in the string $code
        *   are translated to ASCII, i.e., diacritics are dropped.
        */
            $UTFchars = array (          //code point UTF8        character name
                '/À/' => 'A',         // U+00C0 c3 80 Latin capital letter A with grave
                '/Á/' => 'A',         // U+00C1 c3 81 Latin capital letter A with acute
                '/Â/' => 'A',         // U+00C2 c3 82 Latin capital letter A with circumflex
                '/Ã/' => 'A',         // U+00C3 c3 83 Latin capital letter A with tilde
                '/Ä/' => 'A',         // U+00C4 c3 84 Latin capital letter A with diaeresis
                '/Å/' => 'A',         // U+00C5 c3 85 Latin capital letter A with ring above
                '/Æ/' => 'AE',        // U+00C6 c3 86 Latin capital letter AE
                '/Č/' => 'C',         // U+010C c4 8c Latin capital letter C with caron
                '/Ç/' => 'C',         // U+00C7 c3 87 Latin capital letter C with cedilla
                '/È/' => 'E',         // U+00C8 c3 88 Latin capital letter E with grave
                '/É/' => 'E',         // U+00C9 c3 89 Latin capital letter E with acute
                '/Ê/' => 'E',         // U+00CA c3 8a Latin capital letter E with circumflex
                '/Ë/' => 'E',         // U+00CB c3 8b Latin capital letter E with diaeresis
                '/Ì/' => 'I',         // U+00CC c3 8c Latin capital letter I with grave
                '/Í/' => 'I',         // U+00CD c3 8d Latin capital letter I with acute
                '/Î/' => 'I',         // U+00CE c3 8e Latin capital letter I with circumflex
                '/Ï/' => 'I',         // U+00CF c3 8f Latin capital letter I with diaeresis
                '/Ł/' => 'L',         // U+0141 c5 81 Latin capital letter L with stroke
                '/Ñ/' => 'N',         // U+00D1 c3 91 Latin capital letter N with tilde
                '/Ò/' => 'O',         // U+00D2 c3 92 Latin capital letter O with grave
                '/Ó/' => 'O',         // U+00D3 c3 93 Latin capital letter O with acute
                '/Ô/' => 'O',         // U+00D4 c3 94 Latin capital letter O with circumflex
                '/Õ/' => 'O',         // U+00D5 c3 95 Latin capital letter O with tilde
                '/Ö/' => 'O',         // U+00D6 c3 96 Latin capital letter O with diaeresis
                '/Ø/' => 'O',         // U+00D8 c3 98 Latin capital letter O with stroke
                '/Ù/' => 'U',         // U+00D9 c3 99 Latin capital letter U with grave
                '/Ú/' => 'U',         // U+00DA c3 9a Latin capital letter U with acute
                '/Û/' => 'U',         // U+00DB c3 9b Latin capital letter U with circumflex
                '/Ü/' => 'U',         // U+00DC c3 9c Latin capital letter U with diaeresis
                '/Ř/' => 'R',         // U+0158 c5 98 Latin capital letter R with caron
                '/Š/' => 'S',         // U+0160 c5 a0 Latin capital letter S with caron
                '/Ý/' => 'Y',         // U+00DD c3 9d Latin capital letter Y with acute
                '/Ỳ/' => 'Y',        // U+1EF2 e1 bb b2 Latin capital letter Y with grave
                '/Ž/' => 'Z',         // U+017D c5 bd Latin capital letter Z with caron
                '/Ż/' => 'Z',         // U+017B c5 bb Latin capital letter Z with dot above
                '/à/' => 'a',         // U+00E0 c3 a0 Latin small letter a with grave
                '/á/' => 'a',         // U+00E1 c3 a1 Latin small letter a with acute
                '/â/' => 'a',         // U+00E2 c3 a2 Latin small letter a with circumflex
                '/ã/' => 'a',         // U+00E3 c3 a3 Latin small letter a with tilde
                '/ä/' => 'a',         // U+00E4 c3 a4 Latin small letter a with diaeresis
                '/å/' => 'a',         // U+00E5 c3 a5 Latin small letter a with ring above
                '/æ/' => 'ae',        // U+00E6 c3 a6 Latin small letter ae
                '/č/' => 'c',         // U+010D c4 8d Latin small letter c with caron
                '/ç/' => 'c',         // U+00E7 c3 a7 Latin small letter c with cedilla
                '/è/' => 'e',         // U+00E8 c3 a8 Latin small letter e with grave
                '/é/' => 'e',         // U+00E9 c3 a9 Latin small letter e with acute
                '/ê/' => 'e',         // U+00EA c3 aa Latin small letter e with circumflex
                '/ë/' => 'e',         // U+00EB c3 ab Latin small letter e with diaeresis
                '/ì/' => 'i',         // U+00EC c3 ac Latin small letter i with grave
                '/í/' => 'i',         // U+00ED c3 ad Latin small letter i with acute
                '/î/' => 'i',         // U+00EE c3 ae Latin small letter i with circumflex
                '/ï/' => 'i',         // U+00EF c3 af Latin small letter i with diaeresis
                '/ł/' => 'l',         // U+0142 c5 82 Latin small letter l with stroke
                '/ñ/' => 'n',         // U+00F1 c3 b1 Latin small letter n with tilde
                '/ò/' => 'o',         // U+00F2 c3 b2 Latin small letter o with grave
                '/ó/' => 'o',         // U+00F3 c3 b3 Latin small letter o with acute
                '/ô/' => 'o',         // U+00F4 c3 b4 Latin small letter o with circumflex
                '/õ/' => 'o',         // U+00F5 c3 b5 Latin small letter o with tilde
                '/ö/' => 'o',         // U+00F6 c3 b6 Latin small letter o with diaeresis
                '/ø/' => 'o',         // U+00F8 c3 b8 Latin small letter O with stroke
                '/ù/' => 'u',         // U+00F9 c3 b9 Latin small letter u with grave
                '/ú/' => 'u',         // U+00FA c3 ba Latin small letter u with acute
                '/û/' => 'u',         // U+00FB c3 bb Latin small letter u with circumflex
                '/ü/' => 'u',         // U+00FC c3 bc Latin small letter u with diaeresis
                '/ř/' => 'r',         // U+0159 c5 99 Latin small letter r with caron
                '/š/' => 's',         // U+0161 c5 a1 latin small letter s with caron
                '/ÿ/' => 'y',         // U+00FF c3 bf Latin small letter y with diaeresis
                '/ý/' => 'y',         // U+00FD c3 bd Latin small letter y with acute
                '/ỳ/' => 'y',        // U+1EF3 e1 bb b3 Latin small letter y with acute
                '/ž/' => 'z',         // U+017E c5 be Latin small letter z with caron
                '/ż/' => 'z'          // U+017C c5 bc Latin small letter z with dot above
            );

            $code = preg_replace(array_keys($UTFchars), array_values($UTFchars), $code);
            return $code;
        }
?>
