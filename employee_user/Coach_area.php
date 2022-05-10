<?php 
 include('seassion_user.php'); 
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
    <link rel="stylesheet" href="/employee_user/CSS/welcome.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        if (typeof jQuery == "undefined") {
            alert("not working");
        }
        </script>
    <title> עובד דף כניסה</title>
</head>
<body>
    <header id="header"></header>
    <div style="clear: both;"></div>

    <main>
        <section class="sec1 hero-image">
          <p class="hero-text">
              מאמן יקר, <br>
              בדף זה תוכל לצפות במאגר סרטוני כושר עבור הלקוחות <br>
              ואילו סרטונים שבועיים עודכנו עבור לקוחותינו <br>
              בנוסף, תוכל לעדכן סרטונים חדשים עבור הלקוחות ואף להוסיף סרטוני כושר למאגר <br>
          </p> 
           
        </section>
        
        <section class="sec">
            <h4 style="font-weight:bolder;"> הלקוחות שלך ופרטייהם האישיים ליצירת קשר:</h4>
            <table class="center">
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
                        for ($row=0; $row < count($_SESSION['clinets_data']); $row++) { 
                            echo "<tr> \n";
                            foreach($_SESSION['clinets_data'][$row] as $value){ 
                                echo "<td>$value</td> \n";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                ?>

        </section>
        <section class="sec">
            <h4 style="font-weight:bolder;">מאגר סרטוני כושר:</h4>
            <table class="center">
                <tr>
                    <th>Video ID</th>
                    <th>URL</th>
                    <th>Type of training</th>
                </tr>

                <?php
                   // echo "<table border =\"1\" style='border-collapse: collapse'>";
                        for ($row=0; $row < count($_SESSION['videos']); $row++) { 
                            echo "<tr> \n";
                            foreach($_SESSION['videos'][$row] as $value){ 
                                echo "<td>$value</td> \n";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                ?>

        </section>
        <section class="sec">
            <h4 style="font-weight:bolder;">הוספת סרטוני כושר למאגר:</h4>
            <p> הזנת סרטונים למאגר אפשרית רק עבור מאמני כושר ועובדי אדמיניסטרציה</p>
            <form id="videoForm" action="#" method="post">
                        <label for="url">: Video URL</label><br>
                        <input type="text" id="url" name="url" required><br><br>
                        <label for="type">: Type of training</label><br>
                        <input type="text" id="type" name="type" required><br><br>
                        <input id="submit1" type="submit" value="עדכן">
            </form>
            <?php 
                        //include('seassion_user.php'); 
                    if($_SESSION['employee_type']==2 || $_SESSION['employee_type']==3){
                        if(isset($_POST["url"]) && isset($_POST["type"])){
                        $url = $_POST["url"];
                        $type = $_POST["type"];                      
                        $sql= "INSERT INTO `FitnessVideo` (`url`, `type`) VALUES ('$url', '$type')";
                        $res = $connection->query($sql);
                            if ($res === TRUE) {
                                echo "הסרטון עודכן במאגר בהצלחה";
                            } else {
                                echo "Error updating record: " . $conn->error;
                                // "<p style='color:red;'>This is a text in PHP echo.</p>"
                            }
                        }
                    }
                    else{
                        echo "<p style='color:red;'>הזנת סרטונים למאגר אפשרית רק עבור מאמני כושר ועובדי אדמיניסטרציה</p>";
                    }
                        ?> <br>
  
        </section>
        <section class="sec">
            <h4 style="font-weight:bolder;"> עדכון סרטוני כושר ללקוח:</h4>
            <p>יש לעדכן שלושה סרטונים עבור לקוח</p>
            <p>עדכון סרטון לפי מספר מזהה של סרטון הכושר</p>
            <p>עדכון סרטוני כושר ללקוח אפשרית רק עבור מאמני כושר ועובדי אדמיניסטרציה </p>
            <form id="videoForm" action="#" method="post">
                        <label for="user">:Client User Name</label><br>
                        <input type="text" id="user" name="user" required><br><br>
                        <label for="id">:ID Video 1</label><br>
                        <input type="text" id="id" name="id" required><br><br>
                        <label for="id2">:ID Video 2</label><br>
                        <input type="text" id="id2" name="id2" required ><br><br>
                        <label for="id3">:ID Video 3</label><br>
                        <input type="text" id="id3" name="id3" required ><br><br>
                        <input id="submit1" type="submit" value="עדכן">
            </form>
            <?php 
                        //include('seassion_user.php'); 
                    if($_SESSION['employee_type']==2 || $_SESSION['employee_type']==3){
                        if(isset($_POST["user"]) && isset($_POST["id"]) && isset($_POST["id2"]) && isset($_POST["id3"])){
                        $user = $_POST["user"];
                        $id = $_POST["id"]; 
                        $id2 = $_POST["id2"];  
                        $id3 = $_POST["id3"];  
                        //מחיקת סרטונים קודמים עבור לקוח
                        $sql1= "DELETE FROM `usersVideo` WHERE user_name='".$user."'";
                        $res1 = $connection->query($sql1);
                        $sql2= "INSERT INTO `usersVideo` (`user_name`, `id_video`) VALUES ('$user', '$id')";
                        $res2 = $connection->query($sql2);
                        $sql3= "INSERT INTO `usersVideo` (`user_name`, `id_video`) VALUES ('$user', '$id2')";
                        $res3 = $connection->query($sql3);
                        $sql4= "INSERT INTO `usersVideo` (`user_name`, `id_video`) VALUES ('$user', '$id3')";
                        $res4 = $connection->query($sql4);
                            if ($res1 === TRUE && $res2 === TRUE && $res3 === TRUE && $res4 === TRUE) {
                                echo "הסרטונים עודכנו עבור הלקוח בהצלחה";
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }
                    }
                    else{
                        echo "הזנת סרטונים למאגר אפשרית רק עבור מאמני כושר ועובדי אדמיניסטרציה";
                    }
                        ?> <br>
  
        </section>
    </main>

    <footer id="footer"></footer>
    <script>
        $(document).ready(
            function(){
              $("#header").load("/employee_user/navbar/navbar.html");
              $("#footer").load("/Unregistered_user/footer.html");
              
            }                                 
         )
    </script>
    
</body>
</html>