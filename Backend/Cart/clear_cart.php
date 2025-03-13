<?php
include '../../Backend/session_start.php';
include '../../Backend/auth_check.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION['user_id'];
    include '../../dbconnection/dbconnect.php';

    $success = $conn->query("DELETE FROM cart WHERE user_id = $user_id");
    
    echo json_encode(["success" => $success]);
}
?>
