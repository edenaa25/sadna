<?php 
 include('seassion_user.php'); 
//  echo $_SESSION['login_user'];
?>


<!DOCTYPE html>
<html dir="rtl" lang="he" xml:lang="he">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/Unregistered_user/CSS/mainCSS.css">
    <link rel="stylesheet" href="/employee_user/CSS/welcome.css">
    <link rel="stylesheet" href="/employee_user/CSS/admin.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        if (typeof jQuery == "undefined") {
            alert("not working");
        }
        </script>
    <title> עובד דף כניסה</title>
</head>
<body>
    <header id="header"></header>
    <div style="clear: both;"></div>

    <main>
        <section class="sec1 hero-image">
          <p class="hero-text">
              עובד יקר, <br>
              בדף זה תוכל לצפות במידע על כלל הלקוחות <br>
              לצפות בהודעות אשר לקוחות פוטנציאליים השאירו בכדי שתוכל לחזור אליהם <br>
                בנוסף, תוכל להוסיף לקוחות או עובדים חדשים אל מאגר הלקוחות שלנו בכדי שיוכלו להתחיל לעבוד באתר <br>
          </p> 
           
        </section>
        
        <section class="sec">
            <h4 style="font-weight:bolder;">פרטי כלל הלקוחות:</h4>
            <table class="center">             
            <tr>
                    <th>user name</th>
                    <th>first name</th>
                    <th>last name</th>
                    <th>address</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>Date of Birth</th>
                    <th>Allergies</th>
            </tr>

                <?php
                   // echo "<table border =\"1\" style='border-collapse: collapse'>";
                        for ($row=0; $row < count($_SESSION['clinets_data']); $row++) { 
                            echo "<tr> \n";
                            foreach($_SESSION['clinets_data'][$row] as $value){ 
                                echo "<td>$value</td> \n";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                ?>
        </section>
        <section class="sec">
            <h4 style="font-weight:bolder;">הודעות אשר לקוחות פוטנציאלים השאירו :</h4>
            <p>יש לחזור אליהם בהודעה דרך המייל או מספר הפלאפון שהם השאירו  </p>
            <table class="center">
                <tr>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>message</th>
                </tr>

                <?php
                   // echo "<table border =\"1\" style='border-collapse: collapse'>";
                        for ($row=0; $row < count($_SESSION['clients_messages']); $row++) { 
                            echo "<tr> \n";
                            foreach($_SESSION['clients_messages'][$row] as $value){ 
                                echo "<td>$value</td> \n";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                ?>

        </section>
        <section class="sec">
            <h4 style="font-weight:bolder;">לקוחות אשר יש להוסיף למאגר הלקוחות הקיימים בכדי שיתחילו את התהליך :</h4>
            <p>יש לשבץ ללקוח שם משתמש וססמא ולשלוח לו במייל את הפרטים בכדי שיוכל להתחבר לאתר  </p>
            <table class="center">
                <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Mail</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Weight</th>
                    <th>MBI</th>
                    <th>Fat %</th>
                    <th>Birth</th>
                    <th>Allergies</th>
                    <th>txt</th>
                </tr>

                <?php
                   // echo "<table border =\"1\" style='border-collapse: collapse'>";
                        for ($row=0; $row < count($_SESSION['candidates']); $row++) { 
                            echo "<tr> \n";
                            foreach($_SESSION['candidates'][$row] as $value){ 
                                echo "<td>$value</td> \n";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                ?>

        </section>
        <section class="sec">
            <h4 style="font-weight:bolder;">פרטי תזונאים :</h4>
            <table class="center">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Name</th>
                    <th>Birth</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Mail</th>
                </tr>

                <?php
                   // echo "<table border =\"1\" style='border-collapse: collapse'>";
                        for ($row=0; $row < count($_SESSION['Nutritionists_data']); $row++) { 
                            echo "<tr> \n";
                            foreach($_SESSION['Nutritionists_data'][$row] as $value){ 
                                echo "<td>$value</td> \n";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                ?>
        </section>
        <section class="sec">
            <h4 style="font-weight:bolder;">פרטי מאמני כושר :</h4>
            <table class="center">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Name</th>
                    <th>Birth</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Mail</th>
                </tr>

                <?php
                   // echo "<table border =\"1\" style='border-collapse: collapse'>";
                        for ($row=0; $row < count($_SESSION['Coaches_data']); $row++) { 
                            echo "<tr> \n";
                            foreach($_SESSION['Coaches_data'][$row] as $value){ 
                                echo "<td>$value</td> \n";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                ?>
        </section>
        <section class="sec">
            <h4 style="font-weight:bolder;"> הוספת לקוח למאגר ותחילת תהליך:</h4>
            <p style="float: right; text-align: right; margin-right: 1%;">יש לבחור שם משתמש אשר לא קיים במערכת עבור הלקוח<br>
            יש לבחור ססמא עבור הלקוח<br>
             הזנת נתונים מהטבלה למעלה עבור משתמש חדש<br> 
            אם חסר נתונים יש ליצור קשר עם הלקוח<br>
            לשלוח מייל והודעה אל הלקוח עם שם המשתמש והססמא שלו לאתר </p>
            <div style="clear: both;"></div>
            <form id="addUserForm" action="#" method="post">
                    <div class="div">
                        <input class="input" type="text" id="user" name="user" placeholder="שם משתמש אשר לא קיים במערכת" required>
                        <label class="p" for="user">:Client User Name</label><br><br> </div>
                    <div class="div">
                        <input class="input" type="text" id="pass" name="pass" placeholder="הכנס סיסמא חזקה" required>
                        <label class="p" for="pass">:Client Password</label><br><br> </div>
                    <div class="div">   
                        <input class="input"  type="text" id="first" name="first" required >
                        <label class="p" for="first">:First Name</label><br><br> </div>
                        <div class="div">
                        <input class="input" type="text" id="last" name="last" required >
                        <label class="p" for="last">:Last Name</label><br><br></div>
                        <div class="div">
                        <input class="input" type="text" id="address" name="address" required >
                        <label class="p" for="address">:Address</label><br><br></div>
                        <div class="div">
                        <input class="input" type="text" id="phone" name="phone" required >
                        <label class="p" for="phone">:phone</label><br><br></div>
                        <div class="div">
                        <input class="input" type="text" id="mail" name="mail" required >
                        <label class="p" for="mail">:mail</label><br><br></div>
                        <div class="div">
                        <input class="input" type="date" id="birth" name="birth" required >
                        <label class="p" for="birth">:Birth</label><br><br></div>
                        <div class="div">
                        <input class="input" type="text" id="allergies" name="allergies" required >
                        <label class="p" for="allergies">:Allergies</label><br><br></div>
                        <div class="div">
                        <input class="input" type="number" id="nut" name="nut" placeholder="שיבוץ תזונאי מטפל" required >
                        <label class="p" for="nut">:ID Nutritionist</label><br><br></div>
                        <div class="div">
                        <input class="input" type="number" id="coach" name="coach" placeholder="שיבוץ מאמן כושר מטפל" required >
                        <label class="p" for="coach">:ID Coach</label><br><br></div>
                        <div class="div">
                        <input class="input" type="number" id="bmi" name="bmi" required >
                        <label class="p" for="bmi">:Start BMI</label><br><br></div>
                        <div class="div">
                        <input class="input" type="number" id="fat" name="fat" required >
                        <label class="p" for="fat">:Start fat percentage</label><br><br></div>
                        <div style="clear: both;"></div>
                        <div class="center">
                        <input type="submit" class="button2" value="עדכן" >
                        </div>
                        <!-- <input id="submit1" type="submit" value="עדכן"> -->

            </form>
            <?php 
                        //include('seassion_user.php'); 
                    if($_SESSION['employee_type']==3){
                        if(isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["first"]) && isset($_POST["last"])&& isset($_POST["address"])&& isset($_POST["phone"])&& isset($_POST["mail"])&& isset($_POST["birth"])&& isset($_POST["allergies"])&& isset($_POST["nut"])&& isset($_POST["coach"])&& isset($_POST["bmi"])&& isset($_POST["fat"])){
                        $user = $_POST["user"];
                        $pass = $_POST["pass"]; 
                        $first = $_POST["first"];  
                        $last = $_POST["last"];
                        $address = $_POST["address"];
                        $phone = $_POST["phone"];
                        $mail = $_POST["mail"];
                        $birth=$_POST["birth"];
                        $allergies = $_POST["allergies"];
                        $nut = $_POST["nut"];
                        $coach = $_POST["coach"];  
                        $bmi = $_POST["bmi"];  
                        $fat = $_POST["fat"];  
                      //בדיקה כי שם המשתמש לא נמצא במאגר
                       if(!in_array($user,$_SESSION['clients'])){
                                //הוספת לקוח לטבלת users
                                $sql1= "INSERT INTO `users` (`user_name`, `password`, `first_name`, `last_name`, `address`, `phone`, `mail`, `birth`, `Allergies`) VALUES ('$user', '$pass','$first', '$last','$address', '$phone','$mail','$birth' ,'$allergies')";
                                $res1 = $connection->query($sql1);
                                //הוספת תהליך חדש של לקוח לטבלת טיפולים (THREATMENTS)
                                $sql2= "INSERT INTO `Treatments` (`user_name`,`id_nutri`,`id_coach`,`BMI_start`,`fatP_start`) VALUES ('$user', '$nut', '$coach', '$bmi', '$fat')";
                                $res2 = $connection->query($sql2);
                                    if ($res1 === TRUE) { 
                                        echo "<p style='color:red;'>update user Successfully</p>";
                                        //echo "update user Successfully";
                                        echo "<br>";
                                    } else {
                                        echo "<p style='color:red;'>Error updating record: update user unsuccessfully </p>" . $conn->error;
                                        //echo "Error updating record: update user unsuccessfully " . $conn->error;
                                        echo "<br>";
                                    }
                                    if($res2 === TRUE){
                                        echo "<p style='color:red;'>update threatment Successfully </p>" ;
                                        //echo "update threatment Successfully";
                                        echo "<br>";
                                    }
                                    else{
                                        echo "<p style='color:red;'>Error updating record: update threatment unsuccessfully</p>" . $conn->error;
                                        //echo "Error updating record: update threatment unsuccessfully " . $conn->error;
                                        echo "<br>";
                                        echo "<p style='color:red;'>Make sure you enter a valid ID number for a nutritionist and coach</p>" ;
                                        //echo "Make sure you enter a valid ID number for a nutritionist and coach";
                                        echo "<br>";
                                    }
                              }
                              else{
                                echo "<p style='color:red;'>שם משתמש נמצא במערכת, יש לבחור שם משתמש אחר</p>" ;
                                  //echo "שם משתמש נמצא במערכת, יש לבחור שם משתמש אחר";
                              }
                            }
                        else{
                            echo "<p style='color:red;'>יש למלא את כל הנתונים עבור הזנת משתמש חדש ותהליך חדש עבורו</p>" ;
                                //echo "יש למלא את כל הנתונים עבור הזנת משתמש חדש ותהליך חדש עבורו";
                            }
                    }
                    else{
                        echo "<p style='color:red;'>הזנת לקוח חדש למאגר אפשרית רק עבור עובדי אדמיניסטרציה</p>" ;
                        //echo "הזנת לקוח חדש למאגר אפשרית רק עבור עובדי אדמיניסטרציה";
                    }
               ?> <br>
  
        </section>

        <section class="sec">
            <h4 style="font-weight:bolder;">הוספת עובד חדש (תזונאי , מאמן כושר , עובד אדמיניסטרציה):</h4>
            <p style="float: right; text-align: right; margin-right: 1%;">יש לבחור שם משתמש אשר לא קיים במערכת עבור נותן השרות<br>
            יש לבחור ססמא עבור נותן השרות<br>
             אם חסר נתונים יש ליצור קשר עם נותן השרות<br>
            לשלוח מייל והודעה אל העובד החדש עם שם המשתמש והססמא שלו לאתר <br> </p>
            <div style="clear: both;"></div>
            <form style="overflow: auto;" id="addUserForm" action="#" method="post">
                        <div class="div">
                        <input class="input" type="number" id="id" name="id" required >
                        <label class="p" for="id">:ID</label><br><br> </div>
                        <div class="div">
                        <input class="input" type="text" id="user" name="user" placeholder="שם משתמש אשר לא קיים במערכת" required>
                        <label class="p" for="user">: User Name</label><br><br></div>
                        <div class="div">
                        <input class="input" type="text" id="pass" name="pass" placeholder="הכנס סיסמא חזקה" required>
                        <label class="p" for="pass">: Password</label><br><br></div>
                        <div class="div">
                        <input class="input" type="text" id="name" name="name" required >
                        <label class="p" for="name">:Full Name</label><br><br></div>
                        <div class="div">
                        <input class="input" type="date" id="birth" name="birth" required >
                        <label class="p" for="birth">:Birth</label><br><br></div>
                        <div class="div">
                        <input class="input" type="text" id="address" name="address" required >
                        <label class="p" for="address">:Address</label><br><br></div>
                        <div class="div">
                        <input class="input" type="text" id="phone" name="phone" required >
                        <label class="p" for="phone">:Phone</label><br><br></div>                        <div class="div">
                        <div class="div">
                        <input class="input" type="text" id="mail" name="mail" required > 
                        <label class="p" for="mail">:Mail</label><br><br></div>
                        <div class="div">
                        <input class="input" type="file" id="doc" name="doc" >
                        <label class="p" for="doc">:Docs</label><br><br></div>
                        <div class="div">
                        <input class="input" type="number" id="type" name="type" required >
                        <label class="p" for="type">:Employee Type</label><br>
                        <p> Enter 1 for nutritionist <br>
                            Enter 2 for coach <br>
                            Enter 3 for Administration</p></div>
                        <div style="clear: both;"></div>
                        <div class="center">
                        <input type="submit" class="button2" value="עדכן" >
                        </div>
            </form>
            <?php 
                        //include('seassion_user.php'); 
                    if($_SESSION['employee_type']==3){
                        if(isset($_POST["id"]) && isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["name"]) && isset($_POST["birth"])&& isset($_POST["address"])&& isset($_POST["phone"])&& isset($_POST["mail"])&& isset($_POST["doc"])&& isset($_POST["type"])){
                                $id=$_POST["id"];
                                $user = $_POST["user"];
                                $pass = $_POST["pass"]; 
                                $name = $_POST["name"];  
                                $birth=$_POST["birth"];
                                $address = $_POST["address"];
                                $phone = $_POST["phone"];
                                $mail = $_POST["mail"];
                                $doc = $_POST["doc"];
                                $type = $_POST["type"];  
                            //בדיקה כי שם המשתמש לא נמצא במאגר
                            if(!in_array($user,$_SESSION['all_user_name'])){
                                        //הוספת תזונאי
                                    if($type==2){
                                        $sql1= "INSERT INTO `Coaches` (`Id`, `user_name`, `password`, `name`, `birth`, `address`, `phone`, `mail`, `docs`, `type`) VALUES ('$id','$user', '$pass','$name', '$birth','$address', '$phone','$mail','$doc' ,'$type')";
                                        $res1 = $connection->query($sql1);
                                    }
                                    //הוספה למאגר תזונאים
                                    if($type==1){
                                        $sql2= "INSERT INTO `Nutritionists` (`Id`, `user_name`, `password`, `name`, `birth`, `address`, `phone`, `mail`, `docs`, `type`) VALUES ('$id','$user', '$pass','$name', '$birth','$address', '$phone','$mail','$doc' ,'$type')";
                                        $res2 = $connection->query($sql2);
                                    }
                                    if($type==3){//הכנסת עובד אדמיניסטרציה
                                        $sql3= "INSERT INTO `Administration` (`Id`, `user_name`, `password`, `name`, `mail`,`doc`, `phone`, `type`, `address`, `birth`) VALUES ('$id','$user', '$pass','$name', '$mail','$doc','$phone', '$type','$address' ,'$birth')";
                                        $res3 = $connection->query($sql3);
                                    }
                                    if ($res1 === TRUE || $res2 === TRUE || $res3 === TRUE) { 
                                                echo "<p style='color:red;'>update user Successfully</p>";
                                                echo "<br>";
                                            }
                                    else {
                                        echo "<p style='color:red;'>Error updating record: update user unsuccessfully </p>" . $conn->error;
                                        //echo "Error updating record: update user unsuccessfully " . $conn->error;
                                        echo "<br>";
                                    }
                                   
                              }
                              else{
                                echo "<p style='color:red;'>שם משתמש נמצא במערכת, יש לבחור שם משתמש אחר</p>" ;
                                  //echo "שם משתמש נמצא במערכת, יש לבחור שם משתמש אחר";
                              }
                            }
                        else{
                            echo "<p style='color:red;'>יש למלא את כל הנתונים עבור הזנת משתמש חדש ותהליך חדש עבורו</p>" ;
                                //echo "יש למלא את כל הנתונים עבור הזנת משתמש חדש ותהליך חדש עבורו";
                            }
                    }
                    else{
                        echo "<p style='color:red;'>הזנת עובד חדש למאגר אפשרית רק עבור עובדי אדמיניסטרציה</p>" ;
                        //echo "הזנת לקוח חדש למאגר אפשרית רק עבור עובדי אדמיניסטרציה";
                    }
               ?> <br>
  
        </section>

        
    </main>
    <div style="clear: both;"></div>

    <footer id="footer"></footer>
    <script>
        $(document).ready(
            function(){
              $("#header").load("/employee_user/navbar/navbar.html");
              $("#footer").load("/Unregistered_user/footer.html");
              
            }                                 
         )
    </script>
    
</body>
</html>