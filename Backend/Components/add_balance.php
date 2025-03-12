<?php

include '../session_start.php';
include '../../dbconnection/dbconnect.php';

if (!$conn || $conn->connect_errno) {
    die("Database connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'] ?? 0; // Ensure user_id is set

// Fetch wallet balance
$query = "SELECT balance FROM wallet WHERE user_id = ?";
$stmt = $conn->prepare($query);
if ($stmt) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $balance = $row['balance'] ?? 0; // Default to 0 if no balance found
    $stmt->close();
} else {
    $balance = 0; // Set default if query fails
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = floatval($_POST['amount']);

    if ($amount > 0) {
        // Ensure the user has a wallet entry   
        $check_query = "SELECT * FROM wallet WHERE user_id = ?";
        $stmt = $conn->prepare($check_query);
        
        if ($stmt) {
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            if ($result->num_rows == 0) {
                // If no wallet entry exists, create one
                $insert_query = "INSERT INTO wallet (user_id, balance) VALUES (?, 0)";
                $stmt_insert = $conn->prepare($insert_query);
                
                if ($stmt_insert) {
                    $stmt_insert->bind_param("i", $user_id);
                    $stmt_insert->execute();
                    $stmt_insert->close();
                } else {
                    die("Error preparing insert query: " . $conn->error);
                }
            }

            // Now update the balance
            $update_query = "UPDATE wallet SET balance = balance + ? WHERE user_id = ?";
            $stmt_update = $conn->prepare($update_query);

            if ($stmt_update) {
                $stmt_update->bind_param("di", $amount, $user_id);

                if ($stmt_update->execute()) {
                    $_SESSION['message'] = "Money added successfully!";
                } else {
                    $_SESSION['error'] = "Error updating balance: " . $stmt_update->error;
                }
                $stmt_update->close();
            } else {
                die("Error preparing update query: " . $conn->error);
            }
        } else {
            die("Error preparing check query: " . $conn->error);
        }
    } else {
        $_SESSION['error'] = "Invalid amount!";
    }

    header("Location: ../../src/Main_pages/payments.php");
    exit();
}

$conn->close(); // Close connection at the very end
?>

<!-- Display balance -->

