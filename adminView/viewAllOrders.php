<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
  header("Location: admin_login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Go-Surf Sri Lanka</title>
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/admin_style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Permanent+Marker&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="../assets/surf_img/head_logo.png"/>
</head>

<body style="padding-bottom: 30px;">
  <section class="header" style="min-height: auto; margin-top:150px;">
    <nav id="navbar" class="fixed">
      <a href="#"><img src="../assets/surf_img/logo.png"></a>
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
          <li><a href="../adminPanel/admin_panel.php" class="click-animation-1">HOME</a></li>
          <li><a href="./viewAllBoards.php" class="click-animation-1">MANAGE BOARDS</a></li>
          <li><a href="./viewInquiries.php" class="click-animation-1">INQUIRIES</a></li>
          <li><a href="./viewReviews.php" class="click-animation-1">REVIEWS</a></li>
          <li><a href="./viewAllOrders.php" style="color: red;" class="click-animation-1">ORDERS</a></li>
          <li><a href="./viewCustomers.php" class="click-animation-1">USERS</a></li>
          <li class="logout"><a href="../adminPanel/admin_logout_process.php" class="logout-button click-animation-1">LOGOUT</a></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
  </section>

<div id="ordersBtn" >
  <h2 style="text-align: center;">Order Details</h2>

  <?php
    include "../config/db_conn.php";

    $sql = "SELECT * FROM rentals";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
  ?>

  <table class="table" style="margin-left: auto; margin-right: auto; width: fit-content;">
    <thead>
      <tr>
        <th>Rental ID.</th>
        <th>Customer</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Rental Date</th>
        <th>Return Date</th>
        <th>Payment Method</th>
        <th>Payment Status</th>
        <th>More Details</th>
     </tr>
    </head>

    <?php
      while ($row = $result->fetch_assoc()) {
    ?>

       <tr>
          <td><?=$row["rental_id"]?></td>
          <td><?=$row["user_id"]?></td>
          <td><?=$row["phone_no"]?></td>
          <td><?=$row["order_date"]?></td>
          <td><?=$row["pay_method"]?></td>
           <?php 
                if($row["order_status"]==0){
                            
            ?>
                <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Pending </button></td>
            <?php
                        
                }else{
            ?>
                <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Delivered</button></td>
        
            <?php
            }
                if($row["pay_status"]==0){
            ?>
                <td><button class="btn btn-danger"  onclick="ChangePay('<?=$row['order_id']?>')">Unpaid</button></td>
            <?php
                        
            }else if($row["pay_status"]==1){
            ?>
                <td><button class="btn btn-success" onclick="ChangePay('<?=$row['order_id']?>')">Paid </button></td>
            <?php
                }
            ?>
              
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?=$row['order_id']?>" href="javascript:void(0);">View</a></td>
        </tr>

    <?php      
        }
      } else {
        echo "<p>No orders available.</p>";
      }
    ?>
     
    </table>
  </div>

  <!-------JavaScript for Toggle Menu------->
  <script>
    var navLinks = document.getElementById("navLinks");
      function showMenu() {
        navLinks.style.right = "0";
      }

      function hideMenu() {
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
</body>
</html>