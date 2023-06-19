<?php
if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  // Collet the user form data
  $user_name = $_POST["uid"];
  $password = $_POST["pwd"];
  $remember = $_POST["remember"] ?? "";

  require_once("../AUTOLOADER/loader.php");

  Loader::load_class("../CLASSES");

  // Instantiate the login controller class
  $login = new Logincotrl($user_name, $password);
  //Running the error handlers and the user signup
  $login->login_user($remember);
  // if the login the session contains a variable from the login process
  header("Location: ../profile.php");
  exit();
}