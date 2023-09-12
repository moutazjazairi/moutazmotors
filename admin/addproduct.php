<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../bootStrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootStrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" type="text/css" href="../sales_css/style.css"> 
</head>
<script src="jquery.js"></script>
<style>
	.container{
		display: inline-flex; 

	}
	#action{
		display: inline-flex;
	}
	h4{
		margin: 10px;
		color: green;
	}
	#t_row td{
		padding: 5px;
		font-size: 12px;
	}
	.btn{
		font-size: 12px;
		margin: 2px;
	}	
	   .navtop i{
        color: #EDC00A;
    }
     #name a{
        color: white;
    }
    #name a:hover{
        color: #C8BFC8;
    }
  
        

</style>


	<?php require_once 'addproductQuery.php'; ?>

	
<body>
	<nav class="navtop">
		<div>
			<h1 style="color: #EDC00A;">Moutaz Cars</h1>
			<a href="addproduct.php"><i class="fa fa-car"></i>Products</a>
			<a href="reports.php"><i class="fa fa-list"></i>Reports</a>
			<a href="admin_profile.php"><i class="fa fa-user-circle"></i>Profile</a>
			<a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a>
		</div>
	</nav>
 <h4>Add Products</h4>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-4">
				<form action="addproductQuery.php" method="post" enctype="multipart/form-data" class="form-control">
					<div class="form-group">
						<label>Brand</label>
						<input type="text" name="brand" id="brand" value="<?php echo $pbrand ?>" placeholder="enter brand" class="form-control" required>
					</div>
					<div class="form-group">
						<label>model</label>
						<input type="text" name="model" id="model" value="<?php echo $pmodel ?>" placeholder="enter model" class="form-control" required> 
					</div>
					<div class="form-group">
						<label>specs</label>
						<textarea type="text" name="specs"  placeholder="enter specs" class="form-control" required><?php echo $pspecs ?></textarea>
					</div>
					<div class="form-group">
						<input type="text" name="quantity" value="<?php echo $pqty ?>" placeholder="enter quantity" class="form-control">
					</div>
					<div class="form-group">
						<label for="uploadfile"><i class="fa fa-image"  style="font-size: 40px; color: violet;"></i>
						</label>
						<input type="file"  name="uploadfile" value="<?=$pics ?>">
					</div>
					<div class="form-group">
						<label>price</label>
						<input type="text" name="price" value="<?php echo $pprice ?>" placeholder="enter price" class="form-control" required>
					</div>
					<div class="form-group">
						<?php if($update == true): ?>
							<button  type="submit" name="update" class="btn btn-info">Update</button>
							<input type="text" name="" value="hi">
						<?php else: ?>
							<button type="submit" name="btnAddproduct" class="btn btn-success"><i class="fa fa-save" style="margin: 5px;"></i>Add</button>
						<?php endif; ?>
					</div>
				</form>
			</div>
		</div>

		<!--codes for table!-->
		<div id='p_table' class="col-lg-10 mb-4">
			<!--codes for message alert on top of the page usering session !-->
				<?php if (isset($_SESSION['message'])): ?>
					<div class="alert alert-<?= $_SESSION['msg_type'] ?>">
					    <?php
					    echo $_SESSION['message'];
					    unset($_SESSION['message']);
					    ?>
					</div>
	 			<?php endif ?>
	 			<!--end!-->

	 		
	 		<!-- codes to dislay all the products !-->
	 		<?php include '../dbconfig.php' ?>	
	 		<?php 
	 			$stmt=$mysqli->prepare("SELECT * FROM products");
	 			$stmt->execute();
	 			$result = $stmt->get_result();
	 		 ?>
	
			<table class="table table-hover" id="table">
		 		<thead>
		 				<th>BRAND</th>
		 				<th>MODEL</th>
		 				<th>SPECS</th>
		 				<th>QUANTITY</th>
		 				<th>PRICE</th>
		 				<th>IMAGES</th>
		 				<th>ACTION</th>
		 		</thead>
		 			<tbody>
		 		<?php while($row = $result->fetch_assoc()): ?>
			 			<tr id="t_row">
			 				<td><?php echo $row['brand'] ?></td>
			 				<td><?php echo $row['model'] ?></td>
			 				<td><?php echo $row['specs'] ?></td>
			 				<td><?php echo $row['p_quantity'] ?></td>
			 				<td><?php echo $row['price'] ?></td>
			 				<td><img src="../<?php echo $row['picture'] ?>" width="100" heigth="100"></td>
			 				<td id="action">
			 					<a href="addproduct.php?editproduct=<?php echo $row['id'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
			 					<a href="addproductQuery.php?deleteproduct=<?php echo $row['id'] ?>" class="btn btn-danger"  onClick="return confirm('Are you sure you want to delete <?php echo $row['model'] ?>?')"><i class="fa fa-trash"></i></a>
			 					
			 				</td>
			 			</tr>
		 		<?php endwhile; ?>
		 			</tbody>
			</table>
	 		<!-- end !-->


			<!--script in searching the dsire product!-->
	 		
		</div>
	</div>
	<?php include '../footer.php' ?>

</body>
</html>