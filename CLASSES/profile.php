<?php
class Profile extends Dbh
{
  protected function check_photo($name, $id)
  {
    $sql = "SELECT * FROM profilegallery;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->execute();

    $row_count = $stmt->rowCount();

    $image_order = $row_count + 1;

    $this->set_photo($name, $image_order, $id);

  }
  protected function set_photo($name, $order, $id)
  {
    $sql = "INSERT INTO profilegallery(imagefullname, imageorder, usersid) VALUES(:name, :order, :id);";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":order", $order);
    $stmt->bindParam(":id", $id);

    $stmt->execute();

  }
  public function set_hobbies($hobby_name, $hobby_more, $name, $id)
  {
    $sql = "INSERT INTO hobbies(hobbyname, hobbymore, hobbyphoto, usersid) VALUES(:name, :more, :photo, :id);";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":name", $hobby_name);
    $stmt->bindParam(":more", $hobby_more);
    $stmt->bindParam(":photo", $name);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
  }
  public function set_careers($career_name, $career_more, $name, $id)
  {
    $sql = "INSERT INTO careers(careername, careermore, careerphoto, usersid) VALUES(:name, :more, :photo, :id);";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":name", $career_name);
    $stmt->bindParam(":more", $career_more);
    $stmt->bindParam(":photo", $name);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
  }
  public function set_friends($friend_name, $friend_more, $name, $id)
  {
    $sql = "INSERT INTO friends(friendname, friendmore, friendphoto, usersid) VALUES(:name, :more, :photo, :id);";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":name", $friend_name);
    $stmt->bindParam(":more", $friend_more);
    $stmt->bindParam(":photo", $name);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
  }

  public function getPhotos($id)
  {
    $sql = "SELECT * FROM profilegallery WHERE usersid = :id;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    if($stmt->rowCount() > 0){
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
  }
  public function get_info($id)
  {
    $sql = "SELECT * FROM profileinfo WHERE usersid = :id;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    if($stmt->rowCount() > 0){
      $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return $results;
  }

  public function get_hobbies($id)
  {
    $sql = "SELECT * FROM hobbies WHERE usersid = :id;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    if($stmt->rowCount() > 0){
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
  }

  public function get_careers($id)
  {
    $sql = "SELECT * FROM careers WHERE usersid = :id;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    if($stmt->rowCount() > 0){
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
  }

  function get_friends($id)
  {
    $sql = "SELECT * FROM friends WHERE usersid = :id;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    if($stmt->rowCount() > 0){
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
  }
}