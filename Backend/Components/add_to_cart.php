<?php
include '../session_start.php';
include '../../dbconnection/dbconnect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id']; // Ensure the user is logged in
    $product_name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_POST['img'];

    $stmt = $conn->prepare("SELECT id, quantity FROM cart WHERE user_id = ? AND product_name = ?");
    $stmt->bind_param("is", $user_id, $product_name);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $new_quantity = $row['quantity'] + 1;
        $update_stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
        $update_stmt->bind_param("ii", $new_quantity, $row['id']);
        $update_stmt->execute();
    } else {
        $insert_stmt = $conn->prepare("INSERT INTO cart (user_id, product_name, price, img, quantity) VALUES (?, ?, ?, ?, 1)");
        $insert_stmt->bind_param("isds", $user_id, $product_name, $price, $img);
        $insert_stmt->execute();
    }

    echo json_encode(["status" => "success"]);
}
?>
