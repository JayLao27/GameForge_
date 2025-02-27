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
<div class="w-full max-w-4xl mx-auto p-6 h-[600px] mt-15 mb-25 rounded-sm bg-[#E6E6E6]">
    <h2 class="text-3xl font-medium font-quicksand text-center mb-4">Your Cart</h2>

    <div class="border-t border-gray-300 pt-4 flex justify-between">
        <div class="flex items-center space-x-4">
            <img src="/Resources/Images/laptop-png-8 3.png" alt="Laptop" class="w-16 h-16 object-cover">
            <p class="text-lg">Laptop</p>
        </div>
        <p class="text-lg font-bold">₱ 30,000</p>
    </div>

    <div class="mt-6 bg-gray-100 p-4 rounded-lg shadow-md w-1/3 ml-auto">
        <h3 class="font-semibold text-lg mb-2">Order Summary</h3>
        <div class="flex justify-between">
            <p>Subtotal :</p>
            <p class="font-bold">₱ 30,000</p>
        </div>
        <div class="flex justify-between mt-2 border-t pt-2">
            <p>Total :</p>
            <p class="font-bold">₱ 30,000</p>
        </div>
    </div>

    <div class="mt-4 flex justify-end">
        <button class="bg-[#FBFF10] font-poppins text-black px-6 py-3 rounded-lg hover:bg-blue-700 transition-all duration-700 ease-in-out hover:text-white">
            CHECKOUT
        </button>
    </div>
</div>

<?php include '../Template/footer.php'; ?>
</body>
</html>
