<?php
include '../../Backend/session_start.php';
include '../../dbconnection/dbconnect.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT o.id, o.total, o.created_at, 
                 COALESCE(GROUP_CONCAT(DISTINCT p.image_url SEPARATOR ','), 'default.png') AS image_urls, 
                 COALESCE(GROUP_CONCAT(DISTINCT p.name SEPARATOR ', '), 'No Product') AS product_names,
                 SUBSTRING_INDEX(COALESCE(GROUP_CONCAT(DISTINCT p.name ORDER BY oi.id SEPARATOR ', '), 'No Product'), ',', 1) AS order_name
          FROM orders o
          LEFT JOIN order_items oi ON o.id = oi.order_id
          LEFT JOIN products p ON oi.product_id = p.id
          WHERE o.user_id = ?
          GROUP BY o.id, o.total, o.created_at
          ORDER BY o.created_at DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();
$conn->close();
?>
