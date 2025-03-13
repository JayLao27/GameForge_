<?php
include '../../Backend/session_start.php';
include '../../Backend/auth_check.php';
include '../../dbconnection/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user ID from session
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["status" => "error", "message" => "User not logged in."]);
        exit;
    }
    $user_id = $_SESSION['user_id'];

    // Get product details from POST request
    $product_name = $_POST['product_name'] ?? null;
    $price = $_POST['price'] ?? null;
    $img = $_POST['img'] ?? null;
    $quantity = $_POST['quantity'] ?? 1; // Default to 1 if not provided

    if (!$product_name || !$price || !$img) {
        echo json_encode(["status" => "error", "message" => "Missing product details."]);
        exit;
    }

    // Check if item already exists in the cart
    $check_query = "SELECT quantity FROM cart WHERE user_id = ? AND product_name = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("is", $user_id, $product_name);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // If item exists, update quantity
        $row = $result->fetch_assoc();
        $new_quantity = $row['quantity'] + $quantity;
        $update_query = "UPDATE cart SET quantity = ? WHERE user_id = ? AND product_name = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("iis", $new_quantity, $user_id, $product_name);
        $update_stmt->execute();
        echo json_encode(["status" => "success", "message" => "Cart updated successfully.", "new_quantity" => $new_quantity]);
    } else {
        // Otherwise, insert new item with specified quantity
        $insert_query = "INSERT INTO cart (user_id, product_name, price, img, quantity) VALUES (?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("isssi", $user_id, $product_name, $price, $img, $quantity);
        $insert_stmt->execute();
        echo json_encode(["status" => "success", "message" => "Product added to cart.", "quantity" => $quantity]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>