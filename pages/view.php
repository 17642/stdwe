<?php
require("../head.php");
$ddbb=new mysqli("localhost","root","1029a382","./pages.db");
if($ddbb->connect_error){
  die("connect failed".$ddbb->connect_error);
  exit;
}
?>
<html lang="ko">
  <head>
    <title><?php
    $p=$_GET["num"];
      echo "post $p";
      $date=mysqli_query($ddbb,"SELECT * from pages where id=$p");
      $title=$date["title"];
      $day=$date["date"];
      $imt=$date["imt"];
      if(isset($date["embed"])){
        $embed_link="./".$date["embed"];
      }
      mysqli_close($ddbb);
      ?>
    </title>
    <meta charset="utf-8">
    <link href="../styles/bpages.css" rel="stylesheet" type="text/css">
    <meta name="robots" content="noindex">
  </head>
  <body>
    <h1>
      pages -><?php echo "$title";
      ?>
    </h1>
    <br>
    <h2>
      <?php
      echo "No.$p date:$day";
      ?>
    </h2>
    <br>
    <h4>
    <?php echo "$imt<br><embed src='$embed_link'type='audio/mp3'autoplay='false'controller='true'width='100'height=40>"; ?>
    </h4>
    <br>
    <p>
      <br>
      <a href="../Funcs/blog.php"target="_self">list</a>/<?php echo "<a href='./delete.php?num=$p'target='_self'>del</a>"; ?>
      <br>
      
    </p>
  </body>
</html>
