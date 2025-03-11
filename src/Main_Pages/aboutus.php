<?php 
include '../../Backend/session_start.php';
include '../Template/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/Gameforge_/src/CSS/fonts.css">
    <title>About GameForge</title>
</head>
<body class="bg-[#E6E6E6] min-h-screen h-full flex flex-col items-center">

    <!-- About Section -->
    <div class="w-full max-w-7xl bg-[#134563] rounded-lg mx-auto p-10 mt-22 shadow-lg flex flex-col md:flex-row items-center md:items-start">
        
        <!-- Left Side: Title -->
        <div class="flex md:w-1/2 text-left items-center justify-center self-center">
            <h1 class="text-3xl md:text-4xl text-white">
                <span class="font-medium font-poppins">About</span><span class="font-bold font-poppins pl-[10px]">GameForge</span>
            </h1>
        </div>

        <!-- Right Side: Image -->
        <div class="md:w-1/2 flex justify-center mt-6 md:mt-0">
            <img src="/Gameforge_/Resources/Images/aboutusimg.png" alt="Gaming Gear" 
                class="rounded-lg shadow-md w-[300px] md:w-[350px] h-auto">
        </div>
    </div>

    <!-- Description Section -->
    <div class="flex flex-col md:flex-row items-center justify-center gap-10 mt-10 px-10 md:px-0 mb-20">
    <!-- Left Image -->
    <img src="/Gameforge_/Resources/Images/mouse&keyboardAbout.png" alt="Gaming Keyboard and Mouse" class="w-1/3 pr-2 max-w-xs">

    <!-- Text Section -->
    <div class="w-full max-w-3xl text-black text-lg leading-loose text-center md:text-justify">
        <p class="palanquin-dark-regular">
            <span class="text-3xl font-bold">W</span>elcome to <span class="font-semibold">GameForge</span>, your ultimate destination for high-performance gaming gear! 
            At GameForge, we’re passionate about gaming and dedicated to providing gamers with the tools they need to dominate the virtual battlefield.
            <br><br>
            We specialize in offering top-quality <span class="font-semibold">gaming laptops</span>, <span class="font-semibold">gaming keyboards</span>, and 
            <span class="font-semibold">gaming mice</span> from the most trusted brands in the industry. Whether you’re a casual gamer, a competitive esports player, or a 
            tech enthusiast, we’ve got the perfect gear to level up your gaming experience.
        </p>
    </div>

    <!-- Right Image -->
    <img src="/Gameforge_/Resources/Images/laptopabt.png" alt="Gaming Laptop" class="w-1/3 pl-2 max-w-xs">
</div>


</body>
</html>
<?php include '../Template/footer.php'; ?>
