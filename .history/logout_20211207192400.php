<?php
session_start(); 
session_unset();
session_destroy();
unset($_SESSION['id']);
unset($_SESSION['user_name']);
unset($_SESSION['name']);
header("location:login.php");