<?php

if(isset($_POST['submit'])){
    include_once 'connect.php';
    include_once 'fonctions.php';

$id =$_POST['id'];
$task_name = $_POST['TaskName'];
 $dead_line = $_POST['deadline'];
 $task_holder = $_POST['Taskholdername'];
 $description = $_POST['description'];
 $task_state = $_POST['state'];

editTask($conn,$id,$task_name,$dead_line,$task_holder,$description,$task_state);
}else{
    header("location:project.php?error=o");
    exit();
}