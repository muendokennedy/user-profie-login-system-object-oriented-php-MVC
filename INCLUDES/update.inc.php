<?php
if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

  $first_pic = $_FILES["first-pic"];
  $old_first_pic = $_POST["old-first-pic"];
  $second_pic = $_FILES["second-pic"];
  $old_second_pic = $_POST["old-second-pic"];
  $third_pic = $_FILES["third-pic"];
  $old_third_pic = $_POST["old-third-pic"];
  $user_id = $_POST["user-id"];

  if ($first_pic["name"] !== $old_first_pic) {

    $filename = "../UPLOADS/" . $old_first_pic;

    unlink($filename);
  }
  if ($second_pic["name"] !== $old_second_pic) {

    $filename = "../UPLOADS/" . $old_second_pic;

    unlink($filename);
  }
  if ($third_pic["name"] !== $old_third_pic) {

    $filename = "../UPLOADS/" . $old_third_pic;

    unlink($filename);
  }
  require_once("../CLASSES/dbh.php");
  require_once("../CLASSES/update.php");
  require_once("../CLASSES/updatecotrl.php");

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
} elseif (isset($_POST["update-hobby"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  // The hobby update information
  $hobby_name = $_POST["hobby-name"];
  $hobby_more = $_POST["hobby-more"];
  $hobby_photo = $_FILES["hobby-photo"];
  $old_photo = $_POST["old-photo"];
  $user_hobby_id = $_POST["user-id"];
  $user_item_id = $_POST["item-id"];

  if ($hobby_photo["name"] !== $old_photo) {

    $filename = "../UPLOADS/" . $old_photo;

    unlink($filename);
  }


  require_once("../CLASSES/dbh.php");
  require_once("../CLASSES/update.php");
  require_once("../CLASSES/updatecotrl.php");



  $update_hobby = new Updatecotrl($hobby_photo);

  $update_hobby->insert_hobby_update($hobby_name, $hobby_more, $user_hobby_id, $user_item_id);

  header("Location: ../profile.php?update=success");
  exit();
} elseif (isset($_POST["update-career"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  // The career update information
  $career_name = $_POST["career-name"];
  $career_more = $_POST["career-more"];
  $old_photo = $_POST["old-photo"];
  $career_photo = $_FILES["career-photo"];
  $user_career_id = $_POST["user-id"];
  $user_item_id = $_POST["item-id"];


  if ($career_photo["name"] !== $old_photo) {

    $filename = "../UPLOADS/" . $old_photo;

    unlink($filename);
  }

  require_once("../CLASSES/dbh.php");
  require_once("../CLASSES/update.php");
  require_once("../CLASSES/updatecotrl.php");

  $update_career = new Updatecotrl($career_photo);

  $update_career->insert_career_update($career_name, $career_more, $user_career_id, $user_item_id);

  header("Location: ../profile.php?update=success");
  exit();
} elseif (isset($_POST["update-friend"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  // The friend update information
  $friend_name = $_POST["friend-name"];
  $friend_more = $_POST["relation-more"];
  $old_photo = $_POST["old-photo"];
  $friend_photo = $_FILES["friend-photo"];
  $user_friend_id = $_POST["user-id"];
  $user_item_id = $_POST["item-id"];


  if ($friend_photo["name"] !== $old_photo) {

    $filename = "../UPLOADS/" . $old_photo;

    unlink($filename);
  }

  require_once("../CLASSES/dbh.php");
  require_once("../CLASSES/update.php");
  require_once("../CLASSES/updatecotrl.php");

  $update_friend = new Updatecotrl($friend_photo);

  $update_friend->insert_friend_update($friend_name, $friend_more, $user_friend_id, $user_item_id);

  header("Location: ../profile.php?update=success");
  exit();
} elseif (isset($_POST["update-bio"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  // Profile information
  $nick_name = $_POST["nick-name"];
  $hobby_desc = $_POST["hobbies"];
  $career_desc = $_POST["career"];
  $college_desc = $_POST["college"];
  $highschool_desc = $_POST["highschool"];
  $user_id = $_POST["user-id"];

  require_once("../CLASSES/dbh.php");
  require_once("../CLASSES/update.php");
  require_once("../CLASSES/updatecotrl.php");

  $update_bio = new Updatecotrl("");

  $update_bio->insert_bio_update($nick_name, $hobby_desc, $career_desc, $college_desc, $highschool_desc, $user_id);

  header("Location: ../profile.php?update=success");
  exit();
}
