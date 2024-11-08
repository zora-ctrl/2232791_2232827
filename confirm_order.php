<?php
session_start();
require 'db1.php'; // Include your database connection file

// Check if the cart exists
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<div class='alert alert-warning'>Your cart is empty. Please add items to your cart before proceeding.</div>";
    exit;
}

// Calculate total amount
$total_amount = 0;
$products = []; // This will store product details in an array

foreach ($_SESSION['cart'] as $product) {
    $total_amount += $product['price'] * $product['quantity'];
    
    // Prepare product details to save in the database
    $products[] = [
        'name' => $product['name'],
        'price' => $product['price'],
        'quantity' => $product['quantity']
    ];
}

// Make sure the total_amount is set properly
if ($total_amount <= 0) {
    echo "<div class='alert alert-danger'>Invalid total amount.</div>";
    exit;
}

// Generate a unique order ID
$order_id = uniqid('order_', true); // Generates a unique order ID

// Store the order details in the session (optional, for further use)
$_SESSION['order_id'] = $order_id;
$_SESSION['total_amount'] = $total_amount; // Store the total amount for the order

// Convert products array to JSON for database storage
$products_json = json_encode($products);

// Get the current date and time for order_date
$order_date = date('Y-m-d H:i:s');

// Insert order details into the database
try {
    // Insert the order into the orders table
    $query = "INSERT INTO orders (order_id, product, order_date, total_amount) 
              VALUES (:order_id, :product, :order_date, :total_amount)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'order_id' => $order_id,
        'product' => $products_json, // Save products as JSON
        'order_date' => $order_date,
        'total_amount' => $total_amount
    ]);

} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Error saving order: " . htmlspecialchars($e->getMessage()) . "</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Order Confirmation</title>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <h1 class="text-center">Order Confirmation</h1>
        <h3 class="mt-4">Your Order Summary:</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION['cart'] as $product) {
                    $total_price = $product['price'] * $product['quantity'];
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td>Rs. <?php echo number_format($product['price'], 2); ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td>Rs. <?php echo number_format($total_price, 2); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <h4 class="text-right">Total Amount: Rs. <?php echo number_format($total_amount, 2); ?></h4>

        <!-- Display the Order ID -->
        <h4 class="text-center mt-4">Your Order ID: <strong><?php echo htmlspecialchars($order_id); ?></strong></h4>

        <form action="process_payment.php" method="POST" class="mt-4">
            <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
            <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order_id); ?>"> <!-- Pass order ID -->
            <button type="submit" class="btn btn-success btn-block">Proceed to Payment</button>
        </form>

        <a href="cart.php" class="btn btn-secondary mt-3">Back to Cart</a>
        
       
    </div>

    <br><br><br>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Footer -->
<?php include 'footer.php'; ?>
</body>
</html>
