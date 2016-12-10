<?php
function getMarks($ans,$attempt,$no){
    $marks =0;
    for($i=1;$i<=$no;$i++){
        if($ans[$i]==$attempt[$i] && $ans[$i]!=-1){
            $marks++;
        }
    }
    return $marks;
}

session_start();

$cid = $_SESSION['cid'];
$tid = $_POST['tid'];
$sections = $_POST['sections'];
$data='';
$userData="<users tid=$tid>";
require ('common_function.php');
ini_set("display_startup_errors", 1);
$db = dbConn();
if($db==null)
{
    die(0);
}
$sql= "select * from `users` where `TID`=$tid";
$result = $db->query($sql);
if(!$result){
    die(0);

}
$PIDs=array();
$userData.="<number>".$result->num_rows."</number>";
$users=0;
$folder = "./" . $_SESSION['cid'] . '_' . $_SESSION['tid'];
$ansArray=array();
for($i=0;$i<$sections;$i++){
    $ansString = file_get_contents($folder . '/' . ($i+1) . "_A.php",true);
    $assArray[$i]=explode('#',$ansString);
}
while($row=$result->fetch_assoc()){
    $users++;
    $pid = $row['PID'];
    $PIDs[$users-1]=$pid;
    $userData.="<user id=$users pid=$pid>";
    $userData.="<name>".$row['name']."</name>";
    $userData.="<id>".$row['id']."</id>";
    $userData.="<college>".$row['college']."</college>";
    $userData.="<email>".$row['email']."</email>";
    $userData.="<cgpa>".$row['CGPA']."</cgpa>";
    $userData.="<photo>".$row['photo']."</photo>";

    $userData.="</user>";


}


$userData.="</users>";

$scrData = "<scores tid=$tid>";
for($i=0;$i<$users;$i++){
    $scrData.="<score pid=$PIDs[$i] id=".($i+1).">";
    for($j=0;$j<$sections;$j++){
        $sec = $j+1;
        $sqlTemp0 = "Select * from `test_result` where 
                    `TID`=$tid and `PID`=$PIDs[$i] and `section`=($sec) and `type`=0";
        $sqlTemp1 = "Select * from `test_result` where 
                    `TID`=$tid and `PID`=$PIDs[$i] and `section`=($sec) and `type`=1";
        $result0 = $db->query($sqlTemp0);
        $result1 = $db->query($sqlTemp1);
        if($result0->num_rows==0){

            $scrData.="<sectionMarks id=$sec type=0>0</sectionMarks>";

        }else{
            $attempt = $result0->fetch_array();
            $attempt = explode('#',$attempt['attempt']);
            $ques = $attempt[0];
            $scrData.="<sectionMarks id=$sec type=0>".getMarks($ansArray[$j],$attempt,$ques)."</sectionMarks>";

        }
        if($result1->num_rows==0){
            $scrData.="<sectionMarks id=$sec type=1>0</sectionMarks>";

        }else{
            $attempt = $result1->fetch_array();
            $attempt = explode('#',$attempt['attempt']);
            $ques = $attempt[0];
            $marks =0;
            for($k=0;$k<$ques;$k++){
                $marks += $attempt[$k+1];
            }
            $scrData.="<sectionMarks id=$sec type=1>".$marks."</sectionMarks>";

        }


    }
    $scrData.="</score>";
}
$scrData.="</scores>";
echo "<data>".$userData.$scrData."</data>";
