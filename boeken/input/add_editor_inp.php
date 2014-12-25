<?php    //>
   /*
    *   Called through jQuery/Ajax load() with $_POST['counter'] == current.
    *
    *   If  the key "editor.current => editor name"  exists (is existing key of $_SESSION) and
    *   `editor name` is not empty then echo: <input value = "editor name" name = "editor.current">
    *   where `editor name` is the predefined name.
    *
    *   If the key "editor.current" is defined but the associated value
    *   `editor name` is empty, then return while doing nothing.
    *
    *   Else set "editor.current" in $_SESSION with value "" and echo:
    *   <input value = "" name = "editor.current">
    */
    session_start();

    // Pick up the sequence number of the current editor
    $current = $_POST['counter'];
    $index = 'editor'.$current;
    if ( key_exists( $index, $_SESSION) ) {
        $val = $_SESSION[$index];
        if ($val[0] === "" and $val[1] === "") return;
    }
    else {
        $val[0] = '';
        $val[1] = '';
        $_SESSION[$index] = $val;
    }

    // Copy key `$index` to `$editor` while entering spaces:
    $editor = preg_replace('/^editor(\d+)/',  "Editor&nbsp;$1&nbsp;", $index);

    $index0 = $index."0";
    $index1 = $index."1";
    echo "<br><label>$editor</label><br>
           <label>First name:</label>&nbsp;
           <input name = '{$index0}' value = '{$val[0]}' size = '19' maxlength = '50'  />
           &nbsp;&nbsp; &nbsp;&nbsp;
           <label>Last name:</label>&nbsp;
           <input name = '{$index1}' value = '{$val[1]}' size = '34' maxlength = '100' />
         ";
?>
