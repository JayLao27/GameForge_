<?php include '../Template/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="styles.css"> 
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/src/CSS/fonts.css">
    <script src="products.js"></script>


</head>
<body class="bg-[#E6E6E6] flex flex-col items-center justify-center min-h-screen">

    <div class="bg-[#E6E6E6] p-6 rounded-lg shadow-lg w-full max-w-8xl mx-auto flex gap-6">
        <div class="w-1/2">
            <div class="bg-white p-4 rounded-lg shadow">
                <img id="productImage" class="w-full h-auto rounded-lg" src="https://via.placeholder.com/300" alt="Product Image">
            </div>
        </div>
        <div class="w-1/2 pl-6">
            <h1 id="productName" class="text-[50px] font-bold mb-4 pl-4">Product Name</h1>
            <p id="productPrice" class="text-xl text-gray-700 font-semibold mb-4"><strong>Price:</strong> ₱0.00</p>

            <button id="addToCartBtn" class="w-full bg-yellow-400 text-black py-2 rounded-md font-semibold hover:text-white hover:bg-blue-600 transition-all duration-700">
                Add to Cart
            </button>   
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
    if (typeof products === "undefined") {
        alert("Products data is missing.");
        return;
    }

    const urlParams = new URLSearchParams(window.location.search);
    const productName = urlParams.get("name");

    if (!productName) {
        document.getElementById("productName").textContent = "Product not found.";
        return;
    }

    let foundProduct = null;
    for (const category in products) {
        if (!products[category]) continue;
        foundProduct = products[category].find(p => p.name.trim() === productName.trim());
        if (foundProduct) break;
    }

    if (foundProduct) {
        document.getElementById("productImage").src = foundProduct.img;
        document.getElementById("productName").textContent = foundProduct.name;
        document.getElementById("productPrice").textContent = `₱ ${foundProduct.price.toFixed(2)}`;

        // ✅ Add event listener to the button
        document.getElementById("addToCartBtn").addEventListener("click", function () {
            addToCart(foundProduct);
        });
    } else {
        document.getElementById("productName").textContent = "Product not found.";
    }
});

    </script>

</body>
</html>
