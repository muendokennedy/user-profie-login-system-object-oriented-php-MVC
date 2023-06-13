<?php
class Profilecotrl extends Profile
{
  private $file;

  public function __construct($file)
  {
    $this->file = $file;
  }

  public function insert_picture()
  {
    if($this->emptyInput() === false){
      // echo 'empty input'
      header("Location: ../profile_input.php?error=emptyinputs");
      exit();
    }
    // Login the current user to the database
    $file_name = $this->file["name"];
    $file_temp_name = $this->file["tmp_name"];
    $file_error = $this->file["error"];
    $file_size = $this->file["size"];

    $file_extension = explode(".", $file_name);
    $fileactual_ext = strtolower(end($file_extension));

    $allowed = array("jpg", "jpeg", "png");

    if(in_array($fileactual_ext, $allowed)){

      if($file_error === 0){

        if($file_size < 50000000){

          $image_fullname = "profile-" . $file_extension[0] . "." . $fileactual_ext;

          $file_destination = "../UPLOADS/" . $image_fullname;

          $this->check_photo($image_fullname);

          move_uploaded_file($file_temp_name, $file_destination);

        } else{
          header("Location: ../profile_input.php?error=largefile");
          exit();
        }
      }else{
        header("Location: ../profile_input.php?error=uploaderror");
        exit();
      }
    }else{
      header("Location: ../profile_input.php?error=incorrectfiletype");
      exit();
    }
  }

  public function insert_hobbies($hobby_name, $hobby_more)
  {
    if($this->emptyInput() === false){
      // echo 'empty input'
      header("Location: ../profile_input.php?error=emptyinputs");
      exit();
    }
    // Login the current user to the database
    $file_name = $this->file["name"];
    $file_temp_name = $this->file["tmp_name"];
    $file_error = $this->file["error"];
    $file_size = $this->file["size"];

    $file_extension = explode(".", $file_name);
    $fileactual_ext = strtolower(end($file_extension));

    $allowed = array("jpg", "jpeg", "png");

    if(in_array($fileactual_ext, $allowed)){

      if($file_error === 0){

        if($file_size < 50000000){

          $image_fullname = "hobby-" . $file_extension[0] . "." . $fileactual_ext;

          $file_destination = "../UPLOADS/" . $image_fullname;

            $this->set_hobbies($hobby_name, $hobby_more, $image_fullname);

            move_uploaded_file($file_temp_name, $file_destination);

        } else{
          header("Location: ../profile_input.php?error=largefile");
          exit();
        }
      }else{
        header("Location: ../profile_input.php?error=uploaderror");
        exit();
      }
    }else{
      header("Location: ../profile_input.php?error=incorrectfiletype");
      exit();
    }
  }
  
  public function insert_careers($career_name, $career_more)
  {
    if($this->emptyInput() === false){
      // echo 'empty input'
      header("Location: ../profile_input.php?error=emptyinputs");
      exit();
    }
    // Login the current user to the database
    $file_name = $this->file["name"];
    $file_temp_name = $this->file["tmp_name"];
    $file_error = $this->file["error"];
    $file_size = $this->file["size"];

    $file_extension = explode(".", $file_name);
    $fileactual_ext = strtolower(end($file_extension));

    $allowed = array("jpg", "jpeg", "png");

    if(in_array($fileactual_ext, $allowed)){

      if($file_error === 0){

        if($file_size < 50000000){

          $image_fullname = "hobby-" . $file_extension[0] . "." . $fileactual_ext;

          $file_destination = "../UPLOADS/" . $image_fullname;

            $this->set_careers($career_name, $career_more, $image_fullname);

            move_uploaded_file($file_temp_name, $file_destination);

        } else{
          header("Location: ../profile_input.php?error=largefile");
          exit();
        }
      }else{
        header("Location: ../profile_input.php?error=uploaderror");
        exit();
      }
    }else{
      header("Location: ../profile_input.php?error=incorrectfiletype");
      exit();
    }
  }

  public function insert_friends($friend_name, $friend_more)
  {
    if($this->emptyInput() === false){
      // echo 'empty input'
      header("Location: ../profile_input.php?error=emptyinputs");
      exit();
    }
    // Login the current user to the database
    $file_name = $this->file["name"];
    $file_temp_name = $this->file["tmp_name"];
    $file_error = $this->file["error"];
    $file_size = $this->file["size"];

    $file_extension = explode(".", $file_name);
    $fileactual_ext = strtolower(end($file_extension));

    $allowed = array("jpg", "jpeg", "png");

    if(in_array($fileactual_ext, $allowed)){

      if($file_error === 0){

        if($file_size < 50000000){

          $image_fullname = "hobby-" . $file_extension[0] . "." . $fileactual_ext;

          $file_destination = "../UPLOADS/" . $image_fullname;

            $this->set_friends($friend_name, $friend_more, $image_fullname);

            move_uploaded_file($file_temp_name, $file_destination);

        } else{
          header("Location: ../profile_input.php?error=largefile");
          exit();
        }
      }else{
        header("Location: ../profile_input.php?error=uploaderror");
        exit();
      }
    }else{
      header("Location: ../profile_input.php?error=incorrectfiletype");
      exit();
    }
  }
  
  public function emptyInput()
  {
    $result = true;

    if(empty($this->file)){

      $result = false;

    } else {

      $result = true;

    }

    return $result;

  }

}