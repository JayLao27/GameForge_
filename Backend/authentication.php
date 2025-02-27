<?php
session_start();
include '../dbconnection/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contactnum = $_POST['contactnum'];
    $address = $_POST['address'];
    $reg_confirm_password = $_POST['password'];

    if ($password!= $reg_confirm_password) {
        echo "<script>alert('Password and Confirm Password do not match');</script>";
        exit();
    }
    $hashed_password = password_hash($reg_password, PASSWORD_DEFAULT);


    
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Email already in use.";
        exit;
    }
   
    // 
    // Query to insert the user
    $sql = "INSERT INTO users (firstname, lastname, email, contactnum, address, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    
    $stmt->bind_param("ssssss", $firstname, $lastname, $email, $contactnum, $address, $hashed_password);
    $stmt->execute();

    if ($stmt->execute()) {
        
        echo "<script>alert('User Login successfully');</script>";
        exit;
    } else {
       echo "<script>alert('Error Login user');</script>";
    }

    $stmt->close();
    $conn->close();


}
?>
