<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../../dbconnection/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signInbtn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "SELECT id, firstname, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['firstname'] = $user['firstname']; // Store first name
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email; // Store email for reference
            $_SESSION['logged_in'] = true;

            error_log("User logged in: " . $_SESSION['firstname']); // Debugging
            header("Location: ../../src/Main_Pages/home.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Invalid email or password.";
            header("Location: ../../src/Main_Pages/signIn.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Invalid email or password.";
        header("Location: ../../src/Main_Pages/signIn.php");
        exit();
    }
}
?>
