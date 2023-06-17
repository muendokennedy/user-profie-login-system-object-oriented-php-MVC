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
<body>
  <!-- The navigation bar -->
  <div class="navigation-bar">
    <div class="logo">personara</div>
    <nav>
      <div class="close"><span class="fa-solid fa-xmark">Close</span></div>
      <a href="index.php">home</a>
      <a href="contact.php">contact</a>
      <?php if(isset($_SESSION["usersid"])):?>
      <a href="profile.php">profile</a>
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
    <div class="topic">
      <div class="topics heading">popular topics</div>
      <div class="mini-topic">Career life</div>
      <div class="topic-box-container box-container">
        <div class="topic-box box">
          <div class="topic-name name">Engineering</div>
          <div class="topic-content content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad quo architecto qui nemo repellendus aperiam</div>
          <div class="topic-image image">
            <img src="IMAGES/home-1.jpg" alt="">
          </div>
        </div>
        <div class="topic-box">
          <div class="topic-name">Programming</div>
          <div class="topic-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad quo architecto qui nemo repellendus aperiam,</div>
          <div class="topic-image">
          <img src="IMAGES/home-1.jpg" alt="">
          </div>
        </div>
        <div class="topic-box">
          <div class="topic-name">Writing</div>
          <div class="topic-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad quo architecto qui nemo repellendus aperiam?</div>
          <div class="topic-image">
          <img src="IMAGES/home-1.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="mini-topic">Hobbies</div>
      <div class="topic-box-container">
        <div class="topic-box">
          <div class="topic-name">Swimming</div>
          <div class="topic-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad quo architecto qui nemo repellendus aperiam, </div>
          <div class="topic-image">
          <img src="IMAGES/home-1.jpg" alt="">
          </div>
        </div>
        <div class="topic-box">
          <div class="topic-name">Knitting</div>
          <div class="topic-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad quo architecto qui nemo repellendus aperiam, </div>
          <div class="topic-image">
          <img src="IMAGES/home-1.jpg" alt="">
          </div>
        </div>
        <div class="topic-box">
          <div class="topic-name">Singing</div>
          <div class="topic-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad quo architecto qui nemo repellendus aperiam,</div>
          <div class="topic-image">
          <img src="IMAGES/home-1.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="started">
      <div class="started-header heading">getting started</div>
      <div class="heading-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam odit cupiditate libero quasi corporis sequi saepe eum. Eum, omnis. Accusantium dolorem eaque repellendus, asperiores cupiditate suscipit perspiciatis eos dolorum recusandae ad doloremque hic, totam placeat laborum repudiandae, illo odio.</div>
      <div class="signup-login-request-container">
        <a class="signup-request-btn btn">signup</a>
        <p>Or already have an account?</p>
        <a class="login-request-btn btn">login</a>
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
  <script src="JS/menu.js"></script>
</body>
</html>