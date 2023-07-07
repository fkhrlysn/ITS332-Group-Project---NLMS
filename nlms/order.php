<?php	
session_start();
include 'connection.php';
	if(isset($_POST["add_to_cart"]))
    {
      if(isset($_SESSION["shopping_cart"]))
      {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
          $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                      'item_id'       =>   $_GET["id"],
                      'item_name'     =>   $_POST["hidden_name"],
                      'item_price'    =>   $_POST['hidden_price'],
                      'item_quantity' =>   $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
			
		   $MenuID = $_GET["id"];
		   $Quan = $_POST["quantity"];
		  
		   $sql3 = "INSERT INTO `order_menu`(`MenuID`, `quantity`) VALUES ('$MenuID','$Quan')";
		   $result3 = mysqli_query($conn,$sql3);
		   if($result3)
		   {
			   echo "succes";
		   }
		   else{
			   echo "failed";
		   }
		}
        else
        {
          echo '<script>alert("Item already added ")</script>';
          echo '<script>window.location = "order.php"</script>';
        }
      }
      else
      {
         $item_array = array(
                      'item_id'       =>   $_GET["id"],
                      'item_name'     =>   $_POST["hidden_name"],
                      'item_price'    =>   $_POST['hidden_price'],
                      'item_quantity' =>   $_POST["quantity"]
            );
           $_SESSION["shopping_cart"][0] = $item_array;
		   
		   
      }
    }
    if(isset($_GET["action"]))
    {
      if($_GET["action"] == "delete")
      {
        foreach($_SESSION["shopping_cart"] as $key=>$value)
            {
              if($value["item_id"] == $_GET["id"])
              {
                unset($_SESSION["shopping_cart"][$key]);
                echo '<script>alert("Item removed")</script>';	
                echo '<script>window.location="order.php</script>';	
				
			  $ID = $value["item_id"];
			  $sql4 = "DELETE FROM `order_menu` WHERE MenuID='$ID'";
			  $result4 = mysqli_query($conn,$sql4);
              }
            }
      }	
    }
		$limit = 5;
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$start = ($page - 1) * $limit;
		$result = $conn->query("SELECT * FROM menu ORDER BY MenuID DESC LIMIT $start, $limit");
		$menu = $result->fetch_all(MYSQLI_ASSOC);
		
		
		$result1 = $conn->query("SELECT count(MenuID) AS MenuID FROM menu ");
		$custCount = $result1->fetch_all(MYSQLI_ASSOC);
		$totalPages = $custCount[0]['MenuID'];
		$pages = ceil($totalPages / $limit );
		
		$Previous = $page - 1;
		$Next = $page + 1;
?>
<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Order</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		   <link rel="stylesheet" href="bootstrap.min.css">
		   <link rel="stylesheet" href="css/global.css">
			
		
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
	
           <div class="container" ">  
                <div class="row">
					<div class="col-sm-3 col-md-4 col-lg-1">
						<div class="search-filter">
							<ul class="pagination">
								<li class="page-item">
									<a class="page-link" href="order.php?page=<?=$Previous; ?>" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
									</a>
								</li>
								<?php for($i = 1; $i<= $pages; $i++): ?>
									<li class="page-item"><a class="page-link" href="order.php?page=<?=$i; ?>"><?= $i; ?></a></li>
								<?php endfor; ?>
								<li class="page-item">
								<a class="page-link" href="order.php?page=<?=$Next; ?>" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
								</li>
							</ul>
						</div>
					</div>
				<div class="col-sm-1 col-md-1 col-lg-0"></div>
				<div class="col-sm-8 col-md-7 col-lg-10">
					<div class="search-filter">
                        <input class="form-control" id="myInput" type="text" onkeyup="myFunction()" placeholder="Search Menu Name">
                    </div>
				</div>
				</div>
				<table class="table table-hover table-dark" id="myTable" style="margin-top:10px">
					<thead class="thead-light">
                              <tr>
                                <th scope="col" width="15%">Code</th>
                                <th scope="col"width="40%">Name</th>
                                <th scope="col"width="20%">Price</th>
								<th scope="col" width="10%">Quantity</th>
                                <th scope="col" width="15%"></th>
                              </tr>
                            </thead>
				
                  <?php
                   $limit = 5;
					$page = isset($_GET['page']) ? $_GET['page'] : 1;
					$start = ($page - 1) * $limit;
					$sql = "SELECT * FROM menu ORDER BY MenuID DESC LIMIT $start, $limit";
					
					$result1 = $conn->query("SELECT count(MenuID) AS MenuID FROM menu ");
					$custCount = $result1->fetch_all(MYSQLI_ASSOC);
					$totalPages = $custCount[0]['MenuID'];
					$pages = ceil($totalPages / $limit );
					
					$Previous = $page - 1;
					$Next = $page + 1;
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) >0)
                    {
                      while($row = mysqli_fetch_array($result))
                      {
                  ?>
                     <form method="post" action="order.php?action=add&id=<?php echo $row["MenuID"];?>">  
                        <tr>                            
                            <td><?php echo $row['MenuID'];?></td>  
                            <td><?php echo $row['MenuName']; ?></td>  
                            <td>RM<?php echo $row['MenuPrice'];?></td>  
                            <td><input type="text" name="quantity" class="form-control" value="1" /></td>    
							<input type="hidden" name="hidden_name" value="<?php echo $row['MenuName'] ?>" />
							<input type="hidden" name="hidden_price" value="<?php echo $row['MenuPrice'];?>">
							<td><input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-sm btn-primary" value="Add to Cart" /> </td>
						</tr>   
                     </form>  
                  <?php } } ?>
				</table>
                <div style="clear:both"></div>  
                <br />  	
                <h3>Order Details </h3>  	
                <div class="table-responsive">  
                     <table class="table table-light table-bordered">  
                          <tr>
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="15%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
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
                               <td><a href="order.php?action=delete&id=<?php  echo $value['item_id'];?>"><span class="btn btn-info">Remove</span></a></td>  
                          </tr>  
                          <?php $total = $total + ($value["item_quantity"] * $value['item_price']);
                        }
                        ?>       
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$<?php echo number_format($total,2);?></td>  
                               <td><a href="checkOut.php" class ="btn btn-sm btn-secondary">Check Out</td>  
                          </tr> 
                          <?php } ?> 
                     </table>  
                </div>  
           </div>  
           <br />  
	 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script>
      function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[1];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }       
        }
      }
      
      </script>
      </body>  
	
	
 </html>