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
    <link rel="stylesheet" href="/registered_user/CSS/contact.css">

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
<div class="body" >
    <h2><b>יצירת קשר</b></h2>
    <aside>
        <section class="right section">
            <h4><b> תמיד עומדים לרשותך</b></h4>
            <p>אתם מוזמנים לפנות אלינו בכל עניין.<br> שירות הלקוחות שלנו יענו לכם בשמחה.</p>
            <br>
            <p>טלפון:   <b>03-9566012</b></p>
            <p>מייל:   <b>somemail@gmail.com</b></p>
        </section>
    </aside>
    <main class="main">
        <section class="left section">
            <form action="contact.php" method="post">
                <h4><b>כתבו לנו</b></h4>
                <p>לכל שאלה בכל נושא מוזמנים לכתוב לנו ונחזור אלייך במייל או בשיחה טלפונית </p>
                <br>
                <input class="half" type="text" id="name" name="name" maxlength="20" required placeholder="שם">
                <input class="half" type="tel" id="tel" name="tel" placeholder="טלפון" required >
                <input class="whole" type="email" id="email" name="email" placeholder="מייל" required>
                <textarea class="whole" name="message" id="message" cols="5" rows="4" placeholder="הודעה" required></textarea>
                
                <div class="center">
                    <input class="button2" type="submit" value="שליחה">
                </div>
            </form>
        </section>
    </main>
    <div style="clear: both;"></div> 
    <br>
    <section class="sec">
        <h4 class="p" style="font-weight: bold; text-shadow: 2px 2px #E5E4E2;">פרטי יצירת קשר עם התזונאי שלך:</h4>
            <p class="p"> שם תזונאי:  <?php echo $_SESSION['name_nutri']  ?> </p>
            <p class="p"> מספר פלאפון: 0<?php echo $_SESSION['phone_nutri']  ?> </p>
            <p class="p">מייל אישי: <?php echo $_SESSION['mail_nutri']  ?></p>
    </section>
    <section class="sec">
        <h4  class="p" style="font-weight: bold; text-shadow: 2px 2px #E5E4E2;">פרטי יצירת קשר עם המאמן שלך:</h4>
            <p class="p">שם מאמן אישי:  <?php echo $_SESSION['name_coach']  ?></p>
            <p class="p"> מספר פלאפון: 0<?php echo $_SESSION['phone_coach']  ?> </p>
            <p class="p">מייל אישי: <?php echo $_SESSION['mail_coach']  ?></p>
    </section>
</div>
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