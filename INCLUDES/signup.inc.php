<?php

if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  // Collet the user form data

  $first_name = $_POST["fname"]; 
  $last_name = $_POST["lname"];
  $email = $_POST["email"];
  $user_name = $_POST["uid"];
  $password = $_POST["pwd"];
  $password_repeat = $_POST["confirm-pwd"];
  $code = rand(11121, 99990);
  $status = "unactivated";

  require_once("../CLASSES/dbh.class.php");
  require_once("../CLASSES/signup.class.php");
  require_once("../CLASSES/signupcotrl.class.php");

  // Instantiate the signup controller class
  $signup = new Signupcotrl($first_name, $last_name, $email, $user_name, $password, $password_repeat, $code, $status);
  //Running the error handlers and the user signup
  $signup->sigup_user();
  // Going back to the front page
  // mail the user for account activation
  // $mail_to = $email;
  // $message = "Your account verification code is: ";
  // $txt = "You have received an email from personara " . "\n\n" . $message .$code;
  // $subject = "Email verification";
  // $sender = "From: PERSONARA";
  
  // mail($mail_to, $subject, $txt, $sender);
  
  header("Location: ../login.php");
  exit();
}