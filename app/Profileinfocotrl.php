<?php
namespace profile\app;
class Profileinfocotrl extends Profileinfo
{

  private $nick_name;
  private $hobby_desc;
  private $career_desc;
  private $college_desc;
  private $highschool_desc;
  private $user_id;

  public function __construct($nick_name, $hobby_desc, $career_desc,$college_desc, $highschool_desc, $user_id)
  {
    $this->nick_name = $nick_name;
    $this->hobby_desc = $hobby_desc;
    $this->career_desc = $career_desc;
    $this->college_desc = $college_desc;
    $this->highschool_desc = $highschool_desc;
    $this->user_id = $user_id;
  }
  
  public function insert_info()
  {
    if(!$this->emptyInput()){
      // Echo 'Empy'
      header("Location: ../profile_input.php?error=emptyinputs");
      exit();
    }
    $this->insertInfo($this->nick_name, $this->hobby_desc, $this->career_desc, $this->college_desc, $this->highschool_desc, $this->user_id);
  }
  public function emptyInput()
  {
    $result = true;

    if(empty($this->nick_name) || empty($this->hobby_desc) || empty($this->career_desc) || empty($this->college_desc) || empty($this->highschool_desc)|| empty($this->user_id)){

      $result = false;

    } else {

      $result = true;

    }

    return $result;

  }
}