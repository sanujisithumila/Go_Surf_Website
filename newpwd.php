<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Reset Password - Go-Surf Sri Lanka</title>
    <link rel="stylesheet" href="./assets/css/forms.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="./assets/surf_img/head_logo.png"/>
    
    <style>
        @media (max-width: 500px) {
            .form {
                width: 300px;
            }
        }
        @media (min-width: 501px) and (max-width: 699px) {
            .form {
                width: 400px;
            }
        }
    </style>
</head>
<body>
    <section class="header">
        <img class="logo" src="./assets/surf_img/logo.png" width="150px" height="80px" >
        <div class="form" >
        <form action="./php_processes/pw_reset_process.php" method="post">
            <h1> Reset your password </h1>
            <br>
            You can reset your password using this form.
            <br><br>
            <label for="text">
                <b> Email </b>
            </label>
            <br>
            <input type="email" name="email" placeholder="Email" required>
            <br><br>
            <label for="text">
                <b> New Password </b>
            </label>
            <br>
            <input type="password" name="password"  placeholder="Password" required>
            <br><br>
            <label for="text">
                <b> Verify password </b>
            </label>
            <br>
            <input type="password" name="confirmPassword"  placeholder="Password" required>
            <br><br>
            <div class="btn">
            <input type="submit"  value="Change" id="button" > 
            </div>
        </form>
        </div>
    </section>
    
</body>
</html>