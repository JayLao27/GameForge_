<?php 
include '../Template/header.php';
include '../../Backend/session_start.php';
include '../../Backend/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/Gameforge_/src/CSS/fonts.css">
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            loadCart();
        });

        function loadCart() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            const cartContainer = document.getElementById("cartItems");
            cartContainer.innerHTML = "";
            let total = 0;

            if (cart.length === 0) {
                cartContainer.innerHTML = "<tr><td colspan='3' class='p-4 text-center'>Your cart is empty.</td></tr>";
            } else {
                cart.forEach((item, index) => {
                    let itemTotal = item.price * item.quantity;
                    total += itemTotal;
                    cartContainer.innerHTML += `
                        <tr class="border-b">
                            <td class="p-4 flex items-center">
                                <img src="${item.img}" alt="${item.name}" class="w-30 h-16 rounded-md mr-4">
                                ${item.name}
                            </td>
                            <td class="p-4 flex items-center space-x-2">
                                <button onclick="updateQuantity(${index}, -1)" class="px-3 py-1 bg-gray-200 rounded">-</button>
                                <span class="px-3 py-1 border rounded">${item.quantity}</span>
                                <button onclick="updateQuantity(${index}, 1)" class="px-3 py-1 bg-gray-200 rounded">+</button>
                            </td>
                            <td class="p-4">₱${itemTotal.toFixed(2)}</td>
                            <td class="p-4">
                                <button onclick="removeFromCart(${index})" class="text-red-600 font-semibold">Remove</button>
                            </td>
                        </tr>`;
                });
            }
            document.getElementById("totalPrice").textContent = `₱${total.toFixed(2)}`;
        }

        function updateQuantity(index, change) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            if (cart[index].quantity + change > 0) {
                cart[index].quantity += change;
            }
            localStorage.setItem("cart", JSON.stringify(cart));
            loadCart();
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            loadCart();
        }

        function clearCart() {
            localStorage.removeItem("cart");
            loadCart();
        }

        function checkout() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            if (cart.length === 0) {
                alert("Your cart is empty.");
                return;
            }

            fetch("cart_backend.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(cart)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    localStorage.removeItem("cart"); 
                    loadCart(); 
                    alert("Checkout successful!");
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("An error occurred while checking out. Please try again later.");
            });
        }
    </script>
</head> 
<body class="bg-gray-200">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-20 mb-20">
        <h1 class="text-2xl font-bold text-center mb-6">Your Cart</h1>
        <div class="bg-gray-100 p-4 rounded-lg">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="p-4">PRODUCT</th>
                        <th class="p-4">Quantity</th>
                        <th class="p-4">Total</th>
                        <th class="p-4">Action</th>
                    </tr>
                </thead>
                <tbody id="cartItems"></tbody>
            </table>
            <button onclick="clearCart()" class="mt-4 px-4 py-2 bg-red-500 text-white rounded">Clear Cart</button>
        </div>
        <div class="mt-6 text-right">
            <p class="text-xl font-semibold">Total: <span id="totalPrice">₱0.00</span></p>
            <button onclick="checkout()" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">CHECKOUT</button>
        </div>
    </div>
</body>
</html>
<?php include '../Template/footer.php'; ?>
