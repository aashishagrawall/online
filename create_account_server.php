<?php
session_start();
require ('common_function.php');
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
 $password = sha1($password);

 $db = dbConn();
if($db==null)
{
    die(0);
}
else{
    $sql =
    "INSERT  into `company` (`email`,`name`,`password`)
    VALUES('$email','$name','$password');";


    if(!$result = $db->query($sql)){

        die('0');

    }
    else{
        echo "1";
    }

}
?>