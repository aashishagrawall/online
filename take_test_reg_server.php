<?php
session_start();
require ('common_function.php');
$email = $_POST['email'];
$id= $_POST['id'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$cgpa = $_POST['cgpa'];
$college = $_POST['college'];
$tid = $_POST['code'];
$photo = $_POST['photo'];

$db = dbConn();
$date ='';
$from='';
$till = '';
date_default_timezone_set('Asia/Kolkata');

if($db==null)
{
    die(0);
}
else{
    $sql1 = "select * from  `tests`  where
             TID='$tid';";
    $result = $db->query($sql1);
    $res1 = $result;
    if(!$result   ){

        die('0');

    }
    else if($result->num_rows==0){

        die("3");
    }

    while ($row = $res1->fetch_assoc()) {
        $_SESSION['cid']=$row['CID'];
       $date = $row['date'];
        $from = $row['timeFrom'];
        $till = $row['timeTill'];
        $_SESSION['name'] = $row['name'];
    }

     $temp = getdate();
    $hour=$temp['hours'];
    if($hour>=0 && $hour<=9)
    {
        $hour='0'.$hour;
    }

    $hourMin = $hour.':'. $temp['minutes'];
     $temp=$temp['year'].'-'.$temp['mon'].'-'.$temp['mday'];
       if(strcmp($hourMin,$from)==1 && strcmp($till,$hourMin)==1 && $date==$temp){

    }else{
        die('4');
    }




    $sql0 = "select * from  `users`  where
             id='$id' and TID='$tid';";
     $result = $db->query($sql0);
    if(!$result   ){

        die('0');

    }
    else if($result->num_rows==1){

        die("1");
    }
    $sql =
        "INSERT  into `users` (`email`,`name`,`id`,`college`,`cgpa`,`TID`,`photo`)
    VALUES('$email','$name','$id','$college','$cgpa','$tid','$photo');";



    if(!$result = $db->query($sql)){

        die('0');

    }
    else{
        $sql0 = "select * from  `users`  where
             `id`='$id' and `TID`='$tid';";
        $result = $db->query($sql0);
        while($row=$result->fetch_assoc()){
            $_SESSION['pid'] =$row['PID'];
        }

        $_SESSION['tid'] =$tid;

        echo "2";
    }

}
?>