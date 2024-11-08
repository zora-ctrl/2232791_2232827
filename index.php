<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
   <!-- Navbar -->
   <?php include 'navbar.php'; ?>

    <!-- Carousel -->
   <div id="carouselExample" class="carousel slide custom-carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://plus.unsplash.com/premium_photo-1681488350342-19084ba8e224?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDF8fHxlbnwwfHx8fHw%3D" width="300px" height="600px" class="d-block w-100" alt="First Slide">
    </div>
    <div class="carousel-item">
      <img src="../js/images/second.jpeg" class="d-block w-100" alt="Second Slide">
    </div>
    <div class="carousel-item">
      <img src="../js/images/third.jpeg" class="d-block w-100" alt="Third Slide">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<br><br>
    <header class="text-center py-1 bg-dark text-white">
        <h3>Products</h3>
    </header>
    <!-- Product Section -->
<div class="container mt-5">
  <h4 class="text-center mb-4">Featured Products</h4>
  <div class="row">
      <!-- Product 1 -->
      <div class="col-md-4">
          <div class="card">
              <img src="../js/images/cover.jpg" class="card-img-top" alt="Phone Case">
              <div class="card-body">
                  <h5 class="card-title">Stylish Phone Case</h5>
                  <p class="card-text">Rs.149.00</p>
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
                  <p class="card-text">Rs.1499.00</p>
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
                  <p class="card-text">Rs.1299.00</p>
                  <a href="product.php?id=3" class="btn btn-primary">Add to cart</a>
              </div>
          </div>
      </div>
  </div>
</div>

 <!-- Footer -->
<?php include 'footer.php'; ?>
</body>
</html>