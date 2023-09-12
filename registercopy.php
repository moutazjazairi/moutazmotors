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
	<div class="login">
		<h1>Sign Up</h1>
		<form  method="post" class="form-control">
			<div class="form-group">
				<input type="text" name="firstname" placeholder="enter your firstname" class="form-control" required>			
			</div>		
			<div class="form-group">
				<input type="text" name="lastname" placeholder="enter your lastname" class="form-control" required>		
			</div>
			<div class="form-group">
				<input type="text" name="usern" placeholder="enter your username" class="form-control" required>			
			</div>
			<div class="form-group">
				<input type="password" name="password" placeholder="enter your password" class="form-control" required>				
			</div>
			<div class="form-group">
				<p>already have an account? <a href="login.php">log in</a></p>
			</div>
			<div class="form-group">
				<input type="submit" name="register" value="Sign Up" class="form-control">	
			</div>
			
		</form>
	</div>
</body>
</html>
<?php require_once 'dbconfig.php' ?>
<?php 
if (isset($_POST['register'])) {
	$fn = $_POST['firstname'];
	$ln = $_POST['lastname'];
	$un = $_POST['usern'];
	$psswrd = $_POST['password'];


	$mysqli->query("INSERT INTO tblregister(firstname,lastname,username,u_pass) VALUES('$fn','$ln','$un','$psswrd')") or die($mysqli->error);
	header("location:login.php");
}
?>