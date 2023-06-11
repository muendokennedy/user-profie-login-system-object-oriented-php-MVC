<?php
class Profileinfo extends Dbh{

  public function insertInfo($nickname, $hobbies, $career, $college, $highschool)
  {
    $sql = "INSERT INTO profileinfo(nickname, hobbies, career, college, highschool) VALUES(:nickname, :hobbies, :career, :college, :highschool);";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":nickname", $nickname);
    $stmt->bindParam(":hobbies", $hobbies);
    $stmt->bindParam(":career", $career);
    $stmt->bindParam(":college", $college);
    $stmt->bindParam(":highschool", $highschool);

    $stmt->execute();
  }
}