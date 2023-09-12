<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<link rel="stylesheet" href="bootStrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootStrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="sales_css/style.css">
 <style>
    body{
    	background-image:url('images/');
    	background-repeat: no-repeat;
    	background-size: 100%;
    	width: auto;		
 	}
 	.topnav{
            padding: 10px;
            background-color: #303030;
            color: white;
        }
 </style>
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
          <h1 style="color: #EDC00A;">Marcus Cars</h1>
          <a href="about.html"><i class="fa fa-group"></i>About</a>
          <a href="product.php" name="hey"><i class="fa fa-car"></i>Products</a>
          <a href="user_profile.php"><i class="fa fa-user-circle"></i>Profile</a>
          <a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a>
        </div>
      </nav>
	<div class="justify-content-center topnav">
        <p>Marcus Login</p>
    </div>
<div class="login row justify-content-center">
		<h1>Log In</h1>
		<form action="process.php" method="post" class="form-control">
			<input type="text" name="username" id="username" placeholder="Username" class="form-control form-group" required>
			<input type="password" name="password" id="password" placeholder="Password" class="form-control">
			<div>
				<p>Not yet register?<a href="register.php">create account</a></p>
			</div>
			<input style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-bottom: 10px;" type="submit" value="log In" class="form-control btn btn-success">
		</form>
	</div>
</body>
</html>
   
