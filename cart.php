<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go-Surf Sri Lanka</title>
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
      body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
      } 

      header {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 1em;
      }

      main {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      #cart-items {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
      }

      .cart-item {
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      }

      .cart-item img {
        width: 100%;
        border-radius: 5px;
      }

      #cart-total {
        margin-top: 20px;
        text-align: right;
      }

      #checkout-btn {
        background-color: #4caf50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      #checkout-btn:hover {
        background-color: #45a049;
      }

      footer {
        text-align: center;
        margin-top: 20px;
        padding: 10px;
        background-color: #333;
        color: white;
      }

      .update-btn,
      .delete-btn {
        margin-top: 10px;
        background-color: #3498db;
        color: white;
        padding: 8px 12px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-right: 5px;
        font-size: 12px;
        transition: background-color 0.3s ease;
      }

      .update-btn:hover,
      .delete-btn:hover {
        background-color: #2980b9;
      }

      .delete-btn {
        background-color: #e74c3c;
      }

      .delete-btn:hover {
        background-color: #c0392b;
      }
  </style>
</head>
<body>
    <header>
        <h1>Your Cart</h1>
    </header>

    <main>
        <section id="cart-items">
            <div class="cart-item">
              <img src="./assets/surf_img/sml-boards.png" alt="">
              <p>Board Name</p>
              <p>Board Description</p>
              <p>Price</p>
              <p>Quantity</p>
              <button class="update-btn">Update</button>
              <button class="delete-btn">Delete</button>
            </div>

            <div class="cart-item">
              <img src="./assets/surf_img/sml-boards.png" alt="">
              <p>Board Name</p>
              <p>Board Description</p>
              <p>Price</p>
              <p>Quantity</p>
              <button class="update-btn">Update</button>
              <button class="delete-btn">Delete</button>
            </div>

            <div class="cart-item">
              <img src="./assets/surf_img/sml-boards.png" alt="">
              <p>Board Name</p>
              <p>Board Description</p>
              <p>Rs. 1000.00</p>
              <p>Quantity: 4</p>
              <button class="update-btn">Update</button>
              <button class="delete-btn">Delete</button>
            </div>

            <div class="cart-item">
              <img src="./assets/surf_img/sml-boards.png" alt="">
              <p>Board Name</p>
              <p>Board Description</p>
              <p>Price</p>
              <p>Quantity</p>
              <button class="update-btn">Update</button>
              <button class="delete-btn">Delete</button>
            </div>
        </section>

        <div id="cart-total">
            <p>Total: $<span id="total-amount">0.00</span></p>
            <button id="checkout-btn">Rent Now</button>
        </div>
    </main>
    
    <footer>
        <p>&copy; 2023 Go-Surf.LK</p>
    </footer>
</body>
</html>
