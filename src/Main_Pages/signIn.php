<?php include '../Template/header.php'; ?>

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/src/CSS/fonts.css">
    <title>SignIn Page</title>
</head>

    <body class="bg-[#E6E6E6]">
        <section class="flex flex-col flex-wrap mx-auto mt-32 w-full h-full max-w-md max-h-[469px] items-start justify-center border-[1.5px] border-black rounded-lg bg-white">
            <div class="flex justify-start items-center flex-row w-full max-w-lg px-8">
                <h1 class="text-2xl font-semibold mt-4">Log in to your account</h1>
            </div>
        
            <div class="flex items-start justify-start w-full max-w-lg px-8 py-2 pb-5">
                <form class="flex flex-wrap flex-col justify-around items-start h-72 w-full max-w-sm box-border">
                    <label for="email" class="font-semibold text-lg opacity-75">Email <span class="text-red-700 pl-1">*</span></label>
                    <input type="email" name="email" id="email" required class="border border-black rounded-md bg-gray-100 px-2 py-2 w-full">
                    
                    <label for="password" class="font-semibold text-lg opacity-75">Password <span class="text-red-700 pl-1">*</span></label>
                    <div class="relative w-full flex items-center">
                        <input type="password" name="password" id="password" required class="border border-black rounded-md bg-gray-100 px-2 py-2 w-full pr-10">
                        <button type="button" id="togglepassword" class="absolute right-4 top-3 bg-transparent border-none cursor-pointer">
                            <img src="/Resources/Images/Icons/password_icon.png" alt="Show Password" class="w-6 h-4">
                        </button>
                    </div>
                    
                    <div class="flex justify-center w-full">
                        <button name="signInbtn" class="text-white text-lg font-medium border-none rounded-2xl bg-blue-600 w-full max-w-lg mt-5 py-2 hover:bg-blue-700 transition-all duration-700 ease-in-out">Sign In</button>
                    </div>
                </form>
            </div>
            
            <div class="flex justify-center w-full pb-10">
                <h1 class="text-sm font-normal">Don't have an account?</h1>
                <button class="border-none text-blue-600 bg-white font-medium text-sm pl-1 hover:text-blue-800" onclick="location.href='createAccount.php'">Sign up now</button>
            </div>
        </section>
    </body> 
</html>

<?php

    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<p class='text-green-600'>Account created successfully. Please log in.</p>";
    }
?>
