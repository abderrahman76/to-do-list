<?php
include_once 'header.php';
?>
    <link rel="stylesheet" href="log in.css">
    
    <div class="container">
        <div class="title">log in</div>
        <div class="content">
          <form action="login.inc.php" method="post">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Email</span>
                <input type="text" placeholder="Enter your email" name="email" required>
              </div>
              
              <div class="input-box">
                <span class="details">Password</span>
                <input type="password" placeholder="Enter your password" name="password" required>
              </div>
              
              <div class="error"><?php
              if(isset($_GET["error"])){
                if($_GET["error"] == "wrongusername"){
                  echo "<p>wrong e_mail or username!</p>";
                }elseif($_GET["error"] == "wrongpwd"){
                  echo "<p>wrong password!</p>";
                }
              }
              ?></div>
              <p>don't have an account? <a href="Sign_up.php"class="link" >sign up</a></p>
            </div>
            <div class="button">
            <input type="submit" value="log in" name="submit">
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
