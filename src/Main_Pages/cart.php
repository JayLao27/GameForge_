<?php 
include '../../Backend/session_start.php';
include '../../Backend/auth_check.php';
include '../Template/header.php';

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM cart WHERE user_id = $user_id");

$cart_items = [];

while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}

// Convert to JSON for JavaScript
$cart_json = json_encode($cart_items);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/Gameforge_/src/CSS/fonts.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../JS/cart.js" defer></script>
    </head> 
<body class="bg-gray-200" data-cart='<?php echo $cart_json; ?>'>

    <div class="max-w-7xl mx-auto mt-20 mb-20 p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-center mb-6">Your Cart</h1>
        
        <!-- Main container using Flexbox -->
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Cart Section -->
            <div class="w-full md:w-2/3 bg-gray-100 p-4 rounded-lg">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="p-4">PRODUCT</th>
                            <th class="p-4">Product name</th>
                            <th class="p-4">Quantity</th>
                            <th class="p-4">Total</th>
                        </tr>
                    </thead>
                    <tbody id="cartItems"></tbody>
                </table>
                <button onclick="clearCart()" class="mt-4 px-4 py-2 bg-red-500 text-white rounded">Clear Cart</button>
            </div>

            <!-- Order Summary Section -->
            <div class="w-full md:w-1/3 bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">Order Summary</h2>
                <p class="text-lg font-semibold">Subtotal: <span id="subtotalPrice">₱0.00</span></p>
                <p class="text-lg">Delivery Fee: <span id="deliveryFee">₱0.00</span></p>
                <p class="text-xl font-bold text-yellow-600 mt-2">Total: <span id="totalPrice">₱0.00</span></p>
                <button onclick="checkout()" class="w-full mt-4 px-6 py-3 bg-blue-600 text-white text-lg font-semibold rounded-lg shadow-lg">
                    CHECKOUT
                </button>
            </div>
        </div>
    </div>

</body>
</html>
<?php include '../Template/footer.php'; ?>
