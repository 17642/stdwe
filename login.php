<?php
if(!isset($_POST['pwd'])) exit;
$pwd=$_POST['pwd'];
$spwd=fopen("./PWD.DB","r") or die("ERROR");
$pwds=fgets($spwd);
fclose($spwd);
if($pwds!=$pwd){
    echo "<script>alert('I don't think this password is correct')</script>";
    history.back();
    exit;
}
session_start();
?>
<meta http-equiv='refresh' content='0;url=main.html'>