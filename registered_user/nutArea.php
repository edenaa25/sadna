<?php 
 include('seassion.php'); 
 echo $_SESSION['login_user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/Unregistered_user/CSS/mainCSS.css">
    <link rel="stylesheet" href="CSS/nutArea.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        if (typeof jQuery == "undefined") {
            alert("not working");
        }
        </script>

    <title>אזור תזונה</title>
</head>
<body>
    <header id="header"></header>
    <div style="clear: both;"></div>
    <main class="main">
        <section class="sec1">
            <h1> שלום <?php echo $_SESSION['first_name'] ?> </h1> <br>
            <h4> בחלק זה תוכלו לראות את התקדמותכם, את התפריט שהתזונאי שלכם בנה לכם וגם תוכלו להזין את הנתונים שלכם 
                אודות יומן האוכל והשקילה היומית שלכם
            </h4>
        </section>
        <section class="sec1">
            <h4>
                התפריט שלך:  
            </h4>
            <img class="img" src="images/menu1.jpg" alt = "someee">
            <!-- <?php
                $ses_sql1=mysqli_query($connection, "select menu from Treatments where idTrit = 1");
            ?> -->
            <!-- <img src="/registered_user/images/menu1.jpg" alt="err"> -->
            <!-- תפריט שצריך להגיע מהטבלאות -->
        </section>
        <section class="sec1">
            <h4>
                מילוי של יומן האוכל בצורה עקבית ויומיומים חשוב מאוד לתהליך ויעזור לתזונאי שלך
                להגדיר ולשנות בשבילך את התפריט לפי מידת הצורך ולהגדיר לך יעדים! <br> <br>
                למילוי יומן אוכל ושקילה יומית: <br>
                <div class="bigDiv">
                    <div class="div1"> <button class="btn" onclick="window.location.href = 'FoodDiaryPage.php';"><img id="diary" src="images/diary.png" alt="diary" >   <!-- לשלוח לדף אחר  -->
                    <p style="font-weight: bold;">יומן אוכל</p> </button> </div>
                </div>
                <div class="bigDiv">
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
                                echo "השקילה שלך עודכנה ";
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }
                        ?> <br>
                </div>
                
            </h4>
            <div style="clear: both;"></div>

        </section>
    
    </main>

    <footer id="footer"></footer>
    <script>
        $(document).ready(
            function(){
              $("#header").load("/Unregistered_user/navbar/navbar.html");
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