<?php
if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

  $first_pic = $_FILES["first-pic"];
  $second_pic = $_FILES["second-pic"];
  $third_pic = $_FILES["third-pic"];
  $user_id = $_POST["user-id"];

  require_once("../CLASSES/dbh.class.php");
  require_once("../CLASSES/update.class.php");
  require_once("../CLASSES/updatecotrl.class.php");

  $check_for_update = new Updatecotrl("");

  $data = $check_for_update->check_for_update($user_id);

  $update_profile = new Updatecotrl($first_pic);
  $update_profile->insert_update($user_id, $data[0]["id"]);
  $update_profile = new Updatecotrl($second_pic);
  $update_profile->insert_update($user_id, $data[1]["id"]);
  $update_profile = new Updatecotrl($third_pic);
  $update_profile->insert_update($user_id, $data[2]["id"]);

  header("Location: ../profile.php?update=success");

  exit();

}