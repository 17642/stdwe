<?php
require("../head.php");
$ddbb=new mysqli("localhost","root","1029a382","./pages.db");
if($ddbb->connect_error){
    die("connect failed".$conn->connect_error);
    exit;
}
$d=$_GET["num"];
mysqli_query($ddbb,"DELETE * FROM pages WHERE id=$d");
mysqli_query($ddbb,"UPDATE pages SET id=id-1 WHERE id>$d");
mysqli_close($ddbb);
?>
<meta http-equiv="refresh" content="0;url=../Funcs/blog.php"/>