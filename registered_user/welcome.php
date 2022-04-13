<?php 
 include('seassion.php'); 
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
    <link rel="stylesheet" href="/registered_user/CSS/welcome.CSS">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        if (typeof jQuery == "undefined") {
            alert("not working");
        }
        </script>
    <title>דף הבית</title>
</head>
<body>
    <header id="header"></header>
    <div style="clear: both;"></div>

    <main>
        <section class="sec1">
            <p class="p1sec1"> eden שלום <?php echo $_SESSION['first_name']  ?> </p>
            <p style="font-weight: bold;"> התזכורות שלך לשבוע: <br>
            <?php echo $_SESSION['txt'] ?></p>
        </section>
        <section class="sec1">
            <p style="font-weight: bold;"> קצת נתונים על התהליך שלך: <br>
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
            </p>
        </section>

    </main>

    <footer id="footer"></footer>
    <script>
        $(document).ready(
            function(){
              $("#header").load("/registered_user/navbar/navbar.html");
              $("#footer").load("/Unregistered_user/footer.html");

              
            }            
         )

    </script>
</body>
</html>