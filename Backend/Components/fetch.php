<?php

include '../../dbconnection/dbconnect.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT username, firstname, lastname, email, profile_image FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['profile_image'] = $row['profile_image']; 
}
$profile_image = !empty($profile_image) ? '../../uploads/' . $profile_image : '../../Resources/Images/Icons/Profile.png';
?>
$stmt->close();
$conn->close();
?>
