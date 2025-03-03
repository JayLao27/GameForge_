<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="styles.css"> 
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const urlParams = new URLSearchParams(window.location.search);
            const productName = urlParams.get("name");

            const products = [
                { name: "Motospeed V30 Gaming Mouse Black", price: 3999, img: "../../Resources/Images/Products/Mouse/Motospeed V30 Gaming Mouse Black.png" },
                { name: "Motospeed V90 Gaming Mouse Black", price: 2999, img: "../../Resources/Images/Products/Mouse/Motospeed V90 Gaming Mouse Black.png" },
                { name: "Motospeed V400 Gaming Mouse Black", price: 2999, img: "../../Resources/Images/Products/Mouse/Motospeed V400 Gaming Mouse Black.png" },
                { name: "Motospeed Darmoshark N1 Gaming Mouse Black", price: 1999, img: "../../Resources/Images/Products/Mouse/Motospeed Darmoshark N1 Gaming Mouse Black.png" },
                { name: "Logitech M170 Wireless Mouse Black", price: 999, img: "../../Resources/Images/Products/Mouse/Logitech M170 Wireless Mouse Black.png" },
                { name: "Philips M344 Wireless Mouse Black", price: 999, img: "../../Resources/Images/Products/Philips.png" },
                { name: "Logitech M171 Wireless Mouse Gray", price: 899, img: "../../Resources/Images/Products/Mouse/Logitech M171 Wireless Mouse Gray.png" },
                { name: "Prolink PMC1007 Optical Mouse Wired Champagne", price: 799, img: "../../Resources/Images/Products/Mouse/Prolink PMC1007 Optical Mouse Wired Champagne.png" },
                { name: "Logitech M221 Silent Wireless Mouse Blue", price: 599, img: "../../Resources/Images/Products/Mouse/Logitech M221 Silent Wireless Mouse Blue.png" },
                { name: "Prolink PMC2002 Optical Mouse Wired", price: 599, img: "../../Resources/Images/Products/Mouse/Prolink PMC2002 Optical Mouse Wired.png" },
                { name: "Logitech B100 Optical USB Mouse", price: 299, img: "../../Resources/Images/Products/Mouse/Logitech B100 Optical USB Mouse.png" }
            ];

            const product = products.find(p => p.name === productName);

            if (product) {
                document.getElementById("productImage").src = product.img;
                document.getElementById("productName").textContent = product.name;
                document.getElementById("productPrice").textContent = `₱ ${product.price.toFixed(2)}`;
            } else {
                document.getElementById("productDetails").innerHTML = "<p>Product not found.</p>";
            }
        });
    </script>
</head>
<body class="bg-[#E6E6E6] flex flex-col items-center justify-center min-h-screen">
    
    <!-- Include header inside the body -->
    <?php include '../Template/header.php'; ?>

      <div class="bg-[#E6E6E6] p-6 rounded-lg shadow-lg w-full max-w-8xl mx-auto flex gap-6">
    <div class="w-1/2">
    <div class="bg-white p-4 rounded-lg shadow">
        <img id="productImage" class="w-full h-auto rounded-lg" src="https://via.placeholder.com/300" alt="Product Image">
    </div>
</div>
<div class="w-1/2 pl-6">
            <!-- Product Name -->
            <h1 id="productName" class="text-[50px] font-bold mb-4 pl-4">
                MSI Thin 15 B13VE-1831PH Gaming Laptop (Cosmos Grey) | 15.6" FHD (1920x1080) 144Hz IPS | i5-13420H | 8GB Ram | 512GB SSD | RTX 4050 | Windows 11 Home | MSI Gaming Backpack
            </h1>
            <!-- Product Specifications -->
            <p class="text-gray-700 text-[20px] mb-4 leading-6">
                <strong>PROCESSOR:</strong> 13th Gen Intel Core i5-13420H <br>
                <strong>DISPLAY:</strong> 15.6" FHD (1920x1080), 144Hz <br>
                <strong>MEMORY:</strong> 8GB, DDR4-3200 <br>
                <strong>STORAGE:</strong> 512GB NVME PCIe SSD <br>
                <strong>GPU:</strong> NVIDIA GeForce RTX 4050 <br>
                <strong>OS:</strong> Windows 11 Home
            </p>

            <!-- Price -->
            <p id="productPrice" class="text-xl text-gray-700 font-semibold mb-4"><Strong class="text-black">Price :</Strong>₱49,999.00</p>

            <!-- Stock Status -->
            <p class="text-green-600 font-semibold mb-4"><Strong class="text-black">Stock: </Strong>In Stock</p>

            <!-- Quantity Selector -->
            <div class="flex items-center space-x-2 mb-4">
                <strong>Quantity</strong>
            <button class="px-3 py-1 bg-gray-200 rounded">-</button>
                <span class="px-3 py-1 border rounded">1</span>
                <button class="px-3 py-1 bg-gray-200 rounded">+</button>
            </div>

            <!-- Add to Cart Button -->
            <button onclick="addToCart()" class="w-full bg-yellow-400 text-black py-2 rounded-md font-semibold">
                Add to Cart
            </button>
        </div>
    </div>

    <script>
        function addToCart() {
            alert("Product added to cart!");
        }
    </script>
</body>
</html>
