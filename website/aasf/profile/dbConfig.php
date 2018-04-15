<?php
$servername = "localhost";
$username = "root";
$password = "toor@123";
$dbname = "aasfDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>