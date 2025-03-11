<?php include '../Template/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/output.css" rel="stylesheet">
    <title>Order History</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar Navigation -->
        <aside class="w-1/3 h-210 mt-10 flex flex-col justify-start items-center gap-10 bg-white border-r-2 border-black p-6">
            <h2 class="text-2xl font-bold text-center mb-6">Account Info</h2>
            <nav class="ml-[-25px] flex flex-col gap-4">
                <a href="profile.php" class="inline-flex text-left text-black font-quicksand font-bold hover:text-blue-600 transition-all duration-700">Profile</a>
                <a href="payments.php" class="inline-flex text-left text-black font-quicksand font-bold hover:text-blue-600 transition-all duration-700 mt-2">Payment</a>
                <a href="orderhistory.php" class="inline-flex text-left text-black font-quicksand font-bold hover:text-blue-600 transition-all duration-700 mt-2">Order History</a>
            </nav>  
        </aside>

        <!-- main cont (tables)-->
        <main class="flex-1 p-10">
            <div class="max-w-5xl mx-[100px] bg-white p-12 rounded-lg shadow">
                <div class="flex-col space-y-4 ml-5">
                    <h1 class="font-poppins font-bold text-base">YOUR ACCOUNT</h1>
                    <span class="font-poppins font-semibold opacity-75">Order History</span>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow mt-4">
                    <h2 class="font-semibold text-lg text-gray-700 mb-4">Your Past Orders</h2>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-300">
                                <th class="p-3 text-gray-700">Items Ordered</th>
                                <th class="p-3 text-gray-700">Quantity</th>
                                <th class="p-3 text-gray-700">Total Price</th>
                                <th class="p-3 text-gray-700">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- for backend purposes -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

<?php include '../Template/footer.php'; ?>
