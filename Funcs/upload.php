<!DOCTYPE html>
<?php
require("../head.php");
$DIR_PATH="../Files";
$extnacpted=array('.html','.css','.jsp','.php','.htaccess','.json');
#$acfsize=512;

$error=$_FILES['pfile']['error'];
$name=$_FILES['pfile']['name'];
$ext=array_pop(explode('.',$name));

function getCurrentFilelist($dir){
    $handle=opendir($dir);
    $R=array();
    while($filename=readdir($handle)){
        if($filename=='.'||$filename=='..'||$filename=='download.php')continue;
        $filepath=$dir.'/'.$filename;
        if(is_file($filepath)){
            $getExt=pathinfo($filename,PATHINFO_EXTENSION);
            if(!in_array($getExt,array('.php','.html','.jsp','.net'))){
                array_push($R,basename($filename));
            }
        }
    }
    closedir($handle);
    sort($R);
    return $R;
}

if($error!=UPLOAD_ERR_OK){
    switch($error){
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            echo "<script>alert('This file seems too large')</script>";
            break;
        case UPLOAD_ERR_NO_FILE:
            echo "<script>alert('This file doesn't seem to exist')</script>";
            break;
        default:
            echo "<script>alert('There seems to be some kind of an error')</script>";
    
    }
    header('location:',$_SERVER['HTTP_REFFER']);
    exit;
    
}
if(in_array($ext,$extnacpted)){
    echo "<script>alert('It seems that this extension cannot be accepted.')</script>";
    header('location:',$_SERVER['HTTP_REFFER']);
    exit;
}
if (in_array($name,getCurrentFilelist($DIR_PATH))){
    echo "<script>alert('This file may already exist.')</script>";
    header('location:',$_SERVER['HTTP_REFFER']);
    exit;
}


move_uploaded_file($_FILES['pfile']['tmp_name'],"$DIR_PATH/$name");
?>
<meta http-equiv='refresh' content='0;url=./download.php'>
