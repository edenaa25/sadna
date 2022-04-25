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
session_start();// Starting Session  // למה יש פה עוד התחלת סשן שכבר עשינו את זה בדף הלוגאין
// Storing Session
$user_check=$_SESSION['login_user'];
//echo $rows1 ."<br>". $rows2;
// SQL Query To Fetch Complete Information Of User
$ses_sql1=mysqli_query($connection, "select user_name from users where user_name='".$user_check."'");
$row1 = mysqli_fetch_assoc($ses_sql1);
$login_session1 =$row1['user_name'];

if(!isset($login_session1)){
    mysqli_close($connection); // Closing Connection
    echo "close connection from seassion.php page ";
    header('Location: ../index.php'); // Redirecting To Home Page
}
else{
    $ses_sql1=mysqli_query($connection, "select id_coach from Treatments where user_name='".$user_check."'");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $id_coach = $row1['id_coach'];
    $_SESSION['id_coach']= $id_coach;
    //echo $_SESSION['id_coach'];

    $ses_sql1=mysqli_query($connection, "select * from Coaches where Id='".$id_coach."'");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $name_coach = $row1['name'];
    $_SESSION['name_coach']= $name_coach;
    $phone_coach = $row1['phone'];
    $_SESSION['phone_coach']= $phone_coach;
    $mail_coach = $row1['mail'];
    $_SESSION['mail_coach']= $mail_coach;

    //
    
    $ses_sql1=mysqli_query($connection, "select id_nutri from Treatments where user_name='".$user_check."'");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $id_nutri = $row1['id_nutri'];
    $_SESSION['id_nutri']= $id_nutri;
    //echo $_SESSION['id_nutri'];

    $ses_sql1=mysqli_query($connection, "select * from Nutritionists where Id='".$id_nutri."'");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $name_nutri = $row1['name'];
    $_SESSION['name_nutri']= $name_nutri;
    $phone_nutri = $row1['phone'];
    $_SESSION['phone_nutri']= $phone_nutri;
    $mail_nutri = $row1['mail'];
    $_SESSION['mail_nutri']= $mail_nutri;


    //
   

    $ses_sql1=mysqli_query($connection, "select id_nutri from Treatments where user_name='".$user_check."'");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $id_nutri = $row1['id_nutri'];
    $_SESSION['id_nutri']=  $id_nutri;
    //echo $_SESSION['id_nutri'];

    $ses_sql1=mysqli_query($connection, "select BMI_start from Treatments where user_name='".$user_check."'");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $BMI_start = $row1['BMI_start'];
    $_SESSION['BMI_start']=  $BMI_start;
    //echo $_SESSION['BMI_start'];

    $ses_sql1=mysqli_query($connection, "select BMI_curr from Treatments where user_name='".$user_check."'");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $BMI_curr = $row1['BMI_curr'];
    $_SESSION['BMI_curr']=  $BMI_curr;
    //echo $_SESSION['BMI_curr'];

    $ses_sql1=mysqli_query($connection, "select menu from Treatments where user_name='".$user_check."'");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $menu = $row1['menu'];
    $_SESSION['menu']=  $menu;
    //echo $_SESSION['menu'];

    $ses_sql1=mysqli_query($connection, "select txt from Treatments where user_name='".$user_check."'");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $txt = $row1['txt'];
    $_SESSION['txt']=  $txt;
    //echo $_SESSION['txt'];

    $ses_sql1=mysqli_query($connection, "select first_name from users where user_name='".$user_check."'");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $first_name = $row1['first_name'];
    $_SESSION['first_name']=  $first_name;
    //echo $_SESSION['first_name'];

    $ses_sql1=mysqli_query($connection, "select last_name from users where user_name='".$user_check."'");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $last_name = $row1['last_name'];
    $_SESSION['last_name']=  $last_name;
    //echo $_SESSION['last_name'];

    $ses_sql1=mysqli_query($connection, "select * from users where user_name='".$user_check."'");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $address = $row1['address'];
    $_SESSION['address']=  $address;
    //echo $_SESSION['address'];
    $phone = $row1['phone'];
    $_SESSION['phone']=  $phone;
    //echo $_SESSION['phone'];
    $mail = $row1['mail'];
    $_SESSION['mail']=  $mail;
    //echo $_SESSION['mail'];  

    $ses_sql1=mysqli_query($connection, "select weight from weighs where user_name='".$user_check."' order by date asc limit 1");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $first_weight = $row1['weight'];
    $_SESSION['first_weight']=  $first_weight;
    //echo $_SESSION['first_weight'];

    $ses_sql1=mysqli_query($connection, "select weight from weighs where user_name='".$user_check."' order by date desc limit 1");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $last_weight = $row1['weight'];
    $_SESSION['last_weight']=  $last_weight;
    //echo $_SESSION['last_weight'];

     $ses_sql1= mysqli_query($connection, "select * from usersVideo where user_name='".$user_check."'");
     $index=0;
     $user_videos_url=array();
     while($row1=mysqli_fetch_array($ses_sql1)){
         $user_video_id = $row1["id_video"];
         //echo $user_videos[$index] ."<br />";
         $ses_sql2= mysqli_query($connection, "select url from FitnessVideo where id_video='".$user_video_id."'");
         $row2 = mysqli_fetch_assoc($ses_sql2);
         $url= $row2['url'];
         $user_videos_url[$index]= $url;
         //echo $user_videos_url[$index] ."<br />";
         $index= $index+1;    
     }
     $_SESSION['user_videos']=  $user_videos_url;
    //  foreach($_SESSION['user_videos'] as $val){
    //         echo $val."<br/>";
    //     }

    //php for weight forms:

}
 ?>