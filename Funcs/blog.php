<?php
require('../head.php');

$ddbb=new mysqli("localhost","root","1029a382","../pages/pages.db");
if($ddbb->connect_error){
    die("connect failed".$conn->connect_error);
    exit;
}
$totalcnt=mysqli_num_rows(mysqli_query($ddbb,"SELECT * FROM pages"));


$rowsPage=20;
$totalPage=ceil($totalcnt/$rowsPage);
if($totalPage==0) ++$totalPage;
if(!isset($_GET["Index"]))$_GET["Index"]=0;

?>
<!DOCTYPE html>
<html>
    <head>
        <title>PAGE_TEST</title>
        <meta charset='utf-8'>
        <link href="../styles/bpage.css" rel="stylesheet" type="text/css">
        <meta name="robots" content="noindex">
    </head>
    <body>
        <h1>Pages</h1>
        >
        <p><a href="../logout.php">Sign Out</a>/<a href="../main.php" target="_self">main</a></p>
    </body>
</html>
