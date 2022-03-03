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
    <link href="../styles/bpages.css" rel="stylesheet" type="text/css">
    <meta name="robots" content="noindex">
  </head>
  <body>
    <h1>
      pages
    </h1>
    <br>
    <h2>
      <?php
      echo "No.$_GET["num"]";
      ?>
    </h2>
    <br>
    <h4>
    </h4>
    <br>
    <p>
      <br>
      
    </p>
  </body>
</html>
