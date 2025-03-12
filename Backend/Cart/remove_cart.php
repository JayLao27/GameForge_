<?php
include '../session_start.php';
include '../../dbconnection/dbconnect.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get JSON input
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['cart_id'])) {
        echo json_encode(["status" => "error", "message" => "Invalid request."]);
        exit;
    }

    $cart_id = $data['cart_id'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $cart_id, $user_id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to remove item."]);
    }

    $stmt->close();
    $conn->close();
}
?>
