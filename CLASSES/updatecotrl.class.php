<?php

class Updatecotrl extends Update
{
  private $file;

  public function __construct($file) {
    $this->file = $file;
  }

  public function check_for_update($id)
  {
    $results = $this->checkUpdate($id);

    return $results;
  }

  public function insert_update($user_id, $item_id)
  {
    if($this->emptyInput() === false){
      // echo 'empty input'
      header("Location: ../profile1_update.php?error=emptyinputs");
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

            $this->updatePhoto($image_fullname, $user_id, $item_id);
  
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

  public function check_for_hobby_update($user_id, $item_id)
  {
    $results = $this->checkHobbyUpdate($user_id, $item_id);                                  

    return $results;
  }

  // Insert updated hobby
  public function insert_hobby_update($hobby_name, $hobby_more, $user_hobby_id, $user_item_id)
  {
    if($this->emptyInput() === false){
      // echo 'empty input'
      header("Location: ../profile2_update.php?error=emptyinputs");
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

          $this->updateHobby($hobby_name, $hobby_more, $image_fullname, $user_hobby_id, $user_item_id);

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