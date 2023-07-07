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
    <title>CheckOut</title>
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
	.checkout{
	padding:20px;
	background-color: #fff;
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
    <div class="container">
    <div class="table-responsive" style="margin-top:20px;">  
                     <table class="table  table-light table-bordered">  
                          <tr>
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="15%">Price</th>  
                               <th width="15%">Total</th>  
                                     </tr>  
                             <?php 
                           if(!empty($_SESSION["shopping_cart"]))	
                           {
                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $key => $value)
                           {
                             ?>
                          <tr> 
                               <td><?php echo $value['item_name'];?></td>  
                               <td><?php echo $value['item_quantity']; ?></td>  
                               <td>$<?php echo $value['item_price'];?></td>  
                               <td>$<?php echo number_format($value["item_quantity"] * $value["item_price"],2);?></td>  
 
                          </tr>  
                          <?php $total = $total + ($value["item_quantity"] * $value['item_price']);
                        }
                        ?>       
                          <tr>  
                               <td colspan="3" align="left"><b>Total</b></td>  
                               <td align="left">$<?php echo number_format($total,2);?></td>  

                          </tr> 
                          <?php } ?> 
                     </table>  
                </div>  
		<div class="checkout">
		<form  method="POST" action="checkoutAction.php">
			<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				<label for="NoTable">Table No</label>
				<input type="number" class="form-control" id="NoTable" name="noTable"  placeholder="Table Number" min=1 max=15>
			</div>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				<label for="OrderDate">Date</label>
				<input type="date" class="form-control" id="OrderDate" name="orderDate" placeholder="" value="datetime" >
			</div>
			</div>
			</div>
		  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    </div>
	
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
	<script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
</script>
  </body>
</html>