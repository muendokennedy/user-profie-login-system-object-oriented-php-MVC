<?php

session_start();

require_once("CLASSES/dbh.php");
require_once("CLASSES/update.php");
require_once("CLASSES/updatecotrl.php");


$bio_info = new Updatecotrl("");

$data = $bio_info->check_for_bio_update($_GET["usersid"]);

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
      <div class="heading">Update your bio information <?php echo $_SESSION["firstname"] ?? ""; ?></div>
      <div class="heading-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam odit cupiditate libero
        quasi corporis sequi saepe eum. Eum, omnis. Accusantium dolorem eaque repellendus, asperiores cupiditate
        suscipit perspiciatis eos dolorum recusandae ad doloremque hic, totam placeat laborum repudiandae, illo odio.
        Ullam nisi doloremque nihil quos id. Ea saepe praesentium totam amet.</div>
      <hr>
    </div>
    <div class="error-block">All fields are required</div>
    <form action="INCLUDES/update.inc.php" method="POST" autocomplete="off" class="form-container sign-up profile" enctype="multipart/form-data">
      <div class="signup-title">Your profile bio</div>
      <div class="input-box">
        <input type="text" name="nick-name" id="nick-name" value="<?php echo $data[0]["nickname"] ?? ""; ?>" required>
        <label for="nick-name">Enter nickname:</label>
      </div>
      <div class="input-row">
        <div class="input-box profile-input-box">
          <textarea name="hobbies" id="hobbies" required><?php echo $data[0]["hobbies"] ?? ""; ?></textarea>
          <label for="hobbies">Describe your hobbies:</label>
        </div>
        <div class="input-box profile-input-box">
          <textarea name="career" id="career" required><?php echo $data[0]["career"] ?? ""; ?></textarea>
          <label for="career">Describe your career:</label>
        </div>
      </div>
      <div class="input-row">
        <div class="input-box profile-input-box">
          <textarea name="college" id="college" required><?php echo $data[0]["college"] ?? ""; ?></textarea>
          <label for="college">Describe your college:</label>
        </div>
        <div class="input-box profile-input-box">
          <textarea name="highschool" id="highschool" required><?php echo $data[0]["highschool"] ?? ""; ?></textarea>
          <input type="hidden" name="user-id" id="user-id" value="<?php echo $_GET["usersid"]; ?>" required>
          <label for="highschool">Describe your highschool:</label>
        </div>
      </div>
      <div class="input-box profile-navigation-button-container">
        <button type="submit" class="btn next" name="update-bio">Update</button>
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
  <script src="JS/profile_input.js?<?php echo time(); ?>"></script>
</body>

</html>