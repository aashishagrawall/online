<?php


include("moss.php");
$userid=550004239;
  // Enter your MOSS userid
$moss = new MOSS($userid);
$moss->setLanguage('cc');
$moss->addByWildcard('test/*');
$moss->addBaseFile('1_3_code/Example.java');
$moss->setCommentString("This is a test");
print_r($moss->send());
?>