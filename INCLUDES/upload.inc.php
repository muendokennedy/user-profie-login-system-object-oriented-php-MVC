<?php
if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  // collect the gallery form information
  $memory_name = $_POST["memory-name"];
  $memory_photo = $_FILES["memory-photo"];
 
}