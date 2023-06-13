<?php
class Profile extends Dbh
{
  protected function check_photo($name)
  {
    $sql = "SELECT * FROM profilegallery;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->execute();

    $row_count = $stmt->rowCount();

    $image_order = $row_count + 1;

    $this->set_photo($name, $image_order);

  }
  protected function set_photo($name, $order)
  {
    $sql = "INSERT INTO profilegallery(imagefullname, imageorder) VALUES(:name, :order);";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":order", $order);

    $stmt->execute();

  }
  public function set_hobbies($hobby_name, $hobby_more, $name)
  {
    $sql = "INSERT INTO hobbies(hobbyname, hobbymore, hobbyphoto) VALUES(:name, :more, :photo);";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":name", $hobby_name);
    $stmt->bindParam(":more", $hobby_more);
    $stmt->bindParam(":photo", $name);

    $stmt->execute();
  }
  public function set_careers($career_name, $career_more, $name)
  {
    $sql = "INSERT INTO careers(careername, careermore, careerphoto	
    ) VALUES(:name, :more, :photo);";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":name", $career_name);
    $stmt->bindParam(":more", $career_more);
    $stmt->bindParam(":photo", $name);

    $stmt->execute();
  }
  public function set_friends($friend_name, $friend_more, $name)
  {
    $sql = "INSERT INTO friends(friendname, friendmore, friendphoto) VALUES(:name, :more, :photo);";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":name", $friend_name);
    $stmt->bindParam(":more", $friend_more);
    $stmt->bindParam(":photo", $name);

    $stmt->execute();
  }
}