<?php
namespace profile\app;
class Logincotrl extends Login
{

  private $user_name;
  private $pwd;

  public function __construct($user_name, $pwd)
  {
    $this->user_name = $user_name;
    $this->pwd = $pwd;
  }
  public function login_user($remember)
  {
    if(!$this->emptyInput()){
      // echo 'empty input'
      header("Location: ../login.php?error=emptyinputs");
      exit();
    }
    // Login the current user to the database
    $this->confirmUser($this->user_name, $this->pwd, $remember);
  }
  public function emptyInput()
  {
    $result = true;

    if(empty($this->user_name) || empty($this->pwd)){

      $result = false;

    } else {

      $result = true;

    }

    return $result;

  }

}