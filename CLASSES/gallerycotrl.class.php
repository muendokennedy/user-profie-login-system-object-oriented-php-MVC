<?php

class Gallerycotrl extends Gallery
{
  private $file;

  public function __construct($file) 
  {

    $this->file = $file;

  }
  public function upload_gallery($memory_name, $user_id)
  {
      if($this->emptyInput() === false){
        // echo 'empty input'
        header("Location: ../gallery.php?error=emptyinputsfriends");
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
  
            $image_fullname = $file_extension[0] ."-" . uniqid() . "." . $fileactual_ext;
  
            $file_destination = "../UPLOADS/" . $image_fullname;
  
              $this->setGallery($memory_name, $image_fullname, $user_id);
  
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
  public function gallery_display($id)
  {
    $results = $this->displayGallery($id) ?? false;

    $image = "";

    if($results){

      foreach($results as $result){

         $image .= "<div>
              <div class=\"box\">
                <div class=\"name\">{$result["memoryname"]}</div>
                <div class=\"image\">
                  <img src=\"UPLOADS/{$result["memoryphoto"]}\">
                </div>
              </div>
              <div class=\"edit-btn\">
                <button class=\"btn editorbutton\" value=\"userid={$result["usersid"]}&id={$result["id"]}&name={$result["memoryphoto"]}&resource=gallery\">manage</button>
                </div>
              </div>";
        }
        return $image;
      
    }

  }
}