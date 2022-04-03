<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$server_name = "localhost";
$user_name = "edenaais_edena";
$password = "123456";
$database = "edenaais_sadna";

$connection = new mysqli($server_name, $user_name, $password, $database);
if ($connection->connect_error) {
    die("Error connecting: " . $connection->connect_error);
}
// Selecting Database
$db = mysqli_select_db($connection, "edenaais_sadna");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection, "select user_name from users where user_name='".$user_check."'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['user_name'];

if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
echo "close connection from seassion.php page";
header('Location: '); // Redirecting To Home Page
}
?>