<?php
class Activationcotrl extends Activation
{
  public function generate_session($email)
  {
     $code = rand(11121, 99990);
     $status = "unactivated";

     $result = $this->inactivateUser($email, $code, $status);

     $new_code = $result["code"];

     return $new_code;

  }
}