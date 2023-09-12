<!DOCTYPE html>
<html>
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

<?php require_once 'dbconfig.php' ?>
<?php require_once 'addcart_query.php'  ?>
<?php require_once 'placeOrder_query.php' ?>

    
    <?php 
      $result = $mysqli->query("SELECT mobile,firstname,lastname,quantity FROM tblregister,addcart WHERE tblregister.username=addcart.username AND addcart.username = '".$_SESSION['name']."'") or die($mysqli->error);
      $data = $result->fetch_assoc();
     ?>
    


  <?php 
    
    
    $result = $mysqli->query("SELECT picture,price,model,quantity FROM products,addcart 
      WHERE products.id=addcart.id AND addcart.username = '".$_SESSION['name']."'") or die($mysqli->error);

   ?>

   <?php 
   
    $cart_product = $mysqli->query("SELECT addcart.id, addcart.quantity, products.price,products.picture, products.model
    FROM addcart RIGHT JOIN products ON addcart.id = products.id WHERE addcart.username ='".$_SESSION['name']."'") or die($mysqli->error);

    ?>
   
 



 <script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "data.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();

</script>
<style>
  #noti_number{
    color: red;
    font-size: 12px;
    padding: 5px;
    text-decoration: none;
    margin-top: 10px;
  }
</style>
<div class="cart-conatiner">
    <div class="row">
      <div class="col-lg-8 mb-2">
        
        
        <p><h4>My cart  <a href="cart.php" id="noti_number"></a></h4></p>
        <div class="row">
              <?php while($row = $cart_product->fetch_assoc()): ?>
                <div id="card" class="col-lg-3 mb-2"> 
                  <input type="hidden" name="username" value="<?php echo $_SESSION['name'] ?>">
                   <div class="form-group">
                     <td><strong><?php echo $row['model'] ?></strong></td>
                   </div>
                   <div class="form-group">
                      <td><img src="<?php echo $row['picture'] ?>" height="150" width="150"></td>
                   </div>
                   <div class="form-group">
                      <label id="cart_price" name="price"><?php echo '$ ' . number_format($row['price'],2) ?></label>
                    </div>
                    <div class="form-group"> 
                      <table>
                        <tr>
                          <td> <a style="color: red;" href="addcart_query.php?cart_minus=<?php echo $row['id'] ?>"  class="btn"><i class="fa fa-minus"></i></a></td>
                           <td><input  style="width:45px;" min="1" name="cp_quantity"class="form-control" value="<?php echo $row['quantity'] ?>"></td>
                           <td> <a style="color: red;" href="addcart_query.php?cart_plus=<?php echo $row['id'] ?>"  class="btn"><i class="fa fa-plus"></i></a></td>
                        </tr>
                      </table>
                    </div>
                   
                    <div class="form-group">
                      <a href="cart.php?checkout=<?php echo $row['id'] ?>" class="btn btn-success">Check Out<i class="fa fa-check"></i></a>
                      <a style="color: red; float: right;" href="addcart_query.php?delete_cart=<?php echo $row['id'] ?>" onClick="return confirm('Are you sure you want to delete <?php echo $row['model'] ?> from your cart?')"  class="btn"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
              <?php endwhile; ?>   
             </div>
      </div>


      <div style="border-left: 4px solid green;" class="col-lg-4 mb-3">
        
        <?php if (isset($_SESSION['message'])): ?>
          <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
              <?php
              echo $_SESSION['message'];
              unset($_SESSION['message']);
              ?>
          </div>
        <?php endif ?>

         
        <h4>Place Order</h4>
        <p style="color: gray;">NOTE: Please select and click the button checkout in your cart to fully purchase an item you want!</p>
        <form action="placeOrder_query.php" method="post" id="placeOrder">
            <data><img src="<?php echo $picture ?>" width="60" height="80"> </data>
          <div style="float: right;" class="col-lg-9 mb-4">
            <label for="model">Model:
               <input type="text" name="model" placeholder="model" value="<?php echo $model ?>">
            </label>
                <input type="hidden" name="picture" value="<?php echo $picture ?>">
            <label>Price:$
               <input type="text" name="price" placeholder="price" value="<?php echo number_format($price,2); ?>">
            </label>
            <label for="quantity">Quantity:
               <input type="text" name="quantity" placeholder="quantity" value="<?php echo $qty  ?>">
            </label>
            <label>Total:$
               <input type="text" name="total" placeholder="total" value="<?php echo number_format($total,2); ?>"><br>
               <!--this two input are type=hidden is use for querying to delete the specific product addded form cart using condition of id and username if user had click the place order, the item form cart is automatic removing !-->
               <input type="hidden" name="id" value="<?php echo $id ?>">
               <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">
            </label>
          </div>

            <div class="col-lg-12">
              <div class="form-group">
                <input class="form-control" type="text" name="firstname" placeholder="firstname" value="<?php echo $data['firstname'] ?>" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="lastname" placeholder="lastname" value="<?php echo $data['lastname'] ?>" required>
              </div>
              <div class="form-group">
                <textarea type="text" name="address" id="Address" placeholder="complete address" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <input type="text" name="mobile" placeholder="mobile" class="form-control" value="<?php echo $data['mobile'] ?>">
              </div>
              <h6 class="text-center lead form-group" style="color:blue; font-weight: 1px solid blue;">Select Payment Mode</h6>
              <select class="form-control" id="s_origin" name="pmode">
                   <option value="" selected disabled>-Select Payment Mode-</option>
                   <option>cash</option>
                   <option>installment</option><p>1% off</p>
                   <option>visa card</option>
                </select> 
            <div class="col-lg-10 mb-6 form-group" style="margin-top: 15px;">
                <input type="submit" name="purchase" value="Place Order" style="float: right;" class="btn btn-primary"><i class="icon-bar"></i>
                <a href="cart.php" class="btn btn-warning">Cancel Order</a>
            </div>
       </form>
      </div>
    </div>
  </div>

  

    <footer class="footer-distributed">

      <div class="footer-left">
          <img src="images/moutazmotors.png">
        <h3>About<span>Marcus Cars</span></h3>

        <p class="footer-links">
          <a href="#">Home</a>
          |
          <a href="#">Blog</a>
          |
          <a href="#">About</a>
          |
          <a href="#">Contact</a>
        </p>

        <p class="footer-company-name">MoutazMotorz @company </p>
      </div>

      <div class="footer-center">
        <div>
          <i class="fa fa-map-marker"></i>
            <p><span>Damascus,Syria</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>+963 934969050</p>
        </div>
        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:moutazjazairi77@gmail.com">MoutazMotorz.com</a></p>
        </div>
      </div>
      <div class="footer-right">
        <p class="footer-company-about">
          <span>About the company</span>
          We offer a high quality Cars</p>
        <div class="footer-icons">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-linkedin"></i></a>
          <a href="#"><i class="fa fa-youtube"></i></a>
        </div>
      </div>
    </footer>
</body>
</html>