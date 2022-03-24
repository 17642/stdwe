<?php
require("../head.php");
$ddbb=new mysqli("localhost","root","1029a382","./pages.db");
$title=$_POST['title'];
$imt=$_POST['imt'];
$date=date("Y-md",time());
$src=mysqli_query($ddbb,"SELECT * FROM pages");
$id=mysqli_num_rows($src)+1;
mysqli_query($ddbb,"INSERT INTO pages (id,title,imt,date) VALUES ($id,$title,$imt,$date)");
mysqli_close($ddbb);
?>
<meta http-equiv="refresh" content="0;url=../Funcs/blog.php"/>