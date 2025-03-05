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

            document.getElementById("addToCartBtn").addEventListener("click", function() {
                if (product) {
                    addToCart(product);
                }
            });
        });

        function addToCart(product) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let existingProduct = cart.find(item => item.name === product.name);

            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                cart.push({ name: product.name, price: product.price, img: product.img, quantity: 1 });
            }
            
            localStorage.setItem("cart", JSON.stringify(cart));
            alert(`${product.name} added to cart!`);
        }
    </script>
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

</body>
</html>