<?php
//session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
    else
    {
        // Define $username and $password
        $username=$_POST['username'];
        $pass=$_POST['password'];
        //echo $password;
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
        //echo $username." , ".$pass;
        // Selecting Database
        $db = mysqli_select_db($connection,"edenaais_sadna");
        // SQL query to fetch information of registerd users and finds user match (client or employee).
        $query1 = mysqli_query($connection, "select * from users where password='".$pass."' AND user_name='".$username."'");
        $query2 = mysqli_query($connection, "select * from Nutritionists where password='".$pass."' AND user_name='".$username."'");
        $query3 = mysqli_query($connection, "select * from Coaches where password='".$pass."' AND user_name='".$username."'");
        $query4 = mysqli_query($connection, "select * from Administration where password='".$pass."' AND user_name='".$username."'");

        $rows1 = mysqli_num_rows($query1);
        $rows2 = mysqli_num_rows($query2);
        $rows3 = mysqli_num_rows($query3);
        $rows4 = mysqli_num_rows($query4);

        //echo $rows1 ."<br>". $rows2 ."<br>". $rows3 ."<br>". $rows4;
        if ($rows1 == 1) {
            session_start();
            $_SESSION['login_user']=$username; // Initializing Session
            header("location: /registered_user/welcome.php"); // Redirecting To Other Page for client
       }
       elseif($rows2==1 || $rows3==1 || $rows4==1){
            session_start();
            $_SESSION['login_user']=$username; // Initializing Session
            //echo "good employee";
            //echo $_SESSION['login_user'];
            header("location: /employee_user/welcome.php"); // Redirecting To Other Page for employee          
       }
        else{
            $error = "Username or Password is invalid, Please try again";
        }
        
        mysqli_close($connection); // Closing Connection    
        }
}
?>