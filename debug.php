<?php



echo mkdir("./sd", 0700);

$file = fopen("./sd/test.txt","w");
echo fwrite($file,"Hello World. Testing!");
fclose($file);
?>