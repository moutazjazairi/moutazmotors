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
  <?php 
    //earnings monthly
         $fetch_monthly = $mysqli->query('SELECT SUM(total) AS "tot" FROM purchase_history WHERE date BETWEEN "2021-04-08" AND "2021-05-13"');
         $row_month = $fetch_monthly->fetch_assoc();
   ?>
<div class="container">
	<h4>Monthly Earnings Report: $1900K <?php echo  '<font color = red>' .number_format($row_month['tot'],2). '</font>'; ?></h4>
<a id="back" href="reports.php" style="float: right;"><i class="fa fa-arrow-right">Back</i></a>
<a id="print" href="#" style="float: right; margin-right: 5px;" onclick="window.print()"><i class="fa fa-print">Print</i></a>
<?php 
	$result = $mysqli->query("SELECT * FROM purchase_history") or die($mysqli->error);
 ?>
<table>
  <tr>
    <th>Model</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
    <th>Payment Mode</th>
  </tr>
  <?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['model'] ?></td>
    <td><?php echo $row['price'] ?></td>
    <td><?php echo $row['quantity'] ?></td>
    <td><?php echo $row['total'] ?></td>
    <td><?php echo $row['payment_mode'] ?></td>
  </tr>
<?php endwhile; ?>
</table>
</div>
</body>
</html>
