
<?php
session_start();
require ('common_function.php');
$email = $_POST['email'];
$password = $_POST['password'];
  $password = sha1($password);
  $db = dbConn();
if($db==null)
{
    die(0);
}
else{
    $sql =
        "SELECT  * from  `company` 
        where   `password`='$password' and `email`='$email';";

    $result = $db->query($sql) ;

    if(!$result  || $result->num_rows==0){
         die('0');

    }
    else{
        while ($row = $result->fetch_assoc()) {
          echo "<cid>".$row['CID']."</cid>";
         $_SESSION['cid']=$row['CID'];
            $_SESSION['name']=$row['name'];

        }
        
    }

}
?>