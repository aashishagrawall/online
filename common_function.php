 <?php

 $server = "localhost";
 $user = 'root';
 $password ='root';
 $database = 'testden';

 function dbConn(){
     $db = new mysqli("localhost", 'root', 'root', 'testden');
     if($db->connect_errno > 0){


         return null;
     }
     else{
        
         return $db;
     }
 }



?>