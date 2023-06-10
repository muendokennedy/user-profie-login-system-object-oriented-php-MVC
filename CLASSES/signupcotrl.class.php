<?php

class Signupcotrl extends Signup
{

  private $fname;
  private $lname;
  private $email;
  private $user_name;
  private $pwd;
  private $pwd_repeat;
  private $code;
  private $status;

  public function __construct($fname, $lname, $email, $user_name, $pwd, $pwd_repeat, $code, $status)
  {
    $this->fname = $fname;
    $this->lname = $lname;
    $this->email = $email;
    $this->user_name = $user_name;
    $this->pwd = $pwd;
    $this->pwd_repeat = $pwd_repeat;
    $this->code = $code;
    $this->status = $status;
  }
  public function sigup_user()
  {
    if(!$this->emptyInput()){
      // echo 'empty input'
      header("Location: ../signup.php?error=emptyinputs");
      exit();
    }
    if(!$this->invalidUsername()){
      // echo 'Invalid username'
      header("Location: ../signup.php?error=invaliduid");
      exit();
    }
    if(!$this->emailCheck()){
      // echo 'invalid email'
      header("Location: ../signup.php?error=invalidemail");
      exit();
    }
    if(!$this->passwordMatch()){
      // echo 'passowords don't match'
      header("Location: ../signup.php?error=passwordsdontmatch");
      exit();
    }
    if($this->check_User()){
      // echo 'username or email exists' 
      header("Location: ../signup.php?error=uidexists");
      exit();
    }
    // Add the current user to the database
    $this->setUser($this->fname, $this->lname, $this->email, $this->user_name, $this->pwd, $this->code, $this->status);
  }
  public function emptyInput()
  {
    $result = true;

    if(empty($this->fname) || empty($this->lname) || empty($this->email) || empty($this->user_name) || empty($this->pwd) || empty($this->pwd_repeat) || empty($this->code) || empty($this->status)){

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
  public function passwordMatch()
  {
    $result = true;

    if($this->pwd !== $this->pwd_repeat){

      $result = false;

    } else {

      $result = true;

    }

    return $result;
    
  }
  public function check_User()
  {

    $result = true;

    if(!$this->checkUser($this->user_name, $this->email)){

      $result = false;

    } else {

      $result = true;

    }

    return $result;

  }

}