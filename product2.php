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
        #noti_number{
            font-size: 10px;
            margin-bottom: 12px;
            margin-left: -9px;
        }
        a i{
            color: #EDC00A;
        }
        #name a{
            color: white;
        }
        #name a:hover{
            color: #C8BFC8;
        }
    </style>

    
    <script type="text/javascript">
        function loadDoc() {


            setInterval(function () {

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("noti_number").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "data.php", true);
                xhttp.send();

            }, 1000);


        }
        loadDoc();
        

    </script>

    <?php require_once 'dbconfig.php' ?>
    <?php require_once 'addcart_query.php' ?>

    <body>
        <nav class="navtop">
            <div>
                <a href="index.php"><i class="fa fa-home"></i>Home</a>
                <h1 style="color: #EDC00A;">Marcus Cars</h1>
                <a href="about.html"><i class="fa fa-group"></i>About</a>
                <a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span id="noti_number" class="badge badge-danger badge-counter"></span></a>
                <a href="product.php" name="hey"><i class="fa fa-car"></i>Products</a>
                <a href="user_profile.php"><i class="fa fa-user-circle"></i>Profile</a>
                <a href="logout.php"><i class="fa fa-power-off"></i>Log out</a>
            </div>
        </nav>
        
    

    
        <?php
        
        $result = $mysqli->query("SELECT addcart.id, addcart.quantity as 'cart_qty',products.model,products.p_quantity as 'p_qty',products.price,products.id,products.picture
    FROM addcart RIGHT JOIN products ON addcart.id = products.id") or die($mysqli->error);
        ?>



        
        <div class ="container">
            <div class="form-group">
                <label for="search">
                </label>
                <form style="margin-left: 88px;">
                    <input type="text" name="" placeholder="Search products...">
                    <a class="searchRecords" href="search_product.php"><i  class="fa fa-search"></i></a>
                </form>
            </div>
            <form action="addcart_query.php" method="post" enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div id="card" class="col-lg-3 mb-4"> 
                            <div class="form-group">
                                <label for="p_available">available:<?php echo $row['p_qty'] - $row['cart_qty'] ?>
                                </label>
                            </div>
                            <div class="form-group">
                                <label name="model"><strong><?php echo $row['model'] ?></strong></label>
                            </div>
                            <div class="form-group">
                                <td><img src="<?php echo $row['picture'] ?>" width="150" heigth="150"></td>
                            </div>
                            <div class="form-group">
                                <label name="price">$<?php echo number_format($row['price'], 2); ?></label>
                                <label><a href="search_product.php">more info</a></label><br>
                                 
                            </div>

                          
                            
                            


                            <div class="form-group"> 
                                <a href="product.php?addcart=<?php echo $row['id'] ?>" class="btn btn-warning">add to cart <i style="color: black;" class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    <?php endwhile; ?>              
                </div>
            </form>
        </div>
        <?php include 'footer.php' ?>
    </body>
</html>
<?php

if (!isset($_SESSION['loggedin'])) {
    echo "<script>
        alert('you must login first or create an account if you have not, to access all features!');
        window.location.href='login.php';
        </script>";
}
?> 


