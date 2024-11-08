<?php
session_start();

// Check if the product ID and quantity are set
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Dummy product data (in a real application, you would fetch this from your database)
    $products = [
        '1' => ['name' => 'Back Cover', 'price' => 149, 'image_url' => 'http://localhost/mobile_cart
        /js/images/cover.jpg'],
        '2' => ['name' => 'wireless Charger', 'price' => 1499, 'image_url' => 'http://localhost/mobile_cart/
        js/images/wireless_charger.jpeg'],
    ];

    if (array_key_exists($product_id, $products)) {
        // Check if the cart already exists
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Add or update the product in the cart
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity; // Update quantity
        } else {
            // Add new product to the cart
            $_SESSION['cart'][$product_id] = [
                'name' => $products[$product_id]['name'],
                'price' => $products[$product_id]['price'],
                'quantity' => $quantity,
                'image_url' => $products[$product_id]['image_url'],
            ];
        }
    }

    // Redirect to the cart page
    header('Location: cart.php');
    exit;
}
?>
