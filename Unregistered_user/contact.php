<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/mainCSS.css">
    <link rel="stylesheet" href="CSS/contact.css">
    <script>
        if (typeof jQuery == "undefined") {
            alert("not working");
        }
    </script>


    <title>צור קשר</title>
</head>
<body>
    <header id="header"></header>
    <h2><b>יצירת קשר</b></h2>
    <aside>
        <section class="right">
            <h4><b> תמיד עומדים לרשותך</b></h4>
            <p>אתם מוזמנים לפנות אלינו בכל עניין.<br> שירות הלקוחות שלנו יענו לכם בשמחה.</p>
            <br>
            <p>טלפון:   <b>03-9566012</b></p>
            <p>מייל:   <b>somemail@gmail.com</b></p>
        </section>
    </aside>
    <main class="main">
        <section class="left">
            <form action="contact.php" method="post">
                <h4><b>כתבו לנו</b></h4>
                <p>רוצים להצטרף? מעוניינים בפרטים נוספים ובמידע שיכול לשנות את חייכם או סתם להתייעץ איתנו? </p>
                <br>
                <input class="half" type="text" id="name" name="name" maxlength="20" required placeholder="שם">
                <input class="half" type="tel" id="tel" name="tel" placeholder="טלפון" required >
                <input class="whole" type="email" id="email" name="email" placeholder="מייל" required>
                <textarea class="whole" name="message" id="message" cols="5" rows="4" placeholder="הודעה" required></textarea>
                
                <div class="center">
                    <input class="button2" type="submit" value="שליחה">
                </div>
            </form>
            <?php
            $server_name = "localhost";
            $user_name = "edenaais_edena";
            $password = "123456";
            $database = "edenaais_sadna";

            $conn = new mysqli($server_name, $user_name, $password, $database);
            if ($conn->connect_error) {
                die("Error connecting: " . $conn->connect_error);
            }
            if(isset($_POST["name"])&& (isset($_POST["tel"]) ||isset($_POST["email"])) ){
            $name = $_POST["name"];
            $phone = $_POST["tel"];
            $mail = $_POST["email"];

            $dup= mysqli_query($conn, "select * from contact where phone='$phone' ");//בדיקת כפילויות לפי שם
            if(mysqli_num_rows($dup) >0 && $phone!=null){
                echo "you allready excist in our list, thank you <a  href='../index.html' >press here</a> to return to Home Page";
            }
            else{
                if (empty($_POST["message"])){
                    $txt = "no massege";
                }
                else{
                    $txt = $_POST["message"];
                }

                $sql= "INSERT IGNORE INTO `contact` (`name`, `phone`, `mail`, `txt`) VALUES ('$name', '$phone', '$maill', '$txt')";
                $res = $conn->query($sql);

                    if ($res == TRUE) {
                        echo "תודה רבה, נחזור אלייך בהקדם!";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
            }
        }
                $conn->close();
            ?>
        </section>
    </main>


    <div style="clear: both;"></div>
    <footer id="footer"></footer>
    <script>
        $(document).ready(
            function(){
              $("#header").load("navbar/navbar.html");
              $("#footer").load("footer.html");
              
            })
    </script>
</body>
</html>