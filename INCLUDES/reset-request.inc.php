<?php

if(isset($_POST["reset-request-submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  // start a session which will store the users email till the end of the reset process
  session_start();

  // The user wil have submitted the email through the form handled by this script
  $user_email = $_POST["v_email"];

  $_SESSION["reset-email"] = $user_email;

  require_once("../AUTOLOADER/loader.php");

  Loader::load_class("../CLASSES");

  $activation_session = new Activationcotrl();

  // Also check whethe the email is empty from this class
  
  $new_code = $activation_session->generate_session($user_email);

  // send mail to the user to enter the code

  $subject = "Verify your PERSONARA account";

  $message = "<p>We received a password reset request from this email. The code to verify your account is below. If you did not make this request you can ignore this email.</p>";

  $message .= "<p>Your account vefification code: </p>";

  $message .= "<h3>" . $new_code . "</h3>";

  $headers = "From: PERSONARA <kennedymunyao999@gmail.com>\r\n";

  $headers .= "Reply To: kennedymunyao999@gmail.com\r\n";
  
  $headers .= "Content-Type: text/html\r\n";

  mail($user_email, $subject, $message, $headers);

  header("Location: ../verify_code.php?msg=checkemail");

  exit();

} elseif(isset($_POST["activation-request-submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

  session_start();

  $user_email = $_POST["v_email"];

  $_SESSION["activation-email"] = $user_email;

  require_once("../AUTOLOADER/loader.php");

  Loader::load_class("../CLASSES");

  // get to the database fetch the current code and sent it this user
  $user_active = new Activationcotrl();

  $code = $user_active->activate_account($user_email);

  // send this code to the user

  $subject = "Activate your PERSONARA account";

  $message = "<p>We received an account activation request from this email. The code to activate your account is below. If you did not make this request you can ignore this email.</p>";

  $message .= "<p>Your account activation code: </p>";

  $message .= "<h3>" . $code . "</h3>";

  $headers = "From: PERSONARA <kennedymunyao999@gmail.com>\r\n";

  $headers .= "Reply To: kennedymunyao999@gmail.com\r\n";
  
  $headers .= "Content-Type: text/html\r\n";

  mail($user_email, $subject, $message, $headers);

  header("Location: ../verify_code_first.php?msg=checkemail");

  exit();
}
