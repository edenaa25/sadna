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
    <title>אזור כושר</title>
</head>
<body>
    <header id="header"></header>
    <div style="clear: both;"></div>

    <main>
        <section class="sec1">
            <h1 class="p1sec1"> שלום <?php echo $_SESSION['first_name']  ?> </h1>
            <p>
                המאמן אשר מוביל אותך בתהליך ההרזייה הינו <?php echo $_SESSION['name_coach']  ?>
            </p>
        </section>
        <section class="sec1">
            <h4 style="font-weight: bold; text-shadow: 2px 2px #E5E4E2;">פרטי יצירת קשר עם המאמן שלך:</h4>
            <p> מספר פלאפון: 0<?php echo $_SESSION['phone_coach']  ?> </p>
            <p>מייל אישי: <?php echo $_SESSION['mail_coach']  ?></p>
        </section>
        <section class="sec1">
            <h4 style="font-weight: bold; text-shadow: 2px 2px #E5E4E2;">סרטוני הכושר שלך לשבוע:</h4>
            <div>
                <p>אימון כוח:</p>
                <iframe id="video1" width="560" height="315" src="<?php echo $_SESSION['user_videos'][0]; ?>"></iframe><br><br>
                <button id="button" onclick="makeBig1()">Big</button>
                <button id="button" onclick="makeSmall1()">Small</button>
                <button id="button" onclick="makeNormal1()">Normal</button>
                <br><br>
            </div><br>
            <div>
                <p>אימון ארובי:</p>
                <iframe id="video2" width="560" height="315" src="<?php echo $_SESSION['user_videos'][1]; ?>"></iframe><br><br>
                <button id="button" onclick="makeBig2()">Big</button>
                <button id="button" onclick="makeSmall2()">Small</button>
                <button id="button" onclick="makeNormal2()">Normal</button>
                <br><br>
            </div><br>
            <div>
                <p>אימון פונקציונאלי:</p>
                <iframe id="video3" width="560" height="315" src="<?php echo $_SESSION['user_videos'][2]; ?>"></iframe><br><br>
                <button id="button" onclick="makeBig3()">Big</button>
                <button id="button" onclick="makeSmall3()">Small</button>
                <button id="button" onclick="makeNormal3()">Normal</button>
                <br><br>
            </div>
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
    <script>
        var myVideo = document.getElementById("video1"); 
              
              function makeBig1() { 
                  myVideo.width = 650; 
              } 
              
              function makeSmall1() { 
                  myVideo.width = 350; 
              } 
              
              function makeNormal1() { 
                  myVideo.width = 440; 
              } 
        var myVideo2 = document.getElementById("video2"); 
              
              function makeBig2() { 
                  myVideo2.width = 650; 
              } 
              
              function makeSmall2() { 
                  myVideo2.width = 350; 
              } 
              
              function makeNormal2() { 
                  myVideo2.width = 440; 
              } 
        var myVideo3 = document.getElementById("video3"); 
              
              function makeBig3() { 
                  myVideo3.width = 650; 
              } 
              
              function makeSmall3() { 
                  myVideo3.width = 350; 
              } 
              
              function makeNormal3() { 
                  myVideo3.width = 440; 
              } 
    </script>
    
</body>
</html>