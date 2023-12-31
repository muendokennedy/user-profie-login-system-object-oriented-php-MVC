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
    <div class="menu"><span class="fa-solid fa-bars"></span></div>
    <!-- The body section -->
  </div>
  <section class="home">
    <div class="header">
      <div class="heading">make your profile</div>
      <div class="heading-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam odit cupiditate libero
        quasi corporis sequi saepe eum. Eum, omnis. Accusantium dolorem eaque repellendus, asperiores cupiditate
        suscipit perspiciatis eos dolorum recusandae ad doloremque hic, totam placeat laborum repudiandae, illo odio.
        Ullam nisi doloremque nihil quos id. Ea saepe praesentium totam amet.</div>
      <hr>
    </div>
    <div class="form-progress-indicator">
      <span class="first indicator-btn"></span>
      <span class="second indicator-btn"></span>
      <span class="third indicator-btn"></span>
      <span class="fourth indicator-btn"></span>
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
    <div class="error-block">All fields are required</div>
    <form action="INCLUDES/profile.inc.php" method="POST" autocomplete="off" class="form-container sign-up profile"
      enctype="multipart/form-data">
      <div class="step-form">
        <div class="signup-title">Your profile</div>
        <div class="input-row">
          <div class="input-box">
            <input type="file" name="first-pic" id="first-pic" required>
            <label for="first-pic">Select profile pic</label>
          </div>
          <div class="input-box">
            <input type="file" name="second-pic" id="second-pic" required>
            <label for="second-pic">Select second profile pic:</label>
          </div>
        </div>
        <div class="input-row">
          <div class="input-box">
            <input type="file" name="third-pic" id="third-pic" required>
            <input type="hidden" name="user-id" id="user-id" value="<?php echo $_SESSION["incoming_user_id"]; ?>"
              required>
            <label for="third-pic">Select third profile pic:</label>
          </div>
          <div class="input-box">
            <input type="text" name="nick-name" id="nick-name" required>
            <label for="nick-name">Enter nickname:</label>
          </div>
        </div>
        <div class="input-row">
          <div class="input-box profile-input-box">
            <textarea name="hobbies" id="hobbies" required></textarea>
            <label for="hobbies">Describe your hobbies:</label>
          </div>
          <div class="input-box profile-input-box">
            <textarea name="career" id="career" required></textarea>
            <label for="career">Describe your career:</label>
          </div>
        </div>
        <div class="input-row">
          <div class="input-box profile-input-box">
            <textarea name="college" id="college" required></textarea>
            <label for="college">Describe your college:</label>
          </div>
          <div class="input-box profile-input-box">
            <textarea name="highschool" id="highschool" required></textarea>
            <input type="hidden" name="user-id" id="user-id" value="<?php echo $_SESSION["incoming_user_id"]; ?>"
              required>
            <label for="highschool">Describe your highschool:</label>
          </div>
        </div>
      </div>
      <div class="step-form">
        <div class="signup-title">More about your hobbies</div>
        <div class="input-box">
          <input type="text" name="hobby-name" id="hobby-name" required>
          <label for="hobby-name">Enter the hobby name:</label>
        </div>
        <div class="input-box profile-input-box">
          <textarea name="hobby-more" id="hobby-more" required></textarea>
          <label for="hobby-more">Describe the hobby briefly:</label>
        </div>
        <div class="input-box">
          <input type="file" name="hobby-photo" id="hobby-photo" required>
          <input type="hidden" name="user-id" id="user-id" value="<?php echo $_SESSION["incoming_user_id"]; ?>"
            required>
          <label for="hobby-photo">Select a memory photo:</label>
        </div>
      </div>
      <div class="step-form">
        <div class="signup-title">More about your career life</div>
        <div class="input-box">
          <input type="text" name="career-name" id="career-name" required>
          <label for="career-name">Enter the career name:</label>
        </div>
        <div class="input-box profile-input-box">
          <textarea name="career-more" id="career-more" required></textarea>
          <label for="career-more">Describe the career briefly:</label>
        </div>
        <div class="input-box">
          <input type="file" name="career-photo" id="career-photo" required>
          <input type="hidden" name="user-id" id="user-id" value="<?php echo $_SESSION["incoming_user_id"]; ?>"
            required>
          <label for="career-photo">Select a memory photo:</label>
        </div>
      </div>
      <div class="step-form">
        <div class="signup-title">Talk about your friends</div>
        <div class="input-box">
          <input type="text" name="friend-name" id="friend-name" required>
          <label for="friend-name">Enter the friend name:</label>
        </div>
        <div class="input-box profile-input-box">
          <textarea name="relation-more" id="relation-more" required></textarea>
          <label for="relation-more">Describe the relationship:</label>
        </div>
        <div class="input-box">
          <input type="file" name="friend-photo" id="friend-photo" required>
          <input type="hidden" name="user-id" id="user-id" value="<?php echo $_SESSION["incoming_user_id"]; ?>"
            required>
          <label for="friend-photo">Select a memory photo:</label>
        </div>
      </div>
      <div class="input-box profile-navigation-button-container">
        <button type="button" class="btn prev" onclick="nextPrev(-1)">previous</button>
        <button type="submit" class="btn next" onclick="nextPrev(1)" name="submit">Next</button>
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