<?php 

include '../../Backend/session_start.php';
include '../../Backend/auth_check.php';
include '../Template/header.php';

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM cart WHERE user_id = $user_id");


while ($row = $result->fetch_assoc()) {
    echo "<div>
            <img src='{$row['img']}' width='100'>
            <p>{$row['product_name']}</p>
            <p>₱{$row['price']} x {$row['quantity']}</p>
          </div>";
      
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/Gameforge_/src/CSS/fonts.css">
    <script src="cart.js" defer></script>
      
   
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
            <button onclick="clearCart()" class="mt-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 transition-all duration-400">Clear Cart</button>
        </div>
        <div class="mt-6 text-right">
            <p class="text-xl font-semibold">Total: <span id="totalPrice">₱0.00</span></p>
            <button onclick="checkout()" class="mt-4 px-4 py-2 bg-[#FBFF10] text-black hover:text-white hover:bg-blue-600 transition-all duration-400 rounded">CHECKOUT</button>
        </div>
    </div>
</body>
</html>
<?php include '../Template/footer.php'; ?>
