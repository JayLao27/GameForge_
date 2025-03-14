<?php
include '../../Backend/session_start.php';
include '../Template/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.5/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/fonts.css">
    <title>SignIn Page</title>
</head>

<body class="bg-[#E6E6E6]">

        <?php if (isset($_SESSION['error_message'])): ?>
            <div id="error-message" class="bg-red-600 text-white opacity-75 absolute px-4 py-2 rounded-lg shadow-md w-full text-center">
                <?php echo htmlspecialchars($_SESSION['error_message']); ?>
            </div>
            <script>
                setTimeout(() => document.getElementById("error-message").remove(), 5000);
            </script>
        <?php
            unset($_SESSION['error_message']);
        endif;
        ?>
    <section class="flex flex-col flex-wrap mx-auto mt-32 w-full h-full max-w-md max-h-[469px] items-start justify-center border-[1.5px] border-black rounded-lg bg-white">
        <div class="flex justify-start items-center flex-row w-full max-w-lg px-8">
            <h1 class="text-2xl font-semibold mt-4">Log in to your account</h1>
        </div>

        <!-- Display Error Message -->

        <div class="flex items-start justify-start w-full max-w-lg px-8 py-2 pb-5">
            <form method="POST" action="../../Backend/authentication.php" class="flex flex-wrap flex-col justify-around items-start h-72 w-full max-w-sm box-border">
                
                <!-- Changed label and input from email to username -->
                <label for="username" class="font-semibold text-lg opacity-75">Username <span class="text-red-700 pl-1">*</span></label>
                <input type="text" name="username" id="username" required class="border border-black rounded-md bg-gray-100 px-2 py-2 w-full">
                
                <label for="password" class="font-semibold text-lg opacity-75">Password <span class="text-red-700 pl-1">*</span></label>
                <div class="relative w-full flex items-center">
                    <input type="password" name="password" id="password" required class="border border-black rounded-md bg-gray-100 px-2 py-2 w-full pr-10">
                </div>
                
                <div class="flex justify-center w-full">
                    <button type="submit" name="signInbtn" class="text-white text-lg font-medium border-none rounded-2xl bg-blue-600 w-full max-w-lg mt-5 py-2 hover:bg-blue-700 transition-all duration-700 ease-in-out">Sign In</button>
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
