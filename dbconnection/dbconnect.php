<?php
$servername = "localhost";  // Change if hosted elsewhere
$username = "root";  // Your database username
$password = "";  // Your database password
$dbname = "gameforge_db";  // Your actual database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
