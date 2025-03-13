<?php
include '../../Backend/session_start.php';
include '../../Backend/auth_check.php';
include '../../Backend/db_connection.php'; // Ensure database connection

header("Content-Type: application/json");

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM cart WHERE user_id = $user_id");

$cartItems = [];
while ($row = $result->fetch_assoc()) {
    $cartItems[] = $row;
}

echo json_encode($cartItems);
?>
