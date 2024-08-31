<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Cart System</title>
</head>
<body>

<h1>Products</h1>
<div>
    <?php
    // Example product list (In a real application, these would come from a database)
    $products = [
        1 => ['name' => 'Product 1', 'price' => 10.00],
        2 => ['name' => 'Product 2', 'price' => 15.00],
        3 => ['name' => 'Product 3', 'price' => 20.00],
    ];

    foreach ($products as $id => $product) {
        echo "<div>
                <h2>{$product['name']}</h2>
                <p>Price: \${$product['price']}</p>
                <form action='add_to_cart.php' method='post'>
                    <input type='hidden' name='product_id' value='$id'>
                    <input type='number' name='quantity' value='1' min='1'>
                    <button type='submit'>Add to Cart</button>
                </form>
              </div>";
    }
    ?>
</div>

<a href="cart.php">View Cart</a>

</body>
</html>
