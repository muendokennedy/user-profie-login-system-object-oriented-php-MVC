<?php
if(isset($_POST["reset-code-submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

  session_start();

  $code = $_POST["V_code"];

  require_once("../AUTOLOADER/loader.php");

  Loader::load_class("../CLASSES");

  $auth = new Activationcotrl();

  $result = $auth->authenticate($_SESSION["reset-email"], $code);

  // start a tokenezed session
  if($result){

    $url = $auth->session_token($_SESSION["reset-email"]);
  }

  // send email to the user for the email reset link

  $to = $_SESSION["reset-email"];

  $subject = "Reset your password for PERSONARA";

  $message = "<p>We received a password reset request from this email. The link to reset your password is below. If you did not make this request you can ignore this email.</p>";

  $message .= "<p>Here is your password reset link: <br>";

  $message .= '<a href="'. $url .'">Set new password now</a></p>';

  $headers = "From: PERSONARA <kennedymunyao999@gmail.com>\r\n";

  $headers .= "Reply To: kennedymunyao999@gmail.com\r\n";
  
  $headers .= "Content-Type: text/html\r\n";

  mail($to, $subject, $message, $headers);

  session_unset();
  session_destroy();
  
  header("Location: ../verify_code.php?reset=successcheckemail");


  exit();

} elseif(isset($_POST["activation-code-submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

  session_start();

  $_SESSION["activation-email"];

  $code = $_POST["V_code"];

  require_once("../AUTOLOADER/loader.php");

  Loader::load_class("../CLASSES");

  $activate = new Activationcotrl();

  $activate->activation_process($code,  $_SESSION["activation-email"]);

  // redirect the user to the login page

  session_unset();
  session_destroy();

  header("Location: ../login.php?activation=successloginnow");

  exit();


}