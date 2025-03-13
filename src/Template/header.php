<?php 

include '../../Backend/session_start.php';
include '../../dbconnection/dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../CSS/output.css" rel="stylesheet">
  <link rel="stylesheet" href="/Gameforge_/src/CSS/fonts.css">
  <script src="../JS/search.js" defer></script>
  <title>GameForge</title>
</head>

<body>
<div class="w-full h-15 bg-[#374AF8]"></div>

<header class="w-full h-19 bg-white shadow-sm">
    <div class="max-w-[1500px] mx-auto flex items-center justify-between px-2 py-4 gap-x-30">
        
        <a href="../../src/Main_Pages/home.php" class="flex items-end px-4">
            <img src="../../Resources/Images/Home/GameforgeLogo.png" alt="GameForge Logo" class="h-10 w-10 mr-4"> 
            <span class="text-[23px] font-blackhan text-[#4388AF]">GameForge</span>
        </a>

        <nav class="hidden md:flex items-center space-x-12 mt-3">
            <a href="../../src/Main_Pages/home.php" class="text-[18px] font-quattrocento text-black hover:text-blue-700 transition-all duration-500 ease-in-out">Home</a>
            <a href="../../src/Main_Pages/aboutus.php" class="text-[18px] font-quattrocento text-black hover:text-blue-700 transition-all duration-500 ease-in-out">About</a>
            <a href="../Products/products.php" class="text-[18px] font-quattrocento text-black hover:text-blue-700 transition-all duration-500 ease-in-out">Shop</a>
            <a href="../../src/Main_Pages/contact.php" class="text-[18px] font-quattrocento text-black hover:text-blue-700 transition-all duration-500 ease-in-out">Contact</a>
        </nav>

        <div class="flex justify-center items-center space-x-6 mt-2 mr-12">
                <!-- Search Bar -->
            <div class="relative">
                <input type="text" id="searchInput" placeholder="Search products..." 
                    class="border border-gray-300 rounded-md px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                
                <button id="searchButton" class="absolute right-2 top-1/2 transform -translate-y-1/2">
                    <img src="../../Resources/Images/Icons/Search.png" alt="Search" class="h-6 w-6">
                </button>

               
            </div>
 
            <!-- Cart Button -->
            <a href="../../src/Main_Pages/cart.php">
                <button class="text-black hover:text-blue-600 flex items-center">
                    <img src="../../Resources/Images/Icons/Cart.png" alt="Cart" class="h-6 w-6">
                </button>
            </a>

            <!-- Profile Button -->
            <a href="../../src/Main_Pages/profile.php">
                <button class="text-black hover:text-blue-600 flex items-center">
                    <img id="profilePic" src="<?php echo isset($_SESSION['profile_image']) && !empty($_SESSION['profile_image']) ? '../../uploads/' . $_SESSION['profile_image'] : '../../Resources/Images/Icons/Profile.png'; ?>?t=<?php echo time(); ?>" 
                        alt="Profile" class="h-7 w-7 rounded-full border border-gray-300">
                </button>
            </a>


            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <span class="text-blue-700 font-semibold"><?= "Hi, " . htmlspecialchars($_SESSION['firstname'] ?? 'User' ); ?></span>

                <form action="../../Backend/logout.php" method="POST" style="display:inline;">
                    <button type="submit" class="font-poppins pb-[1px] text-[14px] border-none text-black hover:text-blue-600 bg-transparent">Logout</button>
                </form>
            <?php else: ?>
                <a href="../../src/Main_Pages/signIn.php" class="border-none text-black hover:text-blue-600">Sign In</a>
            <?php endif; ?>
            </div>
        </div>

        <script>
          
    </script>
</header>
</body>
</html>
