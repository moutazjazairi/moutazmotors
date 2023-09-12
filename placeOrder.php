<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
    <link rel="stylesheet" href="bootStrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootStrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="sales_css/style.css">
<body>
<?php require_once 'dbconfig.php' ?>
<?php include 'addcart_query.php' ?>

    
    <?php 
    $result = $mysqli->query("SELECT mobile,firstname,lastname FROM tblregister,addcart WHERE tblregister.username=addcart.username AND
       addcart.username = '" . $_SESSION['name'] . "'") or die($mysqli->error);
    $data = $result->fetch_assoc();
    ?>


  <?php 
    
  $result = $mysqli->query("SELECT picture,price,model,quantity FROM products,addcart 
      WHERE products.id=addcart.id AND addcart.username = '" . $_SESSION['name'] . "'") or die($mysqli->error);

  ?>

     

    <?php 
   
    $result = $mysqli->query("SELECT addcart.id, addcart.quantity, products.price,products.picture, products.model
    FROM addcart RIGHT JOIN products ON addcart.id = products.id WHERE addcart.username ='" . $_SESSION['name'] . "'") or die($mysqli->error);

    ?>

 <div class="container">
  <div class="row justify-content-center">
    <form action="addcart_query.php" method="post">
      <data><img src="<?php echo $picture ?>" width="20" height="20"> </data>
      <input type="text" name="model" placeholder="model" value="<?php echo $model ?>">
      <input type="text" name="price" placeholder="price" value="<?php echo $price ?>">
      <input type="text" name="quantity" placeholder="quantity" value="<?php echo $qty ?>">
      <input type="text" name="total" placeholder="total" value="<?php echo $total ?>">
      

      <div class="col-lg-12">
        <div class="form-group">
          <input class="form-control" type="text" name="firstname" id="fullname" placeholder="firstname" value="<?php echo $data['firstname'] ?>" required>
          <input class="form-control" type="text" name="username" id="username" placeholder="firstname" value="<?php echo $_SESSION['username'] ?>" required>
        
        </div>
        <div class="form-group">
          <input class="form-control" type="text" name="lastname" id="fullname" placeholder="lastname" value="<?php echo $data['lastname'] ?>" required>
        </div>
        <div class="form-group">
          <textarea type="text" name="Address" id="Address" placeholder="complete address" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <input type="text" name="mobile" placeholder="mobile" class="form-control" value="<?php echo $data['mobile'] ?>">
        </div>
      </div>
       <div class="col-lg-10 mb-6 form-group">
            <button style="float: right;" class="btn btn-primary">Purchase Now</button>
              <a href="cart.php" class="btn btn-warning">Cancel Order</a>
          </div>
    </form>
  </div>
</div>
</body>
</html>