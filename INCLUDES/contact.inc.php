<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use profile\app\Contactcotrl;

  //Load Composer's autoloader
  require '../vendor/autoload.php';

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect the form data

  $firstname = $_POST["fname"];
  $lastname = $_POST["lname"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];


  $contact = new Contactcotrl($firstname, $lastname, $email, $subject, $message);

  $contact->validate();

  // send the message via email

  $email_to = "kennedymunyao999@gmail.com";

  $email_subject = $subject;

  $email_message = "<p style='font-size: 17px; font-family: Verdana, sans-serif;'> Hello I am " . $firstname . " " . $lastname . "
  <p>";

    $email_message .= "<p style='font-size: 17px; font-family: Verdana, sans-serif;'>" . $message . "</p>";



  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
  //Server settings

  $mail->isSMTP(); //Send using SMTP
  $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
  $mail->SMTPAuth = true; //Enable SMTP authentication
  $mail->Username = 'kennedymunyao999@gmail.com'; //SMTP username
  $mail->Password = 'affnhpssffjysxxk'; //SMTP password
  $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
  $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom($email, $firstname . " " . $lastname);
  $mail->addAddress($email_to); //Add a recipient

  //Content
  $mail->isHTML(true); //Set email format to HTML
  $mail->CharSet = 'UTF-8';
  $mail->Subject = $email_subject;
  $mail->Body = $email_message;

  $mail->send();

  header("Location: ../contact.php?error=none");
  exit();

  } catch (\Exception $e) {

  header("Location: ../contact.php?error=notsend");
  exit();

  }
  } else {

  header("Location: ../contact.php");

  exit();
  }