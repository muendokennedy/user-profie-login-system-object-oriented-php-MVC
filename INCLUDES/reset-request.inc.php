<?php

if(isset($_POST["reset-request-submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

  // Enter the data and set the activation status to false and generate new activation code 

  // The user wil have submitted the email through the form handled by this script
  $user_email = $_POST["v_email"];

  $activation_session = new Activationcotrl();

  // Also check whethe the email is empty from this class
  
  $new_code = $activation_session->generate_session($user_email);

  // send mail to the user to enter the code

  
  $subject = "Verify your PERSONARA account";

  $message = "<p>We received a password reset request from this email. The code to verify your account is below. If you did not make this request you can ignore this email.</p>";

  $message .= "<p>Your account vefification code: <br>";

  $message .= "<h3>" . $new_code . "</h3>";

  $headers = "From: PERSONARA <kennedymunyao999@gmail.com>\r\n";

  $headers .= "Reply To: kennedymunyao999@gmail.com\r\n";
  
  $headers .= "Content-Type: text/html\r\n";

  mail($user_email, $subject, $message, $headers);

  header("Location: ../verify_code.php");
}
