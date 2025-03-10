<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../../dbconnection/dbconnect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Main_Pages/signIn.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $amount = floatval($_POST['amount']);

    if ($amount > 0) {
        // Update balance in database
        $query = "UPDATE users SET balance = balance + ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("di", $amount, $user_id);
        
        if ($stmt->execute()) {
            $_SESSION['message'] = "Money added successfully!";
        } else {
            $_SESSION['error'] = "Something went wrong!";
        }
        $stmt->close();
    }
    
    header("Location: ../../src/Main_pages/payments.php");
    exit();
}
?>
