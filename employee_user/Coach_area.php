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
              מאמן יקר, <br>
              בדף זה תוכל לצפות במאגר סרטוני כושר עבור הלקוחות <br>
              ואילו סרטונים שבועיים עודכנו עבור לקוחותינו <br>
              בנוסף, תוכל לעדכן סרטונים חדשים עבור הלקוחות ואף להוסיף סרטוני כושר למאגר <br>
          </p> 
           
        </section>
        
        <section class="sec">
            <h4>הלקוחות שלך:</h4>
            <table class="center">
                <tr>
                    <th>user name</th>
                    <th>first name</th>
                    <th>last name</th>
                    <th>address</th>
                    <th>phone</th>
                    <th>email</th>
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
            <h4>מאגר סרטוני כושר:</h4>
            <table class="center">
                <tr>
                    <th>Video ID</th>
                    <th>URL</th>
                    <th>Type of training</th>
                </tr>

                <?php
                   // echo "<table border =\"1\" style='border-collapse: collapse'>";
                        for ($row=0; $row < count($_SESSION['videos']); $row++) { 
                            echo "<tr> \n";
                            foreach($_SESSION['videos'][$row] as $value){ 
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