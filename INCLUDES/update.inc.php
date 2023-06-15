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

} elseif(isset($_POST["update-hobby"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    // The hobby update information
    $hobby_name = $_POST["hobby-name"];
    $hobby_more = $_POST["hobby-more"];
    $hobby_photo = $_FILES["hobby-photo"];
    $user_hobby_id = $_POST["user-id"];
    $user_item_id = $_POST["item-id"];
  
    require_once("../CLASSES/dbh.class.php");
    require_once("../CLASSES/update.class.php");
    require_once("../CLASSES/updatecotrl.class.php");

    $update_hobby = new Updatecotrl($hobby_photo);
  
    $update_hobby->insert_hobby_update($hobby_name, $hobby_more, $user_hobby_id, $user_item_id);

    header("Location: ../profile.php?update=success");
    exit();
}