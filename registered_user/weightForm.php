<?php 
 include('seassion.php'); 
 //echo $_SESSION['login_user'];

 $curr_weight = $_POST["weight"];
 $date = $_POST["date"];
 $user=$_SESSION['login_user'];
 
//$sql = " INSERT INTO weighs SET  weight = '".$curr_weight."',date = '".$date."', user_name = '".$user."'";
$sql= "INSERT INTO `weighs` (`weight`, `date`, `user_name`) VALUES ('$curr_weight', '$date', '$user')";
//יש הוספה של 3 שורות ריקות, לטפל בזה
$res = $connection->query($sql);
    if ($res === TRUE) {
        echo "Record updated successfully. <a  href='welcome.php' >press here</a> to return to Home Page";//המעבר לדף אחר לא עובד
      } else {
        echo "Error updating record: " . $conn->error;
      }

?>