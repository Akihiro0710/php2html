<?php
require_once "system/config.php";
require_once "system/converter.php";
convert($input_root."layout/index.php", $output_root."index.html");
require "html/index.html";
?>