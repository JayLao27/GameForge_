<?php include 'Resources/views/Home/Header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Resources/CSS/signUp.css">
    <title>Sign Up Page</title>
</head>
    <body>
        <div id="TopColor"></div>
            <section class="main-container">
                <div class="intro">
                    <h1>Create an Account</h1>
                </div>
                <div class="signUp-form">
                    <form action="">
                        <label for="firstname">First Name <span id="req">*</span></label>
                        <input type="text" name="firstname" id="firstname" required>
                        <label for="lastname">Last Name <span id="req">*</span></label>
                        <input type="text" name="lastname" id="lastname" required>
                        <label for="email">Email Address <span id="req">*</span></label>
                        <input type="email" name="email" id="email" required>    
                        <label for="contactnum">Contact Number <span id="req">*</span></label>
                        <input type="text" name="contactnum" id="contactnum" required>
                        <label for="address">Address <span id="req">*</span></label>
                        <input type="text" name="address" id="address" required>
                        <label for="password">Password <span id="req">*</span></label>
                        <div class="password-container">
                            <input type="password" name="password" id="password" required>
                            <button type="button" id="togglepassword">
                            <img src="/Images/Home/password_icon.png" alt="Show Password">
                            </button>
                        </div>
                        <div class="signUpbtn-container">
                            <button name="signUp" class="signUp" type="button">Sign Up</button>
                        </div>
                    </form>
                </div>
                <div class="hasAcc">
                    <div>
                        <h1>Already have an account?</h1>
                    </div>
                    <div>
                        <button class="hasaccbtn" onclick="location.href='signIn.php'">Sign In</button>
                    </div>
                </div>
        </section> 
    </body>
</html>