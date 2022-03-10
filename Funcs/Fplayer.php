<!DOCTYPE html>
<?php
require("../head.php");
$_F_PATH='../Flash';
$F_LIST=getCurrentFilelist($_F_PATH);
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
            if(in_array($getExt,array('.swf'))){
                array_push($R,basename($filename));
            }
        }
    }
    closedir($handle);
    sort($R);
    return $R;

}


?>
<html lang ="ko">
    <head>
    <title>Page_test</title>
    <meta charset='utf-8'>
    <meta name="robots" content="noindex">
    <link href="./styles/dwpage.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <script src="../Flash/ruffle.js"></script>
    <h1>Fplayer</h1>
    <h2><?php echo "$count files found.";?></h2>
    <h3><?php
    if(isset($_GET["name"])){
        echo "<object type='application/x-shockwave-flash' data='$_F_PATH/$_GET['name']' width='1000' height='500'>";
        echo "<param name='fp' value='$_F_PATH/$_GET['name']/>"
        echo "<param name='allowScriptAccess' value='always'/></object>"
    }
    ?>
    </h3>
    <div><tr><td>Index</td><td>Name</td><td>Size(KB)</td></tr>
            <?php echo "<table>";
                while($ccount<$count){
                    $fsize=filesize($_F_PATH.'/'.$F_LIST[$ccount])/1024;
                    echo"<tr><td>$ccount</td><td><a href='./Fplayer.php?name=$F_LIST[$ccount]'>$F_LIST[$ccount]</a></td><td>$fsize</td></tr>";
                    $ccount=$ccount+1;
                }?></div>
                <p><a href="../logout.php"target="_self">Sign Out</a>/<a href="../main.php"target="_self">Main page</a></p>
    </body>
</html>
