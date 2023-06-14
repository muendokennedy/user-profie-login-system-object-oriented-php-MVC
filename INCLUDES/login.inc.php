<?php
if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  // Collet the user form data
  $user_name = $_POST["uid"];
  $password = $_POST["pwd"];

  require_once("../CLASSES/dbh.class.php");
  require_once("../CLASSES/login.class.php");
  require_once("../CLASSES/logincotrl.class.php");

  // Instantiate the login controller class
  $login = new Logincotrl($user_name, $password);
  //Running the error handlers and the user signup
  $login->login_user();
  // if the login the session contains a variable from the login process
  header("Location: ../profile.php");
  exit();
}