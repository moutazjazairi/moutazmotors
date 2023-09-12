<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
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
        <a href="index.php"><i class="fa fa-home"></i>Home</a>
          <h1 style="color: #EDC00A;">Moutaz Motors</h1>
          <a href="about.html"><i class="fa fa-group"></i>About</a>
          <a href="product.php" name="hey"><i class="fa fa-car"></i>Products</a>
          <a href="user_profile.php"><i class="fa fa-user-circle"></i>Profile</a>
          <a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a>
        </div>
      </nav>
	

	
	<div class="limiter">
    <div class="container-login100" style="background-image: url('images/login.jpg');">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <form method="post"  class="login100-form validate-form flex-sb flex-w">
                <span class="login100-form-title p-b-53">
                    Sign Up With
                </span>

                <a href="#" class="btn-face m-b-20">
                    <i class="fa fa-facebook-official"></i>
                    Facebook
                </a>

                <a href="#" class="btn-google m-b-20">
                    <img src="images/icons/icon-google.png" alt="GOOGLE">
                    Google
                </a>

                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        First Name
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="First name is required">
                    <input id="firstname" class="input100" type="text" name="firstname" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="p-t-13 p-b-9">
                    <span class="txt1">
                        Last Name
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Last name is required">
                    <input id="lastname" class="input100" type="text" name="lastname" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="p-t-13 p-b-9">
                    <span class="txt1">
                        Username
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <input id="usern" class="input100" type="text" name="usern" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="p-t-13 p-b-9">
                    <span class="txt1">
                        Password
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input id="password" class="input100" type="password" name="password" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn m-t-17">
                    <button class="login100-form-btn"  name="register" type="submit"  >
                        Sign Up
                    </button>
                </div>

                <div class="w-full text-center p-t-55">
                    <span class="txt1">
                        Already a member?
                    </span>

                    <a href="login.php" class="txt2 bo1">
                        Log in now
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="dropDownSelect1"></div>

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

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