<?php 
include '../Template/header.php';
include '../../Backend/session_start.php';
include '../../dbconnection/dbconnect.php';
include '../../Backend/Components/fetch.php';

$user_id = $_SESSION['user_id'] ?? 0;

if ($user_id > 0) {
    fetchWalletBalance($conn, $user_id);
}

$balance = $_SESSION['balance'] ?? 0.00; // Get the balance from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="../src/CSS/fonts.css">
    <title>Wallet</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-1/3 h-210 mt-10 flex flex-col justify-start items-center gap-10 bg-white border-r-2 border-black p-6">
            <h2 class="text-2xl font-bold text-center mb-6">Account Info</h2>
            <nav class="ml-[-25px] flex flex-col gap-4">
                <a href="profile.php" class="inline-flex text-left text-black font-quicksand font-bold hover:text-blue-600 transition-all duration-700">Profile</a>
                <a href="payments.php" class="inline-flex text-left text-black font-quicksand font-bold hover:text-blue-600 transition-all duration-700 mt-2">Payment</a>
                <a href="orderhistory.php" class="inline-flex text-left text-black font-quicksand font-bold hover:text-blue-600 transition-all duration-700 mt-2">Order History</a>
            </nav>  
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-10">
            <div class="max-w-3xl mx-[100px] bg-white p-12 rounded-lg shadow">
                <div class="bg-white p-10 rounded-lg shadow-lg w-[400px] text-center border border-gray-300">
                    <h1 class="text-2xl font-bold mb-6">Wallet Balance</h1>
                    <p class="text-gray-700 text-xl font-semibold mb-4">₱<?php echo number_format($balance, 2); ?></p>
                    
                    <form action="../../Backend/Components/add_balance.php" method="POST" class="space-y-4">
                        <label class="block text-gray-700 font-semibold">Add Money</label>
                        <input type="number" name="amount" step="0.01" min="1" class="w-full p-2 border rounded-lg bg-gray-100" required>

                        <button type="submit" class="w-full px-6 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-green-700 transition-all duration-700">
                            Add Balance
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php include '../Template/footer.php'; ?>
