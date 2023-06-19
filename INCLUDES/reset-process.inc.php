<?php

if(isset($_POST["reset-code-submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

  // Anthenticate the code
  // check if code input is empty

  $selector = bin2hex(random_bytes(8));

  $token = random_bytes(32);

  $url = "www.kennedy.com/PROFILE SYSTEM/reset_password.php?selector=" . $selector . "&validator=" . bin2hex($token);

  $expires = date("U") + 1800;

  // db connection

  require_once("db.inc.php");

  $user_email = $_POST["email"];

  $sql = "DELETE FROM pwdreset WHERE resetemail = :resetemail;";

  // run the query using prepared statements

  $sql = "INSERT INTO pwdreset(resetemail, resetSelector, resetToken, resetExpires) VALUES(:resetemail, :resetselector, :resettoken, :resetexpires);";

  // prepare a PDO prepared statement

  $hashedToken = password_hash($token, PASSWORD_DEFAULT);

  // bind parameters using pdo and execute

  $stmt = null;

  $conn = null;

  // send this email url to the user 

  $to = $user_email;

  $subject = "Reset your password for PERSONARA";

  $message = "<p>We received a password reset request from this email. The link to reset your password is below. If you did not make this request you can ignore this email.</p>";

  $message .= "<p>Here is your password reset link: <br>";

  $message .= '<a href="'. $url .'">Set new password now</a></p>';

  $headers = "From: PERSONARA <kennedymunyao999@gmail.com>\r\n";

  $headers .= "Reply To: kennedymunyao999@gmail.com\r\n";
  
  $headers .= "Content-Type: text/html\r\n";

  mail($user_email, $subject, $message, $headers);

  header("Location: ../reset_password.php?reset=successcheckemail");

  exit();


}