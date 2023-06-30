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
      <a href="signup.php">signup</a>
      <a href="login.php">login</a>
      <a href="contact.php">contact</a>
    </nav>
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
    <?php if($_GET["error"] == "emptyinputs"):?>
    <div class="error-block-1">Plese fill all the inputs</div>
    <?php elseif($_GET["error"] == "invalidcode"):?>
    <div class="error-block-1">You entered an invalid code</div>
    <?php elseif($_GET["error"] == "notsend"):?>
    <div class="error-block-1">An error was encountered while sending link to your email</div>
    <?php elseif($_GET["error"] == "notsendcode"):?>
    <div class="error-block-1">An error was encountered while sending verification code to your email</div>
    <?php elseif($_GET["error"] == "incorrectemail"):?>
    <div class="error-block-1">You entered an incorrect email</div>
    <?php endif;?>
    <?php endif;?>
    <?php if(isset($_GET["reset"])):?>
    <?php if($_GET["reset"] == "successcheckemail"):?>
    <div class="success-block">A link to reset your password has been sent to your email, please check your email and
      click the link</div>
    <?php endif;?>
    <?php endif;?>
    <?php if(isset($_GET["msg"])):?>
    <?php if($_GET["msg"] == "checkemail"):?>
    <div class="success-block">An account verification code has been sent to your email, please enter the code here
    </div>
    <?php endif;?>
    <?php endif;?>
    <div class="heading">verify your account</div>
    <div class="sign-up">
      <form action="INCLUDES/reset-process.inc.php" method="POST" autocomplete="off">
        <div class="signup-title">Email verification</div>
        <div class="input-box">
          <input type="text" name="V_code" id="V_code" required>
          <label for="V_code">Enter the verification code:</label>
        </div>
        <div class="input-box">
          <input type="submit" name="reset-code-submit" value="send code" class="btn">
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
    <div class="copyright-text">This is the official website of personara | personara@gmail.com | Al rights reserved
    </div>
  </footer>
  <script src="JS/signup.js"></script>
</body>

</html>