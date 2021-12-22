<?php
require("../head.php");
$DIR_PATH='../Files';
$F_LIST=getCurrentFileList($DIR_PATH);
$count=count($F_LIST);
$ccount=0;


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
}?>
<!DOCTYPE html>
<html>
    <head>
        <title>Download</title>
        <meta charset="utf-8">
        <link href="./styles/dwpage.css" rel="stylesheet" type="text/css">
        <meta name="robots" content="noindex">
    </head>
    <body>
        <h1>Online Storage</h1>
        <h2><?php echo "$count files found.";?></h2>
        <div><tr><td>Index</td><td>Name</td><td>Size(KB)</td></tr>
            <?php echo "<table>";
                while($ccount<$count){
                    $fsize=filesize($DIR_PATH.$R[$ccount])/1024;
                    echo"<tr><td>$ccount</td><td><a href='_DIR_PATH$R[$ccount]' download='$R[$ccount]'>$R[$ccount]</a></td><td>$fsize</td></tr>";
                    $ccount=$ccount+1;
                }?></div>
        <h4><form action="./upload.php" method="post" enctype="multipart/form-data"><input type="file" name="pfile">-><input type="submit" value="Upload"></h4>
        <p><a href="../logout.php"target="_self">Sign Out</a>/<a href="../main.php"target="_self">Main page</a></p>
    </body>
</html>
