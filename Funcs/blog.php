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
if(!isset($_GET["index"]))$_GET["index"]=1;

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
        <h2><?php echo "$totalcnt"; ?> Page(s) Found.<br></h2>
        <h3>
            <tr>
                <td width="50">No.</td>
                <td width="550">Title</td>
                <td width="150">Date</td>
            </tr>
                <?php
                $s=($_GET["index"]-1)*$rowsPage;
                while($s<$totalpages||$s<$_GET["index"]*$rowsPage){
                    $date=mysqli_query(SELECT * from pages where id=$s);
                    echo "<tr>";
                    echo "<td width='50'>$s</td>";
                    echo "<td width='550'><a href='../pages/view.php?num=$s'></a></td>";
                    echo "<td width='150'>$date</td>";
                    echo "</tr>";
                    $s=$s+1
                }
                ?>
        </h3>
        <h5>
        <?php
        $t=1;
        while($t<$totalPage+1){
            if($t==1){echo "|";}
            if($t==$_GET["index"]){echo "-$t";}
            else{
                echo "-<a href='./blog.php?index=$t'>$t</a>";
            }if($t==$totalPage){echo "-|";}
            $t=$t+1;
        }
        
        ?>
        </h5>

        <p><form action="./newpage.php" method="">
            <br><a href="../logout.php">Sign Out</a>/<a href="../main.php" target="_self">main</a></p>
    </body>
</html>
