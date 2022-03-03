<?php
require("../head.php");
$ddbb=new mysqli("localhost","root","1029a382","./pages.db");
if($ddbb->connect_error){
    die("connect failed".$conn->connect_error);
    exit;
}
?>