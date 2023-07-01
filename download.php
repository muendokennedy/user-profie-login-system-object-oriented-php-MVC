<?php

if(isset($_REQUEST["filename"])){
  // Decode the parameters

  $file = urldecode($_REQUEST["filename"]);

  $file_path = "UPLOADS/" . $file;

  // Process the download

  if(file_exists($file_path)){
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_path));

    // Flusth the sytem output buffer
    flush();
    // Read file and write it to the output buffer
    readfile($file_path);
    
  }else{
    http_response_code(404);
    die();
  }
  
} else {
  die("Invalid file name");
}