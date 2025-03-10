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
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/src/CSS/fonts.css">
    <title>Profile</title>
</head>
<body class="bg-gray-100">
    
    <!-- main container -->
    <div class="min-h-screen flex">
        <!-- side -->
        <aside class="w-1/3 h-210 mt-10 flex flex-col justify-start items-center gap-10 bg-white border-r-2 border-black p-6">
                <h2 class="text-2xl font-bold text-center mb-6">Account Info</h2>
                <nav class="ml-[-25px] flex flex-col">
                <a href="#" class="inline-flex text-left text-black font-quicksand font-bold hover:text-blue-600 transition-all duration-700">Profile</a>
                <a href="payments.php" class="inline-flex text-left text-black font-quicksand font-bold hover:text-blue-600 transition-all duration-700 mt-2">Payment</a>
                  </nav>  

        </aside>

        <!-- main content -->
        <main class="flex-1 p-10">
            <div class="max-w-3xl mx-[100px] bg-white p-12 rounded-lg shadow">

                <div class="flex-col space-y-4 ml-5">
                    <h1 class="font-poppins font-bold text-base">YOUR ACCOUNT</h1>
                    <span class="font-poppins font-semibold opacity-75">Edit your profile</span>
                </div>
                
                <div class="flex flex-col items-center mb-6 space-y-8">
                    <img class="w-24 h-24 rounded-full border-4 border-gray-300" src="../uploads/default.png" alt="Profile Picture">
                    
                    <form class="mt-4">
                        <input type="file" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-gray-200 hover:file:bg-gray-300">
                    </form>
                </div>

                <!-- fields -->
                <form class="space-y-8 pl-8">
                    <div>
                        <label class="block text-gray-700 font-semibold">Username</label>
                        <input type="text" value="" class="w-[500px] mt-1 p-2 border rounded-lg bg-gray-100">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold">First Name</label>
                        <input type="text" value="" class="w-[500px] mt-1 p-2 border rounded-lg bg-gray-100">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold">Last Name</label>
                        <input type="text" value="" class="w-[500px] mt-1 p-2 border rounded-lg bg-gray-100">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold">Email</label>
                        <input type="email" value="" class="w-[500px] mt-1 p-2 border rounded-lg bg-gray-100">
                    </div>

                    <div class="flex space-x-3">
                        <div class="w-1/2">
                            <label class="block text-gray-700 font-semibold">Password</label>
                            <input type="password" value="password" class="w-full mt-1 p-2 border rounded-lg bg-gray-100 opacity-75">
                        </div>
                        <div class="w-1/2">
                            <label class="block text-gray-700 font-semibold">Retype Password</label>
                            <input type="password" value="password" placeholder="password" class="w-full mt-1 p-2 border rounded-lg bg-gray-100 opacity-75">
                        </div>
                    </div>

                <!-- buttons area -->
                    <div class="flex justify-center space-x-6 mt-6">
                        <button class="px-10 py-3 bg-[#FBFF10] text-black font-bold rounded-full shadow-md hover:bg-blue-600 transition-all duration-700 hover:text-white">CANCEL
                        </button>
                        <button class="px-10 py-3 bg-[#FBFF10] text-black font-bold rounded-full shadow-md hover:bg-blue-600 transition-all duration-700
                        hover:text-white">SAVE
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

<?php include '../Template/footer.php'; ?>

</body>
</html>

