<?php
$servername = "localhost";
$username = "root";
$password = "";  
$dbname = "arkingroup_db"; 


$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}


$conn->set_charset("utf8");
?>