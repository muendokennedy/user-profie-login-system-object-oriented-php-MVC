<?php
class Profileinfocotrl extends Profileinfo
{

  private $nick_name;
  private $hobby_desc;
  private $career_desc;
  private $college_desc;
  private $highschool_desc;

  public function __construct($nick_name, $hobby_desc, $career_desc,$college_desc, $highschool_desc)
  {
    $this->nick_name = $nick_name;
    $this->hobby_desc = $hobby_desc;
    $this->career_desc = $career_desc;
    $this->college_desc = $college_desc;
    $this->highschool_desc = $highschool_desc;
  }
  
  public function insert_info()
  {
    if(!$this->emptyInput()){
      // Echo 'Empy'
      header("Location: ../profile_input.php?error=emptyinputs");
      exit();
    }
    $this->insertInfo($this->nick_name, $this->hobby_desc, $this->career_desc, $this->college_desc, $this->highschool_desc);
  }
  public function emptyInput()
  {
    $result = true;

    if(empty($this->nick_name) || empty($this->hobby_desc) || empty($this->career_desc) || empty($this->college_desc) || empty($this->highschool_desc)){

      $result = false;

    } else {

      $result = true;

    }

    return $result;

  }
}