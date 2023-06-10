<?php

if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  // Collet the user form data
  $user_name = $_POST["uid"];
  $password = $_POST["pwd"];

  require_once("../CLASSES/dbh.class.php");
  require_once("../CLASSES/login.class.php");
  require_once("../CLASSES/logincotrl.class.php");

  // Instantiate the login controller class
  $signup = new Logincotrl($user_name, $password);
  //Running the error handlers and the user signup
  $signup->login_user();
  // Going back to the profile page
  header("Location: ../profile.php");
  exit();
}