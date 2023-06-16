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

} elseif(isset($_POST["update-career"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  // The career update information
  $career_name = $_POST["career-name"];
  $career_more = $_POST["career-more"];
  $career_photo = $_FILES["career-photo"];
  $user_career_id = $_POST["user-id"];
  $user_item_id = $_POST["item-id"];

  require_once("../CLASSES/dbh.class.php");
  require_once("../CLASSES/update.class.php");
  require_once("../CLASSES/updatecotrl.class.php");

  $update_career = new Updatecotrl($career_photo);

  $update_career->insert_career_update($career_name, $career_more, $user_career_id, $user_item_id);

  header("Location: ../profile.php?update=success");
  exit();
} elseif(isset($_POST["update-friend"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  // The friend update information
  $friend_name = $_POST["friend-name"];
  $friend_more = $_POST["relation-more"];
  $friend_photo = $_FILES["friend-photo"];
  $user_friend_id = $_POST["user-id"];
  $user_item_id = $_POST["item-id"];

  require_once("../CLASSES/dbh.class.php");
  require_once("../CLASSES/update.class.php");
  require_once("../CLASSES/updatecotrl.class.php");

  $update_friend = new Updatecotrl($friend_photo);

  $update_friend->insert_friend_update($friend_name, $friend_more, $user_friend_id, $user_item_id);

  header("Location: ../profile.php?update=success");
  exit();
}