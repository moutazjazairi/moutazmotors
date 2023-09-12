<?php require_once 'dbconfig.php' ?>  

<?php 

$id = "";
$model = ""; 
$price = "";
$qty = "";
$total = "";

if (!isset($_SESSION['name'])) {
session_start();	


}
	
	
	if (isset($_GET['addcart'])){
 		$id = $_GET['addcart'];
 		
 		$addcart = $_GET['addcart'];
 		$qty = $_POST['quantity'];
 		
 		$result = $mysqli->query("SELECT * FROM products WHERE id = $id") or die($mysqli->error);
		 $num3_rows=mysqli_num_rows($result);
		 if ($num3_rows == 1 ||$num3_rows >= 1){
 			$row = $result->fetch_array();
 			$model = $row['model'];
 			if (isset($addcart)) {
 				$qty = 1;
 		

 				
				$mysqli->query("INSERT INTO addcart(id,username,quantity,c_model) VALUES('$id','".$_SESSION['name']."','$qty','$model')") or die($mysqli->error);
				header("location:product.php");
			}
 		}		

 	}


 	
	if (isset($_GET['checkout'])) {
		$id = $_GET['checkout'];


		$result = $mysqli->query("SELECT addcart.id,addcart.quantity,products.picture,products.price, products.model FROM addcart RIGHT JOIN products ON addcart.id = products.id WHERE addcart.id= '$id' AND addcart.username = '".$_SESSION['name']."'");
		$num2_rows=mysqli_num_rows($result);
		if ($num2_rows == 1 ||$num2_rows > 1){
			$row = $result->fetch_array();

			$id = $row['id'];
			$model = $row['model'];
			$price = $row['price'];
			$qty = $row['quantity'];
			$picture = $row['picture'];
			$total = $price * $qty;
		}

	}
	if (isset($_GET['delete_cart'])) {
		$id = $_GET['delete_cart'];

		$mysqli->query("delete from addcart where id = '$id' and username = '".$_SESSION['name']."'") or die($mysqli->error);
		header("location:cart.php");
	}



	// minus the cart
	if (isset($_GET['cart_minus'])){
 		$id = $_GET['cart_minus'];
 		
 	
 		
 		$result = $mysqli->query("SELECT * FROM addcart WHERE id = $id and username = '".$_SESSION['name']."'") or die($mysqli->error);
		 $num1_rows=mysqli_num_rows($result);
 		if ($num1_rows == 1 ||$num1_rows > 1) {
			$cart = $result->fetch_array();
			$cp_quantity = $cart['quantity'] - 1;
			$minus_id = $cart['id'];
			$number_cart = $cart['quantity'];
			$un_minus = $_SESSION['name'];

			$mysqli->query("UPDATE addcart SET quantity = $cp_quantity WHERE id = $minus_id and username = '$un_minus'");

			header("location:cart.php");
		}
 	}

 	// add values
 	if (isset($_GET['cart_plus'])) {
 		$plus_id = $_GET['cart_plus'];

 		$fetch_cart = $mysqli->query("SELECT * FROM addcart WHERE id = $plus_id and username = '".$_SESSION['name']."'") or die($mysqli->error);
		$num_rows=mysqli_num_rows($fetch_cart);
 		if ($num_rows == 1 ||$num_rows > 1) {

 			$cart =$fetch_cart->fetch_array();
			$cp_qty = $cart['quantity'] + 1;
			$plus_id = $cart['id'];
			$number_cart = $cart['quantity'];
			$un_plus = $_SESSION['name'];

			$mysqli->query("UPDATE addcart SET quantity = $cp_qty WHERE id = $plus_id and username = '$un_plus'");

			header("location:cart.php");
 		}
 	}
 ?>