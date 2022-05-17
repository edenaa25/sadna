<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Unregistered_user/CSS/mainCSS.css">
    <link rel="stylesheet" href="CSS/regform.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        if (typeof jQuery == "undefined") {
            alert("not working");
        }
        </script>

    <title>הרשמה</title>
</head>

<body>
    <header id="header"></header>
    <aside class="a"><img src="/Unregistered_user/images/belly_fit.jpg" alt="" id="img"></aside>
    <main class="main">
        <form action="#" method="post">
         <h2>איזה כיף שבחרת להצטרף!!</h2>  
            <h5>אז מה עכשיו?<br>
            מלאו את הפרטים הבאים כדי שנוכל להכיר אותכם טוב יותר</h5>
            <br> 
            <p style="color: red;">הכנסת פרטים בשפה האנגלית בלבד <br>יש למלא את כל הפרטים בכדי להתחיל בתהליך</p>   
            <div class="div">
                    <p class="p" >שם פרטי:</p> 
                    <input type="text" class="input" id="first_name" name="first_name" required>
                </div>
                <div class="div">
                    <p class="p" >שם משפחה:</p> 
                    <input type="text" class="input" id="last_name" name="last_name" required>
                </div>
                <div class="div">
                    <p class="p" >כתובת:</p> 
                    <input type="text" class="input" id="address" name="address" required>
                </div>
                <div class="div">
                    <p class="p" >מספר פלאפון:</p> 
                    <input type="text" class="input" id="phone" name="phone" required>
                </div>
                <div class="div">
                    <p class="p" >תעודת זהות:</p> 
                    <input type="number" class="input" id="id" name="id" required>
                </div>
                <div class="div">
                    <p class="p" >מייל:</p> 
                    <input type="email" class="input" id="email" name="email" required>
                </div>
            
                <div class="div">
                    <p class="p" >משקל נוכחי:</p> 
                    <input type="number" class="input" id="wight" name="wight" required>
                </div>
                <div class="div">
                    <p class="p" >BMI נוכחי :</p> 
                    <input type="number" class="input" id="bmi" name="bmi" >
                </div>
                <div class="div">
                    <p class="p" >אחוזי שומן :</p> 
                    <input type="number" class="input" id="fat" name="fat" >
                </div>
                <div class="div">
                    <p class="p" > תאריך לידה:</p> 
                    <input type="date" class="input" id="age" name="age" required>
                </div>
                <div style="clear: both;"></div>
                <p><b> אלרגיות: </b></p>
                 <input type="radio" id="peanats" name="peanats"> בוטנים &nbsp; &nbsp;
                 <input type="radio" id="Sesame" name="Sesame"> שומשום &nbsp; &nbsp;
                 <input type="radio" id="gluten" name="gluten"> גלוטן &nbsp; &nbsp;
                 <input type="radio" id="Lactose" name="Lactose"> לקטוז &nbsp; &nbsp;
                 <input type="radio" id="other" name="other"> אחר &nbsp; &nbsp; <br>
                 <input type="text" name="other_allergy" id="other_allergy" placeholder="הקלד אלרגיה">
                
                 <br>
                <p>עוד קצת עליך:</p>
                <textarea name="notes" id="notes" cols="50" rows="5" placeholder="נשמח לשמוע על כל בעיה או בקשה שצצה לך בראש"></textarea>
                
                
                <br><br>
                <div class="center">
                    <input type="submit" class="button2" value="הרשמה" >
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
                if(isset($_POST["first_name"])&& isset($_POST["last_name"])&& isset($_POST["address"])&& isset($_POST["phone"])&& isset($_POST["id"])&& isset($_POST["email"]) &&isset($_POST["age"])){
                $name = $_POST["first_name"];
                $lastName = $_POST["last_name"];
                $address=$_POST["address"];
                $phone=$_POST["phone"];
                $id = $_POST["id"];//key
                $email = $_POST["email"];
                $wight = $_POST["wight"];
                $bmi = $_POST["bmi"];
                $fat=$_POST["fat"];
                $age = $_POST["age"]; //date
                if(isset($_POST['peanats'])){
                    $peanats= 'peanats';
                }
                else{
                    $peanats= '';
                }
                if(isset($_POST['Sesame'])){
                    $Sesame= 'Sesame';
                }
                else{
                    $Sesame= '';
                }
                if(isset($_POST['gluten'])){
                    $gluten= 'gluten';
                }
                else{
                    $gluten= '';
                }
                if(isset($_POST['Lactose'])){
                    $Lactose= 'Lactose';
                }
                else{
                    $Lactose= '';
                }
                if(isset($_POST['other']) && isset($_POST['other_allergy'])){
                    $other=$_POST['other_allergy'];
                }
                else{
                    $other= '';
                }
                if(isset($_POST['notes'])){
                    $notes=$_POST['notes'];
                }
                else{
                    $other= '';
                }
                $allergies= $peanats .','. $Sesame .', '. $gluten .', '. $Lactose .', '. $other;

                $sql= "INSERT INTO `Candidates` (`Id`, `name`, `lastName`, `mail`, `address`, `phone`, `weight`, `bmi`, `fat`, `birth`, `allergies`, `txt`) VALUES ('$id', '$name', '$lastName', '$email', '$address', '$phone' ,'$wight', '$bmi','$fat', '$age', '$allergies', '$other')";
                    $res = $conn->query($sql);

                        if ($res == TRUE) {
                            echo "ההרשמה בוצעה בהצלחה";
                        } else {
                            echo "Error updating record: " . $conn->error;
                           }
               }
               else{
                   echo "יש למלא את כל הפרטים האישיים שלך";
               }
          ?>
    </main>
    <div style="clear: both;"></div>
    <footer id="footer"></footer>
    <script>
        $(document).ready(
            function(){
              $("#header").load("navbar/navbar.html");
              $("#footer").load("footer.html");
              $("#other_allergy").hide();
              $("#other").click(
                  function () {
                      $("#other_allergy").show();
                    })
            }            
         )

    </script>
</body>
</html>