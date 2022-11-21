<?php
session_start();
if (!isset($_SESSION["usuario"])) 
    header("Location: ./view/login.php");
else
    header("Location: ./view/home.php");
?>

