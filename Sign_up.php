
<?php
include_once 'header.php';
?>
    <link rel="stylesheet" href="formular.css">

    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
          <form action="signup.inc.php" method="post">
          <div class="user-details">
              <div class="input-box">
                <span class="details">Username</span>
                <input type="text" placeholder="Enter your username" name="username" required>
              </div>
              
              <div class="input-box">
                <span class="details">birth date</span>
                <input type="date" name="date" required>
              </div>
              <div class="input-box">
                <span class="details">Email</span>
                <input type="email" placeholder="Enter your email" name="email" required>
              </div>
              <div class="input-box">
                <span class="details">Phone Number</span>
                <input type="text" placeholder="Enter your number" name="pnumber" required>
              </div>
              <div class="input-box">
                <span class="details">Password</span>
                <input type="password" placeholder="Enter your password" name="password"required>
              </div>
              <div class="input-box">
                <span class="details">Confirm Password</span>
                <input type="password" placeholder="Confirm your password" name="cpassword"required>
              </div>
            </div>
            <div class="gender-details">
              <input type="radio" name="gender" id="dot-1"value="male">
              <input type="radio" name="gender" id="dot-2" value="female">
              <span class="gender-title">Gender</span>
              <div class="category">
                <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
              </div>
              <div class="error"><?php
              if(isset($_GET["error"])){
                if($_GET["error"] == "invalidusername"){
                  echo "<p>choose a proper username!</p>";
                }elseif($_GET["error"] == "invalidemail"){
                  echo "<p>choose a valid e-mail!</p>";
                }elseif($_GET["error"] == "passwordsdontmatch"){
                  echo "<p>passwords don't match!</p>";
                }elseif($_GET["error"] == "usernametaken"){
                  echo "<p>username or e-mail already taken!</p>";
                }elseif($_GET["error"] == "non"){
                   echo "<p>You have signed up successfully!</p>";
                }
              }
              ?></div>
              <p>have an account? <a href="log in.php"class="link" > log in</a></p>
            </div>
            <div class="button">
              <input type="submit" value="Register" name="submit">
              <div class="butt">
                <a href="project.php"><input type="button" value="cancel"></a>
            </div>
            </div>
          </form>
        </div>
      </div>
      <?php
    include_once 'footer.php';
    ?>
</body>
</html>
