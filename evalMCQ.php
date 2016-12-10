<?php
session_start();
require ('common_function.php');

ini_set('display_errors', 1);

try {
    $sections = $_GET['section'];
    $ques = $_GET['ques'];
    $tid = $_SESSION['tid'];
    $pid = $_SESSION['pid'];
    $con = $ques;
    $marksFile =  "./" . $_SESSION['cid'] . '_' . $_SESSION['tid'].'/'.$pid.'_'.$sections.'_marks.php';
     $codemarks  =file_get_contents($marksFile,true);

    echo $tid . $pid;
    for ($i = 1; $i <= $ques; $i++) {
        $con = $con . '#' . $_POST['A'][$i];
    }
    echo $con;
//0 for mcq , 1 for code
    $db = dbConn();
    $sql = "insert into `test_result` values('$tid','$pid','$sections','$con',0)";

    if ($db == null) {

        die(0);

    }
    $result = $db->query($sql);

    if (!$result) {


        die('0');

    } else {
        $sql = "insert into `test_result` values('$tid','$pid','$sections','$codemarks',1)";
        $result = $db->query($sql);

        if (!$result) {


            die('0');

        }
    }
}catch (Exception $e){
    echo $e->getMessage();

}