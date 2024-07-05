<?php
include_once 'header.php';
?>
<link rel="stylesheet" href="home.css">
    <div class="content2">
        <h1>MANAGE YOUR <a style="color:#3498DB;">TASKS</a></h1>
        <?php  
        if(isset($_SESSION["user_id"])){
            $name = $_SESSION["username"];
            echo "<p>welcom $name to <a style='color: #3498DB;'> task</a> manager<br>the best way to manage your daily task</p>        <div>";
            echo '<a href="project.php"><button type="button" class="Lbutton"><span class="spon"></span>check my list </button></a>';
            echo  '<a href="formular.php"><button type="button" class="Lbutton" ><span class="spon"></span> creat task</button></a>';
        }else{
            echo "<p>welcom to <a style='color: #3498DB;'> task</a> manager<br>the best way to manage your daily task</p>        <div>";
            echo  '<a href="sign_up.php"><button type="button" class="Lbutton" ><span class="spon"></span>Join Us</button></a>';
        }
        
       
            ?>
            </div> 
    </div>
<?php
include_once 'footer.php';
    ?>
  </body>
  </html>
  