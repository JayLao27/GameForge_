<?php include '../Template/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/src/CSS/fonts.css">
</head>
<body>

<div class="w-full max-w-4xl mx-auto p-6 h-auto mt-15 mb-25 rounded-sm bg-[#E6E6E6]">
    <h2 class="text-3xl font-medium font-quicksand text-center mb-4">Your Cart</h2>

    <div id="cartItems"></div>

    <div id="orderSummary" class="mt-6 bg-gray-100 p-4 rounded-lg shadow-md w-1/3 ml-auto">
        <h3 class="font-semibold text-lg mb-2">Order Summary</h3>
        <div class="flex justify-between">
            <p>Subtotal :</p>
            <p class="font-bold" id="subtotal">₱ 0.00</p>
        </div>
        <div class="flex justify-between mt-2 border-t pt-2">
            <p>Total :</p>
            <p class="font-bold" id="total">₱ 0.00</p>
        </div>
    </div>

    <div class="mt-4 flex justify-end">
        <button class="bg-[#FBFF10] font-poppins text-black px-6 py-3 rounded-lg hover:bg-blue-700 transition-all duration-700 ease-in-out hover:text-white">
            CHECKOUT
        </button>
    </div>
</div>

<script>
    function addToCart() {
        const productName = document.getElementById("productName").textContent;
        const productPrice = document.getElementById("productPrice").textContent;
        const productImage = document.getElementById("productImage").src;

        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        cart.push({ name: productName, price: productPrice, img: productImage });

        localStorage.setItem("cart", JSON.stringify(cart));
        window.location.href = "cart.php";
    }

    document.addEventListener("DOMContentLoaded", function () {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let cartHTML = "";
        let totalPrice = 0;

        if (cart.length === 0) {
            document.getElementById("cartItems").innerHTML = "<p class='text-center text-lg'>Your cart is empty.</p>";
            document.getElementById("orderSummary").style.display = "none";
        } else {
            cart.forEach((item, index) => {
                totalPrice += parseFloat(item.price.replace("₱", "").replace(",", ""));
                cartHTML += `
                    <div class="border-t border-gray-300 pt-4 flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <img src="${item.img}" alt="${item.name}" class="w-16 h-16 object-cover">
                            <p class="text-lg">${item.name}</p>
                        </div>
                        <p class="text-lg font-bold">${item.price}</p>
                        <button onclick="removeFromCart(${index})" class="text-red-500 hover:text-red-700">Remove</button>
                    </div>
                `;
            });

            document.getElementById("cartItems").innerHTML = cartHTML;
            document.getElementById("subtotal").textContent = `₱ ${totalPrice.toFixed(2)}`;
            document.getElementById("total").textContent = `₱ ${totalPrice.toFixed(2)}`;
        }
    });

    function removeFromCart(index) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        cart.splice(index, 1);
        localStorage.setItem("cart", JSON.stringify(cart));
        location.reload();
    }
</script>

<?php include '../Template/footer.php'; ?>
</body>
</html>