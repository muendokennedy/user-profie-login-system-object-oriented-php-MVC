<?php
use profile\app\DeleteCotrl;
  //Load Composer's autoloader
  require '../vendor/autoload.php';

// Delete the filename from the database
$delete_gallery_item = new DeleteCotrl($_GET["userid"], $_GET["id"]);
$delete_gallery_item->delete_gallery_photo($_GET["resource"]);

// Delete the media file the uploads folder
$filename = "../UPLOADS/" . $_GET["name"];

unlink($filename);

if ($_GET["resource"] == "gallery") {
  header("Location: ../gallery.php?msg=successdelete");
  exit();
}
header("Location: ../profile.php?msg=successdelete");
exit();