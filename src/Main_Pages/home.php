<?php include '../Template/header.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/src/CSS/fonts.css">
    <title>GameForge</title>
</head>

<body class="bg-[#E6E6E6] min-h-screen">
        <section class="w-full flex-row items-center text-center justify-between mt-20">
        <div class="flex items-center justify-between gap-x-32 max-w-7xl mx-auto p-8">
                <div class="space-y-9 w-1/2 relative">
                    <h1 class="text-6xl font-bold text-left font-poppins">HyperX Gaming Headset</h1>
                    <div class="relative top-10 flex space-x-4">
                    <a href="../Products/mouse.php" class="inline-block">
                        <button class="flex items-center bg-[#FBFF10] font-semibold text-black px-6 py-3 rounded-lg hover:text-white hover:bg-blue-600 transition-all duration-700 ease-in-out">
                            <img src="../../Resources/Images/Icons/Cart.png" alt="Shop Now" class="w-6 h-6 mr-2">
                            <span>Shop Now</span>
                        </button>
                    </a>


                        <button class="flex items-center font-semibold bg-white text-black px-6 py-3 rounded-2xl hover:bg-gray-300 transition-all duration-700 ease-in-out">
                            <span>100+ Reviews</span>
                        </button>
                    </div>

                    <div class="flex items-center space-x-2 text-black text-[10px] font-semibold pl-48 mt-10">
                        <span class="flex justify-center">100+ Reviews</span>
                        <div class="flex space-0.9">
                            <img src="../../Resources/Images/Icons/star.png" alt="Star" class="w-2 h-2">
                            <img src="../../Resources/Images/Icons/star.png" alt="Star" class="w-2 h-2">
                            <img src="../../Resources/Images/Icons/star.png" alt="Star" class="w-2 h-2">
                            <img src="../../Resources/Images/Icons/star.png" alt="Star" class="w-2 h-2">
                            <img src="../../Resources/Images/Icons/star.png" alt="Star" class="w-2 h-2">
                        </div>
                    </div>
                </div>

                <div class="w-1/2 flex justify-center">
                    <img src="../../Resources/Images/Home/Headset.png" alt="HyperX Headset" class="w-150 h-auto">
                </div>
            </div>
        </section>


        <div class="mt-52 bg-white">
    <div class="w-full flex flex-col items-center px-8 lg:px-20">
        <h2 class="text-5xl text-left font-semibold mb-15 mt-20">Browse by Category</h2>
        <!-- browse sect -->
        <section id="Shop" class="text-center w-2xl">
            <div class="grid grid-cols-3 gap-0 justify-center items-center">
             <div class="border p-2 border-blue-500 rounded-lg w-max mx-auto">
             <a href="../Products/keyboard.php">      <img src="/GameForge_/Resources/Images/Home/Keyboard 1.png" alt="Keyboard" class="w-32 h-auto mx-auto">
                    <p class="mt-2 font-medium">Keyboard</p> </a>
                </div>
                <div class="border p-2 border-blue-500 rounded-lg w-max mx-auto">
                <a href="../Products/mouse.php">    <img src="/GameForge_/Resources/Images/Home/Mouse 1.png" alt="Mouse" class="w-26 h-25 mx-3">
                    <p class="mt-2 font-medium">Mouse</p></a>
                </div>
                <div class="border p-2 border-blue-500 rounded-lg w-max mx-auto">
                <a href="../Products/Devices.php">      <img src="/GameForge_/Resources/Images/Home/Headset.png" alt="Headset" class="w-26 h-25 mx-3">
                    <p class="mt-2 font-medium">Devices</p>
                </div>
            </div>
        </section>

        <!-- laptop sect -->
        <section class="w-full flex flex-col md:flex-row items-center mt-16 bg-gray-100 rounded-lg p-10">
            <div class="w-full md:w-1/2 space-y-6">
                <h2 class="text-4xl font-bold">Enhance your Gaming<br><span class="pt-4 inline-block"></span> Experience</h2>
                <div class="flex space-x-4 text-center mt-20 mb-10">
                    <div class="w-16 h-16 flex flex-col items-center justify-center rounded-full bg-white shadow-md">
                        <p class="text-xl font-bold">15</p>
                        <p class="text-xs">days</p>
                    </div>
                    <div class="w-16 h-16 flex flex-col items-center justify-center rounded-full bg-white shadow-md">
                        <p class="text-xl font-bold">5</p>
                        <p class="text-xs">hours</p>
                    </div>
                    <div class="w-16 h-16 flex flex-col items-center justify-center rounded-full bg-white shadow-md">
                        <p class="text-xl font-bold">43</p>
                        <p class="text-xs">Minutes</p>
                    </div>
                    <div class="w-16 h-16 flex flex-col items-center justify-center rounded-full bg-white shadow-md">
                        <p class="text-xl font-bold">51</p>
                        <p class="text-xs">seconds</p>
                    </div>
                </div>
                <a href="../Products/mouse.php" class="inline-block">
                    <button class="bg-[#FBFF10] font-poppins text-black text-sm px-6 py-3 rounded-lg hover:text-white hover:bg-blue-600 transition-all duration-700 ease-in-out">
                        Check it out!
                    </button>
                </a>
            </div>
            <div class="w-full md:w-1/2 flex justify-center mt-8 md:mt-0">
                <img src="/GameForge_/Resources/Images/Home/laptop-png-8 3.png" alt="Laptop" class="w-[800px]">
            </div>
        </section>
    </div>
            <!--Explore sect -->
        <section class="w-full mt-40 px-8 lg:px-20">
            <h2 class="text-2xl font-semibold mb-12">Explore our Products</h2>

        <div class="grid ml-25 grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-0">
           
            <div class="border rounded-lg shadow-md overflow-hidden w-75">
                <div class="bg-[#FFF7F7] flex justify-center p-6 pb-12">
                    <img src="/GameForge_/Resources/Images/Products/Mouse/Motospeed V90 Gaming Mouse Black.png" alt="Motospeed V90 Gaming Mouse Black" class="h-40">
                </div>
                <div class="bg-gray-100 p-2 text-left">
                    <p class="text-lg font-bold">₱ 2,999</p>
                    <h3 class="text-gray-600 h-12">Motospeed V90 Gaming Mouse Black</h3>
                </div>
            </div>

            
            <div class="border rounded-lg shadow-md overflow-hidden w-75">
                <div class="bg-pink-50 flex justify-center p-6">
                    <img src="/GameForge_/Resources/Images/Home/wooting.png" alt="Wooting Keyboard" class="h-40">
                </div>
                <div class="bg-gray-100 p-4 text-left">
                    <p class="text-lg font-bold">₱ 9,700</p>
                    <h3 class="text-gray-600 h-14">Wooting 60HE Gaming Keyboard</h3>
                </div>
            </div>

            <div class="border rounded-lg shadow-sm overflow-hidden w-75">
                <div class="bg-pink-50 flex justify-center p-6">
                    <img src="/GameForge_/Resources/Images/Home/Motospeed Darmoshark N1 Gaming Mouse Black.jpg" alt="Motospped Darmoshark Mouse" class="h-40">
                </div>
                <div class="bg-gray-100 p-4 text-left">
                    <p class="text-lg font-bold pt-2">₱ 1,500</p>
                    <h3 class="text-gray-600">Motospeed Darmoshark N1 Gaming Mouse Black</h3>
                </div>
            </div>

            <div class="border rounded-lg shadow-md overflow-hidden w-75">
                <div class="bg-pink-50 flex justify-center p-6">
                    <img src="/GameForge_/Resources/Images/Home/Headset.png" alt="HyperX Cloud II Gaming Headset" class="h-40 mx-auto mr-10">
                </div>
                <div class="bg-gray-100 p-4 text-left">
                    <p class="text-lg font-bold pt-2">₱ 3,500</p>
                    <h3 class="text-gray-600 h-12">HyperX Cloud II Gaming Headset </h3>
                </div>
            </div>
        </div>
    </section>

        <div class="w-full h-screen flex justify-center items-center mt-[-200px]">
            <button class="px-6 py-3 bg-[#FBFF10] text-black rounded-md shadow-sm font-poppins hover:text-white hover:bg-blue-600 transition-all duration-700">
                    <a href="../Products/mouse.php" class="no-underline">View all products</a>
            </button>
        </div>

    <?php include '../Template/footer.php'; ?>
</body>
</html>