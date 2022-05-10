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
    <link rel="stylesheet" href="/registered_user/CSS/forumCss.css">
    
    <script>
        if (typeof jQuery == "undefined") {
            alert("not working");
        }
        </script>
    <title>forum</title>
</head>
<body>
    <header id="header"></header>
    <div style="clear: both;"></div>
    

    <main>
        <div class="wrap">
            <table class = "l">
                <?php  
                $ses_sql1= mysqli_query($connection, "select * from messages"); 
                while($row1=mysqli_fetch_Assoc($ses_sql1)){ ?>
                    <tr> <th class="th1"><?php echo $row1['user_name'] ?> </th> </tr>
                    <tr> <td class="td1"><?php echo $row1['content'] ?></td> </tr> <tr> &nbsp;</tr>
                    
                    <?php
                    $ses_sql2= mysqli_query($connection, "select * from coment");
                    while($row2 = mysqli_fetch_assoc($ses_sql2)){
                        if ($row2['mess_id'] == $row1['id_mess']){ ?>
                            <tr> <th class="th2"> <?php echo $row2['user_name'] ?> </th> </tr>
                            <tr><td class="td2"><?php echo $row2['content'] ?> </td></tr>
                  <?php }
                    } 
                 }?>
            </table>    
        
            
        </div>
        <div class="text">
            <form action="#" method="post">        
                <div class="rdiv">
                    <h5>Write a post</h5>
                    <textarea style = "direction: ltr;" name="post" id="post" cols="40" rows="2"></textarea>
                </div>
                <div class="ldiv">
                    <button id="submit" class="button2" type="submit">send</button>
                </div>
            </form>
            <?php 
                    include('seassion.php'); 
                    if(isset($_POST["post"])){
                        $mess = $_POST['post'];
                        $user=$_SESSION['login_user'];
                        
                        $sql = "INSERT INTO `messages` (`id_mess`, `user_name`, `content`, `time`) VALUES (NULL, '".$user."', '".$mess."', CURRENT_TIMESTAMP)";
                        // לחפש פה את המבטל כפילויות של עדן
                        $res = $connection->query($sql);
                        header("Refresh:0");
                        }?>
        </div>
    </main>


    <footer id="footer"></footer>
    <script>
        $(document).ready(
            function(){
                
              $("#header").load("/registered_user/navbar/navbar.html");
              $("#footer").load("/Unregistered_user/footer.html");
              
            });
    </script>
</body>
</html>