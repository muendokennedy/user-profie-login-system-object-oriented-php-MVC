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
    </nav>
    <div class="menu"><span class="fa-solid fa-bars"></span></div>
    <!-- The body section -->
  </div>
  <section class="home">
    <div class="header">
      <div class="heading">make your gallery</div>
      <div class="heading-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam odit cupiditate libero
        quasi corporis sequi saepe eum. Eum, omnis. Accusantium dolorem eaque repellendus, asperiores cupiditate
        suscipit perspiciatis eos dolorum recusandae ad doloremque hic, totam placeat laborum repudiandae, illo odio.
        Ullam nisi doloremque nihil quos id. Ea saepe praesentium totam amet.</div>
      <hr>
    </div>
    <?php if(isset($_GET["error"])):?>
    <?php if($_GET["error"] == "emptyinputs"):?>
    <div class="error-block-1">All fields are required</div>
    <?php elseif($_GET["error"] == "largefile"):?>
    <div class="error-block-1">File selected is too large</div>
    <?php elseif($_GET["error"] == "uploaderror"):?>
    <div class="error-block-1">There was an upload error</div>
    <?php elseif($_GET["error"] == "incorrectfiletype"):?>
    <div class="error-block-1">Please select only jpg, jpeg or png files</div>
    <?php elseif($_GET["error"] == "emptyinputshobby"):?>
    <div class="error-block-1">Please fill all hobby inputs</div>
    <?php elseif($_GET["error"] == "emptyinputscareer"):?>
    <div class="error-block-1">Please fill all career inputs</div>
    <?php elseif($_GET["error"] == "emptyinputsfriends"):?>
    <div class="error-block-1">Please fill all friend inputs</div>
    <?php endif;?>
    <?php endif;?>
    <form action="INCLUDES/upload.inc.php" method="POST" autocomplete="off" class="form-container sign-up profile"
      enctype="multipart/form-data">
      <div class="signup-title">Make your gallery by uploading more memories</div>
      <div class="input-box">
        <input type="text" name="memory-name" id="memory-name" required>
        <label for="memory-name">Enter the memory name:</label>
      </div>
      <div class="input-box">
        <input type="file" name="memory-photo" id="memory-photo" required>
        <input type="hidden" name="user-id" id="user-id" value="<?php echo $_SESSION["usersid"] ?? ""; ?>" required>
        <label for="memory-photo">Select a memory photo:</label>
      </div>
      <div class="input-box profile-navigation-button-container">
        <button type="submit" class="btn next" name="submit">Upload memory</button>
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