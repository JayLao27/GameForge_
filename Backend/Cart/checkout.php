<?php
header('Content-Type: application/json'); // Ensure JSON response
include '../session_start.php';
include '../auth_check.php';
include '../../dbconnection/dbconnect.php';


$user_id = $_SESSION['user_id'];
$cart = json_decode(file_get_contents("php://input"), true)['cart'];

if (!$cart) {
    echo json_encode(["success" => false, "message" => "Cart is empty."]);
    exit;
}

// Calculate total price
$total = 0;
foreach ($cart as $item) {
    $total += $item['quantity'] * $item['price'];
}

// Check user balance
$wallet_result = $conn->query("SELECT balance FROM wallet WHERE user_id = $user_id");
$wallet = $wallet_result->fetch_assoc();

if (!$wallet || $wallet['balance'] < $total) {
    echo json_encode(["success" => false, "message" => "Insufficient balance."]);
    exit;
}

// Start transaction
$conn->begin_transaction();

try {
    // Deduct balance first
    $update_wallet = $conn->query("UPDATE wallet SET balance = balance - $total WHERE user_id = $user_id");
    
    // Ensure balance was successfully deducted
    if (!$update_wallet) {
        throw new Exception("Failed to deduct balance.");
    }

    // Insert order only if wallet deduction was successful
    $conn->query("INSERT INTO orders (user_id, total) VALUES ($user_id, $total)");
    $order_id = $conn->insert_id;

    // Insert order items
    foreach ($cart as $item) {
        $product_id = intval($item['product_id']);
        $quantity = intval($item['quantity']);
        $price = floatval($item['price']);
        $conn->query("INSERT INTO order_items (order_id, product_id, quantity, price) 
                      VALUES ($order_id, $product_id, $quantity, $price)");
    }

    // Clear the cart in the database
    $conn->query("DELETE FROM cart WHERE user_id = $user_id");

    // Commit transaction
    $conn->commit();

    echo json_encode(["success" => true, "message" => "Checkout successful!"]);
    exit;

} catch (Exception $e) {
    // Rollback transaction if anything fails
    $conn->rollback();
    echo json_encode(["success" => false, "message" => "Checkout failed: " . $e->getMessage()]);
    exit;
}