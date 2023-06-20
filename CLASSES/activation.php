<?php
class Activation extends Dbh
{
  public function inactivateUser($email, $code, $status)
  {
     $sql = "UPDATE users SET code = :code, status = :status WHERE email = :email;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":code", $code);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":email", $email);

    $stmt->execute();

    // Fetch the code 

    $sql = "SELECT * FROM users WHERE email = :email;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":email", $email);

    $stmt->execute();

    if($stmt->rowCount() > 0){
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $row;

  }

  public function fetchCode($email)
  {
     $sql = "SELECT * FROM users WHERE email = :email;";

     $stmt = $this->connect()->prepare($sql);

     $stmt->bindParam(":email", $email);

     $stmt->execute();

     if($stmt->rowCount() > 0){
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $row;
  }

  // activate account 

  public function updateActivation($code, $status, $email)
  {
     $sql = "UPDATE users SET code = :code, status = :status WHERE email = :email;";

     $stmt = $this->connect()->prepare($sql);

     $stmt->bindParam(":code", $code);
     $stmt->bindParam(":status", $status);
     $stmt->bindParam(":email", $email);

     $stmt->execute();
     
  }

  // Record the tokenized session

  public function recordSession($email, $selector, $token, $expires)
  {
     $sql = "SELECT * FROM pwdreset WHERE resetemail = :resetemail;";

     $stmt = $this->connect()->prepare($sql);

     $stmt->bindParam(":resetemail", $email);

     $stmt->execute();

     if($stmt->rowCount() > 0){

      $sql = "DELETE FROM pwdreset WHERE resetemail = :resetemail;";

      $stmt = $this->connect()->prepare($sql);
 
      $stmt->bindParam(":resetemail", $email);
 
      $stmt->execute();
      
    }
   
     $sql = "INSERT INTO pwdreset(resetemail, resetSelector, resetToken, resetExpires) VALUES(:resetemail, :resetselector, :resettoken, :resetexpires);";

     $stmt = $this->connect()->prepare($sql);

     $hashedToken = password_hash($token, PASSWORD_DEFAULT);

     $stmt->bindParam(":resetemail", $email);
     $stmt->bindParam(":resetselector", $selector);
     $stmt->bindParam(":resettoken", $hashedToken);
     $stmt->bindParam(":resetexpires", $expires);

     $stmt->execute();

  }

  public function checkTokens($selector, $date)
  {

    $sql = "SELECT * FROM pwdreset WHERE resetSelector = :selector AND resetExpires > :expires;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":selector", $selector);
    $stmt->bindParam(":expires", $date);

    $stmt->execute();

    if($stmt->rowCount() > 0){
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $row;
     
  }

  public function updatePassword($pwd, $email)
  {
    $sql = "SELECT * FROM users WHERE email = :email;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":email", $email);

    $stmt->execute();

    if($stmt->rowCount() > 0){

      $sql = "UPDATE users SET password = :pwd WHERE email = :email;";
      
      $stmt = $this->connect()->prepare($sql);

      $newPwd_hashed = password_hash($pwd, PASSWORD_DEFAULT);

      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":pwd", $newPwd_hashed);

      $stmt->execute();

      $sql = "DELETE FROM pwdreset WHERE resetemail	= :email;";

      $stmt = $this->connect()->prepare($sql);

      $stmt->bindParam(":email", $email);

      $stmt->execute();
    }

  }
}