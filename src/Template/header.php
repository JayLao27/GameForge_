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
  <title>GameForge</title>
</head>

<body>
<div class="w-full h-15 bg-[#374AF8]"></div>

<header class="w-full h-19 mt-8 bg-white shadow-sm">
    <div class="max-w-[1500px] mx-auto flex items-center justify-between px-2 py-4 gap-x-30">
        
        <a href="../../src/Main_Pages/home.php" class="flex items-end px-4">
            <img src="../../Resources/Images/Home/GameforgeLogo.png" alt="GameForge Logo" class="h-10 w-10 mr-4"> 
            <span class="text-[23px] font-blackhan text-[#4388AF]">GameForge</span>
        </a>

        <nav class="hidden md:flex items-center space-x-12 mt-3">
            <a href="../../src/Main_Pages/home.php" class="text-[18px] font-quattrocento text-black hover:text-blue-700  ">Home</a>
            <a href="../../src/Main_Pages/aboutus.php" class="text-[18px] font-quattrocento text-black hover:text-blue-700  ">About</a>
            <a href="../Products/products.php" class="text-[18px] font-quattrocento text-black hover:text-blue-700 ">Shop</a>
            <a href="../../src/Main_Pages/contact.php" class="text-[18px] font-quattrocento text-black hover:text-blue-700 ">Contact</a>
        </nav>

        <div class="flex justify-center items-center space-x-6 mt-2 mr-12">
                <!-- Search Bar -->
            <div class="relative">
                <input type="text" id="searchInput" placeholder="Search products..." 
                    class="border border-gray-300 rounded-md px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                
                <button id="searchButton" class="absolute right-2 top-1/2 transform -translate-y-1/2">
                    <img src="../../Resources/Images/Icons/Search.png" alt="Search" class="h-6 w-6">
                </button>

                <div id="searchResults" class="absolute bg-white w-full shadow-md mt-1 hidden">
                    <!-- Search results will be displayed here -->
                </div>
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
                <span class="text-black font-semibold"><?= "Hi, " . htmlspecialchars($_SESSION['firstname'] ?? 'User' ); ?></span>

                <form action="../../Backend/logout.php" method="POST" style="display:inline;">
                    <button type="submit" class="border-none text-black hover:text-bl   ue-600 bg-transparent">Logout</button>
                </form>
            <?php else: ?>
                <a href="../../src/Main_Pages/signIn.php" class="border-none text-black hover:text-blue-600">Sign In</a>
            <?php endif; ?>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const searchButton = document.getElementById("searchButton");
    const searchResults = document.getElementById("searchResults");

    function filterProducts(query) {
        query = query.toLowerCase().trim();
        searchResults.innerHTML = "";
        searchResults.classList.add("hidden");

        if (query.length === 0) return;

        let matchedProducts = [];

        for (const category in products) {
            products[category].forEach(product => {
                if (product.name.toLowerCase().startsWith(query)) { // Match only first letter
                    matchedProducts.push(product);
                }
            });
        }

        if (matchedProducts.length > 0) {
            searchResults.classList.remove("hidden");

            matchedProducts.slice(0, 7).forEach(product => { // Limit to 7 results
                const resultItem = document.createElement("div");
                resultItem.className = "p-2 hover:bg-gray-100 cursor-pointer flex items-center";
                resultItem.innerHTML = `
                    <img src="${product.img}" alt="${product.name}" class="h-10 w-10 mr-2">
                    <span class="text-sm">${product.name}</span>
                `;

                resultItem.addEventListener("click", function () {
                    window.location.href = `productpage.php?name=${encodeURIComponent(product.name)}`;
                });

                searchResults.appendChild(resultItem);
            });

            if (matchedProducts.length > 7) {
                searchResults.style.maxHeight = "200px"; // Set a height for scrolling
                searchResults.style.overflowY = "auto"; // Enable vertical scroll
            } else {
                searchResults.style.maxHeight = "unset"; // Reset if less than 7
                searchResults.style.overflowY = "hidden";
            }
        }
    }

    searchInput.addEventListener("input", function () {
        filterProducts(this.value);
    });

    searchButton.addEventListener("click", function () {
        filterProducts(searchInput.value);
    });

        searchInput.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Prevents form submission if inside a form
            const query = searchInput.value.trim();
            if (query.length > 0) {
                window.location.href = `products.php?search=${encodeURIComponent(query)}`;
            }
        }
    });

    document.addEventListener("click", function (event) {
        if (!searchResults.contains(event.target) && event.target !== searchInput) {
            searchResults.classList.add("hidden");
        }
    });
});
    </script>
</header>
</body>
</html>
