<?php
if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

  $first_pic = $_FILES["first-pic"];
  $second_pic = $_FILES["second-pic"];
  $third_pic = $_FILES["third-pic"];

  // Profile information
  $nick_name = $_POST["nick-name"];
  $hobby_desc = $_POST["hobbies"];
  $career_desc = $_POST["career"];
  $college_desc = $_POST["college"];
  $highschool_desc = $_POST["highschool"];

  //The hobby information
  $hobby_name = $_POST["hobby-name"];
  $hobby_more = $_POST["hobby-more"];
  $hobby_photo = $_FILES["hobby-photo"];

  require_once("../CLASSES/dbh.class.php");
  require_once("../CLASSES/profile.class.php");
  require_once("../CLASSES/profilecotrl.class.php");
  require_once("../CLASSES/profileinfo.class.php");
  require_once("../CLASSES/profileinfocotrl.php");

  $profile = new Profilecotrl($first_pic);
  $profile->insert_picture();
  $profile = new Profilecotrl($second_pic);
  $profile->insert_picture();
  $profile = new Profilecotrl($third_pic);
  $profile->insert_picture();

  $college_desc = $_POST["college"];
  $profile_info = new Profileinfocotrl($nick_name, $hobby_desc, $career_desc, $college_desc, $highschool_desc);
  $profile_info->insert_info();

  $hobby_photo = new Profilecotrl($hobby_photo);
  $hobby_photo->insert_picture();


  header("Location: ../profile_input.php?upload=success");
  exit();

}