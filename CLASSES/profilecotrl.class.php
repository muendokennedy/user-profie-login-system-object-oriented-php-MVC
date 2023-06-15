<?php
class Profilecotrl extends Profile
{
  private $file;

  public function __construct($file)
  {
    $this->file = $file;
  }

  public function insert_picture($id)
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

          $this->check_photo($image_fullname, $id);

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

  public function insert_hobbies($hobby_name, $hobby_more, $id)
  {
    if($this->emptyInputHobby($hobby_name, $hobby_more) === false){
      // echo 'empty input'
      header("Location: ../profile_input.php?error=emptyinputshobby");
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

            $this->set_hobbies($hobby_name, $hobby_more, $image_fullname, $id);

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
  
  public function insert_careers($career_name, $career_more, $id)
  {
    if($this->emptyInputCareer($career_name, $career_more) === false){
      // echo 'empty input'
      header("Location: ../profile_input.php?error=emptyinputscareer");
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

            $this->set_careers($career_name, $career_more, $image_fullname, $id);

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

  public function insert_friends($friend_name, $friend_more, $id)
  {
    if($this->emptyInputFriend($friend_name, $friend_more) === false){
      // echo 'empty input'
      header("Location: ../profile_input.php?error=emptyinputsfriends");
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

            $this->set_friends($friend_name, $friend_more, $image_fullname, $id);

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

  public function emptyInputHobby($hobby_name, $hobby_more)
  {
    $result = true;

    if(empty($this->file) || empty($hobby_name) || empty($hobby_more)){

      $result = false;

    } else {

      $result = true;

    }

    return $result;

  }
  public function emptyInputCareer($career_name, $career_more)
  {
    $result = true;

    if(empty($this->file) || empty($career_name) || empty($career_more)){

      $result = false;

    } else {

      $result = true;

    }

    return $result;

  }
  public function emptyInputFriend($friend_name, $friend_more)
  {
    $result = true;

    if(empty($this->file) || empty($friend_name) || empty($friend_more)){

      $result = false;

    } else {

      $result = true;

    }

    return $result;

  }

  // Getting all the photos for this particular user from the database
  public function get_pictures($id)
  {
    $results = $this->getPhotos($id);

      $image = "";
      
       $image = "<div class=\"profile-swiper\">
         <img src=\"UPLOADS/{$results[0]["imagefullname"]}\" alt=\"\" class=\"active\">
         <img src=\"UPLOADS/{$results[1]["imagefullname"]}\" alt=\"\">
         <img src=\"UPLOADS/{$results[2]["imagefullname"]}\" alt=\"\">
        </div>";

   echo $image;
  }

  public function get_profile_information($id)
  {
    $results = $this->get_info($id);

    $profile_info = "";

    $profile_info = "<div class=\"profile-bio-content\">
                      <div class=\"profile-title\">{$_SESSION["firstname"]} in brief</div>
                      <p><b>Full name:</b>{$_SESSION["firstname"]} {$_SESSION["lastname"]}</p>
                      <p><b>Nick name:</b>{$results["nickname"]}</p>
                      <p><b>Hobbies:</b>{$results["hobbies"]}</p>
                      <p><b>Career:</b>{$results["career"]}</p>
                      <p><b>College:</b>{$results["college"]}</p>
                      <p><b>Highschool:</b>{$results["highschool"]}</p>
                    </div>";

                    echo $profile_info;
  }

  public function get_hobby_info($id)
  {
    $results = $this->get_hobbies($id);

    foreach($results as $result){  

        echo "<div>
                <div class=\"box\">
                  <div class=\"name\">{$result["hobbyname"]}</div>
                  <div class=\"content\">{$result["hobbymore"]}</div>
                  <div class=\"image\">
                    <img src=\"UPLOADS/{$result["hobbyphoto"]}\" alt=\"\">
                  </div>
                </div>
                <div class=\"edit-btn\">
                  <a href=\"profile2_update.php?usersid={$_SESSION["usersid"]}&id={$result["id"]}\" class=\"btn\">Edit</a>
                </div>
              </div>";
        }
  }

  public function get_career_info($id)
  {
    $results = $this->get_careers($id);

    foreach($results as $result){  

      echo "<div>
              <div class=\"box\">
                <div class=\"name\">{$result["careername"]}</div>
                <div class=\"content\">{$result["careermore"]}</div>
                <div class=\"image\">
                  <img src=\"UPLOADS/{$result["careerphoto"]}\" alt=\"\">
                </div>
              </div>
              <div class=\"edit-btn\">
                <a href=\"profile3_update.php?usersid={$_SESSION["usersid"]}&id={$result["id"]}\" class=\"btn\">Edit</a>
              </div>
            </div>";
      }
  }
  public function get_friend_info($id)
  {
    $results = $this->get_friends($id);

    foreach($results as $result){  

      echo "<div class=\"friend-box\">
              <div class=\"friend-image\">
                <img src=\"UPLOADS/{$result["friendphoto"]}\" alt=\"\">
              </div>
              <div class=\"friend-name\">{$result["friendname"]}</div>
              <div class=\"friend-content\">{$result["friendmore"]}</div>
              <div class=\"edit-btn\">
                <a href=\"profile4_update.php?usersid={$_SESSION["usersid"]}&id={$result["id"]}\" class=\"btn\">Edit</a>
              </div>
              </div>
            </div>";
      }
  }
}