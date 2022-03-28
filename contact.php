<?php
$server_name = "localhost";
$user_name = "edenaais_edenaais";
$password = "123456";
$database = "edenaais_sadna";

$conn = new mysqli($server_name, $user_name, $password, $database);
if ($conn->connect_error) {
    die("Error connecting: " . $conn->connect_error);
}

$name = $_POST["name"];
$phone = $_POST["tel"];
$mail = $_POST["email"];
$txt = $_POST["message"];

$sql= " INSERT INTO `contact` (`name`, `phone`, `mail`, `txt`) VALUES ('$name', '$phone', '$maill', '$txt')";
$res = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully. <a  href='/index.html' >press here</a> to return to Home Page";
      } else {
        echo "Error updating record: " . $conn->error;
      }

?>