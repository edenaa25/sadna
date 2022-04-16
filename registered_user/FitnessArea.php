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
    <link rel="stylesheet" href="/registered_user/CSS/FitnessArea.css">

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
            <h1 class="p1sec1"> eden שלום <?php echo $_SESSION['first_name']  ?> </h1>
            <p>
                המאמן אשר מוביל אותך בתהליך ההרזייה הינו <?php echo $_SESSION['name_coach']  ?>
            </p>
        </section>
        <section class="sec1">
            <h4 style="font-weight: bold;">פרטי יצירת קשר עם המאמן שלך:</h4>
            <p> מספר פלאפון: <?php echo $_SESSION['phone_coach']  ?> </p>
            <p>מייל אישי: <?php echo $_SESSION['mail_coach']  ?></p>
        </section>
        <section class="sec1">
            <h4 style="font-weight: bold;">סרטוני הכושר שלך לשבוע:</h4>
            <!-- <?php foreach($_SESSION['user_videos'] as $val){
                 //echo $val."<br/>";
                 //<iframe width="420" height="345" src="$val">
                   // </iframe>
                    
                 //}
           // ?> -->
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