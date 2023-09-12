<?php require_once 'dbconfig.php' ?> 
<?php 
session_start();
 $result = $mysqli->query("SELECT picture,price,model FROM products,addcart 
		WHERE products.id=addcart.id AND addcart.username = '".$_SESSION['name']."'") or die($mysqli->error);


echo $result->num_rows;

			
 ?>
 




 