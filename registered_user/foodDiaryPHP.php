<?php 
 include('seassion.php'); 
 //echo $_SESSION['login_user'];

 $user=$_SESSION['login_user'];
 $date = $_POST["date"];
 $breakfast = $_POST["Breakfast"];
 $mid1 = $_POST["mid1"];
 $lunch = $_POST["lunch"];
 $mid2 = $_POST["mid2"];
 $dinner = $_POST["dinner"];
 
$sql= "INSERT INTO `foodDiary` (`user_name`, `date`, `breakfast`, `mid1`, `lunch`, `mid2`, `dinner`) VALUES ('$user', '$date', '$breakfast', '$mid1', '$lunch', '$mid2', '$dinner')";

$res = $connection->query($sql);
    if ($res === TRUE) {
        echo "Record updated successfully. <a  href='welcome.php' >press here</a> to return to Home Page";//המעבר לדף אחר לא עובד
      } else {
        echo "Error updating record: " . $conn->error;
      }

?>