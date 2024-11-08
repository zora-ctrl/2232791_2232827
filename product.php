<?php
// Include the database connection file
include 'db.php';

// Check if 'id' is passed in the URL (e.g., product.php?id=1)
if (isset($_GET['id'])) {
    // Get the product ID from the URL
    $product_id = $_GET['id'];

    // Prepare an SQL query to fetch product details by ID
    $query = "SELECT * FROM product WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute(['id' => $product_id]);

    // Fetch the product details
    $product = $stmt->fetch();

    // If no product is found, redirect or display an error
    if (!$product) {
        header('Location: error.php'); // Redirect to an error page
        exit;
    }
} else {
    // Redirect to the homepage or an error page if 'id' is not provided
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
</head>
<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Product Details -->
    <div class="container mt-5">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6 col-sm-12 text-center">
                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="Product Image" class="img-fluid" style="max-width: 100%; height: auto;">
            </div>

            <!-- Product Info -->
            <div class="col-md-6 col-sm-12">
                <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                <p class="text-muted">Price: Rs. <?php echo htmlspecialchars($product['price']); ?></p>
                <p><?php echo htmlspecialchars($product['description']); ?></p>

                <!-- Add to Cart Form -->
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add to Cart</button>
                </form>
            </div>
        </div>
    </div><br><br><br><br><br>

   

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <!-- Footer -->
     <?php include 'footer.php'; ?>
</body>
</html>
