<?php 
 include('seassion_user.php'); 
 //echo $_SESSION['login_user'];  
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
                    <tr> <th class="th1">post id:<?php echo $row1['id_mess'] ?> </th> </tr>
                    <tr> <th class="th1"><?php echo $row1['user_name'] ?> </th> </tr>
                    <tr> <td class="td1"><?php echo $row1['content'] ?></td> </tr> <tr> &nbsp; </tr>
                    
                    <?php
                    $ses_sql2= mysqli_query($connection, "select * from coment");
                    while($row2 = mysqli_fetch_assoc($ses_sql2)){
                        if ($row2['mess_id'] == $row1['id_mess']){ ?>
                            <tr> <th class="th2"> <?php echo $row2['user_name'] ?> </th> </tr>
                            <tr><td class="td2"><?php echo $row2['content'] ?> </td></tr>
                  <?php }
                    } ?>
                    <?php }?>
            </table>    
        
            
        </div>
        <div class="text">
            <div class="rdiv">
                <button id="btnp" class="button2"> write a post</button>
                <button id="btnc" class="button2"> write a comment for post</button>
            </div>
        </div>

        <div class="text" id="post">
            <form action="#" method="post">        
                <div class="rdiv">
                    <h5>Write a post</h5>
                    <textarea style = "direction: ltr;" required name="post" id="post" cols="40" rows="2"></textarea>
                </div>
                <div class="ldiv">
                    <button id="submit" class="button2" type="submit">send</button>
                </div>
            </form>
            <?php 
                    include('seassion_user.php'); 
                    if(isset($_POST["post"])){
                        $mess = $_POST['post'];
                        $user=$_SESSION['login_user'];
                        
                        $sql = "INSERT INTO `messages` (`id_mess`, `user_name`, `content`, `time`) VALUES (NULL, '".$user."', '".$mess."', CURRENT_TIMESTAMP)";
                        // לחפש פה את המבטל כפילויות של עדן
                        $res = $connection->query($sql);
                        header("Refresh:0");
                        }
                        else{
                            echo "post id and messege are required";
                        }
                        ?>
        </div>
        <div class="text" id="comment">
            <form action="#" method="post">        
                <div class="rdiv">
                    <h5>Write a comment</h5>
                    <p><input type="number" style="direction: ltr;" placeholder="post id?" id="mess_id" name="mess_id" required> </p>
                    <textarea style = "direction: ltr;" required name="comment" id="comment" cols="40" rows="2"></textarea>
                </div>
                <div class="ldiv">
                    <button id="submit" class="button2" type="submit">send</button>
                </div>
            </form>
            <?php 
                    include('seassion_user.php'); 
                    if(isset($_POST["mess_id"]) && isset($_POST["comment"])){
                        $mess = $_POST['comment'];
                        $mess_id = $_POST['mess_id'];
                        $user=$_SESSION['login_user'];
                        $sql ="INSERT INTO `coment` (`user_name`, `content`, `time`, `mess_id`) VALUES ('".$user."', '".$mess."', CURRENT_TIMESTAMP, '".$mess_id."')";
                        // לחפש פה את המבטל כפילויות של עדן
                        $res = $connection->query($sql);
                        if($res == true){
                            echo "your comment added seccesfully";
                        }
                        else{
                            echo "your comment added unseccesfully ";
                            echo "<br>";
                            echo "id post is not valid";

                        }
                        header("Refresh:0");
                        }
                        else{
                            echo "post id and messege are required";
                        }
                        ?>
        </div>
    </main>

    <div style="clear: both;"></div>
    <footer id="footer"></footer>
    <script>
        $(document).ready(
            function(){
              $("#header").load("/employee_user/navbar/navbar.html");
              $("#footer").load("/Unregistered_user/footer.html");
              $("#post").hide();
              $("#comment").hide();
              $("#btnp").click( function(){
                $("#post").show();
                $("#comment").hide();
              });
              $("#btnc").click( function(){
                $("#post").hide();
                $("#comment").show();
              });
              
            });
    </script>
</body>
</html>