<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../bootStrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../sales_css/style.css">
	<script src="jquery.js"></script>

</head>

<style>
	div .dash{
        margin: 2%;
        padding: 20px 10px;
        border-bottom: 2px solid #808080;
        box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2), 0 1px 1px 0 rgba(0, 0, 0, 0.19);
    }
    .dash i{
        font-size: 30px;
        color: #EDC00A;
    }
    #avail_row td{
    	padding: 7px;
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
<body>
	<nav class="navtop">
		<div id="name">
			<h1 style="color:#EDC00A ">Marcus Cars</h1>
			<a href="addproduct.php"><i class="fa fa-car"></i>Products</a>
			<a href="#"><i class="fa fa-list"></i>Reports</a>
			<a href="admin_profile.php"><i class="fa fa-user-circle"></i>Profile</a>
			<a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a>
		</div>
	</nav>
 <?php require_once '../dbconfig.php' ?>
        <?php
        //for available documents
         $result = $mysqli->query("SELECT SUM(p_quantity) AS 'quantity' FROM products") or die($mysqli->error);
         $row = $result->fetch_assoc();
         

         //purcahse history
         $fetch_history = $mysqli->query("SELECT * FROM purchase_history") or die($mysqli->error);
         $hist_row = $fetch_history->num_rows;

         // cart
         $fetch_cart = $mysqli->query("SELECT SUM(quantity) AS 'cart_quantity' FROM addcart") or die($mysqli->error);
         $cart_row = $fetch_cart->fetch_assoc();

         //User
         $fetch_user = $mysqli->query("SELECT * FROM users") or die($mysqli->error);
         $u_row = $fetch_user->num_rows;

         $fetch_user = $mysqli->query("SELECT * FROM tblregister") or die($mysqli->error);
         $u_row5 = $fetch_user->num_rows;
         

         //earnings monthly
         $fetch_monthly = $mysqli->query('SELECT SUM(total) AS "tot" FROM purchase_history WHERE date BETWEEN "2021-04-08" AND "2021-05-13"');
         $row_month = $fetch_monthly->fetch_assoc();


         //earnings annual
         $fetch_annual = $mysqli->query('SELECT SUM(total) AS "tot_annual" FROM purchase_history WHERE date BETWEEN "2021-04-08" AND "2022-03-11"');
         $row_annual = $fetch_annual->fetch_assoc();
         ?>
	<div class="col-lg-12">
        <div class="row justify-content-center" style="margin: 5%;">
            <div id="avail" class="col-lg-3 form-control dash">
                <label><strong>Available Products</strong><br><i class="fa fa-mobile" style="margin-right: 120px;"></i><?php echo  '<font color = red>' .$row['quantity']. '</font>'; ?></label><br>
             </div>

            <div id="history" class="col-lg-3 form-control dash">
                    <label><strong>Purchase History</strong><br><i class="fa fa-history" style="margin-right: 120px;"></i><?php echo  '<font color = red>'.$hist_row.'</font>'; ?> </label><br>
            </div>

             <div id="monthly" class="col-lg-3 form-control dash">
                    <label><strong>Earnings (Monthly)</strong><br><i class="fa fa-calendar" style="margin-right: 120px;"></i>$ <?php echo  '<font color = red>' .number_format($row_month['tot'],2). '</font>'; ?></label><br>
            </div>

             <div id="annaul" class="col-lg-3 form-control dash">
                    <label><strong>Earnings (Annual)</strong><br><i class="fa fa-calendar" style="margin-right: 120px;"></i>$ <?php echo  '<font color = red>' .number_format($row_annual['tot_annual'],2). '</font>'; ?></label><br>
            </div>

            <div id="cart" class="col-lg-3 form-control dash">
                    <label><strong>In Cart Products</strong><br><i class="fa fa-shopping-cart" style="margin-right: 120px;"></i><?php echo  '<font color = red>' .$cart_row['cart_quantity']. '</font>'; ?>
                    </label><br>
            </div>

            <div id="user" class="col-lg-3 form-control dash">
                    <label><strong>Users</strong><br><i class="fa fa-group" style="margin-right: 120px;">
                    	</i><?php echo  '<font color = red>'.$u_row.'</font>'; ?></label><br>
             </div>

             <div id="user" class="col-lg-3 form-control dash">
                    <label><strong>Users1</strong><br><i class="fa fa-group" style="margin-right: 120px;">
                    	</i><?php echo  '<font color = red>'.$u_row5.'</font>'; ?></label><br>
             </div>
        </div> 

        <!--available products!-->
        <div id="t_avail" class="container" style="display: none;">
        	<div class="col-lg-12" style="margin-top: -100px;">
             	<?php 
             		$fetch_prod = $mysqli->query("SELECT * FROM products");
             	 ?>
             	 <button id="avail_back" style="float: right;" class="btn btn-warning form-group">back</button>
                 <a href="print_avail_products.php" class="btn btn-secondary" style="float: right;margin-right: 2px;"><i class="fa fa-print" style="color: white;"></i> Print list</a>
             	  
             	 <h5>Available Products: <span class="badge badge-danger badge-counter"><?php echo  '<font color = white>' .$row['quantity']. '</font>'; ?></span></h5>
             	<table class="table">
             		<thead>
             			<th>Model</th>
             			<th>Quantity</th>
             			<th>specs</th>
             			<th>price</th>
             		</thead>
             		<?php while($p_row= $fetch_prod->fetch_assoc()): ?>
             			<tr id="avail_row">
             				<td><?php echo $p_row['model'] ?></td>
             				<td><?php echo $p_row['p_quantity'] ?></td>
             				<td><img src="../<?php echo $p_row['picture'] ?>" height="100" width="100"></td>
             				<td><?php echo $p_row['price'] ?></td>
             			</tr>
             		<?php endwhile; ?>
             	</table>
             </div>
        </div>

        <!--Purchase Histry!-->
        <div id="h_avail" class="container" style="display:none;">
        	<div class="col-lg-12" style="margin-top: -100px;">
             	<?php 
             		$fetch_hist = $mysqli->query("SELECT * FROM purchase_history");
             	 ?>
             	 <button id="history_back" style="float: right; margin-left: 2PX;" class="btn btn-warning form-group">back</button>
                 <a href="print_purchase_history.php" class="btn btn-secondary" style="float: right;margin-right: 2px;"><i class="fa fa-print" style="color: white;"></i> Print list</a>
             	 <h5>Purchase Products</h5>
             	<table class="table">
             		<thead>
             			<th>Buyer</th>
             			<th>Adrress</th>
             			<th>Unit</th>
             			<th>Quantity</th>
             			<th>Total</th>
             			<th>Price</th>
             			<th>Payment Method</th>
             			<th>Date</th>
             		</thead>
             		<?php while($h_row= $fetch_hist->fetch_assoc()): ?>
             			<tr id="avail_row">
             				<td><?php echo $h_row['firstname'] ?></td>
             				<td><?php echo $h_row['address'] ?></td>
             				<td><?php echo $h_row['model'] ?></td>
             				<td><?php echo $h_row['quantity'] ?></td>
             				<td><?php echo $h_row['total'] ?></td>
             				<td><?php echo $h_row['price'] ?></td>
             				<td><?php echo $h_row['payment_mode'] ?></td>
             				<td><?php echo $h_row['date'] ?></td>
             			</tr>
             		<?php endwhile; ?>
             	</table>
             </div>
        </div>

        <!--In cart!-->
        <div id="inCart" class="container" style="display:none;">
        	<div class="col-lg-12" style="margin-top: -100px;">
             	<?php 
             		$fetch_cart = $mysqli->query("SELECT * FROM addcart");
             	 ?>
             	 <button id="history_back" style="float: right;margin-left: 2px;" class="btn btn-warning form-group">back</button>
             	 <a href="print_incart.php" class="btn btn-secondary" style="float: right;margin-right: 2px;"><i class="fa fa-print" style="color: white;"></i> Print list</a>
             	 <h5>In Cart Products</h5>
             	<table class="table">
             		<thead>
             			<th>Quantity</th>
             			<th>Unit</th>
             		</thead>
             		<?php while($cart_row = $fetch_cart->fetch_assoc()): ?>
             			<tr id="cart_row">
             				<td><?php echo $cart_row['quantity'] ?></td>
             				<td><?php echo $cart_row['c_model'] ?></td>
             			</tr>
             		<?php endwhile; ?>
             	</table>
             </div>
         </div>



         <!--User!-->
        <div id="t_user" class="container" style="display:none;">
        	<div class="col-lg-12" style="margin-top: -100px;">
             	<?php 
             		$fetch_user = $mysqli->query("SELECT * FROM users");
             	 ?>
             	 <button id="history_back" style="float: right; margin-left: 2PX;" class="btn btn-warning form-group">back</button>
             	 <a href="print_users.php" class="btn btn-secondary" style="float: right;margin-right: 2px;"><i class="fa fa-print" style="color: white;"></i> Print list</a>
             	 <h5>Users</h5>
             	<table class="table">
             		<thead>
             			<th>Username</th>
             			<th>Email</th>
             			<th>User Type</th>
             		</thead>
             		<?php while($user_row= $fetch_user->fetch_assoc()): ?>
             			<tr id="avail_row">
             				<td><?php echo $user_row['username'] ?></td>
             				<td><?php echo $user_row['email'] ?></td>
             				<td><?php echo $user_row['user_type'] ?></td>
             			</tr>
             		<?php endwhile; ?>
             	</table>
             </div>
        </div>

         <!--monthly!-->
        <div id="e_month" class="container" style="display:none;">
            <div class="col-lg-12" style="margin-top: -100px;">
                <?php 
                    $fetch_hist = $mysqli->query("SELECT * FROM purchase_history");
                 ?>
                 <button id="history_back" style="float: right; margin-left: 2PX;" class="btn btn-warning form-group">back</button>
                 <a href="print_earnings_monthly.php" class="btn btn-secondary" style="float: right;margin-right: 2px;"><i class="fa fa-print" style="color: white;"></i> Print list</a>
                 <h5>Earnings Monthly: $ <?php echo  '<font color = red>' .number_format($row_month['tot'],2). '</font>'; ?></h5>
                <table class="table">
                    <thead>
                        <th>Buyer</th>
                        <th>Adrress</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Price</th>
                        <th>Payment Method</th>
                        <th>Date</th>
                    </thead>
                    <?php while($h_row= $fetch_hist->fetch_assoc()): ?>
                        <tr id="avail_row">
                            <td><?php echo $h_row['firstname'] ?></td>
                            <td><?php echo $h_row['address'] ?></td>
                            <td><?php echo $h_row['model'] ?></td>
                            <td><?php echo $h_row['quantity'] ?></td>
                            <td><?php echo $h_row['total'] ?></td>
                            <td><?php echo $h_row['price'] ?></td>
                            <td><?php echo $h_row['payment_mode'] ?></td>
                            <td><?php echo $h_row['date'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
             </div>
        </div>

         <!--monthly!-->
        <div id="e_annual" class="container" style="display:none;">
            <div class="col-lg-12" style="margin-top: -100px;">
                <?php 
                    $fetch_hist = $mysqli->query("SELECT * FROM purchase_history");
                 ?>
                 <button id="history_back" style="float: right; margin-left: 2PX;" class="btn btn-warning form-group">back</button>
                 <a href="print_earnings_annual.php" class="btn btn-secondary" style="float: right;margin-right: 2px;"><i class="fa fa-print" style="color: white;"></i> Print list</a>
                 <h5>Earnings Annual: $ <?php echo  '<font color = red>' .number_format($row_annual['tot_annual'],2). '</font>'; ?></h5>
                <table class="table">
                    <thead>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Price</th>
                        <th>Payment Method</th>
                    </thead>
                    <?php while($h_row= $fetch_hist->fetch_assoc()): ?>
                        <tr id="avail_row">
                            <td><?php echo $h_row['model'] ?></td>
                            <td><?php echo $h_row['quantity'] ?></td>
                            <td><?php echo $h_row['total'] ?></td>
                            <td><?php echo $h_row['price'] ?></td>
                            <td><?php echo $h_row['payment_mode'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
             </div>
        </div>

	</div>
    <div id="foot">
        <?php include '../footer.php' ?>
    </div>

	<script>
		$(document).ready(function(){

         //vailable products
         $('#avail').click(function () {
            $('#t_avail').toggle(400);
            $('#cart,#history,#avail,#user,#h_avail,#inCart,#annaul,#monthly').css("display","none");
        });

         //history
         $('#history').click(function () {
            $('#h_avail').toggle(400);
            $('#cart,#history,#avail,#user,#inCart,#annaul,#monthly').css("display","none");
        });

         //in cart
         $('#cart').click(function () {
            $('#inCart').toggle(400);
            $('#cart,#history,#avail,#user,#h_avail,#annaul,#monthly').css("display","none");
        });

         //users
          $('#user').click(function () {
            $('#t_user').toggle(400);
            $('#cart,#history,#avail,#user,#h_avail,#annaul,#monthly').css("display","none");
        });

          //monthly
           $('#monthly').click(function () {
            $('#e_month').toggle(400);
            $('#cart,#history,#avail,#user,#h_avail,#inCart,#annaul,#monthly').css("display","none");
        });
           //annual
           $('#annaul').click(function () {
            $('#e_annual').toggle(400);
            $('#cart,#history,#avail,#user,#h_avail,#inCart,#annaul,#monthly').css("display","none");
        });

          //back
         $('#avail_back,#history_back').click(function () {
            $('#history,#cart,#avail,#user,#annaul,#monthly').css("display","block");
            $('#t_avail,#h_avail,#inCart,#t_user,#e_month,#e_annual').css("display","none");
        });

         $('#user,#cart,#avail,#history,#annaul,#monthly').hover(function(){
            $(this).css('background-color','whitesmoke');        
        });
        $('#user,#cart,#avail,#history,#annaul,#monthly').mouseleave(function(){
            $(this).css('background-color','white');
        });
	});
	</script>
</body>
</html>