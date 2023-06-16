<?php

session_start();

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
<div class="blurred-part">
  <!-- The navigation bar -->
  <div class="navigation-bar">
    <div class="logo">personara</div>
    <nav>
      <a href="index.php">home</a>
      <a href="contact.php">contact</a>
      <?php if(isset($_SESSION["usersid"])):?>
      <a href="gallery.php">gallery</a>
      <a href="INCLUDES/logout.inc.php">logout</a>
      <?php else: ?>
      <a href="signup.php">signup</a>
      <a href="login.php">login</a>
      <?php endif; ?>
    </nav>
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
    <div class="heading">your memories</div>
    <div class="leisure-box box-container">
      <div>
      <div class="box">
        <div class="name">swimming</div>
        <div class="image">
          <img src="IMAGES/home-1.jpg" alt="">
        </div>
      </div>
      <div class="edit-btn">
        <button class="btn" onclick="showMoodle();">manage</button>
        </div>
      </div>
      <div>
      <div class="box">
        <div class="name">swimming</div>
        <div class="image">
          <img src="IMAGES/home-1.jpg" alt="">
        </div>
      </div>
      <div class="edit-btn">
        <button class="btn" onclick="showMoodle();">manage</button>
        </div>
      </div>
      <div>
      <div class="box">
        <div class="name">swimming</div>
        <div class="image">
          <img src="IMAGES/home-1.jpg" alt="">
        </div>
      </div>
      <div class="edit-btn">
        <button class="btn" onclick="showMoodle();">manage</button>
        </div>
      </div>
      <div>
      <div class="box">
        <div class="name">programming</div>
        <div class="image">
          <img src="IMAGES/home-1.jpg" alt="">
        </div>
      </div>
      <div class="edit-btn">
        <button class="btn" onclick="showMoodle();">manage</button>
        </div>
      </div>
      <div>
      <div class="box">
        <div class="name">writing</div>
        <div class="image">
          <img src="IMAGES/home-1.jpg" alt="">
        </div>
      </div>
      <div class="edit-btn">
        <button class="btn" onclick="showMoodle();">manage</button>
        </div>
      </div>
      <div>
      <div class="box">
        <div class="name">designing</div>
        <div class="image">
          <img src="IMAGES/home-1.jpg" alt="">
        </div>
      </div>
      <div class="edit-btn">
        <button class="btn" onclick="showMoodle();">manage</button>
      </div>
      </div>
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
</div>
  <div class="manage-moodle">
    <div class="moodle-msg">Do want to delete or update this post? once deleted, it cannot be recovered</div>
    <div class="moodle-btn-container">
      <span class="btn cancel">Cancel</span>
      <a href="#" class="btn">Download</a>
      <a href="image_upload.php" class="btn">Add</a>
      <a href="#" class="btn">Delete</a>
    </div>
  </div>
  <script src="JS/menu.js"></script>
  <script src="JS/gallery.js"></script>
</body>
</html>