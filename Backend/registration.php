<?php

include '../../dbconnection/dbconnect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $contactnum = trim($_POST['contactnum']);
    $address = trim($_POST['address']);
    
   
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
  
    if ($stmt->num_rows > 0) {
        echo "Email already in use.";
        exit;
    }
    $stmt->close();

    // Insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, contactnum, address, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstname, $lastname, $email, $contactnum, $address, $password);

    // Execute the statement and check if the user was added successfully
    if ($stmt->execute()) {
        // Redirect to the sign-in page with a success message
        header("Location: signIn.php?success=1");
        exit;
    } else {
        // Display an error message if insertion fails
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>