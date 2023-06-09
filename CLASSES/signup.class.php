<?php

require_once("dbh.class.php");

class Signup extends Dbh
{
  protected function setUser($fname, $lname, $email, $user_name, $pwd, $pwd_repeat, $code, $status)
  {
    $sql = "INSERT INTO users(firstname, lastname, email, username, password, code, status) VALUES(:firstname, :lastname, :email, :username, :password, :code, :status);";

    $stmt = $this->connect()->prepare($sql);
  }
  protected function checkUser($user_name, $email)
  {
    $sql = "SELECT * FROM users username = :username OR email = :email;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":username", $user_name);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $result_check = false;

    if($row->rowCount() > 0){
      $result_check = true;
    }
    return $result_check;
  }

}