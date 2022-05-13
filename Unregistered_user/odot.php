<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet" href="/Unregistered_user/CSS/mainCSS.css">
    <link rel="stylesheet" href="/Unregistered_user/CSS/odotCSS.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        if (typeof jQuery == "undefined") {
            alert("not working");
        }
        </script>
    <title>אודות</title>
</head>
<body>
    <header id="header"></header>
    <main>
        <section><h1 class="h">הסטודיו שלנו</h1>
            <img id="img" src="/Unregistered_user/images/odotSec1.jpg"> 
            <p class="p">הסטודיו שלנו מנהל תהליכי הרזייה עבור לקוחותיו באמצעות תזונאים ומאמני כושר הטובים ביותר בתחום. <br>
            כל תהליך ההרזייה מתבצע באופן מקוון ובליווי אישי מטעם התזונאי ומאמן הכושר המטפלים<br>
            חוויה מעצימה בכל אימון מחדש, מגוון אימונים מותאמים לכלל הרמות, ליווי מלא לכל אחד ואחד. <br>
            מזמינים אתכם להתחיל ולהגשים את עצמכם עוד היום כי מגיע לכם הטוב ביותר!!! </p>

            <ul class="ul">
                <li>את האימונים תבצעו באמצעות סרטוני אימוני כושר מטעם מאמני הכושר שלנו אותם תוכלו לבצע בכל מקום מכל זמן שתרצו</li>
                <li>התזונאים שלנו יתאימו לכם את התפריט שהכי נכונה לכם כולל מעקב ויומן אוכל אישי שלכם</li>
                <li>תוכלו ליצור קשר עם התזונאי ומאמן הכושר שלכם בכל עת</li>
                <li>כל התהליך מתבצע באמצעות כניסה לאזור שלכם באתר שלנו</li>
                <li>תוכלו לשתף להגיב ולשאול שאלות בפורום עם כלל לקוחותינו</li>
              </ul> 
                
        </section>
        <section>
            <h1 class="h">להרשמה</h1>
            <p class="p">
                תוכלו להזין פרטים כבר עכשיו ולהצטרף למשפחה שלנו<br>
                נציג מטעמנו יחזור אליכם וכבר תוכל להתחיל את תהליך ההרזייה שלך<br><br>
                להצטרפות והזנת פרטים לחץ כאן:<br>
                <img id="arrow" src="/Unregistered_user/images/arrow.jpg">
                <button type="button" class="btn btn-outline-success">הצטרפו אלינו</button>

            </p>
        </section>
        <section>
            <h1 class="h">צור קשר</h1>
            <p class="p" id="tel">רוצה תוצאות? התקשר עכשיו!<br>
            03-9262030</p> <br>
            <p class="p">לפרטים נוספים השאר פרטיך ונציג יחזור אליך בהקדם:</p>
            <p class="p"> *הזנת נתונים בשפה האנגלית בלבד</p>
            <form action="#" method="post" class="p">
                <input class="input2" type="text" id="name" name="name" required placeholder="שם מלא">
                <input class="input2" type="tel" id="tel" name="tel" required placeholder="טלפון">
                <input class="input2" type="email" id="email" name="email" required placeholder="מייל">
                <input style="margin:0 auto;" class="button2" type="submit" value="דברו איתי">
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
                        echo "<p style='text-align:right;color:red;'>תודה רבה, נחזור אלייך בהקדם!</p>";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
            }
        }
                $conn->close();
            ?>
        </section>
    </main>
    

    <footer id="footer"></footer>
    <script>
        $(document).ready(
            function(){
              $("#header").load("navbar/navbar.html");
              $("#footer").load("footer.html");
            }            
         )

    </script>
</body>
</html>