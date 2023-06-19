<?php

class Update extends Dbh
{
  public function checkUpdate($id)
  {
    $sql = "SELECT * FROM profilegallery WHERE usersid = :id;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $result = "";

    if($stmt->rowCount() > 0){
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $result;
  }

  public function checkBioUpdate($id)
  {
    $sql = "SELECT * FROM profileinfo WHERE usersid = :id;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $result = "";

    if($stmt->rowCount() > 0){
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $result;
  }
  
  // insert the update in the profileinfo table
  public function updateBio($nick_name, $hobby_desc, $career_desc, $college_desc, $highschool_desc,$id)
  {
     $sql = "UPDATE profileinfo SET nickname = :nickname, hobbies = :hobbies, career = :career, college = :college, highschool = :highschool WHERE usersid = :id;";

     $stmt = $this->connect()->prepare($sql);

     $stmt->bindParam(":nickname", $nick_name);
     $stmt->bindParam(":hobbies", $hobby_desc);
     $stmt->bindParam(":career", $career_desc);
     $stmt->bindParam(":college", $college_desc);
     $stmt->bindParam(":highschool", $highschool_desc);
     $stmt->bindParam(":id", $id);

     $stmt->execute();

  }
  protected function updatePhoto($name, $user_id, $item_id)
  {
    $sql = "SELECT * FROM profilegallery;";
    
    $stmt = $this->connect()->prepare($sql);
    
    $stmt->execute();
    
    $row_count = $stmt->rowCount();
    
    $image_order = $row_count + 1;
    
    $this->set_update($name, $image_order, $user_id, $item_id);
    
  }
  
  protected function set_update($name, $image_order, $user_id, $item_id)
  {
    $sql = "UPDATE profilegallery SET imagefullname = :name, imageorder = :order WHERE usersid = :userid AND id = :id;";
    
    $stmt = $this->connect()->prepare($sql);
    
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":order", $image_order);
    $stmt->bindParam(":userid", $user_id);
    $stmt->bindParam(":id", $item_id);
    
    $stmt->execute();
  }
  
  // Update the hobby
  public function checkHobbyUpdate($user_id, $item_id)
  {
    $sql = "SELECT * FROM hobbies WHERE usersid = :usersid AND id = :id;";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(":usersid", $user_id);
    $stmt->bindParam(":id", $item_id);

    $stmt->execute();

    $result = "";

    if($stmt->rowCount() > 0){
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return $result;
  }
  
  public function updateHobby($hobby_name, $hobby_more, $name, $user_hobby_id, $user_item_id)
  {
    $sql = "UPDATE hobbies SET hobbyname = :hobbyname, hobbymore = :hobbymore, hobbyphoto = :hobbyphoto WHERE usersid = :userid AND id = :id;";
    
    $stmt = $this->connect()->prepare($sql);
    
    $stmt->bindParam(":hobbyname", $hobby_name);
    $stmt->bindParam(":hobbymore", $hobby_more);
    $stmt->bindParam(":hobbyphoto", $name);
    $stmt->bindParam(":userid", $user_hobby_id);
    $stmt->bindParam(":id", $user_item_id);
    
    $stmt->execute();
    
  }
  
  // Check for career info update
  public function checkCareerUpdate($user_id, $item_id)
  {
    $sql = "SELECT * FROM careers WHERE usersid = :usersid AND id = :id;";
    
    $stmt = $this->connect()->prepare($sql);
    
    $stmt->bindParam(":usersid", $user_id);
    $stmt->bindParam(":id", $item_id);
    
    $stmt->execute();
    
    $result = "";
    
    if($stmt->rowCount() > 0){
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return $result;
  }
  public function updateCareer($career_name, $career_more, $name, $user_career_id, $user_item_id)
  {
    $sql = "UPDATE careers SET careername = :careername, careermore = :careermore, careerphoto = :careerphoto WHERE usersid = :userid AND id = :id;";
    
    $stmt = $this->connect()->prepare($sql);
    
    $stmt->bindParam(":careername", $career_name);
    $stmt->bindParam(":careermore", $career_more);
    $stmt->bindParam(":careerphoto", $name);
    $stmt->bindParam(":userid", $user_career_id);
    $stmt->bindParam(":id", $user_item_id);
    
    $stmt->execute();
    
  }
  // Check for friend info update
  public function checkFriendUpdate($user_id, $item_id)
  {
    $sql = "SELECT * FROM friends WHERE usersid = :usersid AND id = :id;";
    
    $stmt = $this->connect()->prepare($sql);
    
    $stmt->bindParam(":usersid", $user_id);
    $stmt->bindParam(":id", $item_id);
    
    $stmt->execute();
    
    $result = "";
    
    if($stmt->rowCount() > 0){
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return $result;
  }
  public function updateFriend($friend_name, $friend_more, $name, $user_friend_id, $user_item_id)
  {
    $sql = "UPDATE friends SET friendname = :friendname, friendmore = :friendmore, friendphoto = :friendphoto WHERE usersid = :userid AND id = :id;";
    
    $stmt = $this->connect()->prepare($sql);
    
    $stmt->bindParam(":friendname", $friend_name);
    $stmt->bindParam(":friendmore", $friend_more);
    $stmt->bindParam(":friendphoto", $name);
    $stmt->bindParam(":userid", $user_friend_id);
    $stmt->bindParam(":id", $user_item_id);
    
    $stmt->execute();
    
  }
}