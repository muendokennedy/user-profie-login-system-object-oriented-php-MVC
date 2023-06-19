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

  $current_date = date("U");

  require_once "dbh.inc.php";

  $sql = "SELECT * FROM pwdreset WHERE resetSelector = :selector AND resetExpires = :expires;";

  // Bind the parameters

  // fetch the resultset from the database in form of associative array

  $token_bin = hex2bin($validator);
  $token_check = password_verify($token_bin, $row["resetToken"]);

  if($token_check){

    $token_email = $row["resetemail"];

    $sql = "SELECT * FROM users email = :email;";

    // run the sql statement

    // check whether the number of rows is greater than 0 and update the users password in the database

    $sql = "UPDATE users SET password = :pwd WHERE email = :email;";

    $newPwd_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Bind the email with the email token
    
    // bind the parameters and execute the statement

    // delete the current running token in the password reset table

    $sql = "DELETE * FROM pwdreset WHERE resetemail	= :email;";

    // bind this statement with the token email and execute

    header("Location: ../login.php?msg=successpwdreset");

    exit();
  }
}