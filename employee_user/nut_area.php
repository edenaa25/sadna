<?php 
 include('seassion_user.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="../registered_user/CSS/nutArea.css"> -->
    <link rel="stylesheet" href="/Unregistered_user/CSS/mainCSS.css">
    <link rel="stylesheet" href="/employee_user/CSS/welcome.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        if (typeof jQuery == "undefined") {
            alert("not working");
        }
        </script>
    <title>אזור תזונאים</title>
</head>
<body>
    <header id="header"></header>
    <div style="clear: both;"></div>
    <main>
        <section class="sec">
            <h4 style="font-weight:bolder;">הלקוחות שלך:</h4>
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
        <h4 style="font-weight:bolder;">התפריטים שלך:</h4>
        <?php
            $ses_sql1= mysqli_query($connection, "select * from menus");
            while($row1=mysqli_fetch_array($ses_sql1)){ ?>
                <h5>תפריט מספר  &nbsp; <?php echo $row1['id']; ?> </h5>
                <?php
                // echo $row1['id'] + '<br>';
                echo '<img class="img" src=" data: image/jpg;base64,'.base64_encode($row1['menu']).'" height= "200px" alt = "someee">';
                echo "<br><br><br>";
            }
        ?>
        </section> <br>
        <section class="sec">
            <h4 style="font-weight:bolder;">הוספת תפריט למאגר:</h4>
            <p> "הזנת תפריטים למאגר אפשרית רק עבור תזונאים ועובדי אדמיניסטרציה</p>
            <form id="menuForm" action="#" method="post">
                <label for="myfile">אנא בחר קובץ:</label> 
                <input type="file" accept="image/*" id="myfile" name="myfile"><br><br>
                <input id="submit1" type="submit" value="עדכן">
            </form>
            <?php
                if($_SESSION['employee_type']==1 || $_SESSION['employee_type']==3){
                    if(isset($_POST['myfile'])){
                        $file = $_POST['myfile'];
                        $image = base64_encode($file);
                        $sql = "INSERT INTO `menus` (`id`, `menu`, `nut_name`) VALUES (NULL, '$image' , '$user_check');";
                        $res = $connection->query($sql);
                        if ($res === TRUE) {
                            echo "התפריט עודכן במאגר בהצלחה";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                    }
                }
                else{
                    echo "<p style='color:red;'>הזנת תפריטים למאגר אפשרית רק עבור תזונאים ועובדי אדמיניסטרציה</p>";
                }
            ?> <br>
        </section>
        <section class="sec">
            <h4 style="font-weight:bolder;"> עדכון תפריט ללקוח:</h4>
            <p>עדכון תפריט לפי מספר מזהה של תפריט ולפי שם המשתמש של הלקוח</p>
            <p>עדכון תפריט ללקוח אפשרית רק עבור תזונאים ועובדי אדמיניסטרציה </p>
            <form id="menuForm" action="#" method="post">
                <label for="user">:Client User Name</label><br>
                <input type="text" id="user" name="user" required><br><br>
                <label for="id">:ID Menu </label><br>
                <input type="text" id="id" name="id" required><br><br>
                <input id="submit1" type="submit" value="עדכן">

            </form>
            <?php
                if($_SESSION['employee_type']==1 || $_SESSION['employee_type']==3){
                    if(isset($_POST['user']) && isset($_POST['id'])){
                        $user = $_POST['user'];
                        $id = $_POST['id'];
                        $sql = "UPDATE `Treatments` SET `menu_id` = '$id' WHERE `Treatments`.`user_name` = $user;";
                        $res = $connection->query($sql);
                        if ($res === TRUE) {
                            echo "התפריט עודכן עבור הלקוח בהצלחה";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                    }
                }
                else{
                    echo "הזנת תפריטים למאגר אפשרית רק עבור תזונאים ועובדי אדמיניסטרציה";
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