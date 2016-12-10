<?php
session_start();
ini_set("display_startup_errors", 1);
require('common_function.php');
$code = $_POST['code'];
$questions = $_POST['totQues'];
$question = $_POST['question'];
$section = $_POST['section'];
$pid = $_SESSION['pid'];
$tid = $_SESSION['tid'];
$folder = "./" . $_SESSION['cid'] . '_' . $_SESSION['tid'] . '_code';
$folder1 = $_SESSION['cid'] . '_' . $_SESSION['tid'] . '_code';
if (!is_dir($folder)) {
    mkdir($folder);

}
$marks = 0;
//code format pid_section_question_{temp|attempt}
$fileName = $pid . '_' . $section . '_' . $question . "_attempt.cpp";
$fileName2 = $pid . '_' . $section . '_' . $question . "_temp.cpp";

$file = fopen($folder . '/' . $fileName2, "w");
if ($file) {
    fwrite($file, $code);
    fclose($file);
    $path = $_SERVER['DOCUMENT_ROOT'] . '/' . $folder1 . '/' . $fileName2;

    system('g++ ' . $path . ' -o ' . $path . '.exe 2>&1', $output);

    if ($output == 0) {
        $descriptorspec = array(
            0 => array("pipe", "r"),
            1 => array("pipe", "w"),
            2 => array("file", $folder . '/' . $pid . "_error-output.txt", "a")
        );

        for ($i = 0; $i < 5; $i++) {
            $process = proc_open($path . '.exe', $descriptorspec, $pipes);
            $inputFile = "./" . $_SESSION['cid'] . '_' . $_SESSION['tid'].'/'.$section.'_'.$question."_".($i+1).'_I.php';
            $outputFile = "./" . $_SESSION['cid'] . '_' . $_SESSION['tid'].'/'.$section.'_'.$question."_".($i+1).'_O.php';
            $input= file_get_contents($inputFile, true);
            $trueOutput =  file_get_contents($outputFile, true);
            if (is_resource($process)) {
                fwrite($pipes[0], $input . '\n');
                $output = stream_get_contents($pipes[1]);
                fclose($pipes[1]);
                fclose($pipes[0]);
                $return_value = proc_close($process);


                if ($return_value != 0) {
                    echo "Runtime Error\n";
                    $output = file_get_contents($folder . '/' . $pid . "_error-output.txt", true);
                    print $output;

                } else {
                        if($trueOutput==$output){
                            $marks++;
                            echo 'marks = '.$marks;
                        }

                }
            } else {
                echo "Server Error";
            }
        }
    } else {
        echo "Compilation Error\n";

        echo $output;
    }
     $marksFile =  "./" . $_SESSION['cid'] . '_' . $_SESSION['tid'].'/'.$pid.'_'.$section.'_marks.php';
    $file = fopen($folder . '/' . $fileName, "w");

    if(file_exists($marksFile)){
     $temp=   file_get_contents($marksFile, true);
        $marray=explode('#',$temp);
        if($marray[$question]<=$marks){
            fwrite($file, $code);

        }
        $marray[$question]=max($marks,$marray[$question]);
        fclose($file);
    }else{


        fwrite($file, $code);
        fclose($file);
        $marray[0]=$questions;
        for($i=0;$i<$questions;$i++)
        {$marray[$i+1]=0;}

        if($marray[$question]<$marks){
            $marray[$question]=$marks;

        }

    }
    echo $marray;
$write=$questions;
     for($i=1;$i<=$questions;$i++)
    {        echo $write."<br>";

        $write=$write.'#'.$marray[$i];
    }



    $file = fopen($marksFile, "w");

    fwrite($file, $write);
    fclose($file);


}