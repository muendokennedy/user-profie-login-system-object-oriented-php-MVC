<?php
if (isset($_POST["reset-password-submit"])) {

  $selector = $_POST["selector"];
  $validator = $_POST["validator"];
  $password = $_POST["pwd"];
  $password_repeat = $_POST["pwd-repeat"];

  if (empty($password) || empty($password_repeat)) {
    header("Location: ../reset_password.php?selector=" . $selector . "&validator=" . $validator . "&error=emptyinputs");
    exit();
  }

  if ($password != $password_repeat) {
    header("Location: ../reset_password.php?selector=" . $selector . "&validator=" . $validator . "&error=passwordsdontmatch");
    exit();
  }

  // Process new password
  require_once("../CLASSES/dbh.php");
  require_once("../CLASSES/activation.php");
  require_once("../CLASSES/activationcotrl.php");

  $new_pwd = new Activationcotrl();

  $new_pwd->process_pwd($selector, $validator, $password);
}
