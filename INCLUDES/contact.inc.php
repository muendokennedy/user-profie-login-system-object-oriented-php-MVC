<?php

if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

  // Collect the form data

  $firstname = $_POST["fname"];
  $lastname = $_POST["lname"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];


  require_once("../AUTOLOADER/loader.php");

  Loader::load_class("../CLASSES");

  $contact = new Contactcotrl($firstname, $lastname, $email, $subject, $message);

  $contact->validate();

  // send the message via email

  $email_to = "kennedymunyao999@gmail.com";

  $email_subject = $subject;

  $email_message = "<p> Hello I am ". $firstname ." ". $lastname. "<p>";

  $email_message .= "<p>" . $message . "</p>";

  $headers = "From: ". $firstname ." ". $lastname. "<". $email . ">\r\n";
  
  $headers .= "Content-Type: text/html\r\n";

  if(!mail($email_to, $email_subject, $email_message, $headers)){

    header("Location: ../contact.php?error=notsend");
    exit();

  }

  header("Location: ../contact.php?error=none");
  exit();
}