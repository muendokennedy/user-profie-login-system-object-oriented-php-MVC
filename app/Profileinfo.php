<?php
namespace profile\app;
class Profileinfo extends Dbh{

  public function insertInfo($nickname, $hobbies, $career, $college, $highschool, $id)
  {
    $sql = "INSERT INTO profileinfo(nickname, hobbies, career, college, highschool, usersid) VALUES(:nickname, :hobbies, :career, :college, :highschool, :id);";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":nickname", $nickname);
    $stmt->bindParam(":hobbies", $hobbies);
    $stmt->bindParam(":career", $career);
    $stmt->bindParam(":college", $college);
    $stmt->bindParam(":highschool", $highschool);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
  }
}