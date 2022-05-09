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
              הערכים שלנו: <br>
              מקצועיות <br>
              יחס אישי ללקוחותינו <br>
              מוטיבציה <br>
              יחסי אנוש <br>
          </p> 
           
        </section>
        <section class="sec">
            <h4 style="font-weight:bolder;">נתונייך האישיים:</h4>
            <table class="center">
                <tr>
                    <th>name</th>
                    <th>date birth</th>
                    <th>address</th>
                    <th>phone</th>
                    <th>mail</th>
                    <th>user name</th>
                    <th>password</th>
                </tr>
                <tr>
                    <td>  <?php  echo $_SESSION['name'] ?></td>    
                    <td> <?php  echo $_SESSION['birth'] ?> </td>   
                    <td> <?php  echo $_SESSION['address'] ?> </td>  
                    <td> <?php  echo $_SESSION['phone'] ?> </td>  
                    <td> <?php  echo $_SESSION['mail'] ?> </td>
                    <td> <?php  echo $_SESSION['login_user'] ?> </td>                                    
                    <td> <?php  echo $_SESSION['password'] ?> </td>                                                                       
                </tr>
            </table>   
                <p>אם יש שינוי בפרטייך האישיים או ברצונך לשנות שם משתמש/סיסמא נא לעדכן במייל : <a href="mailto:somemail@gmail.com">mailto:somemail@gmail.com</a></p>
 
        </section>
        <section class="sec">
            <h4 style="font-weight:bolder;">הלקוחות שלך:</h4>
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
            <h4 style="font-weight:bolder;">נתוני תהליכי לקוחות:</h4>
            <table class="center">
               
                <tr>
                    <th>User Name Client</th>
                    <th>Nutritionist Id</th>
                    <th>Coach Id</th>
                    <th>Start BMI</th>
                    <th>Current BMI</th>
                    <th>Start Fat %</th>
                    <th>Current Fat %</th>
                </tr>

                <?php
                   // echo "<table border =\"1\" style='border-collapse: collapse'>";
                        for ($row=0; $row < count($_SESSION['clinets_threatments']); $row++) { 
                            echo "<tr> \n";
                            foreach($_SESSION['clinets_threatments'][$row] as $value){ 
                                echo "<td>$value</td> \n";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                ?>

        </section>
        <section class="sec">
            <h4 style="font-weight:bolder;">נתוני שקילות של כלל הלקוחות שלך:</h4>
            <p>סדר הופעת השקילות לפי שם משתמש לקוח ותאריכי השקילה שלו</p>
            <table class="center">             
               <tr>
                   <th>User Name Client</th>
                   <th>Date</th>
                   <th>Weight</th>
               </tr>
               <?php
                   // echo "<table border =\"1\" style='border-collapse: collapse'>";
                        for ($row=0; $row < count($_SESSION['clinets_weights']); $row++) { 
                            echo "<tr> \n";
                            foreach($_SESSION['clinets_weights'][$row] as $value){ 
                                echo "<td>$value</td> \n";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                ?>
            
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