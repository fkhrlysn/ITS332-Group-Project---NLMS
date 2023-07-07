<!doctype html>
<?php session_start(); ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/global.css">
    <title>Bill</title>
	<style>
	footer {
		width:100%;
		text-align: center;
		padding: 3px;
		background-color: darkslategrey;
		color: white;
		bottom: 0px;
		position:fixed;
	}
	.bill{
		padding:10px 20px;
		background-color: #fff;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		max-width: 500px;
		margin: auto;
		
	}
	</style>
  </head>
  <body>
    <header>
        <?php 
			if( $_SESSION['position']='manager'){
				include 'navigationManager.php';
			}
			else{
				include 'navigation.php';
			}
		?>
    </header>
	<?php
		$sql="SELECT * FROM `order` WHERE OrderNo = (SELECT MAX(OrderNo) FROM `order`)";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$OrderNo = $row['OrderNo'];
				$NoTable = $row['NoTable'];
				$OrderDate = $row['OrderDate'];
				$TotalPrice = $row['TotalPrice'];
				$Status = $row['PaymentStatus'];
				$StaffID = $row['StaffID'];
			}	
		}
		$Balance = $_SESSION['balance'];
	?>
    <div class="container">
		<br>
		<div class="bill ">
			<p style="text-align:right"><?php echo $OrderDate ?></p>
			<h4 style="text-align:center">Bill Details</h4>
			<table class="table table-borderless">
			<tr >
				<td><b>Order Number</td>
				<td><?php echo $OrderNo ?></td>
			</tr>
			<tr >
				<td><b>Staff ID</td>
				<td><?php echo $StaffID ?></td>
			</tr>
			<tr >
				<td><b>No Table</td>
				<td><?php echo $NoTable?></td>
			</tr>
			<tr >
				<td><b>Total Price</td>
				<td>RM <?php echo $TotalPrice?></td>
			</tr>
			<tr >
				<td><b>Balance</td>
				<td>RM <?php echo $Balance?></td>
			</tr>
			<tr >
				<td><b>Payment Status</td>
				<td><?php echo $Status?></td>
			</tr>
			</table>
		</div>
    </div>
	<?php 
		$sql2 = "DELETE FROM `order_menu`";
		$result2 = $conn->query($sql2);
		$sql3 = "TRUNCATE TABLE `order_menu`";
		$result3 = $conn->query($sql3);
		
		unset($_SESSION["shopping_cart"]);
	?>
	<footer class="page-footer font-small blue ">
		<div class="footer-copyright text-center py-3">
			Nasi Lemak Warisan Mak Sarah
		</div>
	</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>