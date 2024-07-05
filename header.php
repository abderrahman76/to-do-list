<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="header.css">

    <title>task manager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <h2 class="logo">task <a style="color: #3498DB;">manager</a></h2>
        <ul>
            <il><a href="home.php" >home</a></il>
            <?php
            if (isset($_SESSION["user_id"])){
               echo "<il><a href='project.php'>list</a></il>";
            }
            ?>
            <il><a href="#about us">about Us</a></il>
            <il><a href="#contact">contact</a></il>
        <?php  
        if(isset($_SESSION["user_id"])){
            $name = $_SESSION["username"];
            echo "<il><a href='#' class='active'>$name</a></il>";
            echo "<il><a href='log out.php' class='active'>log out</a></il>";
        }else{
            echo ("<il><a href='log in.php' class='active'>log in</a></il>");
        }
        ?>
        </ul>
    </header>