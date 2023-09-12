<?php

	session_start();
	if (!isset($_SESSION['loggedin'])) {
	    echo "<script>
				alert('you must login first or create an account if you have not, to access all features!');
				<?php
					echo 'jhj,hbj';
				?>
				window.location.href='login.php';
			  </script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<link rel="stylesheet" href="../bootStrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootStrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../sales_css/style.css">
    

<?php require_once '../dbconfig.php' ?>


<body>
	<nav class="navtop">
		<div>
			<h1>Marcus Cars</h1>
			<a href="addproduct.php"><i class="fa fa-car"></i>Products</a>
			<a href="reports.php"><i class="fa fa-list"></i>Reports</a>
			<a href=""><i class="fa fa-user-circle"></i>Profile</a>
			<a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a>
		</div>
	</nav>
	<?php 
		$result = $mysqli->query('SELECT mobile, user_type FROM tblregister WHERE Username = "'.$_SESSION['name'].'"') or die($mysqli->error);
		$row = $result->fetch_assoc();
	 ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-3">
				<h4>profile</h4>
				<div class="form-group">
					<h7>DETAILS:</h7>
					<table>
						<tr>
							<td><?php echo $row['user_type'].':' ?></td>
							<td><strong><?=$_SESSION['name']?></strong></td>
						</tr>
						<tr>
							<td>Number:</td>
							<td><strong><?=$row['mobile']?></strong></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php include '../footer.php' ?>
</body>
</html>