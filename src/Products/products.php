<?php 
include '../Template/header.php'; 
include '../../Backend/session_start.php';
include '../../Backend/auth_check.php';
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/src/CSS/fonts.css">
    <script src="../JS/products.js" defer></script>
</head>
<body class="bg-[#E6E6E6] min-h-screen">
    <div class="flex min-h-screen">
        <aside class="w-1/6 p-7">
        <div id="cartMessage" class="hidden bg-green-500 text-white px-4 py-2 rounded shadow-lg fixed top-40 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
    Item added to cart!
</div>


            <h2 class="text-3xl font-bold mx-4 my-4 mb-6">Category</h2>
            <nav class="mt-4 space-y-2">
            <button onclick="renderProducts('Mouse')" class="block w-60 text-left px-4 py-2 rounded-lg bg-gray-300 hover:bg-blue-700 hover:text-white font-bold transition-all">Mouse</button>
            <button onclick="renderProducts('Headset')" class="block w-60 text-left px-4 py-2 rounded-lg bg-gray-300 hover:bg-blue-700 hover:text-white font-bold transition-all">Headset</button>
            <button onclick="renderProducts('Laptops')" class="block w-60 text-left px-4 py-2 rounded-lg bg-gray-300 hover:bg-blue-700 hover:text-white font-bold transition-all">Laptops</button>
            <button onclick="renderProducts('')" class="block w-60 text-left px-4 py-2 rounded-lg bg-gray-300 hover:bg-blue-700 hover:text-white font-bold transition-all">All</button>

            </nav>
        </aside>
        
        <main class="flex-1">
            <div class="flex justify-end mb-4 mt-4 mr-4">
            <a href="../Main_pages/cart.php" 
            class="bg-white text-black px-4 mr-5 py-2 rounded transition 
          hover:bg-blue-500
          active:bg-blue-500 active:text-white flex items-center space-x-2">
                 <img src="../../Resources/Images/Icons/Cart.png" class="invert brightness-0 w-6" alt=""> 
                <span>Cart</span>
                </a>
                <button id="priceFilter" class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow">
                    Price range: <span id="priceOrder">High to Low</span> <span>&#9662;</span>
                </button>
            </div>

            <div id="productGrid" class="grid grid-cols-3 gap-4 mb-70"></div>
        </main>
    </div>

   
<?php include '../Template/footer.php'; ?>
</body>
</html>
