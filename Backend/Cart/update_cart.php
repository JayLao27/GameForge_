<?php
include '../session_start.php';
include '../../dbconnection/dbconnect.php';

$data = json_decode(file_get_contents("php://input"), true);
$cart_id = $data['cart_id'];
$new_quantity = $data['quantity'];

$stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
$stmt->bind_param("ii", $new_quantity, $cart_id);
$stmt->execute();

echo json_encode(["status" => "success"]);
?>
