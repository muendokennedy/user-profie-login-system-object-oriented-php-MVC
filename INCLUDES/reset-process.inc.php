<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use profile\app\Activationcotrl;

  //Load Composer's autoloader
  require '../vendor/autoload.php';

if (isset($_POST["reset-code-submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {


session_start();

  $code = $_POST["V_code"];

  $auth = new Activationcotrl();

  $result = $auth->authenticate($_SESSION["reset-email"], $code);

  // start a tokenezed session
  if ($result) {

    $url = $auth->session_token($_SESSION["reset-email"]);
  }

  // send email to the user for the email reset link

  $to = $_SESSION["reset-email"];

  $subject = "Reset your password for PERSONARA";

  $message = "<p style='font-size: 16px; font-family: Verdana, sans-serif;'>We received a password reset request from this email. The link to reset your password is below. If you did not make this request you can ignore this email.</p>";

  $message .= "<p style='font-size: 16px; font-family: Verdana, sans-serif;'>Here is your password reset link: <br>";

  $message .= '<a style="font-size: 17px; font-family: Verdana, sans-serif; font-weight: bold; color: #ad48f0; padding: 4px;" href="' . $url . '">Set new password now</a></p>';

  

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
    $mail->addAddress($to);     
    $mail->addReplyTo($to, 'Personara');
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();

  session_unset();
  session_destroy();

  // echo '<pre>';
  // var_dump($url);
  // echo '</pre>';
  // exit;

  header("Location: ../verify_code.php?reset=successcheckemail");

  exit();

} catch (\Exception $e){

  header("Location: ../verify_code.php?error=notsend");

  exit();
}


} elseif (isset($_POST["activation-code-submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

  session_start();

  $_SESSION["activation-email"];

  $code = $_POST["V_code"];

  $activate = new Activationcotrl();

  $activate->activation_process($code,  $_SESSION["activation-email"]);

  // redirect the user to the login page

  session_unset();
  session_destroy();

  header("Location: ../login.php?activation=successloginnow");

  exit();

}