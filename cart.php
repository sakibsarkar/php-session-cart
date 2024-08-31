<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>

<h1>Your Cart</h1>

<?php
$products = [
    1 => ['name' => 'Product 1', 'price' => 10.00],
    2 => ['name' => 'Product 2', 'price' => 15.00],
    3 => ['name' => 'Product 3', 'price' => 20.00],
];

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<form action='update_cart.php' method='post'>";
    echo "<table border='1'>";
    echo "<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th><th>Action</th></tr>";

    $total = 0;
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $product = $products[$product_id];
        $subtotal = $product['price'] * $quantity;
        $total += $subtotal;

        echo "<tr>
                <td>{$product['name']}</td>
                <td>\${$product['price']}</td>
                <td><input type='number' name='quantities[$product_id]' value='$quantity' min='1'></td>
                <td>\$$subtotal</td>
                <td><a href='remove_from_cart.php?product_id=$product_id'>Remove</a></td>
              </tr>";
    }

    echo "</table>";
    echo "<p>Total: \$$total</p>";
    echo "<button type='submit'>Update Cart</button>";
    echo "</form>";
} else {
    echo "<p>Your cart is empty.</p>";
}
?>

<a href="index.php">Continue Shopping</a>

</body>
</html>
