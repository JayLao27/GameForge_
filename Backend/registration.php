<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../../dbconnection/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $contactnum = trim($_POST['contactnum']);
    $address = trim($_POST['address']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error_message'] = "Email or username already in use.";
        header("Location: signIn.php"); 
        exit;
    }
    $stmt->close();

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (username, firstname, lastname, email, contactnum, address, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $username, $firstname, $lastname, $email, $contactnum, $address, $password);

    if ($stmt->execute()) {
        $_SESSION['registration_success'] = true; 
        header("Location: signIn.php"); 
        exit;
    } else {
        $_SESSION['error_message'] = "Error: " . $stmt->error;
        header("Location: signIn.php");
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>
