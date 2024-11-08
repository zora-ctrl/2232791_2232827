<?php
// Start session to access cart data
session_start();

// Check if payment method and total price are set
if (!isset($_POST['payment_method']) || !isset($_POST['total_price'])) {
    header('Location: index.php'); // Redirect if accessed directly
    exit;
}

$total_price = $_POST['total_price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>UPI Payment Confirmation</title>
</head>
<body>
<?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h1>UPI Payment Confirmation</h1>
        <p>Thank you for your order!</p>
        <p>Total Amount Paid: Rs. <?php echo number_format($total_price, 2); ?></p>
        
        <p>Your UPI payment has been confirmed. Your order has been placed successfully.</p>
        <a href="index.php" class="btn btn-primary">Back to Shopping</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
