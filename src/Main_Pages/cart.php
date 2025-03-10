<?php include '../Template/header.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Main_Pages/signIn.php");
    exit(); // Always exit after header redirection
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/src/CSS/fonts.css">
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
    </script>
</head>
<body class="bg-gray-200 p-6">
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

<script>
    function checkout() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        if (cart.length === 0) {
            alert("Your cart is empty.");
            return;
        }

        fetch("cart.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(cart)
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.status === "success") {
                localStorage.removeItem("cart"); // Clear cart after checkout
                loadCart(); // Refresh cart UI
            }
        })
        .catch(error => console.error("Error:", error));
    }
</script>

        </div>
    </div>
</body>
</html>
<?php include '../Template/footer.php';
include '../Database/connection.php'; // Ensure connection to MySQL

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["status" => "error", "message" => "User not logged in."]);
        exit;
    }

    $user_id = $_SESSION['user_id']; // Get logged-in user ID
    $cart = json_decode(file_get_contents('php://input'), true);

    if (empty($cart)) {
        echo json_encode(["status" => "error", "message" => "Cart is empty."]);
        exit;
    }

    // Calculate total price
    $total_price = 0;
    foreach ($cart as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    // Insert into `orders` table
    $stmt = $conn->prepare("INSERT INTO orders (user_id, total, status) VALUES (?, ?, 'pending')");
    $stmt->bind_param("id", $user_id, $total_price);
    if ($stmt->execute()) {
        $order_id = $stmt->insert_id; // Get the last inserted order ID

        // Insert each cart item into `order_items` table
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        foreach ($cart as $item) {
            $stmt->bind_param("iiid", $order_id, $item['id'], $item['quantity'], $item['price']);
            $stmt->execute();
        }

        echo json_encode(["status" => "success", "message" => "Order placed successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to place order."]);
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>
