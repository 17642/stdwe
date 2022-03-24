<?php
require("../head.php");
?>
<!DOCTYPE html>

<html lang='ko'>
    <head>
        <meta charset="utf-8">
        <title>PAGE_TEST</title>
        <meta name="robots" content="noindex">
    </head>
    <body>
        <form method="post" action="./newpagefunc.php">
            Title:<br><input type='text' name='title'><br>
            Contents:<br><input type='text' name='imt'><br>
            <input type="submit">
        </form>
    </body>
</html>
