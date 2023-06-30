<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["reset-request-submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    //Load Composer's autoloader
  require '../vendor/autoload.php';

  // start a session which will store the users email till the end of the reset process
  session_start();

  // The user wil have submitted the email through the form handled by this script
  $user_email = $_POST["v_email"];

  $_SESSION["reset-email"] = $user_email;

  require_once("../CLASSES/dbh.php");
  require_once("../CLASSES/activation.php");
  require_once("../CLASSES/activationcotrl.php");

  $activation_session = new Activationcotrl();

  // Also check whethe the email is empty from this class

  $new_code = $activation_session->generate_session($user_email);

  // send mail to the user to enter the code

  $subject = "Verify your PERSONARA account";

  $message = "<p>We received a password reset request from this email. The code to verify your account is below. If you did not make this request you can ignore this email.</p>";

  $message .= "<p>Your account vefification code: </p>";

  $message .= "<h3>" . $new_code . "</h3>";

  $mail = new PHPMailer(true);

  try {
    //Server settings
                   
    $mail->isSMTP();      //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;              //Enable SMTP authentication
    $mail->Username   = 'kennedymunyao999@gmail.com';  //SMTP username
    $mail->Password   = 'affnhpssffjysxxk';         //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;       //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //Recipients
    $mail->addAddress($user_email);     
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();

  header("Location: ../verify_code.php?msg=checkemail");

  exit();

} catch (Exception $e){

  header("Location: ../verify_code.php?error=notsendcode");

  exit();
}

} elseif (isset($_POST["activation-request-submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

  //Load Composer's autoloader
  require '../vendor/autoload.php';

  session_start();

  $user_email = $_POST["v_email"];

  $_SESSION["activation-email"] = $user_email;

  require_once("../CLASSES/dbh.php");
  require_once("../CLASSES/activation.php");
  require_once("../CLASSES/activationcotrl.php");

  // get to the database fetch the current code and sent it this user
  $user_active = new Activationcotrl();

  $code = $user_active->activate_account($user_email);

  // send this code to the user

  $subject = "Activate your PERSONARA account";

  $message = "<p>We received an account activation request from this email. The code to activate your account is below. If you did not make this request you can ignore this email.</p>";

  $message .= "<p>Your account activation code: </p>";

  $message .= "<h3>" . $code . "</h3>";

  $mail = new PHPMailer(true);

  try {
    //Server settings
                   
    $mail->isSMTP();      //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;              //Enable SMTP authentication
    $mail->Username   = 'kennedymunyao999@gmail.com';  //SMTP username
    $mail->Password   = 'affnhpssffjysxxk';         //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;       //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //Recipients
    $mail->addAddress($user_email);     
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();

    header("Location: ../verify_code_first.php?msg=checkemail");

    exit();

} catch (Exception $e){

  header("Location: ../verify_code_first.php?error=notsend");

  exit();
}

}