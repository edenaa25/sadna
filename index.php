<?php
include('login.php'); // Includes Login Script

// if(isset($_SESSION['login_user'])){
// //header("location: /registered_user/welcome.php");
// }
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
    <link rel="stylesheet" href="/Unregistered_user/CSS/indexCSS.css">

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
    <!-- <p style="text-align: right;">הזנת נתונים בשפה האנגלית בלבד </p> -->
    <main>
        <div class="container" id="container">
            <!-- sign in page -->
            <div class="form-container sign-in-container" >
              <form method="POST" action="#" class="formlog" id="login"  >
                <h1 class="form__title">התחברות</h1>
                <div class="form__input-group">
                  <label for="username">שם משתמש: </label>
                  <input type="text" class="inputlog" name="username" id="username" maxlength="20" required> 
                </div>
                <div class="form__input-group">
                  <label for="pass">סיסמא: </label>
                  <input type="password" class="inputlog" name="password" id="pass" maxlength="20" required> 
                </div>
                <div class="form__input-group">
                 <br> <button type="submit" class="buttonlog" name="submit">כניסה</button> 
                </div>
                <span><?php echo $error; ?></span>
             </form> 
            </div>
                    
        </div>

        <section class="sec1">
            <h3 style="text-align: center ;"> <b> בואו לשמור על הבריאות שלכם עם אורך חיים בריא ומאוזן </b></h3><br>
            <p>
                בואו לשדרג את אורך החיים שלכם עם ליווי צמוד של תזונאי ומאמן כושר.
                <br>
                זה מכלול שלם של פעולות יומיומיות היוצרות חיים בריאים, מלאים, מאוזנים ובעיקר מאושרים יותר.
                <br>
                השאירו לנו פרטים ונחזור אליכם על מנת שנוכל לצאת למסע ביחד!
            </p>
            <form action="#" method="post" >
                <p> *הזנת נתונים בשפה האנגלית בלבד</p>
                <input class="input2" type="text" id="name" name="name" required placeholder="שם מלא">
                <input class="input2" type="tel" id="tel" name="tel" required placeholder="טלפון">
                <input class="input2" type="email" id="email" name="email" required placeholder="מייל">
                <input class="button2" type="submit" value="דברו איתי">
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
             if(isset($_POST["name"])) {  
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
                            echo "תודה לך, נחזור אלייך בהקדם!";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                }
            }
                    $conn->close();
                ?>
                            
        </section>

        <!-- התמונה קצת בעייתית כי אי אפשר לכתוב עליה. צריך למצוא צבע לכתב שיהיה טוב על התמונה -->
        <section class="section2">
            <div>
            <h3 id="h3">אם אתה רוצה להרגיש טוב עם עצמך,<br>
            חיוני ומלא באנרגיה<br>
            לשמור על הגוף חזק בריא וכמובן גם חטוב...<br></h3>
            <h3>הגעת למקום הנכון!</h3>
            <div><button class="button2" onclick="window.location.href = 'http://127.0.0.1:5500/Unregistered_user/odot.html';" >עוד קצת עלינו</button></div>
        </div>
        </section>

        <section class="sec3">
            <div><img id="sec3img" src="/Unregistered_user/images/sec3.jpg">       
            <h1>ממשיכים לשמור על כושר ותזונה גם מהבית</h1><br>
            <p>איתך גם בבית, בכל שעות היום! <br>
            אימוני זום אצלך בסלון! איך זה עובד?
            <p>
                  ללקוחות רשומים יועלו סרטוני אימוני כושר בהתאמה אישית לפי תוכנית האימונים האישית עבור כל לקוח אל אזור הכושר שלו באתר<br>
                  בכך תוכלו להתאמן בכל מקום ובכל זמן שתרצו<br>
                  את סרטוני הכושר מכינים המאמנים שלנו ברמה הגבוהה ביותר<br>
                  ישנם סוגי אימונים שונים כמו: ארובי, עיצוב וחיטוב, אימונים פונקציונאלים ועוד! 
            </p>
        </div>
        </section>
       
    </main>


    

    <footer id="footer"></footer>
    <script>
        $(document).ready(
            function(){
              $("#header").load("/Unregistered_user/navbar/navbar.html");
              $("#footer").load("/Unregistered_user/footer.html");
            }            
         )

    </script>
  <!-- <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>  -->
</body>
</html>