<?php
include '../../Backend/session_start.php';
include '../../Backend/auth_check.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $user_id = $_SESSION['user_id'];
    include '../../dbconnection/dbconnect.php';

    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $id, $user_id);
    $success = $stmt->execute();
    
    echo json_encode(["success" => $success]);
}
?>
