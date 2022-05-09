<?php 
 include('seassion_user.php'); 
 echo $_SESSION['login_user'];
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
            <h4 style="font-weight:bolder;"> הוספת לקוח למאגר ותחילת תהליך:</h4>
            <p>יש לבחור שם משתמש אשר לא קיים במערכת עבור הלקוח</p>
            <p>יש לבחור ססמא עבור הלקוח</p>
            <p> הזנת נתונים מהטבלה למעלה עבור משתמש חדש </p>
            <p> אם חסר נתונים יש ליצור קשר עם הלקוח</p>
            <p>לשלוח מייל והודעה אל הלקוח עם שם המשתמש והססמא שלו לאתר </p>
            <form id="addUserForm" action="#" method="post">
                        <label for="user">:Client User Name</label><br>
                        <input type="text" id="user" name="user" placeholder="שם משתמש אשר לא קיים במערכת" required><br><br>
                        <label for="pass">:Client Password</label><br>
                        <input type="text" id="pass" name="pass" placeholder="הכנס סיסמא חזקה" required><br><br>
                        <label for="first">:First Name</label><br>
                        <input type="text" id="first" name="first" required ><br><br>
                        <label for="last">:Last Name</label><br>
                        <input type="text" id="last" name="last" required ><br><br>
                        <label for="address">:Address</label><br>
                        <input type="text" id="address" name="address" required ><br><br>
                        <label for="phone">:phone</label><br>
                        <input type="text" id="phone" name="phone" required ><br><br>
                        <label for="mail">:mail</label><br>
                        <input type="text" id="mail" name="mail" required ><br><br>
                        <label for="birth">:Birth</label><br>
                        <input type="date" id="birth" name="birth" required ><br><br>
                        <label for="allergies">:Allergies</label><br>
                        <input type="text" id="allergies" name="allergies" required ><br><br>
                        <label for="nut">:ID Nutritionist</label><br>
                        <input type="number" id="nut" name="nut" placeholder="שיבוץ תזונאי מטפל" required ><br><br>
                        <label for="coach">:ID Coach</label><br>
                        <input type="number" id="coach" name="coach" placeholder="שיבוץ מאמן כושר מטפל" required ><br><br>
                        <label for="bmi">:Start BMI</label><br>
                        <input type="number" id="bmi" name="bmi" required ><br><br>
                        <label for="fat">:Start fat percentage</label><br>
                        <input type="number" id="fat" name="fat" required ><br><br>
                        <input id="submit1" type="submit" value="עדכן">
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
        
    </main>

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