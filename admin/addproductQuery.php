<?php include '../dbconfig.php' ?>

<?php 
if (!isset($_SESSION['name'])) {
	session_start(); 
}
 
	$id = 0;
	
	$update = false;
	$pbrand = "";
	$pmodel = "";
	$pspecs = "";
	$pprice = "";
	$pqty = "";

	if (isset($_POST['btnAddproduct'])) {
		$brand = $_POST['brand'];
		$model = $_POST['model'];
		$specs = $_POST['specs'];
		$p_qty = $_POST['quantity'];
		$price = $_POST['price'];
		$filename = $_FILES['uploadfile']['name'];
		$tmp_name = $_FILES['uploadfile']['tmp_name'];
		$folder = "images/".$filename;
		echo $folder;
		move_uploaded_file($tmp_name, $folder);



		$mysqli->query("INSERT INTO products(brand,model,specs,p_quantity,picture,price) VALUES('$brand','$model','$specs','$p_qty','$folder','$price')") or die($mysqli->error());

		$_SESSION['message'] = "Record has been saved!";
		$_SESSION['msg_type'] = "success";
	
		header("location:addproduct.php"); 


	}

	if (isset($_GET['deleteproduct'])) {
		$id = $_GET['deleteproduct'];

		$mysqli->query("DELETE FROM products WHERE id = $id") or die($mysqli->error());
		
		$_SESSION['message'] = "Record has been deleted!";
		$_SESSION['msg_type'] = "danger";
		header("location:addproduct.php"); 
		
		
	}
	if (isset($_GET['editproduct'])) {
		$id = $_GET['editproduct'];

		$update = true;

		$result = $mysqli->query("SELECT * FROM products WHERE id = $id") or die($mysqli->error);

		if (count($result) == 1) {
			$row = $result->fetch_array();
			$id = $row['id'];
			$pmodel = $row['model'];
			$pbrand = $row['brand'];
			$pspecs = $row['specs'];
			$pqty = $row['p_quantity'];
			$pics  =  $row['picture'];
			$pprice = $row['price'];

		}
	}
?>