<?php
session_start();
require ('common_function.php');
$tid = $_SESSION['tid'];
$cid = $_SESSION['cid'];
$pid = $_SESSION['pid'];
$folder = "./" . $_SESSION['cid'] . '_' . $_SESSION['tid'];
$sql =
    "select * from `test_data` where TID='$tid';";
$sections=0;
$db = dbConn();
if($db==null)
{
    die(0);
}else{
    $result = $db->query($sql);

    if(!$result){
        die('0');

    }else{
        echo sprintf("<name >%s</name>",$_SESSION['name']);
        $sections = $result->num_rows;
        echo '<sections>'.$sections.'</sections>';
        $count=0;
        while($row = $result->fetch_assoc()){
            echo sprintf("<question id=%d>%s</question>",$count+1,$row['questions']);
            echo sprintf("<time id=%d>%s</time>",$count+1,$row['time']);
           $file = file_get_contents($folder . '/' . ($count+1) . "_Q.php", true);
              echo sprintf("<sec id=%d>%s</sec>",$count+1,$file);
        $count++;
        }
        die();

    }


}

