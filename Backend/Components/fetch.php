<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../../dbconnection/dbconnect.php'; 

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Fetch the first name from the database
    $query = "SELECT firstname FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $_SESSION['firstname'] = $row['firstname']; // Store first name in session
        }
        $stmt->close();
    }
}
?>
