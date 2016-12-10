<?php
session_start();
$ques = $_POST['questions'];
$data = $_POST['IO'];
$section = $_POST['section'];
$folder = "./" . $_SESSION['cid'] . '_' . $_SESSION['tid'];

$data = explode('#',$data);
$tot = 0;
 
for($i=0;$i<$ques;$i++){
    $q = $data[$tot];
    $tot++;
    $in='';$out = '';
    for($j=0;$j<5;$j++){
        $in = $data[$tot];$tot++;
        $out = $data[$tot];$tot++;
        $file = fopen($folder . '/' . $section .'_'.$q.'_'.($j+1)."_I.php", "w");
        fwrite($file, $in);
        fclose($file);
        $file = fopen($folder . '/' . $section .'_'.$q.'_'.($j+1)."_O.php", "w");
        fwrite($file, $out);
        fclose($file);
    }
}
echo 1;

?>