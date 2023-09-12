<?php
  session_start(); // Start or resume the session

  if (!isset($_SESSION['username'])) {
    // If the 'username' session variable isn't set, redirect to the login page
    header('Location: login.php');
    exit; // Stop further execution of the script
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<link rel="stylesheet" href="bootStrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootStrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="sales_css/style.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    
<!--codes for add cart notification !-->
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


<?php require_once 'dbconfig.php' ?>

<?php 
	$result = $mysqli->query("SELECT * FROM products") or die($mysqli->error);

	if ($result->num_rows > 0) {
		$row = $result->fetch_array();
		$pics = $row['picture'];
		$brnd = $row['brand'];
		$mdl = $row['model'];
		$spcs = $row['specs'];
		$prc = $row['price'];


	}
 ?>
<body>
	<nav class="navtop">
		<div>
			<a href="index.php"><i class="fa fa-home"></i>Home</a>
			<h1 style="color: #EDC00A;">Moutaz Motors</h1>
			<a href="about.php"><i class="fa fa-group"></i>about</a>
    	    <a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span id="noti_number" class="badge badge-danger badge-counter"></span></a>
    	    <a href="product.php" name="hey"><i class="fa fa-car"></i>Products</a>
			<a href=""><i class="fa fa-user-circle"></i>Profile</a>
			<a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a>
		</div>
	</nav>
	<?php 
		$result = $mysqli->query('SELECT * FROM tblregister WHERE Username = "'.$_SESSION['name'].'"') or die($mysqli->error);
		$row = $result->fetch_assoc();
	 ?>
	<div class="container py-5">
    <div class="row">
      <div class="col-lg-6 mb-3">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fas fa-user-circle"></i> Profile</h4>
          </div>
          <div class="card-body">
            <h5 class="card-title">Details</h5>
            <table class="table table-borderless">
              <tr>
                <td><strong>User Type:</strong></td>
                <td><?=$row['user_type']?></td>
              </tr>
              <tr>
                <td><strong>Name:</strong></td>
                <td><?=$_SESSION['name']?></td>
              </tr>
              <tr>
                <td><strong>Number:</strong></td>
                <td><?=$row['mobile']?></td>
              </tr>
              <tr>
                <td><strong>Firstname:</strong></td>
                <td><?=$row['firstname']?></td>
              </tr>
              <tr>
                <td><strong>Lastname:</strong></td>
                <td><?=$row['lastname']?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <?php 
        $result = $mysqli->query('SELECT * FROM purchase_history, tblregister WHERE tblregister.username=purchase_history.username AND tblregister.Username = "'.$_SESSION['name'].'"') or die("$mysqli->error");
      ?>
      <div class="col-lg-6 mb-3">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fas fa-shopping-cart"></i> My Purchases</h4>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th>Model</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php while($display_purchase = $result->fetch_assoc()): ?>
                <tr>
                  <td><img src="<?=$display_purchase['picture']?>" width="200" ></td>
                  <td><?=$display_purchase['model']?></td>
                  <td><?=$display_purchase['price']?></td>
                  <td>
                    <a href="" class="btn btn-success">Buy Again</a>
                  </td>
                </tr>
              <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- jQuery, Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<?php include 'footer.php' ?>
</body>
</html>