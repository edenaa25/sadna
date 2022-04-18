<?php 
 include('seassion.php'); 
 //echo $_SESSION['login_user'];

 $curr_weight = $_POST["weight"];
 $date = $_POST["date"];
 $user=$_SESSION['login_user'];

//$sql = " INSERT INTO weighs SET  weight = '".$curr_weight."',date = '".$date."', user_name = '".$user."'";
$sql= "INSERT INTO 'weighs' ('weight', 'date', 'user_name') VALUES ('$curr_weight', '$date', '$user') ";
$res = $conn->query($sql);

    if ($res === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }


?>