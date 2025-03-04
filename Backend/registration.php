<?php
session_start(); // Start session safely

include '../../dbconnection/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $contactnum = trim($_POST['contactnum']);
    $address = trim($_POST['address']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error_message'] = "Email already in use.";
        header("Location: signIn.php"); // Redirect to sign-in page
        exit;
    }
    $stmt->close();

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, contactnum, address, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstname, $lastname, $email, $contactnum, $address, $password);

    if ($stmt->execute()) {
        $_SESSION['registration_success'] = true; // Set session success flag
        header("Location: signIn.php"); // Redirect to clear form resubmission
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
