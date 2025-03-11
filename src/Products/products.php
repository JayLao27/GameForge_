<?php include '../Template/header.php'; 
include '../../Backend/session_start.php';
include '../../Backend/auth_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/src/CSS/fonts.css">
    <script src="products.js" defer></script>
</head>
<body class="bg-[#E6E6E6] min-h-screen">
    <div class="flex min-h-screen">
        <aside class="w-1/6 p-4">
            <h2 class="text-3xl font-bold mx-4 my-4">Category</h2>
            <nav class="mt-4 space-y-2">
            <button onclick="renderProducts('Mouse')" class="block w-full text-left px-4 py-2 rounded-lg bg-gray-300 hover:bg-blue-700 hover:text-white font-bold transition-al">Mouse</button>
            <button onclick="renderProducts('Headset')" class="block w-full text-left px-4 py-2 rounded-lg bg-gray-300 hover:bg-blue-700 hover:text-white font-bold transition-all">Headset</button>
            <button onclick="renderProducts('Laptops')" class="block w-full text-left px-4 py-2 rounded-lg bg-gray-300 hover:bg-blue-700 hover:text-white font-bold transition-all">Laptops</button>
            </nav>
        </aside>
        
        <main class="flex-1">
            <div class="flex justify-end mb-4 mt-4 mr-4">
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
