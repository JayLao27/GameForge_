<?php
include '../session_start.php';
include '../../dbconnection/dbconnect.php';

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

echo json_encode(["status" => "success"]);
?>
