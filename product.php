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
                <h1 style="color: #EDC00A;">Moutaz Motors</h1>
                <a href="about.php"><i class="fa fa-group"></i>about</a>
                <a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span id="noti_number" class="badge badge-danger badge-counter"></span></a>
                <a href="product.php" name="hey"><i class="fa fa-car"></i>Products</a>
                <a href="user_profile.php"><i class="fa fa-user-circle"></i>Profile</a>
                <a href="logout.php"><i class="fa fa-power-off"></i>Log out</a>
            </div>
        </nav>
        
    

    
        <?php
        
        $result = $mysqli->query("SELECT addcart.id, addcart.quantity as 'cart_qty',products.model,products.p_quantity as 'p_qty',products.brand,products.pics,products.type,products.specs,products.price,products.id,products.picture
    FROM addcart RIGHT JOIN products ON addcart.id = products.id") or die($mysqli->error);
        ?>


<div class="container">
    <div class="form-group row">
        <div class="input-group mt-3 col-sm">
            <select name="brand" class="form-control" id="brand">
            <option selected value="All">All</option>
                    <option value="BMW">BMW</option>
                    <option value="MARCEDES">MARCEDES</option>
                    <option value="TOYOTA">TOYOTA</option>
                    <option value="NISSAN">NISSAN</option>
                    <option value="AUDI">AUDI</option>
                    <option value="FORD">FORD</option>
                    <option value="BUGATI">BUGATI</option>
                    <option value="POURCHE">POURCHE</option>
                <!-- Other options... -->
            </select>
        </div>

        <div class="input-group mt-3 col-sm">
            <select name="type" class="form-control" id="type">
          
                    <option selected value="All">All</option>
                    <option value="1">Sedan</option>
                    <option value="2">SUV</option>
                    <option value="3">Sport</option>
                    <option value="4">RoadStar</option>
                    <option value="5">Coupe</option>
                </select>
        </div>

        <div class="input-group mt-3 col-sm">
            <select name="price" class="form-control" id="price">
            <option selected value="All">All</option>
            <option value="0-150000">$0 - $150K</option>
                    <option value="150000-1000000">$150K - $1000K</option>
                    <option value="1000000-10000000">$1000K - $10000K</option>
            </select>
        </div>

        <div class="input-group mt-3 col-sm">
            <button type="submit" class="btn btn-outline-secondary w-100" id="filter-btn">Filter</button>
        </div>
    </div>
</div>

<div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="carModalLabel">Car Specifications</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="carSpecsModalBody">
        
        <div id="carpicscr" class="carousel slide" data-ride="carousel">
    
    <ul id="carpicsul" class="carousel-indicators">

    </ul>

    
    <div id="carpicsinner" class="carousel-inner">

      
    </div>

    
    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</div>
      </div>
    </div>
  </div>
</div>



<div class="row" id="products-container">

   
            <?php while ($row = $result->fetch_assoc()) : ?>

                <div class="col-lg-3 mb-4" data-type = <?php echo number_format($row['type']); ?> data-brand= <?php echo $row['brand'] ?> data-price=<?php echo($row['price']); ?> > 
                    <div class="card" data-type = <?php echo number_format($row['type']); ?>>
                        <img src="<?php echo $row['picture'] ?>" class="card-img-top" alt="Product image">
                        <div class="card-body">
                            <h5 class="card-title"><strong><?php echo $row['model'] ?></strong></h5>
                            <p class="card-text">Available: <?php echo $row['p_qty'] - $row['cart_qty'] ?></p>
                            <p class="card-text">$<?php echo number_format($row['price'], 2); ?></p>

<button type="button" class="btn btn-link" onclick="showCarSpecs('<?php echo $row['specs']; ?>','<?php echo $row['pics']; ?>')">More info</button>
                            <a href="product.php?addcart=<?php echo $row['id'] ?>" class="btn btn-warning float-right">Add to cart <i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>              
    
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  function showCarSpecs(specs,pics) {
    var carSpecsModalBody = document.getElementById('carSpecsModalBody');
    var carPicsul = document.getElementById('carpicsul');
    var carPicsinner = document.getElementById('carpicsinner');
    var specsObj =specs;
    var carpics = pics;
    var specsArray = {};
    var picsArray = {};
    carSpecsModalBody.innerHTML = `<div id="carpicscr" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ul id="carpicsul" class="carousel-indicators">

    </ul>

    <!-- Slides -->
    <div id="carpicsinner" class="carousel-inner">

      
    </div>

    <!-- Controls -->
    <a class="carousel-control-prev" href="#carpicscr" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carpicscr" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</div>`;
var picsArray = carpics.split(',');

    console.log(carPicsinner)
    var uls="";
    var pics ="";
   
    for (const url in picsArray) {
        console.log(url);
        if (url==0){
        uls +=  `<li data-target="#myCarousel" data-slide-to="${url+1}"  class="active"></li>`
        pics += `<div class="carousel-item active">
        <img src="${picsArray[url]}" alt="Image ${url+1}" style="width:100%;">
      </div>`
        }
        else {
            uls +=     `<li data-target="#myCarousel" data-slide-to="${url+1}"></li>`
        pics += `<div class="carousel-item">
        <img src="${picsArray[url]}" alt="Image ${url+1}" style="width:100%;">
      </div>`
        }
    }
    console.log(pics);
    console.log(uls);
    carPicsinner.innerHTML = pics;
    carPicsul.innerHTML = uls;
    console.log(carPicsinner);

    // Split the specs by commas
    var specsArray = specsObj.split(',');

    // Define keys and their corresponding indexes in the specsArray
    var keys = ['Motor style', 'Motor capacity', 'Horse power', 'Details', 'Additional'];

    // Map each key to its value from the specsArray
    for (var i = 0; i < keys.length; i++) {
      specsObj[keys[i]] = specsArray[i] || '';
    }

    for (const key in keys) {
        if( specsArray[key] != undefined ) {
      carSpecsModalBody.innerHTML += '<p><strong>' + keys[key] + ':</strong> ' + specsArray[key] + '</p>';
    }
    }
   
  jQuery(function($) {
    
    $('#carModal').modal('show');
  });
  carPicsinner = document.getElementById('carpicsinner');
  carPicsul = document.getElementById('carpicsul');
  carPicsinner.innerHTML = pics
  carPicsul.innerHTML = uls;

  }
</script>

<script>
var filterBtn = document.getElementById('filter-btn');
var brandSelect = document.getElementById('brand');
var typeSelect = document.getElementById('type');
var priceSelect = document.getElementById('price');
var productsContainer = document.getElementById('products-container');

filterBtn.addEventListener('click', function(event) {
    
    event.preventDefault();

    
    var selectedBrand = brandSelect.value;
    var selectedType = typeSelect.value;
    var selectedPrice = priceSelect.value.split('-'); 
    
    
    var minPrice = Number(selectedPrice[0]);
    var maxPrice = Number(selectedPrice[1]);
    console.log(minPrice,maxPrice);
    
    var products = Array.from(productsContainer.children);
    console.log(products);
    products.forEach(function(product) {
    
    var productBrand = product.getAttribute('data-brand');
    var productType = product.getAttribute('data-type');
    var productPrice = Number(product.getAttribute('data-price'));

    
    var isBrandMatch = selectedBrand !== 'All' ? productBrand === selectedBrand : true;
    var isTypeMatch = selectedType !== 'All' ? productType === selectedType : true;
    var isPriceMatch = selectedPrice[0] !== 'All' ? productPrice >= minPrice && productPrice <= maxPrice : true;

    if (isBrandMatch && isTypeMatch && isPriceMatch) {
        
        product.style.display = '';
    } else {
        
        product.style.display = 'none';
    }
});


});
</script>

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


