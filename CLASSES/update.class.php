<?php

class Update extends Dbh
{
  public function checkUpdate($id)
  {
    $sql = "SELECT * FROM profilegallery WHERE usersid = :id;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $result = "";

    if($stmt->rowCount() > 0){
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $result;
  }
  public function checkHobbyUpdate($user_id, $item_id)
  {
    $sql = "SELECT * FROM hobbies WHERE usersid = :usersid AND id = :id;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":usersid", $user_id);
    $stmt->bindParam(":id", $item_id);

    $stmt->execute();

    $result = "";

    if($stmt->rowCount() > 0){
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return $result;
  }

  protected function updatePhoto($name, $user_id, $item_id)
  {
    $sql = "SELECT * FROM profilegallery;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->execute();

    $row_count = $stmt->rowCount();

    $image_order = $row_count + 1;

    $this->set_update($name, $image_order, $user_id, $item_id);

  }

  protected function set_update($name, $image_order, $user_id, $item_id)
  {
    $sql = "UPDATE profilegallery SET imagefullname = :name, imageorder = :order WHERE usersid = :userid AND id = :id;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":order", $image_order);
    $stmt->bindParam(":userid", $user_id);
    $stmt->bindParam(":id", $item_id);

    $stmt->execute();
  }

  // Update the hobby
  public function updateHobby($hobby_name, $hobby_more, $name, $user_hobby_id, $user_item_id)
  {
    $sql = "UPDATE hobbies SET hobbyname = :hobbyname, hobbymore = :hobbymore, hobbyphoto = :hobbyphoto WHERE usersid = :userid AND id = :id;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":hobbyname", $hobby_name);
    $stmt->bindParam(":hobbymore", $hobby_more);
    $stmt->bindParam(":hobbyphoto", $name);
    $stmt->bindParam(":userid", $user_hobby_id);
    $stmt->bindParam(":id", $user_item_id);

    $stmt->execute();

  }
}