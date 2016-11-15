<?php
require_once "system/config.php";
require_once "system/converter.php";
foreach (getFileList($input_local_root) as $path){
  $path = str_replace($input_local_root, "", $path);
  echo "<p>".$path."</p>";
  convert($input_root.$path, $output_root.str_replace(".php", ".html", $path));
}
function getFileList($dir){
  $files = scandir($dir);
  $files = array_filter($files, function ($file){
    return !in_array($file, array('.', '..'));
  });

  $list = array();
  foreach ($files as $file){
    $fullpath = rtrim($dir, '/') . '/' . $file;
    if (is_file($fullpath)){
      $list[] = $fullpath;
    }
    if (is_dir($fullpath)){
      $list = array_merge($list, getFileList($fullpath));
    }
  }
  return $list;
}
?>