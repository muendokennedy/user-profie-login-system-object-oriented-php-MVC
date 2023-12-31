<?php
namespace profile\app;
class Login extends Dbh
{
  protected function confirmUser($user_name, $pwd, $remember)
  {
    $sql = "SELECT * FROM users WHERE email = :email OR username = :username;";

    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":email", $user_name);
    $stmt->bindParam(":username", $user_name);
    $stmt->execute();

    if($stmt->rowCount() === 0){
      header("Location: ../login.php?error=invalidusernameemalorpassword");
      exit();

    } else {

      $result = $stmt->fetch(\PDO::FETCH_ASSOC);

      $check_pwd = password_verify($pwd, $result["password"]);

      // Check if the password is correct 
      if(!$check_pwd){

        header("Location: ../login.php?error=wrongpwd");
        exit();

      } else {
        // start a session
        session_start();
        $_SESSION["usersid"] = $result["id"];
        $_SESSION["firstname"] = $result["firstname"];
        $_SESSION["lastname"] = $result["lastname"];

        // set cookie
        if(!empty($remember)){
          setcookie("rememberuid", $user_name, time() + (60 * 60 * 24 * 30), "/");
          setcookie("rememberpwd", $pwd, time() + (60 * 60 * 24 * 30), "/");
        } else {
          // Remove any cookie variable that is currently existing if the user did check remember me
          if(isset($_COOKIE["rememberuid"])){
            setcookie("rememberuid", "", time() - (60 * 60), "/");
          }
          if(isset($_COOKIE["rememberpwd"])){
            setcookie("rememberpwd", "", time() - (60 * 60), "/");
          }
        }

      }
    }


    $stmt = null;
  }

}