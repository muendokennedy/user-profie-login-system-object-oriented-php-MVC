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
}