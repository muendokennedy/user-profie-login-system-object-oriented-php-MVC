<?php
class Activationcotrl extends Activation
{
  public function generate_session($email)
  {
    if($this->emptyinput_check($email) === false){

      header("Location: ../verify_email.php?error=emptyinputs");
      exit();

    }
     $code = rand(11121, 99990);

     $status = "unactivated";

     $result = $this->inactivateUser($email, $code, $status);

     $new_code = $result["code"];

     return $new_code;

  }

  public function authenticate($email, $code)
  {
    if($this->emptyinput_check($code) === false){

      header("Location: ../verify_code.php?error=emptyinputs");
      exit();
      
    }

    $result = $this->fetchCode($email);

    if($code !== $result["code"]){
      header("Location: ../verify_code.php?error=invalidcode");
      exit();
    }
    // update the activation status in the database

    $this->updateActivation($email);
    
    return true;
  }

  // A token session

  public function session_token($email)
  {
    $selector = bin2hex(random_bytes(8));

    $token = random_bytes(32);
  
    $url = "www.kennedy.com/PROFILE SYSTEM/reset_password.php?selector=" . $selector . "&validator=" . bin2hex($token);
  
    $expires = date("U") + 1800;

    // store the token session to the database

    $this->recordSession($email, $selector, $token, $expires);

    return $url;

  }

  public function process_pwd($selector, $validator, $pwd)
  {
    $current_date = date("U");

    $result = $this->checkTokens($selector, $current_date);

    $token_bin = hex2bin($validator);

    $token_check = password_verify($token_bin, $result["resetToken"]);

    if($token_check){

      $token_email = $result["resetemail"];

    }

    // Check the user and update password

    $this->updatePassword($pwd, $token_email);
  
    header("Location: ../login.php?msg=successpwdreset");

    exit();

    }

    public function emptyinput_check($input)
    {
       if(empty($input)){
  
        return false;
  
       }
    }
  }

