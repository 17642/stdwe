<?php
if(!isset($_POST['pwd'])) exit;
$pwd=$_POST['pwd'];
$spwd=getenv('SSERV_KEY') or die("ERROR");
if($spwd!=$pwd){
    echo "<script>alert('I don\'t think this password is correct')</script>";
    header('location:',$_SERVER['HTTP_REFFER']);
    exit;
}
session_start();
$_SESSION['user']=TRUE
?>
<meta http-equiv='refresh' content='0;url=./main.php'>
