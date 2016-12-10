<?php
session_start();
require ('common_function.php');
$time =$_POST['time'];
$section = $_POST['section'];
$ques = $_POST['questions'];
$array = $_POST['quesData'];
$db = dbConn();

$folder = "./" . $_SESSION['cid'] . '_' . $_SESSION['tid'];

mkdir($folder, 0700);


$file = fopen($folder . '/' . $section . "_Q.php", "w");
if ($file) {
    fwrite($file, $_POST['quesData']);
    fclose($file);



}
$tid = $_SESSION['tid'];

if($db==null)
{
    die(0);
}
else{
    $sql =
        "insert into   `test_data`(`TID`,`section`,`questions`,`time`)
          values('$tid','$section','$ques','$time');";

   $result = $db->query($sql) ;

    if(!$result  ){
        die('0');

    }
    else{
        while ($row = $result->fetch_assoc()) {

          echo 1;

        }

    }

}
?>