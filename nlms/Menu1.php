<!doctype html>
<?php session_start();?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">

    <title>Menu</title>
	<script>
	function confirmDelete(menuid)
	{
		if(confirm('Sure to remove This Record?'))
		{
			window.location.href='DeleteMenu.php?menuid='+menuid;
		}
	}

	</script>
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
	</style>
	
	
    </head>
    <body>
		<header>
			<?php 
				
				if( $_SESSION['position']=='manager'){
					include 'navigationManager.php';
				}
				else{
					include 'navigation.php';
				}
			?>
        </header>
        <?php
		
		include 'connection.php';
		$limit = 6;
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$start = ($page - 1) * $limit;
		$result = $conn->query("SELECT * FROM menu ORDER BY MenuID DESC LIMIT $start, $limit");
		$menu = $result->fetch_all(MYSQLI_ASSOC);
		
		$result1 = $conn->query("SELECT count(MenuID) AS MenuID FROM menu ");
		$custCount = $result1->fetch_all(MYSQLI_ASSOC);
		$total = $custCount[0]['MenuID'];
		$pages = ceil($total / $limit );
		
		$Previous = $page - 1;
		$Next = $page + 1;
		
		?>
        <div class="container" >
            <div class="row">
                <div class="col-sm-3 col-md-4 col-lg-2">
					<div class="search-filter">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="Menu1.php?page=<?=$Previous; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
								</a>
							</li>
							<?php for($i = 1; $i<= $pages; $i++): ?>
								<li class="page-item"><a class="page-link" href="Menu1.php?page=<?=$i; ?>"><?= $i; ?></a></li>
							<?php endfor; ?>
							<li class="page-item">
							<a class="page-link" href="Menu1.php?page=<?=$Next; ?>" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
							</li>
						</ul>
					</div>
                </div>
				<div class="col-sm-6 col-md-4 col-lg-8">
					<div class="search-filter">
                        <input class="form-control" id="myInput" type="text" onkeyup="myFunction()" placeholder="Search Menu Name">
                    </div>
				</div>
                <div class="col-sm-3 col-md-4 col-lg-2">
					<div class="search-filter">
					<?php
						if($_SESSION['position']=='manager'){
							echo "<a href='AddMenu.php' class='form-control btn btn-sm btn-success'>Add Menu</a>";
						}
					?>
					</div>
				</div>
				
			</div>

            <table class="table table-hover table-dark" id="myTable" style="margin-top:10px">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
								<?php foreach($menu as $menu) : ?>
									<?php $MenuID = $menu['MenuID']; 
									   $MenuName = $menu['MenuName'];
									   $MenuPrice = $menu['MenuPrice'];?>
									
									<?php echo "<tr>";
										if( $_SESSION['position']=='manager'){
											echo "<td><a href=MenuDetails.php?MenuID=$MenuID style=color:#fff>$MenuID</a></td>";
											echo "<td>$MenuName</td>";
											echo "<td>$MenuPrice</td>";
										}
										else{
											echo "<td>$MenuID</td>";
											echo "<td>$MenuName</td>";
											echo "<td>$MenuPrice</td>";
										}
									 ?>
										<td><input type="button" id="deletebutton" class="btn btn-sm btn-custom btn-block" value="Delete" onclick="confirmDelete('<?php echo $MenuID;?>');"/></td>	
									<?php echo "</tr>";
										
								endforeach; ?>

                            </tbody>
                          </table>
							
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