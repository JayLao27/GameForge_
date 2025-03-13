<?php
include '../../Backend/session_start.php';
include '../../dbconnection/dbconnect.php';

$user_id = 1; // Always use user_id = 1

$query = "SELECT o.id, o.total, o.created_at, 
                 COALESCE(GROUP_CONCAT(DISTINCT p.image_url SEPARATOR ','), 'default.png') AS image_urls, 
                 COALESCE(GROUP_CONCAT(DISTINCT p.name SEPARATOR ', '), 'No Product') AS product_names
          FROM orders o
          LEFT JOIN order_items oi ON o.id = oi.order_id
          LEFT JOIN products p ON oi.product_id = p.id
          WHERE o.user_id = ?
          GROUP BY o.id, o.total, o.created_at
          ORDER BY o.created_at DESC"; // Orders appear from newest to oldest

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h2>Your Orders:</h2>";
    echo "<table border='1'>
            <tr>
                <th>Order ID</th>
                <th>Products</th>
                <th>Images</th>
                <th>Total</th>  
                <th>Created At</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        $product_names = $row['product_names'];
        $image_urls = explode(',', $row['image_urls']); // Handle multiple images
        
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$product_names}</td>
                <td>";
        
        foreach ($image_urls as $image) {
            echo "<img src='../../uploads/{$image}' alt='Product Image' width='80' height='80' style='margin: 5px;'>";
        }

        echo "</td>
                <td>₱" . number_format($row['total'], 2) . "</td>
                <td>{$row['created_at']}</td>
              </tr>";
    }
    
    echo "</table>";
} else {
    echo "<p>No orders found.</p>";
}

$stmt->close();
$conn->close();
?>
