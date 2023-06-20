<?php

class Contactcotrl
{
  private $fname;
  private $lname;
  private $email;
  private $subject;
  private $message;

  public function __construct($fname, $lname, $email, $subject, $message)
  {
     $this->fname = $fname;
     $this->lname = $lname;
     $this->email = $email;
     $this->subject = $subject;
     $this->message = $message;
  }
  public function emptyInput()
  {
    $result = true;

    if(empty($this->fname) || empty($this->lname) || empty($this->email) || empty($this->subject) || empty($this->message)){

      $result = false;

    } else {

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
  public function validate()
  {
    if(!$this->emptyInput()){
      // echo 'empty input'
      header("Location: ../contact.php?error=emptyinputs");
      exit();
    }
    if(!$this->emailCheck()){
      // echo 'invalid email'
      header("Location: ../contact.php?error=invalidemail");
      exit();
    }
  }
}
