<?php
$dbhost = "localhost";
$dbuser ="root";
$dbpass = "";
$dbname = "task_manager";

$conn= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(!$conn){
    die("connection failed:". mysqli_connect_error());
}

