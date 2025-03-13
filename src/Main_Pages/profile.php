<?php
include '../../Backend/session_start.php';
include '../../Backend/auth_check.php';
include '../../Backend/Components/fetch.php';
include '../../dbconnection/dbconnect.php';
include '../Template/header.php';
if (isset($_SESSION['user_id'])) {
    fetchUserDetails($conn, $_SESSION['user_id']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/Gameforge_/src/CSS/fonts.css">
    <title>Profile</title>
    <script>
        function showEditProfile() {
            document.getElementById("editProfileContainer").classList.remove("hidden");
        }

        function closeEditProfile() {
            document.getElementById("editProfileContainer").classList.add("hidden");
        }
    </script>
</head>

<body class="bg-gray-100">
    
    <!-- Main Container -->
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
                <div class="flex-col space-y-4 ml-5">
                    <h1 class="font-poppins font-bold text-base">YOUR ACCOUNT</h1>
                </div>
                
                <div class="flex flex-col items-center mb-6 space-y-8">
                    <!-- Profile Picture -->
                   <img src="../../uploads/<?php echo $_SESSION['profile_image'] ?? 'default.jpg'; ?>" class="w-24 h-24 rounded-full border-4 border-gray-300" alt="Profile Picture">
                    
                    <!-- Edit Profile Button -->
                    <button onclick="showEditProfile()" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Edit Profile</button>
                </div>

                <!-- User Details -->
                <div class="space-y-6 pl-8">
                    <div>
                        <span class="block text-black font-bold">Username</span>
                        <span class="block text-lg text-gray-900 font-bold"><?php echo $_SESSION['username'] ?? 'Name'; ?></span>
                    </div>

                    <div>
                        <span class="block text-black font-bold">First Name</span>
                        <span class="block text-lg text-gray-900 font-bold"><?php echo $_SESSION['firstname'] ?? 'fName'; ?></span>
                    </div>

                    <div>
                        <span class="block text-black font-bold">Last Name</span>
                        <span class="block text-lg text-gray-900 font-bold"><?php echo $_SESSION['lastname'] ?? 'lname'; ?></span>
                    </div>

                    <div>
                        <span class="block text-black font-bold">Email</span>
                        <span class="block text-lg text-gray-900 font-bold"><?php echo $_SESSION['email'] ?? 'Email'; ?></span>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Edit Profile Modal -->
    <div id="editProfileContainer" class="fixed inset-0 backdrop-blur-sm flex justify-center items-center hidden">

    <div class="bg-white border-2 p-6 rounded-lg shadow-md relative w-160">
        <!-- Close Button -->
        <button onclick="closeEditProfile()" class="absolute top-2 right-2 bg-gray-300 px-3 py-1 rounded-full hover:text-lg">X</button>

        <?php include 'editprofile.php'; ?>
    </div>
</div>

    <?php include '../Template/footer.php'; ?>

</body>
</html>
