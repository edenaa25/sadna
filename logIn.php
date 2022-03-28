<?php
   include("Config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST('submit'))) {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      //$sql = "SELECT id FROM users WHERE user_name = '$myusername' and password = '$mypassword'";
    
      $sql = "SELECT Id FROM `users` WHERE user_name='".$myusername."' and password='".$mypassword."'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         echo "<script> window.alert('welcome page') </script>"   
         header("location: http://127.0.0.1:5500/Unregistered_user/training.html");
         
      }else {
        echo "<script> window.alert('no register found') </script>"   
 
         $error = "Your Login Name or Password is invalid";
         header("location: http://127.0.0.1:5500/Unregistered_user/index.html");
      }
   }
?>