<?php
session_start(); //starts all the sessions  
if($_SESSION['login_user'] == NULL) { 
   header('Location: http://127.0.0.1:5500/Unregistered_user/index.html'); //take user to the login page if there's no information stored in session variable 
}  
?>