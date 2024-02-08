<?php 
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "userinfo";
$conn = "";

try {
    $conn = mysqli_connect($server, $user, $pass, $dbname);
} catch(mysqli_sql_exception) {
    echo "Could not connect";
}

?>