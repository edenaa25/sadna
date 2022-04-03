<?php
$server_name = "localhost";
$user_name = "edenaais_edena";
$password = "123456";
$database = "edenaais_sadna";

$conn = new mysqli($server_name, $user_name, $password, $database);
if ($conn->connect_error) {
    die("Error connecting: " . $conn->connect_error);
}

$name = $_POST["name"];
$lastName = $_POST["last_name"];
$id = $_POST["id"];//key
$email = $_POST["email"];
$wight = $_POST["wight"];
$bmi = $_POST["bmi"];
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
if(isset($_POST['other']) && isset($_POST['other_allergy']){
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

$sql= "INSERT INTO `Candidates` (`Id`, `name`, `lastName`, `mail`, `weight`, `bmi`, `birth`, `allergies`, `txt`) VALUES ('$id', '$name', '$lastName', '$email', '$wight', '$bmi', '$age', '$allergies', '$other')";
    $res = $conn->query($sql);

        if ($res == TRUE) {
            echo "Record updated successfully. <a  href='../index.html' >press here</a> to return to Home Page";
        } else {
            echo "Error updating record: " . $conn->error;
        }
}

?>