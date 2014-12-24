<?php      //>
    function clean_html($dirty_html) {
    /*
     *         ********** THIS SCRIPT IS IN UTF8 WITHOUT BOM  *************
     *                     (BOM gives empty line in PHP!)
     *
     *  This function white-lists a few HTML tags and removes all others from argument
     *  $dirty_html as protection against XSS injections.
     *
     *  First $dirty_html is processed by the php function "html_entity_decode"
     *  followed by letting "purify" act on the result. (The method "purify" is downloaded
     *  from  http://htmlpurifier.org/).
     *
     *  Malicious HTML input:
     *
     *                  <script> code </script> and &lt;script&gt; code &lt;/script&gt;
     *
     *  is decoded by "html_entity_decode" to become:
     *
     *                  <script> code </script> and <script> code </script>
     *
     *  and both <script> elements are completely removed by "purify".
     *
     *  Note that the HTML string
     *               &amp;lt;script&amp;gt; code &amp;lt;/script&amp;gt;
     *  is not removed and may become infectious after decoding once more.
     *
     *  Besides removing dangerous tags and white-listing harmless tags,
     *  "purify" decodes HTML character and numeric entities, such as for example:
     *      &nbsp;   (decoded to the 2-byte UTF-8 version 0xC2A0 of Latin-1 0xA0),
     *      &Pi;     (decoded to the 2-byte UTF-8 version 0xCEA0 of Unicode U+03A0),
     *      &#x03B1; (decoded to the 2-byte UTF-8 version 0xCEB1 of &alpha;),
     *  etc. For HTML entities this is the exact same decoding as performed by
     *  "html_entity_decode". Neither "purify" nor "html_entity_decode" change the resulting
     *  UTF-8 codes.
     *
     *  For undefined strings that look like HTML entities, such as &fiets;,
     *  "purify"  encodes the ampersand for security reasons:
     *                &fiets; ==> &amp;fiets;
     *  while "html_entity_decode" does not touch the undefined string.
     *  (Here purify encodes exactly the same as the encoding php function "htmlentities").
     *
     *  In contrast to "html_entity_decode", method "purify" leaves encoded tags alone.
     *  Thus,  where "html_entity_decode"  acts as follows:
     *
     *               &lt;b&gt; XYZ &lt;/b&gt;  ==> <b> XYZ </b>
     *
     *  "purify" does not touch the string on the left-hand side. This is why "html_entity_decode"
     *  is applied first.
     *
     *  In short, the present function makes the following replacements:
     *
     *      <b>A</b>              ==>     <b>A</b> (white-listed tag)
     *      &lt;b&gt;A&lt;/b&gt;  ==>     <b>A</b>
     *      <a href="q">XYZ</a>   ==>     XYZ      (forbidden tag, could be backdoor to XSS)
     *      <XYZ>B</XYZ>          ==>     B        (unknown tag)
     *      <script>JS</script>   ==>     (void)
     *      &Scaron;              ==>     0xC5A0   (UTF-8 code of Scaron)
     *      &#x0160;              ==>     0xC5A0   (UTF-8 code of Scaron)
     *      Š                     ==>     0xC5A0   (this is not a replacement, an UTF-8 editor
     *                                    makes the replacement of 0xC5A0 to glyph)
     *      &fiets;               ==>     &amp;fiets;
     */

        $base2     = "../../htmlpurifier/";
        $base3     = "../../../htmlpurifier/";
        $purifier2 = $base2 . "HTMLPurifier.php";
        $purifier3 = $base3 . "HTMLPurifier.php";

        if (file_exists ($purifier2) ) {
            require_once $purifier2;
        }
        elseif (file_exists ($purifier3) ) {
            require_once $purifier3;
        }
        else {
            echo "$purifier2 and $purifier3 do not exist, execution stops.<br>\n";
            exit();
        }
     /*   echo "Loaded htmlpurifier<br>\n"; */
        $config = HTMLPurifier_Config::createDefault();
        $config->set('Core.Encoding', 'UTF-8'); // replace with your encoding
        $config->set('HTML.Doctype', 'XHTML 1.0 Strict'); // replace with your doctype

     // White list of tags:
        $config->set('HTML.Allowed', 'b, em, i, sub, sup, small, strong');

        $purifier   = new HTMLPurifier($config);    // Instance of object HTMLPurifier
        $clean_html = $purifier->purify(html_entity_decode($dirty_html, ENT_COMPAT,  'UTF-8'));

        return trim($clean_html);
    }
?>
