<?php include '/Resources/views/Home/Header.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Resources/CSS/signIn.css">
    <title>SignIn Page</title>
</head>
<body>
    
        <section class = "main-container">
            <div class ="intro">
                <h1>Log in to your account</h1>
            </div>
            <div class = "signIn-form">
                <form action="">
                    <label for="email">Email <span id="req">*</span></label>  
                    <input type="email" name="email" id="email" required>
                    <label for="password">Password <span id="req">*</span></label>
                    <div class="password-container">
                    <input type="password" name="password" id="password" required>
                        <button type="button" id="togglepassword">
                            <img src="/Images/Home/password_icon.png" alt="Show Password">
                        </button>
                    </div>
                    <div class="signInbtn-container">
                        <button name="signInbtn" class="signInbtn" type="button">Sign In</button>
                    </div>
                </form>
            </div>
            <div class="createAcc">
                <div>
                    <h1>Dont have an account?</h1>
                </div>
                <div>
                    <button class="createbtn" onclick="location.href='createAccount.php'">Sign up now</button>
                </div>
            </div>
        </section>
</body>
</html>