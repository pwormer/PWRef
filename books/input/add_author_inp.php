<?php    //>
   /*
    *   Called through jQuery/Ajax load() with $_POST['counter'] == current.
    *
    *   If  the key "author.current => author name"  exists (is existing key of $_SESSION) and
    *   `author name` is not empty then echo: <input value = "author name" name = "author.current">
    *   where `author name` is the predefined name.
    *
    *   If the key "author.current" is defined but the associated value
    *   `author name` is empty, then return while doing nothing.
    *
    *   Else set "author.current" in $_SESSION with value "" and echo:
    *   <input value = "" name = "author.current">
    */
    session_start();

    // Pick up the sequence number of the current author
    $current = $_POST['counter'];

    $index = 'author'.$current;
    if ( key_exists( $index, $_SESSION) ) {
        $val = $_SESSION[$index];
        if ($val[0] === "" and $val[1] === "") return;
    }
    else {
        $val[0] = '';
        $val[1] = '';
        $_SESSION[$index] = $val;
    }

    // Copy key `$index` to `$author` while entering spaces:
    $author = preg_replace('/^author(\d+)/',  "Author&nbsp;$1&nbsp;", $index);

    $index0 = $index."0";
    $index1 = $index."1";
    echo "<br><label>$author</label><br>
           <label>First name:</label>&nbsp;
           <input name = '{$index0}' value = '{$val[0]}' size = '19' maxlength = '50'  />
           &nbsp;&nbsp; &nbsp;&nbsp;
           <label>Last name:</label>&nbsp;
           <input name = '{$index1}' value = '{$val[1]}' size = '34' maxlength = '100' />
         ";
?>
