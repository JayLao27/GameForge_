<?php
include '../../Backend/session_start.php';
include_once '../../Backend/Components/fetch.php';

include '../../dbconnection/dbconnect.php';
if (isset($_SESSION['user_id'])) {
    fetchUserDetails($conn, $_SESSION['user_id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-3xl flex">
        <!-- Left Section: Form -->
        <div class="w-2/3 pr-6">
            <h2 class="text-2xl font-semibold mb-4">My Profile</h2>
            
            <form action="../../Backend/Components/updateprofile.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="firstname" value="<?php echo htmlspecialchars($_SESSION['firstname'] ?? ''); ?>" 
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="lastname" value="<?php echo htmlspecialchars($_SESSION['lastname'] ?? ''); ?>" 
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" value="<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>" 
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?>" 
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" placeholder="Enter new password" 
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Re-Password</label>
                    <input type="password" name="repassword" placeholder="Confirm new password" 
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <!-- Profile Image Upload -->
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Profile Picture</label>
                    <input type="file" name="profile_image" accept="image/*" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="flex justify-between mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Save Changes</button>
                </div>
            </form>
        </div>

        <!-- Right Section: Profile Info -->
        <div class="w-1/3 border-l pl-6 flex flex-col items-center">
            <img src="../../uploads/<?php echo $_SESSION['profile_image'] ?? 'default.jpg'; ?>" class="w-24 h-24 rounded-full border-4 border-gray-300" alt="Profile Picture">
            <p class="mt-4 font-semibold text-lg"><?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?></p>
            <p class="text-gray-700"><?php echo htmlspecialchars($_SESSION['firstname'] ?? '') . ' ' . htmlspecialchars($_SESSION['lastname'] ?? ''); ?></p>
            <p class="text-gray-600"><?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?></p>
        </div>
    </div>
</body>
</html>