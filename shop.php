<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
       <!-- Product Section -->
<div class="container mt-5">
  
  <div class="row">
      <!-- Product 1 -->
      <div class="col-md-4">
          <div class="card">
              <img src="../js/images/cover.jpg" class="card-img-top" alt="Phone Case">
              <div class="card-body">
                  <h5 class="card-title">Stylish Phone Case</h5>
                  <p class="card-text">Rs.15.00</p>
                  <a href="product.php?id=1" class="btn btn-primary">Add to cart</a>
              </div>
          </div>
      </div>
      <!-- Product 2 -->
      <div class="col-md-4">
          <div class="card">
              <img src="../js/images/wireless_charger.jpeg" class="card-img-top" alt="Wireless Charger">
              <div class="card-body">
                  <h5 class="card-title">Wireless Charger</h5>
                  <p class="card-text">Rs.25.00</p>
                  <a href="product.php?id=2" class="btn btn-primary">Add to cart</a>
              </div>
          </div>
      </div>
      <!-- Product 3 -->
      <div class="col-md-4">
          <div class="card">
              <img src="../js/images/bt.jpeg" class="card-img-top" alt="Bluetooth Earbuds">
              <div class="card-body">
                  <h5 class="card-title">Bluetooth Earbuds</h5>
                  <p class="card-text">Rs.50.00</p>
                  <a href="product.php?id=3" class="btn btn-primary">Add to cart</a>
              </div>
          </div>
      </div>
  </div>
</div><br><br><br><br>
    <?php include 'footer.php'; ?>
</body>
</html>