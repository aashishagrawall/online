<?php
session_start();
$folder = "./" . $_SESSION['cid'] . '_' . $_SESSION['tid'];

$section = $_POST['section'];

$file = fopen($folder . '/' . $section . "_A.php", "w");
if ($file) {
    fwrite($file, $_POST['questions'].'#'.$_POST['ansData']);
    fclose($file);

    echo '1';

} 