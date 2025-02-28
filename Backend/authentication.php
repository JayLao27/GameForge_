<?php
session_start();
include '../dbconnection/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            echo "<script>alert('Login successful!'); window.location.href='../src/Main_Pages/home.php';</script>";
            exit();
        } else {
            echo "<script>alert('Incorrect email or password.');</script>";
        }
    } else {
        echo "<script>alert('Account not found.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
