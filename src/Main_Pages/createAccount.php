<?php include '../Template/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/src/CSS/fonts.css">
    <title>SignUp Page</title>
</head>

    <body class="bg-[#E6E6E6]">
    <section class="flex flex-col flex-wrap mx-auto max-h-screen mt-20 -translate-y-5 w-full max-w-[520px] items-start justify-start border-[1.5px] border-black rounded-lg bg-white">
    <div class="flex justify-start items-center flex-row w-full max-w-[650px] px-8">
        <h1 class="text-2xl font-semibold mt-4">Create an Account</h1>
    </div>
    <div class="flex items-start justify-start w-full max-w-[590px] px-10 pb-5">
    <form action="/src/Main_Pages/signup_process.php" method="POST" class="flex flex-wrap flex-col justify-between h-full w-full max-w-[450px] min-w-0 max-h-[700px] box-border">
            <label class="font-semibold text-lg opacity-75 py-2" for="firstname">First Name <span class="text-red-500 pl-1">*</span></label>
            <input class="flex flex-wrap border border-black rounded-md bg-gray-100 py-2 px-1" type="text" name="firstname" id="firstname" required>
            
            <label class="font-semibold text-lg opacity-75 py-2" for="lastname">Last Name <span class="text-red-500 pl-1">*</span></label>
            <input class="flex flex-wrap border border-black rounded-md bg-gray-100 py-2 px-1" type="text" name="lastname" id="lastname" required>
            
            <label class="font-semibold text-lg opacity-75 py-2" for="email">Email Address <span class="text-red-500 pl-1">*</span></label>
            <input class="flex flex-wrap border border-black rounded-md bg-gray-100 py-2 px-1" type="email" name="email" id="email" required>
            
            <label class="font-semibold text-lg opacity-75 py-2" for="contactnum">Contact Number <span class="text-red-500 pl-1">*</span></label>
            <input class="flex flex-wrap border border-black rounded-md bg-gray-100 py-2 px-1" type="text" name="contactnum" id="contactnum" required>
            
            <label class="font-semibold text-lg opacity-75 py-2" for="address">Address <span class="text-red-500 pl-1">*</span></label>
            <input class="flex flex-wrap border border-black rounded-md bg-gray-100 py-2 px-1" type="text" name="address" id="address" required>
            
            <label class="font-semibold text-lg opacity-75 py-2" for="password">Password <span class="text-red-500 pl-1">*</span></label>
            <div class="relative flex items-center w-full max-w-full">
                <input class="w-full pr-10 box-border border border-black rounded-md bg-gray-100 py-2 px-1" type="password" name="password" id="password" required>
                <button type="button" id="togglepassword" class="absolute right-4 top-3 bg-transparent border-none cursor-pointer">
                    <img class="w-6 h-4" src="/Resources/Images/Icons/password_icon.png" alt="Show Password">
                </button>
            </div>
            <div class="flex justify-center w-full">
                <button class="text-white text-lg font-medium border-none rounded-full bg-blue-600 w-full max-w-[355px] mt-5 py-2 hover:bg-blue-700 transition-all duration-700 ease-in-out" name="signUp" type="submit">Sign Up</button>
            </div>
        </form>
    </div>
    <div class="flex justify-center w-full pb-2">
        <div>
            <h1 class="font-normal text-sm">Already have an account?</h1>
        </div>
        <div>
            <button class="relative bottom-[2px] border-none text-blue-700 bg-white font-medium text-sm pl-1 pb-2" onclick="location.href='signIn.php'">Sign In</button>
        </div>
    </div>
    </section>
</body>

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

    
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, contactnum, address, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstname, $lastname, $email, $contactnum, $address, $password);

    if ($stmt->execute()) {
        header("Location: signIn.php?success=1");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
