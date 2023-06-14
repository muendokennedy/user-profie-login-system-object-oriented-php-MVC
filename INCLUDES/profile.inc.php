<?php
if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

  $first_pic = $_FILES["first-pic"];
  $second_pic = $_FILES["second-pic"];
  $third_pic = $_FILES["third-pic"];
  $user_id = $_POST["user-id"];

  // Profile information
  $nick_name = $_POST["nick-name"];
  $hobby_desc = $_POST["hobbies"];
  $career_desc = $_POST["career"];
  $college_desc = $_POST["college"];
  $highschool_desc = $_POST["highschool"];
  $user_id = $_POST["user-id"];

  //The hobby information
  $hobby_name = $_POST["hobby-name"];
  $hobby_more = $_POST["hobby-more"];
  $hobby_photo = $_FILES["hobby-photo"];
  $user_id = $_POST["user-id"];

  // The career information
  $career_name = $_POST["career-name"];
  $career_more = $_POST["career-more"];
  $career_photo = $_FILES["career-photo"];
  $user_id = $_POST["user-id"];

  // The friend information
  $friend_name = $_POST["friend-name"];
  $friend_more = $_POST["relation-more"];
  $friend_photo = $_FILES["friend-photo"];
  $user_id = $_POST["user-id"];

  require_once("../CLASSES/dbh.class.php");
  require_once("../CLASSES/profile.class.php");
  require_once("../CLASSES/profilecotrl.class.php");
  require_once("../CLASSES/profileinfo.class.php");
  require_once("../CLASSES/profileinfocotrl.class.php");

  $profile = new Profilecotrl($first_pic);
  $profile->insert_picture($user_id);
  $profile = new Profilecotrl($second_pic);
  $profile->insert_picture($user_id);
  $profile = new Profilecotrl($third_pic);
  $profile->insert_picture($user_id);

  $profile_info = new Profileinfocotrl($nick_name, $hobby_desc, $career_desc, $college_desc, $highschool_desc, $user_id);
  $profile_info->insert_info();

  $hobby_info = new Profilecotrl($hobby_photo);
  $hobby_info->insert_hobbies($hobby_name, $hobby_more, $user_id);

  $career_info = new Profilecotrl($career_photo);
  $career_info->insert_careers($career_name, $career_more, $user_id);

  $friend_info = new Profilecotrl($friend_photo);
  $friend_info->insert_friends($friend_name, $friend_more, $user_id);

  header("Location: ../login.php?upload=successloginnow");
  exit();

}