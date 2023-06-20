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
    <?php if(isset($_GET["error"])):?>
    <?php if($_GET["error"] == "emptyinputs"):?>
    <div class="error-block-1">All fields are required</div>
    <?php elseif($_GET["error"] == "invalidusernameemalorpassword"):?>
    <div class="error-block-1">You entered invalid username or password</div>
    <?php elseif($_GET["error"] == "wrongpwd"):?>
    <div class="error-block-1">You entered a wrong password</div>
    <?php endif;?>
    <?php endif;?>
    <?php if(isset($_GET["msg"])):?>
    <?php if($_GET["msg"] == "successpwdreset"):?>
    <div class="success-block">password reset successfully, login with the new password</div>
    <?php endif;?>
    <?php endif;?>
    <div class="heading">login to your account</div>
    <div class="sign-up">
      <form action="INCLUDES/login.inc.php" method="POST">
        <div class="signup-title">Login</div>
        <div class="input-box">
          <input type="text" name="uid" id="uid" value="<?php if(isset($_COOKIE["rememberuid"])){ echo $_COOKIE["rememberuid"]; }?>" required>
          <label for="uid">Enter your username or email:</label>
        </div>
        <div class="input-box">
          <input type="password" name="pwd" id="pwd" value="<?php if(isset($_COOKIE["rememberpwd"])){ echo $_COOKIE["rememberpwd"]; }?>" required>
          <label for="pwd">Enter your password:</label>
          <span class="show-btn">SHOW</span>
        </div>
        <div class="rememberme">
          <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["rememberpwd"])) {?> checked <?php } ?>>
          <label for="remember">Remember me</label>
        </div>
        <div class="input-box">
          <input type="submit" name="submit" value="login" class="btn">
        </div>
        <p class="forgot-pwd"><a href="verify_email.php">Forgot password</a></p>
        <div class="link-container">
          <p>Don't have an account?</p>
          <p><a href="signup.html">sign up</a></p>
        </div>
      </form>
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
  <script src="JS/login.js"></script>
</body>
</html>