<?php
require("../head.php");
$ddbb=new mysqli("localhost","root","1029a382","./pages.db");
if($ddbb->connect_error){
  die("connect failed".$ddbb->connect_error);
  exit;
}
?>
<html>
  <head>
    <title><?php
      echo "post $_GET["num"]";
      ?>
    </title>
    <meta charset="utf-8">
    <--!-->
    <meta name="robots" content="noindex">
  </head>
  <body>
  </body>
</html>
