<?php 
include '../Template/header.php';
include '../../Backend/auth_check.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/Gameforge_/src/CSS/fonts.css">
    </head>
<body class="bg-[#FFF6F6]">
    <div class="min-h-screen flex items-center justify-center mt-[-100px]">
        <div class="container mx-auto px-8 lg:px-20">
            <div class="flex flex-col lg:flex-row items-center lg:items-center">


                <!-- left sect-->
                <div class="w-full lg:w-1/2 mb-8 lg:mb-7">
                    <h1 class="text-xl font-bold font-blackhan text-[#4388AF]">Gameforge</h1>
                    <h2 class="text-6xl font-semibold mt-25 pl-17">Let's be in <br> <span class="pt-4 inline-block">touch</span></h2>
                </div>

                <!-- right sect-->
                <div class="w-full lg:w-1/2 bg-white p-8 rounded-lg shadow-md">
                    <p class="text-sm text-black mb-6 palanquin-dark-regular">
                        For general inquiries, please fill out the information below.
                        One of our associates will contact you as soon as possible.
                    </p>
                    
                    <form class="space-y-4">
                        <div>
                            <label class="block font-semibold">Name *</label>
                            <input type="text" class="w-full border-b-2 border-gray-300 focus:outline-none focus:border-black p-2">
                        </div>

                        <div>
                            <label class="block font-semibold">Email *</label>
                            <input type="email" class="w-full border-b-2 border-gray-300 focus:outline-none focus:border-black p-2">
                        </div>

                        <div>
                            <label class="block font-semibold">Message <span class="font-light text-xs">(Want to know more? Drop us a line!)</span></label>
                            <textarea class="w-full border-b-2 border-gray-300 focus:outline-none focus:border-black p-2" rows="1" placeholder=""></textarea>
                        </div>

                        <button class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition-all duration-700 ease-in-out">
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include '../Template/footer.php'; ?>
</body>
</html>