<?php
session_start();

if (!isset($_SESSION["user_id"])) {
  header("Location: ../login.php");
  exit();
}

include '../config/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $board_id = $_POST['board-id'];
  $user_id = $_POST['user-id'];

  $board_name = $_POST['board-name'];
  $board_type = $_POST['board-type'];
  $board_desc = $_POST['board-desc'];
  $price = $_POST['price'];

  $image_sql = "SELECT board_image FROM boards WHERE board_id = $board_id";
  $image_result = $conn->query($image_sql);

  $image_row = $image_result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../assets/surf_img/head_logo.png"/>
  <title>Rent a Board</title>

  <style>
    .container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    .top-section {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    h1 {
      display: inline-block;
      margin: 0;
      font-size: 24px;
      color: #333;
    }

    main {
      max-width: 800px;
    }

    #cart-items {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
    }

    .cart-item {
      text-align: center;
      border: 1px solid #ddd;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .cart-item img {
      width: 100%;
      border-radius: 5px;
    }

    .cart-item p {
      color: gray;
      font-size: 18px;
    }

    .btn {
      font-weight: 700;
      height: 40px;
      border: 1px solid transparent;
      padding: 6px 12px;
      font-size: 16px;
      line-height: 1.5;
      border-radius: 4px;
      transition: color 0.15s;
      cursor: pointer;
    }

    .quit-btn {
      font-size: 20px;
      color: gray;
      background-color: transparent;
    }

    .quit-btn:hover {
      color: black;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="top-section">
      <h1>Rent Board</h1>
      <a href="../boards.php">
        <button class="btn quit-btn">X</button>
      </a>
    </div>

    <main>
      <section id="cart-items">
        <div class="cart-item">
          <img src="<?=$image_row['board_image']?>" alt="">
          <p><?=$board_name?></p>
          <p><?=$board_type?></p>
          <p><?=$board_desc?></p>
          <p><?=$price?></p>
        </div>
      </section>
    </main>

<?php 
  } else {
    header("Location: ../boards.php");
    exit();
  }
?>