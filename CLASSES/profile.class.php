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
  public function set_hobby_photo($name)
  {
    $sql = "UPDATE hobbies SET hobbyphoto) VALUES(:hobbyname, :hobbymore, :hobbyphoto);";
  }
  UPDATE `users` SET `firstname` = 'Kennedy' WHERE `users`.`id` = 1

}