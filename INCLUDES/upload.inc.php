<?php
use profile\app\Gallerycotrl;
    //Load Composer's autoloader
    require '../vendor/autoload.php';
if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  // collect the gallery form information
  $memory_name = $_POST["memory-name"];
  $memory_photo = $_FILES["memory-photo"];
  $user_id = $_POST["user-id"];

  $gallery_upload = new Gallerycotrl($memory_photo);

  $gallery_upload->upload_gallery($memory_name, $user_id);

  header("Location: ../gallery.php?upload=success");

  exit();
}