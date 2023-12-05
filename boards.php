<?php
session_start();

include './config/db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best surfing locations</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="./assets/surf_img/head_logo.png"/>

    <style>
        .locs {
            margin-top: 20px;
        }

        .filter-form-container {
            width: fit-content;
            margin-right: auto;
            margin-left: auto;
            margin-top: 8%;
        }

        .filter-form {
            display: flex;
            flex-direction: row;
            align-items: center;
            column-gap: 15px;
            justify-content: center;
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 8px;
            margin-top: -10px;
        }

        label, select, input {
            margin-bottom: 16px;
            padding: 2px;
            box-sizing: border-box;
            width: auto;
        }

        select, input[type="number"] {
            min-width: 130px;
        }
        
        input::-webkit-outer-spin-button, input::-webkit-inner-spin-button
        {
            -webkit-appearance: none;
        }
        input[type="submit"] {
            margin-top: 3px;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .board-container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            height: fit-content;
        }

        .filter-btn, .filter-form button {
            display: none;
        }

        @media (min-width: 1001px) and (max-width: 1300px) {
            .board-container {
                grid-template-columns: 1fr 1fr 1fr;
            }

            .locs {
                margin-top: 30px;
                padding-left: 30px;
            }
            .filter-form-container {
            margin-top: 10%;
        }
           
        }

        @media (min-width: 701px) and (max-width: 1000px) {
            .board-container {
                grid-template-columns: 1fr 1fr;
            }

            .locs {
                margin-top: 50px;
                padding-left: 60px;
            }

            .filter-form {
                margin-top: -9px;
            }
        .filter-form-container {
            margin-top: 12%;
        }
        }

        @media (max-width: 700px) {
            .board-container {
                grid-template-columns: 1fr;
            }

            .locs {
                margin-top: 40px;
                padding-left: auto;
            }

            .filter-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            column-gap: 15px;
            justify-content: center;
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 8px;
            margin-top: -10px;
            }
            .filter-form-container {
            margin-top: 25%;
            width: 90%;
            }   
            .filter-button{
                width: auto;
            }
            
        }

        .boards-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin: 10px;
            text-align: center;
        }

        .boards-card img {
            max-width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .add-to-cart-btn {
            margin-top: 5px;
            background-color: #007BFF;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-to-cart-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-image: url(./assets/surf_img/boards_pic_2.jpg); background-repeat: no-repeat; 
background-attachment: fixed; background-size: 100% 100%;">
    <section class="">
        <nav id="navbar" class="fixed">
            <a href="index.php"><img src="./assets/surf_img/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php" class="click-animation-1">HOME</a></li>
                    <li><a href="boards.php" class="click-animation-1" style="color: red;">BOARDS</a></li>
                    <li><a href="locations.php" class="click-animation-1">LOCATIONS</a></li>
                    <li><a href="about.php" class="click-animation-1">ABOUT US</a></li>
                    <li><a href="contact.php" class="click-animation-1">CONTACT US</a></li>
                    <li class="login"><a href="login.php" class="login-button click-animation-1">LOGIN</a></li>
                    <li class="logout"><a href="./php_processes/logout_process.php" class="logout-button click-animation-1"></a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        
    </section>

    <!-------Boards------->
    <section class="locs" style="padding-top: 7%; display: inline; margin-right: 0;">

    <!-- Filter Boards Form -->
    <div class="filter-form-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="filter-form" method="post"> <!-- action = current file -->
            <!-- Board Type -->
            <label for="board-type">Board Type:</label>
            <select name="board-type">
                <option value="all">All Types</option>
                <?php
                $type_sql = "SELECT * FROM board_types";
                $type_result = $conn->query($type_sql);

                while ($type_row = $type_result->fetch_assoc()) {
                    echo "<option value='" . $type_row['type_id'] . "'>" . $type_row['type_name'] . "</option>";
                }
                ?>
            </select>

            <!-- Price -->
            <label for="max-price">Maximum Price:</label>
            <input type="number" name="max-price" placeholder="Enter max price">

            <input class="filter-button" type="submit" value="Filter">
        </form>
    </div>

    <div class="no-boards" style="text-align: center;">
        <p></p>
    </div>

    <!-- Display boards -->
    <div class="board-container">
        <?php
        $filterCondition = "";

        if (isset($_POST['board-name']) && $_POST['board-name'] !== 'all') {
            $filterCondition .= " AND board_name = '" . $_POST['board-name'] . "'";
        }

        if (isset($_POST['board-type']) && $_POST['board-type'] !== 'all') {
            $filterCondition .= " AND board_type = '" . $_POST['board-type'] . "'";
        }

        if (isset($_POST['max-price']) && $_POST['max-price'] !== '') {
            $filterCondition .= " AND price <= " . (int)$_POST['max-price'];
        }

        // WHERE 1 (always true) is used as a placeholder to check the other conditions
        $sql = "SELECT * FROM boards WHERE 1" . $filterCondition;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $board_type = $row['board_type'];
    
                $get_type_sql = "SELECT type_name FROM board_types WHERE type_id = $board_type";
                $get_type_result = $conn->query($get_type_sql);
                $get_type_row = $get_type_result->fetch_assoc();
    
                echo "<div class='boards-card'>";
    
                // The path stored in the database is '../uploads/image.jpg'. However, this path is incorrect relative to the currect file (boards.php). Therefore, the below code is used to correct the image path ('./uploads/image.jpg')
                $image_path = $row['board_image'];  // Original image path
                $image_path_str = (string) $image_path; // Image path converted into a string
                $new_path = substr($image_path_str, 1); // Removing the first character of the string
    
                echo "<img src='" . $new_path . "' alt='" . $row['board_name'] . "'>";
                echo "<h2>" . $row['board_name'] . "</h2>";
                echo "<p><em>" . $get_type_row['type_name'] . "</em></p>";
                echo "<p>" . $row['board_desc'] . "</p>";
                echo "<p>" . $row['price'] . "</p>";
    
                // Add to Cart button
                echo "<form action='./php_processes/rentBoard.php' method='post' onsubmit='return verifyUserLogin()'>";
                echo "<input type='hidden' name='board-id' value='" . $row['board_id'] . "'>";
                echo "<input type='hidden' name='board-name' value='" . $row['board_name'] . "'>";
                echo "<input type='hidden' name='board-type' value='" . $get_type_row['type_name'] . "'>";
                echo "<input type='hidden' name='board-desc' value='" . $row['board_desc'] . "'>";
                echo "<input type='hidden' name='price' value='" . $row['price'] . "'>";
                echo "<button type='submit' class='add-to-cart-btn'>Rent Now!</button>";
                echo "</form>";
    
                echo "</div>";
            }
        } else {
            ?>
            <script>
                document.querySelector('.no-boards p').innerHTML = "<br>No boards available.";
            </script>
        <?php
        }

        
        ?>
    </div>
      
    </section>
    
    
    <!-------Footer------->
    <section class="footer" style="background-color: rgba(255, 255, 255, 0.792); margin-top: 60px;">
        <h4>About Us</h4>
        <p>"Surfing Enthusiasts, Passionate Instructors: <br> At GO-SURF, we are more than just a surf rental service. We are a community of dedicated surfers and experienced instructors, committed to sharing our love for the ocean and the art of surfing. Whether you're a beginner catching your first wave or an experienced surfer seeking new challenges, join us for an unforgettable surfing adventure. Let's ride the waves together!" <br><br>Follow us on:</p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
        <p>Made with <i class="fa fa-heart"></i> by Group 15 23.1 FOC - NSBM</p>
    </section>
    <!-------JavaScript for Toggle Menu------->
    <script>
        var navLinks = document.getElementById("navLinks");
        function showMenu()
        {
            navLinks.style.right = "0";
        }
        function hideMenu()
        {
            navLinks.style.right = "-200px";
        }
    </script>
    <!-------JavaScript for Nav Bar------->
    <script>
        var prevScrollpos = window.pageYOffset;
    
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-100px";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>

    <script>
        function verifyUserLogin() {
            <?php
            if (isset($_SESSION['user_id'])) {
            ?>
                return true;
            <?php
            } else {
            ?>
                var confirmation = confirm('You need to be logged in to rent a board. Click OK to login now.');

                if (confirmation) {
                    window.location.href = './login.php';
                } else {
                    return false;
                }
            <?php
            }
            ?>
        }
    </script>

<?php
if (isset($_COOKIE['user_id']) || isset($_SESSION['user_id'])) {
    echo "
    <script>
        var loginButton =  document.querySelector('.login-button');
        
        loginButton.innerHTML = '';

        var logoutButton = document.querySelector('.logout-button');

        logoutButton.innerHTML = 'LOGOUT';

        logoutButton.addEventListener('click', () => {
            window.location.href = './php_processes/logout_process.php';   
        });
    </script>

    <style>
        .nav-links ul .login::after {
            background: transparent;
        }
    </style>
    ";
} else {
    echo "
    <style>
        .nav-links ul .logout::after {
            background: transparent;
        }
    </style>
    ";
}
?>
</body>
</html>