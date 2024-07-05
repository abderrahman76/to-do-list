<?php
if(isset($_POST['submit'])){
include_once 'connect.php';
include_once 'fonctions.php';

$TaskName = $_POST['TaskName'];
$postername = $_POST['postername'];
$deadline = $_POST['deadline'];
$Taskholdername = $_POST['Taskholdername'];
$description = $_POST['description'];
$state = $_POST['state'];
 echo  '<input type="submit" value="save" name="submit">';

insertTask($conn,$TaskName,$postername,$deadline,$Taskholdername,$description,$state);
}else{
        header("location:project.php?error=o");
    exit();
}
/*$stmt = $conn->prepare("insert into task_manager(task_name,poster_name,dead_line,task_holder,description_box,task_state) values (?,?,?,?,?,?)");
$stmt->execute(array($TaskName,$postername,$deadline,$Taskholdername,$description,$state));
header("location:project.php");
        exit();*/

