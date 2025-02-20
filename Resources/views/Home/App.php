<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameForge - HyperX Gaming Headset</title>

    
        <?php 
        include 'header.php'; 
        ?>

</head>
<body>
    <div id="Home">
    <div class="top-bar"></div>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a id="Gameforge" class="navbar-brand logo" href="#">GameForge</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul id="Nav" class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link" href="#Product">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Shop">Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../../Resources/views/Navbutton/About.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../../Resources/views/Navbutton/Contact.php">Contact</a></li>
                        
                        <div class="Navphoto-Buttons d-flex align-items-right text-right">
                            <li class="nav-item"><a class="nav-link" href="#"><img style="width: 30px;" src="../../../Images/Home/Search.png" alt="Search"></a></li>
                            <li class="nav-item"><a class="nav-link" href="../../../Resources/views/Navbutton/Cart.php"><img style="width: 30px;" src="../../../Images/Home/Cart.png" alt="Cart"></a></li>
                            <li class="nav-item"><a class="nav-link" href="../../../Resources/views/Navbutton/Profile.php"><img style="width: 30px;" src="../../../Images/Home/Profile.png" alt="Profile"></a></li>
                            <a class="text-decoration-none mt-2" href="../../../Resources/views/Navbutton/SignIn.php"> <p style="font-family: Quicksand; font-weight: bolder; color: black; margin-top: 3px;">Sign In</p></a>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    
    <section class="hero-section text-center text-lg-start">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1  id="HyperXGaming-Text" class="fw-bold ">HyperX Gaming <br> Headset</h1>
                    <div class="d-flex mt-3">
                    <a href="#Shop" class="btn btn-light me-2">Shop now</a>
                     <a href="#" class="btn btn-light border">Reviews</a>
                </div>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <img src="../../../Images/Home/Headset.png"" class="img-fluid" alt="HyperX Gaming Headset">
                </div>
            </div>
        </div>
    </div>



   <section id="Shop" class="hero-section text-center text-lg-start">
    <div class="container">
        <div style="top: 50px; position: relative;" class="align-items-center">
            <h1 style="font-family: Quicksand;" class="fw-bold">Browse By Category</h1>
            <div class="container justify-content-center gap-30" id="Card">
                <ul>    
                    <li> <a href="../../Resources/views/Product/Keyboard-web.php">  <div class="Card-Keyboard-Mouse-Laptop"><img src="../../../Images/Shop/Keyboard.png" alt="Keyboard"><p>Keyboard</p></div></li></a>
                    <li> <a href="../../Resources/views/Product/Mouse-web.php">     <div class="Card-Keyboard-Mouse-Laptop"><img src="../../../Images/Shop/Mouse.png" alt="Mouse">      <p>Mouse</p></div></li></a>
                    <li> <a href="../../Resources/views/Product/Laptop-web.php">    <div class="Card-Keyboard-Mouse-Laptop"><img src="../../../Images/Shop/Laptop.png" alt="Laptop">    <p>Laptop</p></div></li></a>
                </ul>
            </div>
        </div>
    </div>

    <div class="gaming-section ">
        <div class="container gaming-container">
            <div class="row align-items-center">
               
                <div class="col-lg-6">
                    <h1 class="gaming-title">Enhance your <br>Gaming Experience</h1>
    
                   
                   <div id="Countdown">
                        <div class="countdown-box" id="days">00 <br> <span>Days</span></div>
                        <div class="countdown-box" id="hours">00 <br> <span>Hours</span></div>
                        <div class="countdown-box" id="minutes">00 <br> <span>Minutes</span></div>
                        <div class="countdown-box" id="seconds">00 <br> <span>Seconds</span></div>
                        <script src="../../../Resources/JS/App.js"></script>
                    </div>

    
                  <a href="#Shop">  <button id="CheckOut" class="btn btn-primary mt-3">Check it out!</button> </a>
                </div>
    
                <div class="col-lg-6 position-relative">
                    <div id="Gaming-Image">
                        <img id="Laptop-image" src="../../../Images/Shop/laptop-Enhance.png" alt="Gaming Laptop">
                    </div>
                </div>
            </div> 
        </div>

      
       <div id="Product">

           <div class="container mt-5">
               <h1 style="font-family: Quicksand; font-weight: bolder; margin-top: 100px; margin-bottom: 60px;" class="text-start">Explore our Products</h1>
               <div class="row row-cols-4 g-3 mt-3">
                   <div class="col">
                       <a href="#" class="text-decoration-none text-dark">
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="../../../Images/Home/Headset.png" alt="Headset" class="img-fluid">
                                </div>
                                <div class="product-info">
                                    <p class="fw-bold">HyperX Gaming
                                        Headset</p>
                                    <p class="fw-bold"> $69.99 $129.99 </p>
                                </div>
                            </div>
                        </a>
                    </div>  
                    <div class="col"><div class="placeholder-card"></div></div>
                    <div class="col"><div class="placeholder-card"></div></div>
                    <div class="col"><div class="placeholder-card"></div></div>
                    <div class="col"><div class="placeholder-card"></div></div>
                    <div class="col"><div class="placeholder-card"></div></div>
                    <div class="col"><div class="placeholder-card"></div></div>
                    <div class="col"><div class="placeholder-card"></div></div>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-light">View all Products</button>
                </div>
            </div>
        </div>
    </section>
    </body>
    </html>