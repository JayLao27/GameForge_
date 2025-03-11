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
        // First, ensure the user has a wallet entry
        $check_query = "SELECT * FROM wallet WHERE user_id = ?";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows == 0) {
            // If no wallet entry exists, create one
            $insert_query = "INSERT INTO wallet (user_id, balance) VALUES (?, 0)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("i", $user_id);
            if (!$stmt->execute()) {
                die("Error creating wallet entry: " . $stmt->error);
            }
            $stmt->close();
        }

        // Now update the balance
        $query = "UPDATE wallet SET balance = balance + ? WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("di", $amount, $user_id);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Money added successfully!";
        } else {
            $_SESSION['error'] = "Error updating balance: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "Invalid amount!";
    }
    
    header("Location: ../../src/Main_pages/payments.php");
    exit();
}
?>
