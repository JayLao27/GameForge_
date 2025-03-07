
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sidebar UI</title>
</head>
<body class="bg-gray-200">

<aside class="w-64 bg-white shadow-md p-4 h-screen fixed">
    <ul class="space-y-4">
        <li>
            <a href="admindashboard.php" class="flex items-center space-x-3 text-gray-700 hover:text-black">
                <span>🏠</span>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="products.php" class="flex items-center space-x-3 text-gray-700 hover:text-black">
                <span>📦</span>
                <span>Products</span>
            </a>
        </li>
        <li>
            <a href="order.php" class="flex items-center space-x-3 text-gray-700 hover:text-black">
                <span>🔒</span>
                <span>Orders</span>
            </a>
        </li>
        <li>
            <a href="customer.php" class="flex items-center space-x-3 text-gray-700 hover:text-black">
                <span>👤</span>
                <span>Customers</span>
            </a>
        </li>
    </ul>
</aside>

</body>
</html>
