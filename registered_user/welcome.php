<?php 
 include('seassion.php'); 
//  echo $_SESSION['login_user'];

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
    <title>דף כניסה</title>
</head>
<body>
    <header id="header"></header>
    <div style="clear: both;"></div>

    <main>
        <section class="sec1">
            <h1 class="p1sec1"> hi <?php echo $_SESSION['first_name']  ?> </h1>
            <h4> <span style="font-weight: bold;"> התזכורות שלך לשבוע: </span> <br> </h4>
            <?php echo $_SESSION['txt'] ?>
        </section>
        <section class="sec1">
            <h4 style="font-weight: bold; text-shadow: 2px 2px #E5E4E2;"> קצת נתונים על התהליך שלך: <br> </h4>
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
        </section>
        <section class="sec1">
            <h4 style="font-weight: bold; text-shadow: 2px 2px #E5E4E2;">לא לשכוח לעדכן:</h4>
                <div class="bigdiv">
                   <div> <button class="btn"> <img id="weight"  src="images/weight.png" alt="weight" > <br>
                    <p style="font-weight: bold;">שקילה</p></div> </button>
                    <form id="weightForm" action="#" method="post">
                        <label for="date">:date</label><br>
                        <input type="date" id="date" name="date" required><br><br>
                        <label for="weight">:weight</label><br>
                        <input type="number" id="weight" name="weight" required><br><br>
                        <input id="submit1" type="submit" value="עדכן">
                    </form>
                    <?php 
                        include('seassion.php'); 
                        //echo $_SESSION['login_user'];
                     if(isset($_POST["weight"]) && isset($_POST["date"])){
                        $curr_weight = $_POST["weight"];
                        $date = $_POST["date"];
                        $user=$_SESSION['login_user'];
                        
                        //$sql = " INSERT INTO weighs SET  weight = '".$curr_weight."',date = '".$date."', user_name = '".$user."'";
                        $sql= "INSERT INTO `weighs` (`weight`, `date`, `user_name`) VALUES ('$curr_weight', '$date', '$user')";
                        //יש הוספה של 3 שורות ריקות, לטפל בזה
                        $res = $connection->query($sql);
                            if ($res === TRUE) {
                                echo  "<p style='color:red;'>השקילה שלך עודכנה בהצלחה</p>";
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }
                        ?> <br>
                    <br>
                    <div> <button class="btn" onclick="window.location.href = 'FoodDiaryPage.php';"><img id="diary" src="images/diary.png" alt="diary" >   <!-- לשלוח לדף אחר  -->
                    <p style="font-weight: bold;">יומן אוכל</p> </button> </div> 
                </div>
        </section>
        <section class="sec1">
            <h4 style="font-weight: bold; text-shadow: 2px 2px #E5E4E2;">פרטים אישיים:</h4>
            <table class="center">
                <!-- <tr>
                    <th style="padding: 5%;">כתובת</th>
                    <th style="padding: 5%;">פלאפון</th>
                    <th style="padding: 5%;">מייל</th>
                </tr>
                <tr>
                    <td style="padding: 5%;"> <?php  echo $_SESSION['address'] ?></td>    
                    <td style="padding: 5%;"> 0<?php  echo $_SESSION['phone']; ?></td>   
                    <td style="padding: 5%;"> <?php echo $_SESSION['mail'] ?></td>                    
                </tr>
                </table> -->
                <tr>
                    <th>user name</th>
                    <th>first name</th>
                    <th>last name</th>
                    <th>address</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>Date of Birth</th>
                    <th>Allergies</th>
                </tr>

                <?php
                   // echo "<table border =\"1\" style='border-collapse: collapse'>";
                        for ($row=0; $row < count($_SESSION['clinet_data']); $row++) { 
                            echo "<tr> \n";
                            foreach($_SESSION['clinet_data'][$row] as $value){ 
                                echo "<td>$value</td> \n";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                ?>
                <p>אם יש שינוי בפרטייך האישיים נא לעדכן במייל : <a href="mailto:somemail@gmail.com">mailto:somemail@gmail.com</a></p>
        </section>

    </main>

    <footer id="footer"></footer>
    <script>
        $(document).ready(
            function(){
              $("#header").load("/registered_user/navbar/navbar.html");
              $("#footer").load("/Unregistered_user/footer.html");
              $("#weightForm").hide();
              $("#weight").click(
                  function () {
                      $("#weightForm").toggle();
                    })
              $("#submit1")  .click(
                  function(){
                    $("#weightForm").hide(100);
                  }
              )    
            }                                 
         )
    </script>
    
</body>
</html>