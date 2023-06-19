<?php

class Loader
{
  private static $LEVEL;

  public static function load_class($level)
  {
    self::$LEVEL = $level;

    spl_autoload_register(function($class){

      $file_path =  self::$LEVEL . "/". strtolower($class) . ".php";

      if(!file_exists($file_path)){
        return false;
      }else{
        echo "class does not exist";
      }
      require_once($file_path);
    });
  }
}