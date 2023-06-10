<?php

require_once("dbh.class.php");

class Signup extends Dbh
{
  protected function setUser($fname, $lname, $email, $user_name, $pwd, $code, $status)
  {
    $sql = "INSERT INTO users(firstname, lastname, email, username, password, code, status) VALUES(:firstname, :lastname, :email, :username, :password, :code, :status);";

    // Hash the password
    $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":firstname", $fname);
    $stmt->bindParam(":lastname", $lname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":username", $user_name);
    $stmt->bindParam(":password", $hashed_pwd);
    $stmt->bindParam(":code", $code);
    $stmt->bindParam(":status", $status);

    $stmt->execute();

    $stmt = null;
  }
  protected function checkUser($user_name, $email)
  {
    $sql = "SELECT * FROM users WHERE username = :username OR email = :email;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":username", $user_name);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $stmt->fetch(PDO::FETCH_ASSOC);

    $row = $stmt->rowCount();

    $result_check = false;

    if($row > 0){
      $result_check = true;
    }
    
    $stmt = null;

    return $result_check;
  }

}