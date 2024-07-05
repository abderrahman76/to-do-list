<?php
if(isset($_POST['submit'])){
    $username =$_POST['email'];
    $password =$_POST['password'];
    include_once 'connect.php';
    include_once 'fonctions.php';

loginUser($conn,$username,$password);

}else{
    header("location:log in.php?error=o");
    exit();
}