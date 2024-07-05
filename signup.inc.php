<?php
if(isset($_POST['submit'])){
$username =$_POST['username'];
$email =$_POST['email'];
$date =$_POST['date'];
$pnumber =$_POST['pnumber'];
$password =$_POST['password'];
$cpassword =$_POST['cpassword'];
$error;
$success = "You have signed up successfully!";
$gender =$_POST['gender'];

include_once 'connect.php';
include_once 'fonctions.php';
 
if(invalidUsername($username)!==false){
    header("location:sign_up.php?error=invalidusername");
    $error = "choose a proper username!";
    exit();
}
if(invalidEmail($email)!==false){
    header("location:sign_up.php?error=invalidemail");
    $error = "choose a valid e-mail!";
    exit();
}
if(pwdMatch($password,$cpassword)!==false){
    header("location:sign_up.php?error=passwordsdontmatch");
    $error = "passwords don't match!";
    exit();
}
if(usernameExist($conn,$username,$email)!==false){
    header("location:sign_up.php?error=usernametaken");
    $error = "username or e-mail already taken!";
    exit();
}
createUser($conn,$username,$email,$date,$pnumber,$password,$gender);
}
else{
    header("location:sign_up.php");
    $error = null;
    exit();
}