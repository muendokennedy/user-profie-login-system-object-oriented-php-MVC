<?php
namespace profile\app;
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

      $conn = new \PDO($dsn, $user_name, $password);

      $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    } catch (\PDOException $e) {

      echo "There was a connection error: " . $e->getMessage();

      die();
      
    }
    return $conn;
  }
}