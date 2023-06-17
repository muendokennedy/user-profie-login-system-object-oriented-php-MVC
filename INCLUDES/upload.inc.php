<?php
if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  // collect the gallery form information
  $memory_name = $_POST["memory-name"];
  $memory_photo = $_FILES["memory-photo"];
  $user_id = $_POST["user-id"];

    
  require_once("../CLASSES/dbh.class.php");
  require_once("../CLASSES/gallery.class.php");
  require_once("../CLASSES/gallerycotrl.class.php");

  $gallery_upload = new Gallerycotrl($memory_photo);

  $gallery_upload->upload_gallery($memory_name, $user_id);

  header("Location: ../gallery.php?upload=success");

  exit();

}