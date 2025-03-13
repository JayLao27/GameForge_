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
    <script src="../JS/cart.js" defer></script>
</head> 
<body class="bg-gray-200" data-cart='<?php echo $cart_json; ?>'>

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-20 mb-20">
        <h1 class="text-2xl font-bold text-center mb-6">Your Cart</h1>
        <div class="bg-gray-100 p-4 rounded-lg">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="p-5">PRODUCT</th>
                        <th class="p-5">Name</th>
                        <th class="p-5">Quantity</th>
                        <th class="p-5">Total</th>
                        <th class="p-5">Action</th>
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
