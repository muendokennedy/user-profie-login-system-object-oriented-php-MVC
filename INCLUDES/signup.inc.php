<?php

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  // Collet the user form data

  $first_name = $_POST["fname"];
  $last_name = $_POST["lname"];
  $email = $_POST["email"];
  $user_name = $_POST["uid"];
  $password = $_POST["pwd"];
  $password_repeat = $_POST["confirm-pwd"];
  $code = rand(11121, 99990);
  $status = "unactivated";

  require_once("../CLASSES/dbh.php");
  require_once("../CLASSES/signup.php");
  require_once("../CLASSES/signupcotrl.php");

  // Instantiate the signup controller class
  $signup = new Signupcotrl($first_name, $last_name, $email, $user_name, $password, $password_repeat, $code, $status);
  //Running the error handlers and the user signup
  $signup->sigup_user();

  header("Location: ../profile_input.php");
  exit();
}
