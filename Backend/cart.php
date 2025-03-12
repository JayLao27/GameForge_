<?php
include '../../dbconnection/dbconnect.php';
include '../../Backend/session_start.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["status" => "error", "message" => "User not logged in."]);
        exit;
    }

    $user_id = $_SESSION['user_id']; 
    $cart = json_decode(file_get_contents('php://input'), true);

    if (empty($cart)) {
        echo json_encode(["status" => "error", "message" => "Cart is empty."]);
        exit;
    }

    // Calculate total price
    $total_price = 0;
    foreach ($cart as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    // Check user balance
    $stmt = $conn->prepare("SELECT balance FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($balance);
    $stmt->fetch();
    $stmt->close();

    if ($balance < $total_price) {
        echo json_encode(["status" => "error", "message" => "Insufficient balance."]);
        exit;
    }

    // Deduct balance
    $stmt = $conn->prepare("UPDATE users SET balance = balance - ? WHERE id = ?");
    $stmt->bind_param("di", $total_price, $user_id);
    if (!$stmt->execute()) {
        echo json_encode(["status" => "error", "message" => "Failed to update balance."]);
        exit;
    }

    // Insert into `orders` table
    $stmt = $conn->prepare("INSERT INTO orders (user_id, total, status) VALUES (?, ?, 'pending')");
    $stmt->bind_param("id", $user_id, $total_price);
    if ($stmt->execute()) {
        $order_id = $stmt->insert_id;

        // Insert each cart item into `order_items` table
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        foreach ($cart as $item) {
            $stmt->bind_param("iiid", $order_id, $item['id'], $item['quantity'], $item['price']);
            $stmt->execute();
        }

        echo json_encode(["status" => "success", "message" => "Order placed successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to place order."]);
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>
