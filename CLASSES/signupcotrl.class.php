<?php

class Signupcotrl
{

  private $fname;
  private $lname;
  private $email;
  private $user_name;
  private $pwd;
  private $pwd_repeat;

  public function __construct($fname, $lname, $email, $user_name, $pwd, $pwd_repeat)
  {
    $this->fname = $fname;
    $this->lname = $lname;
    $this->email = $email;
    $this->user_name = $user_name;
    $this->pwd = $pwd;
    $this->pwd_repeat = $pwd_repeat;
  }
  public function emptyInput()
  {
    $result = true;

    if(empty($this->fname) || empty($this->lname) || empty($this->email) || empty($this->user_name) || empty($this->pwd) || empty($this->pwd_repeat)){

      $result = false;

    } else {

      $result = true;

    }

    return $result;

  }
  public function invalidUsername()
  {
    $result = true;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $this->user_name)){

      $result = false;

    }else {

      $result = true;

    }

    return $result;

  }
  public function emailCheck()
  {
    $result = true;
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){

      $result = false;

    } else {
      $result = true;
    }

    return $result;

  }
  public function passowMatch()
  {
    $result = true;

    if($this->pwd !== $this->pwd_repeat){

      $result = false;

    } else {

      $result = true;

    }

    return $result;
    
  }

}