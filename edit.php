<?php
    include_once 'header.php';
    include_once 'connect.php';
$id=$_GET['id'];
    $sql = "SELECT * FROM task_manager WHERE task_id=$id;";
 $result = mysqli_query($conn, $sql);
 $resultCheck = mysqli_num_rows($result);
 if($resultCheck>0){
    $row = mysqli_fetch_assoc($result);
}
    ?>
   <link rel="stylesheet" href="formular.css">
    <div class="container">
        <div class="title">task</div>
        <div class="content">
          <form action="edit.inc.php?id=$id" method="post">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Task Name</span>
              <?php echo "<input type='text' value=$row[task_name] name='TaskName' required>"?>
              </div>
              <div class="input-box">
                <span class="details">poster name</span>
                <?php echo"<input type='text' value=$row[poster_name] name='postername' disabled>"?>
              </div>
              <div class="input-box">
                <span class="details">dead line</span>
                <?php echo"<input type='date' value=$row[dead_line] name='deadline' required>"?>
              </div>
              <div class="input-box">
                <span class="details">Task holder name</span>
                <?php echo"<input type='text' value=$row[task_holder] name='Taskholdername'>"?>
              </div>
              <div class="input-box">
                <span class="details">description</span>
                <?php echo"<textarea cols='30' rows='4'  name='description' required>$row[description_box]</textarea>"?>
              </div>
            </div>
            <div class="gender-details">
              <?php
              $todo = "";
              $doing = "";
              $done = "";
              if($row['task_state'] == 'to_do'){
              $todo = "checked";
              $doing = "";
              $done = "";
              }else if($row['task_state'] == 'doing'){
              $todo = "";
              $doing = "checked";
              $done = "";
              }elseif($row['task_state'] == 'done'){
              $todo = "";
              $doing = "";
              $done = "checked";
              }
              ?>
              <input type="radio" name="state" id="dot-1" value="to_do" <?= $todo ?>  >
              <input type="radio" name="state" id="dot-2"  value="doing" <?= $doing ?>>
              <input type="radio" name="state" id="dot-3"  value="done" <?= $done ?> >
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
            <div class="button">
              <input type="submit" value="save" name="submit">
              <div class="butt">
                <a href="project.php"><input type="button" value="cancel"></a>
            </div>
            </div>
            <?php echo "<input type='text' value=$id name='id' hidden>"?>
          </form>
        </div>
      </div>
    <?php
    include_once 'footer.php';
    ?>
     
</body>
</html>

 