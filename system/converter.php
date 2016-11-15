<?php
function convert($input, $output){
  try{
    $content = file_get_contents($input."?mode=convert");
    saveFile($output, $content);
  }catch(Exception $e){
    throw new Exception("failed to convert file [$input]", $e->getCode(), $e);
  }
}

function saveFile($path, $content){
  $hundle = null;
  try{
    // make file
    if(!file_exists($path)){
      touch($path);
    }
    // change permission
    chmod($path, 0666);
    // file write
    $handle = fopen($path, 'w');
    fwrite($handle, $content);
    fclose($handle);
  }catch(ErrorException $e){
    if(!is_null($handle)){
      fclose($handle);
    }
    throw $e;
  }
}
?>