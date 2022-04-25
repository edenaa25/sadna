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
    <link rel="stylesheet" href="/registered_user/CSS/foodDiaryPage.css">

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
            <h1 class="p1sec1"> שלום <?php echo $_SESSION['first_name']  ?> </h1>
            <h4> <span style="font-weight: bold;">אז מה אכלת היום? </span> <br> </h4>
        </section>

        <section class="sec1 imgsec">
        <p style="color: red; text-align: right; font-weight: bolder;">*אם דילגת על ארוחה ציין זאת</p>
        <p style="color: red; text-align: right; font-weight: bolder;"> *יש למלא את כל תיבות הטקסט</p>
        <form id="weightForm" action="#" method="post">
            <img class="imgsec" src="images/foodDiary.webp" alt="Smiley face" style="float:left;width:40%;margin-top: 10%; margin-left: 1%;">
            <label for="date">הכנס תאריך עבור מילוי יומן האכילה שלך לאותו היום:</label>
            <input type="date" id="date" name="date">
            <table>                
                    <tr>
                        <td>
                            <label for="Breakfast">
                                ארוחת בוקר </label>                           
                        </td>
                        <td><textarea id="Breakfast" name="Breakfast"
                            rows="5" cols="33" required>
                            הקלד ארוחת בוקר</textarea>                          
                        </td>
                    </tr>
                    <tr>
                        <td><label for="mid1">
                                ארוחת ביניים ראשונה
                            </label>
                        </td>
                        <td><textarea id="mid1" name="mid1"
                            rows="5" cols="33" required>
                            הקלד ארוחת ביניים ראשונה להיום</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="lunch">
                                ארוחת צהריים
                            </label>
                        </td>
                        <td><textarea id="lunch" name="lunch"
                            rows="5" cols="33" required>
                            הקלד ארוחת צהריים</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="mid2">
                                ארוחת ביניים שנייה
                            </label>
                        </td>
                        <td><textarea id="mid2" name="mid2"
                            rows="5" cols="33" required>
                            הקלד ארוחת ביניים שניה להיום</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="dinner">
                                ארוחת ערב 
                            </label>
                        </td>
                        <td><textarea id="dinner" name="dinner"
                            rows="5" cols="33" required>
                            הקלד ארוחת ערב</textarea>
                        </td>
                    </tr>                   
            </table>
            <input style="background-color: #50C878; font-weight: bolder;" type="submit" value="עדכן יומן אכילה">
        </form>
        <?php 
        include('seassion.php'); 
        //echo $_SESSION['login_user'];
      if(isset($_POST["date"])&&$_POST["Breakfast"]&&$_POST["mid1"]&&$_POST["lunch"]&&$_POST["mid2"]&&$_POST["dinner"])  {   
        $user=$_SESSION['login_user'];
        $date = $_POST["date"];
        $breakfast = $_POST["Breakfast"];
        $mid1 = $_POST["mid1"];
        $lunch = $_POST["lunch"];
        $mid2 = $_POST["mid2"];
        $dinner = $_POST["dinner"];
        
        $sql= "INSERT INTO `foodDiary` (`user_name`, `date`, `breakfast`, `mid1`, `lunch`, `mid2`, `dinner`) VALUES ('$user', '$date', '$breakfast', '$mid1', '$lunch', '$mid2', '$dinner')";

        $res = $connection->query($sql);
            if ($res === TRUE) {
                echo "Record updated successfully. <a  href='welcome.php' >press here</a> to return to Home Page";//המעבר לדף אחר לא עובד
            } else {
                echo "Error updating record: " . $conn->error;
            }
     }
?>
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