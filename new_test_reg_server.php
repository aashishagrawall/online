
<?php
session_start();
require ('common_function.php');
$testName = $_POST['testName'];
$dot = $_POST['dot'];
$validFrom=$_POST['validFrom'];
$validTill=$_POST['validTill'];
$cid = $_SESSION['cid'];
$db = dbConn();
if($db==null)
{
    die(0);
}
else{
    $sql =
        "insert into  `tests`(`CID`,`date`,`timeFrom`,`timeTill`,`name`) values ('$cid','$dot','$validFrom','$validTill','$testName')  ;";

    $result = $db->query($sql);

    if(!$result){
    die('0');

}
    else{

        $sql =
            "select * from  `tests` where CID='$cid' order by TID DESC ;";
        $result = $db->query($sql);

        if(!$result){
            die('0');

        }
        else{
            echo '1';
            while ($row = $result->fetch_assoc()) {

                $_SESSION['tid']=$row['TID'];
                $_SESSION['testName']=$row['name'];
                
                die();
            }
        }

    }

}
?>