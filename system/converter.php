<?php
require dirname(__FILE__)."/config.php";

$content = file_get_contents($input_root."index.php");
echo $content;
saveFile($output_root."index.html", $content);

function saveFile($path, $content){
  // make file
  if(!file_exists($path)){
    touch($path);
  }
}
?>