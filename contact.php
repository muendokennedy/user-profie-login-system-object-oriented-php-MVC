<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- The custom CSS link -->
  <link rel="stylesheet" href="STYLE/style.css?<?php echo time(); ?>">
  <!-- The font-awesome CDN link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <title>Personara profile system</title>
</head>

<body>
  <!-- The navigation bar -->
  <div class="navigation-bar">
    <div class="logo">personara</div>
    <nav>
      <a href="index.php">home</a>
      <a href="contact.php">contact</a>
      <?php if (isset($_SESSION["usersid"])) : ?>
      <a href="profile.php">profile</a>
      <a href="gallery.php">gallery</a>
      <a href="INCLUDES/logout.inc.php">logout</a>
      <?php else : ?>
      <a href="signup.php">signup</a>
      <a href="login.php">login</a>
      <?php endif; ?>
    </nav>
    <div class="menu"><span class="fa-solid fa-bars">Menu</span></div>
    <!-- The body section -->
  </div>
  <section class="home">
    <div class="header">
      <div class="heading">about personara</div>
      <div class="heading-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam odit cupiditate libero
        quasi corporis sequi saepe eum. Eum, omnis. Accusantium dolorem eaque repellendus, asperiores cupiditate
        suscipit perspiciatis eos dolorum recusandae ad doloremque hic, totam placeat laborum repudiandae, illo odio.
        Ullam nisi doloremque nihil quos id. Ea saepe praesentium totam amet.</div>
      <hr>
    </div>
    <?php if(isset($_GET["error"])):?>
    <?php if($_GET["error"] == "none"):?>
    <div class="success-block">The message has been sent successfully</div>
    <?php elseif($_GET["error"] == "emptyinputs"):?>
    <div class="error-block-1">Plese fill all the inputs</div>
    <?php elseif($_GET["error"] == "invalidemail"):?>
    <div class="error-block-1">You entered invalid email</div>
    <?php elseif($_GET["error"] == "notsend"):?>
    <div class="error-block-1">An error encountered while sending the email, please try again</div>
    <?php endif;?>
    <?php endif;?>
    <div class="heading">talk to personara</div>
    <form action="INCLUDES/contact.inc.php" method="POST" autocomplete="on" class="form-container sign-up contact-form">
      <div class="signup-title">Talk to us</div>
      <div class="input-row">
        <div class="input-box">
          <input type="text" name="fname" id="fname" required>
          <label for="fname">Enter your first name:</label>
        </div>
        <div class="input-box">
          <input type="text" name="lname" id="lname" required>
          <label for="lname">Enter your last name:</label>
        </div>
      </div>
      <div class="input-row">
        <div class="input-box">
          <input type="text" name="email" id="email" required>
          <label for="email">Enter your email:</label>
        </div>
        <div class="input-box">
          <input type="text" name="subject" id="subject" required>
          <label for="subject">Enter your subject:</label>
        </div>
      </div>
      <div class="input-box profile-input-box">
        <textarea name="message" id="message" required></textarea>
        <label for="message">Enter your message:</label>
      </div>
      <div class="input-box profile-navigation-button-container">
        <button type="submit" class="btn" name="submit">Send Message</button>
      </div>
    </form>
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
    <div class="copyright-text">This is the official website of personara | personara@gmail.com | Al rights reserved
    </div>
  </footer>
  <script src="JS/menu.js"></script>
</body>

</html>