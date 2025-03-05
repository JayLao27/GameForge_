<?php include '../Template/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sidebar UI</title>
</head>
<body class="bg-gray-200">

    <div class="flex h-screen mt-10 mb-10">
        <!-- Sidebar -->
        <aside class="w-64  mb-10 bg-white shadow-md p-4 flex flex-col justify-between">
            <div>
                <ul class="space-y-4">
                    <li>
                        <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-black">
                            <span>🏠</span>
                            <span>Dashboard</span>
                            <span class="ml-auto">▶</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-black">
                            <span>📦</span>
                            <span>Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-black">
                            <span>🔒</span>
                            <span>Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-black">
                            <span>👤</span>
                            <span>Customers</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Sign Out Button -->
            <button class="flex items-center justify-center w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                <span>🔄</span>
                <span class="ml-2">Sign Out</span>
            </button>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-xl font-semibold">Main Content</h1>
        </main>
    </div>

</body>
</html>
<?php include '../Template/footer.php'; ?>