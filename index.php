
<!DOCTYPE html>
<html>
<head>
	<title></title>
	   <link rel="stylesheet" href="bootStrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootStrap/js/bootstrap.min.js">
     <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="sales_css/style.css">
     <link rel="stylesheet" type="text/css" href="sales_css/cart.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<style>
   a i{
        color: #EDC00A;
    }
     #name a{
        color: white;
    }
    #name a:hover{
        color: #C8BFC8;
    }
    .carousel-item {
      height: 500px; /* Adjust this value according to your needs */
      background-size: cover;
      background-position: center;
    }
    .carousel-item img {
      object-fit: cover;
      height: 100%;
    }
</style>

<?php require_once 'addcart_query.php' ?>
<body>
	<nav class="navtop col-lg-12 mb-4">
		<div>
			<h1 style="color: #EDC00A;">Moutaz Motors</h1>
			<a href="about.php"><i class="fa fa-group"></i>about</a>
      <a href="product.php" name="hey"><i class="fa fa-car"></i>Products</a>
      <a href="login.php" name="#"><i class="fa fa-user-circle"></i>log in</a>
      <a href="register.php" name="#"><i class="fa fa-sign-in"></i>Sign Up</a>
		</div>
	</nav>
    
<?php require_once 'dbconfig.php' ?>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="product.php">
          <img class="d-block w-100" src="images/4.jpg" alt="First slide">
        </a>
      </div>
      <div class="carousel-item">
        <a href="product.php">
          <img class="d-block w-100" src="images/5.jpg" alt="Second slide">
        </a>
      </div>
      <div class="carousel-item">
        <a href="product.php">
          <img class="d-block w-100" src="images/3.jpg" alt="Third slide">
        </a>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <?php include 'footer.php' ?>
</body>
</html>



