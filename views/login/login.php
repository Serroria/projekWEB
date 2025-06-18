<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/loginCs.css">
    <link rel="stylesheet" href="../../assets/js/loginJS.js">
   
</head>
<body>
    <!-- Register Form -->
    <div class="container" id="register" style="display: none;">
        <h1 class="form-title">Register</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fName" id="fName" placeholder="First Name" required>
                <label for="fName">First Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                <label for="lName">Last Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="emailRegister" placeholder="Email" required>
                <label for="emailRegister">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="passwordRegister" placeholder="Password" required>
                <label for="passwordRegister">Password</label>
            </div>
            <input type="submit" class="btn" value="Sign Up" name="signup">
        </form>
        <!-- <p class="or">--------or---------</p> -->
        <!-- <div class="icons">
            <i class="fab fa-google"></i>
            <i class="fab fa-facebook"></i>
        </div> -->
        <div class="links">
            <p>Already have an account?</p>
            <button id="signInButton">Sign In</button>
        </div>
    </div>

    <!-- Login Form -->
    <div class="container" id="login">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="emailLogin" placeholder="Email" required>
                <label for="emailLogin">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="passwordLogin" placeholder="Password" required>
                <label for="passwordLogin">Password</label>
            </div>
            <p class="recover"><a href="#">Forgot Password</a></p>
            <input type="submit" class="btn" value="Sign In" name="signin">
        </form>
        <!-- <p class="or">--------or---------</p> -->
        <!-- <div class="icons">
            <i class="fab fa-google"></i>
            <i class="fab fa-facebook"></i>
        </div> -->
        <div class="links">
            <p>Don't have an account yet?</p>
            <button id="signUpButton">Sign Up</button>
        </div>
    </div>
    <script src="../../assets/js/loginJS.js"></script>
</body>
</html>
