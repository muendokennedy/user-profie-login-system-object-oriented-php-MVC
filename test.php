<?php
class Dbh
{

  protected function connect()
  {
    try {

      $server_name = "localhost";
      $user_name = "root";
      $password = "";
      $database_name = "userprofile";

      $dsn = "mysql:host=" . $server_name . ";dbname=" . $database_name;

      $conn = new PDO($dsn, $user_name, $password);

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {

      echo "There was a connection error: " . $e->getMessage();

      die();
      
    }
    return $conn;
  }
}

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
}

class Updatecotrl extends Update
{
  private $id;

  public function __construct($id) {
    $this->id = $id;
  }

  public function check_for_update()
  {
    $results = $this->checkUpdate($this->id);

    return $results;
  }
}

$update = new Updatecotrl(10);

$sets = $update->check_for_update();

  echo "<pre>";
  var_dump($sets);
  echo "</pre>";


