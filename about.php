<!DOCTYPE html>
<head>
    <title></title>
    <link rel="stylesheet" href="bootStrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootStrap/js/bootstrap.min.js">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="sales_css/style.css">
  <link rel="stylesheet" type="text/css" href="sales_css/cart.css">


</head>
<style>
    .cart-conatiner{
      margin: 20px;
    }
     .navtop a i{
          color: #EDC00A;
      }
       #name a{
          color: white;
      }
      #name a:hover{
          color: #C8BFC8;
      }
  </style>

<body>

    <nav class="navtop">
        <div>
        <a href="index.php"><i class="fa fa-home"></i>Home</a>
          <h1 style="color: #EDC00A;">Moutaz Motors</h1>
          <a href="about.php"><i class="fa fa-group"></i>about</a>
          <a href="product.php" name="hey"><i class="fa fa-car"></i>Products</a>
          <a href="user_profile.php"><i class="fa fa-user-circle"></i>Profile</a>
          <a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a>
        </div>
      </nav>

      <main class="container mt-4">
        <section id="about-us" class="mb-4 row align-items-center">
        <div class="col-md-6">
                <h1 class="h2">About Us</h1>
                <p>
                Welcome to Marcus Cars, Syria's premier platform for purchasing high-end, luxury vehicles. Since our establishment in "year", we have been committed to providing our valued customers with the highest quality automobiles from the world's leading brands. 
                </p>
                <p>
                Based in "city name", Syria, we have built a solid reputation for excellent customer service, unrivaled selection, and seamless shipping process. Our commitment is to bring luxury to your doorstep, with the added flexibility of card payments, cash on delivery, or installments.
                </p>
            </div>
             <div class="col-md-6">
                <img class="img-fluid" src="images/3.jpg" alt="About us image">
            </div>
           
        </section>

        <section id="our-mission" class="mb-4">
            <h2 class="h3">Our Mission</h2>
            <p>
            Our mission is to bridge the gap between luxury car enthusiasts and their dream vehicles. We do this by ensuring a smooth, transparent, and hassle-free purchasing experience that extends beyond the sale, with door-to-door shipping that makes luxury accessible, no matter where our clients are.
            </p>
        </section>

        <section id="legal-info" class="mb-4">
            <h2 class="h3">Legal Information</h2>
            <p>
            Marcus Cars operates in full compliance with the laws and regulations of the Syrian Arab Republic. Our operations adhere strictly to the guidelines set by the "relevant government authorities".
            </p>
            <p>
            Marcus Cars is a registered entity under the "relevant governing body". We fully respect and uphold the principles of data privacy and protection. Please review our <a href="/privacy-policy">Privacy Policy</a> and <a href="/terms-of-service">Terms of Service</a> for detailed information.
            </p>
            <p>
            All transactions conducted through Marcus Cars are secured with state-of-the-art encryption technologies to ensure the utmost security and confidentiality of our customers' information.
            </p>
        </section>
    </main>
</body>

<?php include 'footer.php' ?>







</html>