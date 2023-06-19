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
}