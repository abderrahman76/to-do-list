<?php
    include_once 'header.php';
    ?>
    <link rel="stylesheet" href="formular.css">
    <div class="container">
        <div class="title">task</div>
        <div class="content">
          <form action="pro.php" method="post">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Task Name</span>
                <input type="text" placeholder="Enter your name" name="TaskName" required>
              </div>
              <div class="input-box">
                <span class="details">poster name</span>
                <input type="text" placeholder="Enter your username" name="postername"  value="<?= $_SESSION['username'] ?>" readonly>

              </div>
              <div class="input-box">
                <span class="details">dead line</span>
                <input type="date" placeholder="Enter dead line" name="deadline" required>
              </div>
              <div class="input-box">
                <span class="details">Task holder name</span>
                <input type="text" placeholder="Enter your name (optional)" value="<?= $_SESSION['username'] ?>" name="Taskholdername">
              </div>
              <div class="input-box">
                <span class="details">description</span>
                <textarea  name="description" required></textarea>
              </div>
            </div>
            <div class="gender-details">
              <input type="radio" name="state" id="dot-1" value="to_do" checked>
              <input type="radio" name="state" id="dot-2"  value="doing">
              <input type="radio" name="state" id="dot-3"  value="done">
              <span class="gender-title">task state</span>
              <div class="category">
                <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">To do</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">doing</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="gender">Done</span>
              </label>
              </div>
            </div>
            <div class="error"><?php
              if(isset($_GET["error"])){
                
                  echo "<p>task holder don't exist</p>";
                
              }?>
            <div class="button">
              <input type="submit" value="save" name="submit">
              <div class="butt">
                <a href="project.php"><input type="button" value="cancel"></a>
            </div>
            </div>
          </form>
        </div>
</body>
</html>
