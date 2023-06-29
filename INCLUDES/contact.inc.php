<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

//Load Composer's autoloader
require '../vendor/autoload.php';
  


  // Collect the form data

  $firstname = $_POST["fname"];
  $lastname = $_POST["lname"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  require_once("../CLASSES/contactcotrl.php");

  $contact = new Contactcotrl($firstname, $lastname, $email, $subject, $message);

  $contact->validate();

  // send the message via email

  $email_to = "kennedymunyao999@gmail.com";

  $email_subject = $subject;

  $email_message = "<p> Hello I am " . $firstname . " " . $lastname . "<p>";

  $email_message .= "<p>" . $message . "</p>";

  // $headers = "From: " . $firstname . " " . $lastname . "<" . $email . ">\r\n";

  // $headers .= "Content-Type: text/html\r\n";

  // if (!mail($email_to, $email_subject, $email_message, $headers)) {

    
  //   exit();
  // }





//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    // $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = 'user@example.com';                     //SMTP username
    // $mail->Password   = 'secret';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, $firstname . " " . $lastname);
    $mail->addAddress($email_to, 'Kennedy Munyao');     //Add a recipient             //Name is optional
    $mail->addReplyTo($email_to, 'Information');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $email_message;

    $mail->send();

    header("Location: ../contact.php?error=none");
    
} catch (Exception $e) {
   
  header("Location: ../contact.php?error=notsend");
  
}
}