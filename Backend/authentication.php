<?php

include 'session_start.php';
include '../dbconnection/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signInbtn'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = "Please fill in all fields.";
        header("Location: ../src/Main_Pages/home.php");
        exit();
    }

    $query = "SELECT id, username, firstname, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true); 
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true;

        header("Location: ../src/Main_Pages/home.php");
        exit();
    }

    $_SESSION['error_message'] = "❌ Invalid username or password.";
    header("Location: ../src/Main_Pages/signIn.php");
    exit();
}
?>
