<?php    //>
    function check_callers($allowed_callers) {
    /*
     *  Check if present script is called by any of the scripts defined in array
     *  $allowed_callers (scripts must be all in present directory); if not die.
     *
     *  Script is defense against hackers.
     */
        if ( !array_key_exists('HTTP_REFERER', $_SERVER) ) {
            echo "<div style = 'margin-top: 130px;'>";
            die("<b>Error:</b> The script &nbsp;  \"{$_SERVER['PHP_SELF']}\" &nbsp;
                must be called from a script (in the same directory).</div>");
        }

        $refer   = parse_url($_SERVER['HTTP_REFERER']);
        $referer = $refer['path'];

        $tmp_path = parse_url($_SERVER['PHP_SELF']);
        preg_match('/(^.+)\/.*$/', $tmp_path['path'], $matches);
        $present_dir = $matches[1];

        foreach ($allowed_callers as $allowed_caller) {
            $allowed_script = $present_dir . "/" . $allowed_caller;

            if ($_SERVER['PHP_SELF'] === $allowed_script) {   // Fix for IE
                return;
            }
            if ($referer === $allowed_script) {
                return;
            }
        }

        echo "<div style = 'margin-top: 130px;'>";
        die("<b>Error:</b> Present script is called by $referer, which is not allowed.
              </div>
            ");
    }
?>
