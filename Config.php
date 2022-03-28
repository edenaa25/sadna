<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'edenaais_edenaais');
define('DB_PASSWORD', '123456');
define('DB_NAME', 'edenaais_sadna');

echo "<script> window.alert(' config page') </script>"  
/* Attempt to connect to MySQL database */
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    echo "<script> window.alert('good config') </script>"   
}


?>