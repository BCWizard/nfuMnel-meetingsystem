<?php 
session_start(); 
session_destroy(); 
setcookie("cookieUserAccount","",time());
setcookie("cookieUserPassword","",time());
header('location:../user/loginpage.php');