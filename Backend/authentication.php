<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../dbconnection/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signInbtn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "SELECT id, firstname, password, is_admin FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
    
        error_log("User found: " . print_r($user, true)); // Debugging user details
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;
            $_SESSION['logged_in'] = true;  
            $_SESSION['is_admin'] = $user['is_admin'];
            
            error_log("Email: " . $_SESSION['email']);
            error_log("is_admin: " . $_SESSION['is_admin']); // Debugging admin role

            // Ensure proper type conversion for is_admin
            if ($_SESSION['email'] === 'admin@gameforge.com' || (int)$_SESSION['is_admin'] === 1) {
                header("Location: ../src/adminpages/Adminpage.php");
            } else {
                header("Location: ../../src/Main_Pages/home.php");
            }
            exit();
        } else {
            error_log("Password mismatch");
            $_SESSION['error_message'] = "Invalid email or password.";
            header("Location: ../../src/Main_Pages/signIn.php");
            exit();
        }
    } else {
        error_log("User not found or incorrect email");
        $_SESSION['error_message'] = "Invalid email or password.";
        header("Location: ../../src/Main_Pages/signIn.php");
        exit();
    }
}

if (empty($email) || empty($password)) {
    error_log("Empty fields detected");
    $_SESSION['error_message'] = "Please fill in all fields.";
    header("Location: ../../src/Main_Pages/signIn.php");
    exit();
}
?>
