 <?php require_once '../dbconfig.php' ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../bootStrap/css/bootstrap.min.css">
	<script src="jquery.js"></script>
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
<head>
<style>
table, td, th {
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
}
h4{
	text-align: center;
}
</style>
</head>
<body>
<script>
		$(document).ready(function(){

         //vailable products
         $('#print').click(function () {
            $('#print').toggle(400);
            $('#back,#print').css("display","none");
        });
	});
	</script>
<div class="container">
	<h4>List of Products in Cart</h4>
<a id="back" href="reports.php" style="float: right;"><i class="fa fa-arrow-right">Back</i></a>
<a id="print" href="#" style="float: right; margin-right: 5px;" onclick="window.print()"><i class="fa fa-print">Print</i></a>
<?php 
	$result = $mysqli->query("SELECT * FROM addcart") or die($mysqli->error);
 ?>
<table>
  <tr>
   <th>Quantity</th>
   <th>Model</th>
  </tr>
  <?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['quantity'] ?></td>
    <td><?php echo $row['c_model'] ?></td>
   
  </tr>
<?php endwhile; ?>
</table>
</div>
</body>
</html>
