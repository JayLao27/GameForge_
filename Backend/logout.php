<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Check if the request method is POST
    session_start(); // Start the session
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: ../src/Main_Pages/home.php"); // Redirect to home page
    exit(); // Exit the script
}
?>