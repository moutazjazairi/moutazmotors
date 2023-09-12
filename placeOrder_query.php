<?php include 'dbconfig.php' ?>
<?php


	if (isset($_POST['purchase'])) {
		$model = $_POST['model'];
		$price = $_POST['price'];
		$qty = $_POST['quantity'];
		$total = $_POST['total'];
		$fn = $_POST['firstname'];
		$ln = $_POST['lastname'];
		$add = $_POST['address'];
		$num = $_POST['mobile'];
		$pics = $_POST['picture'];
		$pmode = $_POST['pmode'];
		$username=$_POST['username'];
		


		// $mysqli->query("INSERT INTO purchase_history(username,firstname,lastname,mobile,address,picture,model,price,quantity,total) VALUES('$usname','$fn','$ln','$num','$add','$pics','$model','$price','$qty','$total')") or die($mysqli->error);
		$stmt = $mysqli->prepare('INSERT INTO purchase_history (username,lastname,mobile,address,picture,model,price,quantity,total,payment_mode,date)VALUES(?,?,?,?,?,?,?,?,?,?,NOW())')or die($mysqli->error);
		
	    $stmt->bind_param('ssssssssss',$username,$ln,$num,$add,$pics,$model,$price,$qty,$total,$pmode);
	    $stmt->execute();
	    $id = $_POST['id'];
	    $uname = $_POST['username'];
	    $stmt2 = $mysqli->prepare("DELETE FROM addcart WHERE id = '$id' AND username = '$uname'");
	    $stmt2->execute();





		
		$mysqli->query("delete from addcart where id = '$id' and username = '".$_SESSION['name']."'");

		$_SESSION['message'] = "item has been successfully purchased!";
		$_SESSION['msg_type'] = "success";

		header("location:cart.php");

	}
	

 ?>  