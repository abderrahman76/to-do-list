<?php
include_once 'connect.php';
include_once 'fonctions.php';
$id=$_GET['id'];
deleteTask($conn,$id);
