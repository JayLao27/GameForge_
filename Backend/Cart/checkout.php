<?php
include '../session_start.php';
include '../auth_check.php';
include '../../dbconnection/dbconnect.php';

header("Content-Type: application/json");

$user_id = $_SESSION['user_id'];
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || count($data) === 0) {
    echo json_encode(["success" => false, "message" => "Cart is empty"]);
    exit;
}

$conn->begin_transaction();

try {
    $order_query = "INSERT INTO orders (user_id, status, created_at) VALUES ($user_id, 'pending', NOW())";
    $conn->query($order_query);
    $order_id = $conn->insert_id;

    foreach ($data as $item) {
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, quantity, price, img) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isids", $order_id, $item['product_name'], $item['quantity'], $item['price'], $item['img']);
        $stmt->execute();
    }

    $conn->query("DELETE FROM cart WHERE user_id = $user_id");
    $conn->commit();

    echo json_encode(["success" => true]);
} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(["success" => false, "message" => "Checkout failed"]);
}
?>
