<?php
session_start();

require ('common_function.php');
$code = $_POST['code'];
$input = $_POST['input'];
$question = $_POST['question'];
$section = $_POST['section'];
$pid = $_SESSION['pid'];
$tid = $_SESSION['tid'];
$folder = "./" . $_SESSION['cid'] . '_' . $_SESSION['tid'].'_code';
$folder1 =  $_SESSION['cid'] . '_' . $_SESSION['tid'].'_code';
if(!is_dir($folder)){
    mkdir($folder);

}

//code format pid_section_question_{temp|attempt}
$fileName = $pid.'_'.$section .'_'.$question. "_temp.cpp";
$file = fopen($folder . '/' .$fileName, "w");
if ($file) {
    fwrite($file,$code);
    fclose($file);
    $path = $_SERVER['DOCUMENT_ROOT'].'/'.$folder1.'/'.$fileName;

     system('g++ '.$path.' -o '.$path.'.exe 2>&1',$output);

    if($output==0) {
        $descriptorspec = array(
            0 => array("pipe", "r"),
            1 => array("pipe", "w"),
            2 => array("file", $folder.'/'.$pid."_error-output.txt", "a")
        );

        $process = proc_open($path.'.exe', $descriptorspec, $pipes);

        if (is_resource($process)) {
            fwrite($pipes[0], $input.'\n');
            $output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            fclose($pipes[0]);
            $return_value = proc_close($process);


            if($return_value!=0){
                echo "Runtime Error\n";
                $output = file_get_contents($folder.'/'.$pid."_error-output.txt", true);
                print $output;

            }
            else{

                print $output;
            }
        } else {
            echo "Server Error";
        }

    }else{
        echo  "Compilation Error\n" ;

        echo $output;
    }
}