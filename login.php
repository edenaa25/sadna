<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid -1";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$pass=$_POST['password'];
echo $password;
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$server_name = "localhost";
$user_name = "edenaais_edena";
$password = "123456";
$database = "edenaais_sadna";

$connection = new mysqli($server_name, $user_name, $password, $database);
if ($connection->connect_error) {
    die("Error connecting: " . $connection->connect_error);
}// To protect MySQL injection for Security purpose
//$username = stripslashes($username);
//$password = stripslashes($password);
//$username = mysql_real_escape_string($username);
//$password = mysql_real_escape_string($password);
echo $username." , ".$pass;
// Selecting Database
$db = mysqli_select_db($connection,"edenaais_sadna");
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection, "select * from users where password='".$pass."' AND user_name='".$username."'");
$rows = mysqli_num_rows($query);
echo $row;
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: /registered_user/welcome.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid -2";
}
mysqli_close($connection); // Closing Connection
}
}
?>