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
  <title>GameForge</title>
</head>

<body>
<div class="w-full h-15 bg-[#374AF8]"></div>

<header class="w-10/12 h-19 mt-8 bg-white shadow-sm">
    <div class="max-w-[1500px] mx-auto flex items-center justify-between px-2 py-4 gap-x-30">
        
        <a href="../../src/Main_Pages/home.php" class="flex items-end px-4">
            <img src="../../Resources/Images/Home/GameforgeLogo.png" alt="GameForge Logo" class="h-10 w-10 mr-4"> 
            <span class="text-[23px] font-blackhan text-[#4388AF]">GameForge</span>
        </a>

        <nav class="hidden md:flex items-center space-x-12 mt-3">
            <a href="../../src/Main_Pages/home.php" class="text-[18px] font-quattrocento text-black hover:text-blue-700 transition-all duration-700 ease-in-out">Home</a>
            <a href="" class="text-[18px] font-quattrocento text-black hover:text-blue-700 transition-all duration-700 ease-in-out">About</a>
            <a href="../Products/mouse.php" class="text-[18px] font-quattrocento text-black hover:text-blue-700 transition-all duration-700 ease-in-out">Shop</a>
            <a href="../../src/Main_Pages/contact.php" class="text-[18px] font-quattrocento text-black hover:text-blue-700 transition-all duration-700 ease-in-out">Contact</a>
        </nav>

        <div class="flex justify-center items-center space-x-6 mt-2 mr-12">
            <button class="text-black hover:text-blue-600">
                <img src="../../Resources/Images/Icons/Search.png" alt="Search" class="h-6 w-6">
            </button>
            <a href="../../src/Main_Pages/cart.php">
                <button class="text-black hover:text-blue-600 flex items-center">
                    <img src="../../Resources/Images/Icons/Cart.png" alt="Cart" class="h-6 w-6">
                </button>
            </a>
            <button class="text-black hover:text-blue-600">
                <img src="../../Resources/Images/Icons/Profile.png" alt="User Profile" class="h-6 w-6">
            </button>

            <?php if (isset($_SESSION['username'])): ?>
                <span class="text-black font-semibold"><?= htmlspecialchars($_SESSION['username']); ?></span>
                <a href="../../src/Main_Pages/logout.php" class="border-none text-black hover:text-blue-600">Logout</a>
            <?php else: ?>
                <a href="../../src/Main_Pages/signIn.php" class="border-none text-black hover:text-blue-600">Sign In</a>
            <?php endif; ?>
        </div>
    </div>
</header>
</body>
</html>
