<?php
require dirname(__FILE__)."/config.php";

$str = file_get_contents($input_root."index.php");
echo $str;
?>