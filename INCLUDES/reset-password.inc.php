<?php
if(isset($_POST["reset-password-submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

  $selector = $_POST["selector"];
  $validator = $_POST["validator"];
  $password = $_POST["pwd"];
  $password_repeat = $_POST["pwd-repeat"];

  if(empty($password) || empty($password_repeat)){
    header("Location ../reset_password.php?selector=" . $selector . "&validator=" . $validator . "&error=emptyinputs");
    exit();
  } elseif($password != $password_repeat){
    header("Location ../reset_password.php?selector=" . $selector . "&validator=" . $validator . "&error=passwordsdontmatch");
    exit();
  }

  // Process new password

  $new_pwd = new Activationcotrl();

  $new_pwd->process_pwd($selector, $validator, $password);

}