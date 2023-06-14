<?php

session_start();

require_once("CLASSES/dbh.class.php");
require_once("CLASSES/profile.class.php");
require_once("CLASSES/profilecotrl.class.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- The custom CSS link -->
  <link rel="stylesheet" href="STYLE/style.css?<?php echo time(); ?>">
  <!-- The font-awesome CDN link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/> 
  <title>Personara profile system</title>
</head>
<body>
  <!-- The navigation bar -->
  <div class="navigation-bar">
    <div class="logo">personara</div>
    <nav>
      <a href="index.php">home</a>
      <a href="signup.php">signup</a>
      <a href="login.php">login</a>
      <a href="contact.php">contact</a>
    </nav>
    <div class="menu"><span class="fa-solid fa-bars">Menu</span></div>
    <!-- The body section -->
  </div>
  <section class="home">
    <div class="header">
    <div class="heading">about personara</div>
      <div class="heading-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam odit cupiditate libero quasi corporis sequi saepe eum. Eum, omnis. Accusantium dolorem eaque repellendus, asperiores cupiditate suscipit perspiciatis eos dolorum recusandae ad doloremque hic, totam placeat laborum repudiandae, illo odio. Ullam nisi doloremque nihil quos id. Ea saepe praesentium totam amet.</div>
      <hr>
    </div>
    <div class="heading">about <?php
      if(isset($_SESSION["usersid"])){
        echo $_SESSION["firstname"];
      }
      ?></div>
    <div class="profile-bio-container">
      <?php
      if(isset($_SESSION["usersid"])){
        $images = new Profilecotrl("");
        $images->get_pictures($_SESSION["usersid"]);
        $profile_info = new Profilecotrl("");
        $profile_info->get_profile_information($_SESSION["usersid"]);
      }
      ?>
      
    </div>
    <div class="edit-btn">
    <a href="#" class="btn">Edit</a>
    </div>
    <hr>
    <div class="heading">what <?php
      if(isset($_SESSION["usersid"])){
        echo $_SESSION["firstname"];
      }
      ?> likes doing for leasure</div>
    <div class="leisure-box box-container">
    <?php
      if(isset($_SESSION["usersid"])){
        $hobby_info = new Profilecotrl("");
        $hobby_info->get_hobby_info($_SESSION["usersid"]);
      }
      ?>
    </div>
    <hr>
    <div class="heading">what <?php
      if(isset($_SESSION["usersid"])){
        echo $_SESSION["firstname"];
      }
      ?> does in career life</div>
    <div class="leisure-box box-container">
    <?php
      if(isset($_SESSION["usersid"])){
        $career_info = new Profilecotrl("");
        $career_info->get_career_info($_SESSION["usersid"]);
      }
    ?>
    </div>
    <hr>
    <div class="heading">people close to <?php
      if(isset($_SESSION["usersid"])){
        echo $_SESSION["firstname"];
      }
      ?> </div>
    <div class="friends-container">
    <?php
      if(isset($_SESSION["usersid"])){
        $friend_info = new Profilecotrl("");
        $friend_info->get_friend_info($_SESSION["usersid"]);
      }
    ?>
    </div>
    <hr>
  </section>
  <footer>
    <div class="link-box-container">
      <div class="link-box">
        <div class="link-title">quick links</div>
        <a href="#">Home</a>
        <a href="#">signup</a>
        <a href="#">login</a>
        <a href="#">contact</a>
        <a href="#">FAQ</a>
      </div>
      <div class="link-box">
        <div class="link-title">our locations</div>
        <a href="#">Kenya</a>
        <a href="#">Nigeria</a>
        <a href="#">India</a>
        <a href="#">China</a>
        <a href="#">United States</a>
      </div>
      <div class="link-box">
        <div class="link-title">follow us</div>
        <a href="#">Facebook</a>
        <a href="#">Twitter</a>
        <a href="#">Instagram</a>
        <a href="#">Pinterest</a>
        <a href="#">Youtube</a>
      </div>
      <div class="link-box">
        <div class="link-title">newsletter</div>
        <p>subscribe for the latest updates</p>
        <form>
          <input type="email" placeholder="Enter Email">
          <button class="btn" type="submit">subscribe</button>
        </form>
      </div>
    </div>
    <hr>
    <div class="copyright-text">This is the official website of personara | personara@gmail.com | Al rights reserved</div>
  </footer>
  <script src="JS/menu.js"></script>
  <script src="JS/profile_swiper.js"></script>
</body>
</html>