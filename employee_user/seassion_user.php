<!-- הבעיה בדף הזה- חוזר לדף אינקס מאחר ונכנס ל IF  -->
<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//echo $_SESSION['login_user'];
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
$ses_sql1=mysqli_query($connection, "SELECT * FROM `Administration` WHERE user_name='".$user_check."'"); 
$ses_sql2=mysqli_query($connection, "SELECT * FROM `Coaches` WHERE user_name='".$user_check."'"); 
$ses_sql3=mysqli_query($connection, "SELECT * FROM `Nutritionists` WHERE user_name='".$user_check."'"); 

$row1 = mysqli_fetch_assoc($ses_sql1);
$row2 = mysqli_fetch_assoc($ses_sql2);
$row3 = mysqli_fetch_assoc($ses_sql3);
    //$row1 = mysql_fetch_array($ses_sql1);
    //echo $row1;
$login_session1 =$row1['user_name'];
$login_session2 =$row2['user_name'];
$login_session3 =$row3['user_name'];

if(!isset($login_session1) && !isset($login_session2) && !isset($login_session3)){
    mysqli_close($connection); // Closing Connection
    echo "close connection from seassion_user.php page ";
    //header('Location: ../index.php'); // Redirecting To Home Page
}
else{
<<<<<<< HEAD
    //echo "good seassion user";
    $ses_sql1=mysqli_query($connection, "select * from Administration where user_name='".$user_check."'");
    $ses_sql2=mysqli_query($connection, "select * from Coaches where user_name='".$user_check."'");
    $ses_sql3=mysqli_query($connection, "select * from Nutritionists where user_name='".$user_check."'");
    $row1 = mysqli_fetch_assoc($ses_sql1);
    $row2 = mysqli_fetch_assoc($ses_sql2);
    $row3 = mysqli_fetch_assoc($ses_sql3);
    if($row1 > 0){
        $_SESSION['employee_id']=$row1['Id'];
        $_SESSION['password']=$row1['password'];
        $_SESSION['name']=$row1['name'];
        $_SESSION['address']=$row1['address'];
        $_SESSION['phone']=$row1['phone'];
        $_SESSION['mail']=$row1['mail'];
        $_SESSION['birth']=$row1['birth'];
        $_SESSION['employee_type']=$row1['type']; // nuthri=1, coaches=2, administration=3
    }
   if($row2 > 0){
    $_SESSION['employee_id']=$row2['Id'];
    $_SESSION['password']=$row2['password'];
    $_SESSION['name']=$row2['name'];
    $_SESSION['address']=$row2['address'];
    $_SESSION['phone']=$row2['phone'];
    $_SESSION['mail']=$row2['mail'];
    $_SESSION['birth']=$row2['birth'];
    $_SESSION['employee_type']=$row2['type']; // nuthri=1, coaches=2, administration=3
   }
   if($row3 > 0){
    $_SESSION['employee_id']=$row3['Id'];
    $_SESSION['password']=$row3['password'];
    $_SESSION['name']=$row3['name'];
    $_SESSION['address']=$row3['address'];
    $_SESSION['phone']=$row3['phone'];
    $_SESSION['mail']=$row3['mail'];
    $_SESSION['birth']=$row3['birth'];
    $_SESSION['employee_type']=$row3['type']; // nuthri=1, coaches=2, administration=3
   } 
    echo $_SESSION['employee_type']."<br/>";
    echo $_SESSION['employee_id']."<br/>";
    echo "}<br>";
=======
    echo "good seassion user";
    // $ses_sql1=mysqli_query($connection, "select id_coach from Treatments where user_name='".$user_check."'");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $id_coach = $row1['id_coach'];
    // $_SESSION['id_coach']= $id_coach;
    // //echo $_SESSION['id_coach'];
>>>>>>> atarA

    if($_SESSION['employee_type']==2 || $_SESSION['employee_type']==1){ //שליפת נתנוים עבור מאמן או תזונאי
        $ses_sql1=mysqli_query($connection, "select * from Treatments where id_coach='".$_SESSION['employee_id']."' or id_nutri='".$_SESSION['employee_id']."'");
        $clients=array();
        $clinets_threatments=array();//שמירת פרטי תהליכים של לקוחות
        $clinets_data=array();//שמירת נתונים אישיים של מטופלים
        $client1_data=array();//שמירת נתונים של מטופל אחד כדי להוסיף למערך הכולל
        $client1_weights=array();//מערך שקילות של לקוח
        $clinets_weights=array();
        $client1_threatment=array();
        while($row1=mysqli_fetch_array($ses_sql1,MYSQL_ASSOC)) {
            array_push($clients, $row1["user_name"]);//מערך רק של שם משתמש של הלקוחות
            $ses_sql2=mysqli_query($connection, "select * from users where user_name='".$row1["user_name"]."'");
            while($row2=mysqli_fetch_array($ses_sql2,MYSQL_ASSOC)) {
                array_push($client1_data, $row2["user_name"], $row2["first_name"],$row2["last_name"],$row2["address"],$row2["phone"],$row2["mail"],$row2["birth"], $row2["Allergies"]);
           }
            array_push($clinets_data, $client1_data);//add one client to arrey
            unset($client1_data); // ניקוי מערך כדי שכל פעם יתווסף לקוח אחד ולא כולם שוב
            $client1_data = array(); // arrey is here again
            $ses_sql3=mysqli_query($connection, "select * from weighs where user_name='".$row1["user_name"]."' order by date");
            while($row3=mysqli_fetch_array($ses_sql3,MYSQL_ASSOC)) {
                array_push($client1_weights, $row3["user_name"], $row3["date"],$row3["weight"]);
                array_push($clinets_weights, $client1_weights);//add one client to arrey
                unset($client1_weights); // ניקוי מערך כדי שכל פעם יתווסף לקוח אחד ולא כולם שוב
                $client1_weights = array(); 
                
           }
            array_push($client1_threatment, $row1["user_name"],$row1["id_nutri"],$row1["id_coach"],$row1["BMI_start"],$row1["BMI_curr"],$row1["fatP_start"],$row1["fatP_curr"]);//מערך נתוני תהליכים של כלל הלקוחות
            array_push( $clinets_threatments, $client1_threatment);
            unset($client1_threatment); // ניקוי מערך כדי שכל פעם יתווסף לקוח אחד ולא כולם שוב
            $client1_threatment = array(); // arrey is here again

       }
            $_SESSION['clients']=$clients; //$_SESSION['clients'] is an array for user_name of all clients!
            $_SESSION['clinets_data']=$clinets_data;//array for clients data from users table
            $_SESSION['clinets_threatments']=$clinets_threatments;// array for all alients threatments
            $_SESSION['clinets_weights']=$clinets_weights;// array for all weights of clients by order of client user_name
        //הדפסת מערכים ומערכים דו מיימדים
                // echo "clients user name:" ;
                // echo "<br>";
                // foreach($_SESSION['clients'] as $val){
                // echo $val."<br/>";
                // } 
                // echo "clients data:";
                // echo "<br>";
                
                // for($i = 0; $i < count($_SESSION['clinets_data']); $i++) {
                //     foreach($_SESSION['clinets_data'][$i] as $value) {
                //         echo $value . "<br>";} }
                
                //  echo "clients thretment by user name order:";
                //  echo "<br>";

                // for($i = 0; $i < count($_SESSION['clinets_threatments']); $i++) {
                //     foreach($_SESSION['clinets_threatments'][$i] as $value) {
                //         echo $value . "<br>";
                // }
                
                // }
                // echo "clients weight by user name order:";
                // echo "<br>";
            
                // for($i = 0; $i < count($_SESSION['clinets_weights']); $i++) {
                //     foreach($_SESSION['clinets_weights'][$i] as $value) {
                //         echo $value . "<br>";
                // }
                // echo "}<br>";
                // }
    }


    if($_SESSION['employee_type']==3){ //שליפת נתנוים עבור פקיד קבלה או מנהלים - שליפה של כל הלקוחות
            $ses_sql1=mysqli_query($connection, "select * from Treatments");
            $clients=array();
            $clinets_threatments=array();//שמירת פרטי תהליכים של לקוחות
            $clinets_data=array();//שמירת נתונים אישיים של מטופלים
            $client1_data=array();//שמירת נתונים של מטופל אחד כדי להוסיף למערך הכולל
            $client1_weights=array();//מערך שקילות של לקוח
            $clinets_weights=array();
            $client1_threatment=array();
           while($row1=mysqli_fetch_array($ses_sql1,MYSQL_ASSOC)) {
                array_push($clients, $row1["user_name"]);//מערך רק של שם משתמש של הלקוחות
                $ses_sql2=mysqli_query($connection, "select * from users where user_name='".$row1["user_name"]."'");
                while($row2=mysqli_fetch_array($ses_sql2,MYSQL_ASSOC)) {
                    array_push($client1_data, $row2["user_name"], $row2["first_name"],$row2["last_name"],$row2["address"],$row2["phone"],$row2["mail"],$row2["birth"], $row2["Allergies"]);
               }
                array_push($clinets_data, $client1_data);//add one client to arrey
                unset($client1_data); // ניקוי מערך כדי שכל פעם יתווסף לקוח אחד ולא כולם שוב
                $client1_data = array(); // arrey is here again
                $ses_sql3=mysqli_query($connection, "select * from weighs where user_name='".$row1["user_name"]."'");
                while($row3=mysqli_fetch_array($ses_sql3,MYSQL_ASSOC)) {
                    array_push($client1_weights, $row3["user_name"], $row3["date"],$row3["weight"]);
                    array_push($clinets_weights, $client1_weights);//add one client to arrey
                    unset($client1_weights); // ניקוי מערך כדי שכל פעם יתווסף לקוח אחד ולא כולם שוב
                    $client1_weights = array(); // arrey is here again
               }
              
                array_push($client1_threatment, $row1["user_name"],$row1["id_nutri"],$row1["id_coach"],$row1["BMI_start"],$row1["BMI_curr"],$row1["fatP_start"],$row1["fatP_curr"]);//מערך נתוני תהליכים של כלל הלקוחות
                array_push( $clinets_threatments, $client1_threatment);
                unset($client1_threatment); // ניקוי מערך כדי שכל פעם יתווסף לקוח אחד ולא כולם שוב
                $client1_threatment = array(); // arrey is here again
    
           }
             $_SESSION['clients']=$clients; //$_SESSION['clients'] is an array for user_name of all clients!
             $_SESSION['clinets_data']=$clinets_data;//array for clients data from users table
             $_SESSION['clinets_threatments']=$clinets_threatments;// array for all alients threatments
             $_SESSION['clinets_weights']=$clinets_weights;// array for all weights of clients by order of client user_name
                //הדפסת מערכים ומערכים דו מיימדים
                echo "clients user name:" ;
                echo "<br>";
                foreach($_SESSION['clients'] as $val){
                echo $val."<br/>";
                } 
                echo "clients data:";
                echo "<br>";
                
                for($i = 0; $i < count($_SESSION['clinets_data']); $i++) {
                    foreach($_SESSION['clinets_data'][$i] as $value) {
                        echo $value . "<br>";} }
        
                for($i = 0; $i < count($_SESSION['clinets_threatments']); $i++) {
                    foreach($_SESSION['clinets_threatments'][$i] as $value) {
                        echo $value . "<br>";
                }
                echo "clients weight by user name order:";
                echo "<br>";
                }
            
                for($i = 0; $i < count($_SESSION['clinets_weights']); $i++) {
                    foreach($_SESSION['clinets_weights'][$i] as $value) {
                        echo $value . "<br>";
                }
                echo "}<br>";
                }
       
        }
        //שמירת כל הסרטונים כמערך
        $vid1=array();
        $all_vid=array();
        $ses_sql1= mysqli_query($connection, "select * from FitnessVideo");
        while($row1=mysqli_fetch_array($ses_sql1,MYSQL_ASSOC)) {
            array_push($vid1, $row1["id_video"], $row1["url"], $row1["type"]);//מערך רק של שם משתמש של הלקוחות
            array_push($all_vid, $vid1);//add one client to arrey
                unset($vid1); // ניקוי מערך כדי שכל פעם יתווסף לקוח אחד ולא כולם שוב
                $vid1 = array(); // arrey is here again          
        }
        $_SESSION['videos']=$all_vid;// מאגר סרטוני כושר

        // echo "all videos:";
        // echo "<br>";
        // for($i = 0; $i < count($_SESSION['videos']); $i++) {
        //     foreach($_SESSION['videos'][$i] as $value) {
        //         echo $value . "<br>";
        // }
        // echo "}<br>";
        // }
        //שמירת סרטונים עבור לקוח
        $vid1=array();
        $all_vid=array();
        $ses_sql1= mysqli_query($connection, "select * from usersVideo");
        while($row1=mysqli_fetch_array($ses_sql1,MYSQL_ASSOC)) {
            array_push($vid1, $row1["user_name"], $row1["id_video"]);
            array_push($all_vid, $vid1);//add one client to arrey
                unset($vid1); // ניקוי מערך כדי שכל פעם יתווסף לקוח אחד ולא כולם שוב
                $vid1 = array(); // arrey is here again          
        }
        $_SESSION['clients_video']=$all_vid;

        // echo "clients videos:";
        // echo "<br>";
        // for($i = 0; $i < count($_SESSION['clients_video']); $i++) {
        //     foreach ($_SESSION['clients_video'][$i] as $value) {
        //         echo $value . "<br>";
        // }
        // echo "}<br>";
        // }
//שמירת סרטונים עבור לקוח
        $vid1=array();
        $all_vid=array();
        $ses_sql1= mysqli_query($connection, "select * from usersVideo");
        while($row1=mysqli_fetch_array($ses_sql1,MYSQL_ASSOC)) {
            array_push($vid1, $row1["user_name"], $row1["id_video"]);
            array_push($all_vid, $vid1);//add one client to arrey
                unset($vid1); // ניקוי מערך כדי שכל פעם יתווסף לקוח אחד ולא כולם שוב
                $vid1 = array(); // arrey is here again          
        }
        $_SESSION['clients_video']=$all_vid;

        // echo "clients videos:";
        // echo "<br>";
        // for($i = 0; $i < count($_SESSION['clients_video']); $i++) {
        //     foreach ($_SESSION['clients_video'][$i] as $value) {
        //         echo $value . "<br>";
        // }
        // echo "}<br>";
        // }

        //שמירת הודעות של לקוחות עבור עובדי אדמיניסטרציה
        $mess1=array();
        $all_mess=array();
        $ses_sql1= mysqli_query($connection, "select * from contact");
        while($row1=mysqli_fetch_array($ses_sql1,MYSQL_ASSOC)) {
            array_push($mess1, $row1["name"], $row1["phone"], $row1["mail"], $row1["txt"]);
            array_push($all_mess, $mess1);//add one client to arrey
                unset($mess1); // ניקוי מערך כדי שכל פעם יתווסף לקוח אחד ולא כולם שוב
                $mess1 = array(); // arrey is here again          
        }
        $_SESSION['clients_messages']=$all_mess;

        echo "clients_messages:";
        echo "<br>";
        for($i = 0; $i < count($_SESSION['clients_messages']); $i++) {
            foreach ($_SESSION['clients_messages'][$i] as $value) {
                echo $value . "<br>";
        }
        echo "}<br>";
        }

        
        //שמירת פרטי לקוחות אשר יש להוסיף לטבלת משתמשים עבור עובדי אדמיניסטרציה
        $client1=array();
        $all_Candidates=array();
        $ses_sql1= mysqli_query($connection, "select * from Candidates");
        while($row1=mysqli_fetch_array($ses_sql1,MYSQL_ASSOC)) {
            array_push($client1, $row1["name"], $row1["lastName"], $row1["mail"],$row1["address"],$row1["phone"],$row1["weight"],$row1["bmi"],$row1["fat"],$row1["birth"],$row1["allergies"],$row1["txt"]);
            array_push($all_Candidates, $client1);//add one client to arrey
                unset($client1); // ניקוי מערך כדי שכל פעם יתווסף לקוח אחד ולא כולם שוב
                $client1 = array(); // arrey is here again          
        }
        $_SESSION['candidates']=$all_Candidates;

        // echo "clients_messages:";
        // echo "<br>";
        // for($i = 0; $i < count($_SESSION['candidates']); $i++) {
        //     foreach ($_SESSION['candidates'][$i] as $value) {
        //         echo $value . "<br>";
        // }
        // echo "}<br>";
        // }


        // $client_vid=array();
        // foreach($_SESSION['clients'] as $val){
        //     //$user_name=$_SESSION['clinets_weights'][$i];
        //     $ses_sql1= mysqli_query($connection, "select * from usersVideo where user_name= '".$val."'");
        //     while($row3=mysqli_fetch_array($ses_sql1,MYSQL_ASSOC)) {
        //         array_push($client_vid, $row3["id_video"]);
        //     }
        //     $add_arr=array();
        //     array_push($add_arr,$val,$client_vid);
        //     array_push($_SESSION["clients_videos"], $add_arr);
        //     unset($client_vid); // ניקוי מערך כדי שכל פעם יתווסף לקוח אחד ולא כולם שוב
        //     $client_vid = array(); // arrey is here again  
        //     unset($add_arr); // ניקוי מערך כדי שכל פעם יתווסף לקוח אחד ולא כולם שוב
        //     $add_arr = array(); 
           
        // }
        // echo "videos for client:";
        // echo "<br>";
        // for($i = 0; $i < count($_SESSION['clients_videos']); $i++) {
        //     foreach($_SESSION['clinets_weights'][$i] as $value) {
        //         echo $value . "<br>";
        // }
        // echo "}<br>";
        // }


    //$ses_sql1= mysqli_query($connection, "select * from usersVideo where user_name='".$user_check."'");
    //  $index=0;
    //  $user_videos_url=array();
    //  while($row1=mysqli_fetch_array($ses_sql1)){
    //      $user_video_id = $row1["id_video"];
    //      //echo $user_videos[$index] ."<br />";
    //      $ses_sql2= mysqli_query($connection, "select url from FitnessVideo where id_video='".$user_video_id."'");
    //      $row2 = mysqli_fetch_assoc($ses_sql2);
    //      $url= $row2['url'];
    //      $user_videos_url[$index]= $url;
    //      //echo $user_videos_url[$index] ."<br />";
    //      $index= $index+1;    
    //  }
    //  $_SESSION['user_videos']=  $user_videos_url;
    // //  foreach($_SESSION['user_videos'] as $val){
    // //         echo $val."<br/>";
    // //     }

    // $ses_sql1=mysqli_query($connection, "select * from Treatments where Id='".$id_coach."'");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $name_coach = $row1['name'];
    // $_SESSION['name_coach']= $name_coach;
    // $phone_coach = $row1['phone'];
    // $_SESSION['phone_coach']= $phone_coach;
    // $mail_coach = $row1['mail'];
    // $_SESSION['mail_coach']= $mail_coach;

    // //
    
    // $ses_sql1=mysqli_query($connection, "select id_nutri from Treatments where user_name='".$user_check."'");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $id_nutri = $row1['id_nutri'];
    // $_SESSION['id_nutri']= $id_nutri;
    // //echo $_SESSION['id_nutri'];

    // $ses_sql1=mysqli_query($connection, "select * from Nutritionists where Id='".$id_nutri."'");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $name_nutri = $row1['name'];
    // $_SESSION['name_nutri']= $name_nutri;
    // $phone_nutri = $row1['phone'];
    // $_SESSION['phone_nutri']= $phone_nutri;
    // $mail_nutri = $row1['mail'];
    // $_SESSION['mail_nutri']= $mail_nutri;


    // //
   

    // $ses_sql1=mysqli_query($connection, "select id_nutri from Treatments where user_name='".$user_check."'");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $id_nutri = $row1['id_nutri'];
    // $_SESSION['id_nutri']=  $id_nutri;
    // //echo $_SESSION['id_nutri'];

    // $ses_sql1=mysqli_query($connection, "select BMI_start from Treatments where user_name='".$user_check."'");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $BMI_start = $row1['BMI_start'];
    // $_SESSION['BMI_start']=  $BMI_start;
    // //echo $_SESSION['BMI_start'];

    // $ses_sql1=mysqli_query($connection, "select BMI_curr from Treatments where user_name='".$user_check."'");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $BMI_curr = $row1['BMI_curr'];
    // $_SESSION['BMI_curr']=  $BMI_curr;
    // //echo $_SESSION['BMI_curr'];

    // $ses_sql1=mysqli_query($connection, "select menu from Treatments where user_name='".$user_check."'");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $menu = $row1['menu'];
    // $_SESSION['menu']=  $menu;
    // //echo $_SESSION['menu'];

    // $ses_sql1=mysqli_query($connection, "select txt from Treatments where user_name='".$user_check."'");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $txt = $row1['txt'];
    // $_SESSION['txt']=  $txt;
    // //echo $_SESSION['txt'];

    // $ses_sql1=mysqli_query($connection, "select first_name from users where user_name='".$user_check."'");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $first_name = $row1['first_name'];
    // $_SESSION['first_name']=  $first_name;
    // //echo $_SESSION['first_name'];

    // $ses_sql1=mysqli_query($connection, "select last_name from users where user_name='".$user_check."'");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $last_name = $row1['last_name'];
    // $_SESSION['last_name']=  $last_name;
    // //echo $_SESSION['last_name'];

    // $ses_sql1=mysqli_query($connection, "select * from users where user_name='".$user_check."'");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $address = $row1['address'];
    // $_SESSION['address']=  $address;
    // //echo $_SESSION['address'];
    // $phone = $row1['phone'];
    // $_SESSION['phone']=  $phone;
    // //echo $_SESSION['phone'];
    // $mail = $row1['mail'];
    // $_SESSION['mail']=  $mail;
    // //echo $_SESSION['mail'];  

    // $ses_sql1=mysqli_query($connection, "select weight from weighs where user_name='".$user_check."' order by date asc limit 1");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $first_weight = $row1['weight'];
    // $_SESSION['first_weight']=  $first_weight;
    // //echo $_SESSION['first_weight'];

    // $ses_sql1=mysqli_query($connection, "select weight from weighs where user_name='".$user_check."' order by date desc limit 1");
    // $row1 = mysqli_fetch_assoc($ses_sql1);
    // $last_weight = $row1['weight'];
    // $_SESSION['last_weight']=  $last_weight;
    // //echo $_SESSION['last_weight'];

    //  $ses_sql1= mysqli_query($connection, "select * from usersVideo where user_name='".$user_check."'");
    //  $index=0;
    //  $user_videos_url=array();
    //  while($row1=mysqli_fetch_array($ses_sql1)){
    //      $user_video_id = $row1["id_video"];
    //      //echo $user_videos[$index] ."<br />";
    //      $ses_sql2= mysqli_query($connection, "select url from FitnessVideo where id_video='".$user_video_id."'");
    //      $row2 = mysqli_fetch_assoc($ses_sql2);
    //      $url= $row2['url'];
    //      $user_videos_url[$index]= $url;
    //      //echo $user_videos_url[$index] ."<br />";
    //      $index= $index+1;    
    //  }
    //  $_SESSION['user_videos']=  $user_videos_url;
    // //  foreach($_SESSION['user_videos'] as $val){
    // //         echo $val."<br/>";
    // //     }

    // //php for weight forms:
}
 ?>