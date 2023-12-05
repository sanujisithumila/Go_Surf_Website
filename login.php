<?php
session_start();

// Check if customer is already logged in
if (isset($_COOKIE['user_id']) || isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - Go-Surf Sri Lanka</title>
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="./assets/surf_img/head_logo.png"/>

</head>
<body>
    <section class="header">
        <img src="./assets/surf_img/logo.png" width="150px" height="80px">

        <div class="form">
            <form action="./php_processes/login_process.php" method="post">
            <h1> Login </h1>
            <br>
            
                <!--------Disply an error message-------->
                <?php if(isset($_GET['error'])){ ?>
                    <p class="error"> 
                        <?php echo $_GET['error']; ?>
                    </p>
                <?php } ?>
               
            <label for="text">
                <b> Email </b>
            </label>
            <br>
            <input type="email" name="email" placeholder="Email" required>
            <p class="email-error"></p>
            <label for="text">
                <b> Password </b>
            </label>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <p id="incorrect-password"></p>

            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; align-items: center;">
                    Remember Me <input type="checkbox" name="remember-login[]" style="margin-left: 8px;">
                </div>
                <a  href="./newpwd.php"> Forgot Password? </a>
            </div>
            
             
            <br><br>
            <div class="btn">                
                <input type="submit" value="Login" id="button">
            </div>
            <p> 
                Need an account? 
                <a href="./signup.php"> Sign Up </a>
            </p>
            </form>
        </div>
    </section>
</body>
</html>