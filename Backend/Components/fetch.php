<?php

include realpath(__DIR__ . '/../session_start.php') ?: die("session_start.php not found");
include '../../dbconnection/dbconnect.php';

// Function to fetch user details
function fetchUserDetails($conn, $user_id) {
    $query = "SELECT username, firstname, lastname, email, profile_image FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['profile_image'] = $row['profile_image']; 
        }

        $stmt->close();
    }
}

// Function to fetch wallet balance
function fetchWalletBalance($conn, $user_id) {
    $balance = 0.00;
    $query = "SELECT balance FROM wallet WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($balance);
        $stmt->fetch();
        $_SESSION['balance'] = $balance; // Store balance in session
        $stmt->close();
    }
}

// Function to fetch cart items
function fetchUserCart($conn, $user_id) {
    $query = "SELECT id, product_name, price, quantity, img FROM cart WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $_SESSION['cart'] = [];
        while ($row = $result->fetch_assoc()) {
            $_SESSION['cart'][] = $row;
        }
        
        $stmt->close();
    }
}

?>
