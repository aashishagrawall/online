<?php
session_start();
require ('common_function.php');
ini_set("display_startup_errors", 1);
$cid = $_SESSION['cid'];
$temp = getdate();
$new=0;$old=0;
$db = dbConn();
$date =$temp['year'].'-'.$temp['mon'].'-'.$temp['mday'];
$time = $temp['hours'].'-'.$temp['minutes'];
  $oldInfo ='<old>';
$newInfo='<new>';
if($db==null)
{
    die(0);
}

$sql = "select * from   `tests` where `CID` ='$cid' ";
$result = $db->query($sql);
if(!$result){
    die(0);

}
while($row=$result->fetch_assoc()){
    $tid = $row['TID'];
    if($row['date']<$date || ($row['date']==$date && $row['timeTill']>$time)){
        //old
        $old++;

        $oldInfo.="<test id=$old tid=$tid>";
        $oldInfo.="<name >".$row['name']."</name >";
        $oldInfo.="<date>".$row['date']."</date>";
        $oldInfo.="<to>".$row['timeFrom']."</to>";
        $oldInfo.="<from>".$row['timeTill']."</from >";

        $sql = "select * from `test_data` where `TID`=$tid";
        $res = $db->query($sql);
        if(!$res){
            die(0);

        }
        $tot=0;
        $oldInfo.="<sections>".$res->num_rows."</sections>";
        while($sec=$res->fetch_assoc()){
            $tot++;
            $oldInfo.="<questions id=$tot>".$sec['questions']."</questions>";
            $oldInfo.="<time id=$tot>".$sec['time']."</time>";

        }
        $oldInfo.="</test>";

    }else{
        $new++;

        $newInfo.="<test id=$new tid=$tid>";
        $newInfo.="<name >".$row['name']."</name >";
        $newInfo.="<date>".$row['date']."</date>";
        $newInfo.="<to>".$row['timeFrom']."</to>";
        $newInfo.="<from>".$row['timeTill']."</from >";

        $sql = "select * from `test_data` where `TID`=$tid";
        $res = $db->query($sql);
        if(!$res){
            die(0);

        }
        $tot=0;
        $newInfo.="<sections>".$res->num_rows."</sections>";
        while($sec=$res->fetch_assoc()){
            $tot++;
            $newInfo.="<questions id=$tot>".$sec['questions']."</questions>";
            $newInfo.="<time id=$tot>".$sec['time']."</time>";

        }
        $newInfo.="</test>";
    }
}
$oldInfo.="</old>";
$newInfo.="</new>";
echo "<pre>";
echo $oldInfo;echo $newInfo;
echo "</pre>";