<?php
class Delete extends Dbh
{
  public function deletePhoto($table, $user_id, $item_id)
  {
     $sql = "DELETE FROM $table WHERE usersid = :userid AND id = :id;";

     $stmt = $this->connect()->prepare($sql);

     $stmt->bindParam(":userid", $user_id);
     $stmt->bindParam(":id", $item_id);

     $stmt->execute();
  }
}