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
            <h4>נתונייך האישיים:</h4>
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
                    <td> <?php  echo $_SESSION['name'] ?></td>    
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
            <h4>תהליכי הלקוחות שלך:</h4>
            <table class="center">
                <tr>
                    <th>Starting weight</th>
                    <th>Current weight</th>
                    <th>Starting BMI</th>
                    <th>Current BMI</th>
                </tr>
                <tr>
                    <td> <?php  echo $_SESSION['first_weight'] ?></td>    
                    <td> <?php  echo $_SESSION['last_weight']; ?></td>   
                    <td> <?php echo $_SESSION['BMI_start'] ?></td>  
                    <td> <?php  echo $_SESSION['BMI_curr'] ?></td>                   
                </tr>
                </table>      

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