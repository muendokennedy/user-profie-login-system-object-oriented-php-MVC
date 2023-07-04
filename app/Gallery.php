<?php
namespace profile\app;
class Gallery extends Dbh
{
  public function setGallery($memory_name, $name, $user_id)
  {
    $sql = "INSERT INTO gallery(memoryname, memoryphoto, usersid) VALUES(:memoryname, :memoryphoto, :id);";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":memoryname", $memory_name);
    $stmt->bindParam(":memoryphoto", $name);
    $stmt->bindParam(":id", $user_id);

    $stmt->execute();
  }

  public function displayGallery($id)
  {
    $sql = "SELECT * FROM gallery WHERE usersid = :id;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $result = ""; 
    
    if($stmt->rowCount() > 0){

      $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    return $result;
  }
}