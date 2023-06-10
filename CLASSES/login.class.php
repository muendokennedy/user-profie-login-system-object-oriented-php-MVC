<?php

require_once("dbh.class.php");

class Login extends Dbh
{
  protected function confirmUser($user_name, $pwd)
  {
    $sql = "SELECT * FROM users WHERE email = :email OR username = :username;";

    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":email", $user_name);
    $stmt->bindParam(":username", $user_name);
    $stmt->execute();

    if($stmt->rowCount() === 0){
      header("Location: ../login.php?error=invalidusernameemalorpassword");
      exit();

    } else {

      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      $check_pwd = password_verify($pwd, $result["password"]);

      // Check if the password is correct 
      if(!$check_pwd){

        header("Location: ../login.php?error=wrongpwd");
        exit();

      } else {
        // start a session
        session_start();
        $_SESSION["firstname"] = $result["firstname"];
        $_SESSION["lastname"] = $result["lastname"];

      }
    }


    $stmt = null;
  }

}