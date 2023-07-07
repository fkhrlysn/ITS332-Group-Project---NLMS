<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">

    <title>Staff</title>
	<script>
	function confirmDelete(staffid)
	{
		if(confirm('Sure to remove This Record?'))
		{
			window.location.href='DeleteStaff.php?staffid='+staffid;
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
			<?php include 'navigation.php';?>	
        </header>
        <?php
		
		include 'connection.php';
		$limit = 8;
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$start = ($page - 1) * $limit;
		$result = $conn->query("SELECT * FROM staff ORDER BY StaffID DESC LIMIT $start, $limit");
		$staff = $result->fetch_all(MYSQLI_ASSOC);
		
		$result1 = $conn->query("SELECT count(StaffID) AS StaffID FROM staff ");
		$custCount = $result1->fetch_all(MYSQLI_ASSOC);
		$total = $custCount[0]['StaffID'];
		$pages = ceil($total / $limit );
		
		$Previous = $page - 1;
		$Next = $page + 1;
		
		?>
        <div class="container" >
            <div class="row">
                <div class="col-sm-4 col-md-6 col-lg-4">
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
				<div class="col-sm-8 col-md-6 col-lg-8">
					<div class="search-filter">
                        <input class="form-control" id="myInput" type="text" onkeyup="myFunction()" placeholder="Search Menu Name">
                    </div>
				</div>
			</div>

            <table class="table table-hover table-dark" id="myTable" style="margin-top:10px">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">StaffID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
								<th scope="col">No.Phone</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
								<?php foreach($staff as $staff) : ?>
									<?php $StaffID = $staff['StaffID']; 
									   $StaffName = $staff['StaffName'];
									   $StaffEmail = $staff['email'];
									   $StaffPhone = $staff['StaffNoPhone'];
									   $StaffPosition = $staff['StaffPosition'];
									   $StaffSalary = $staff['StaffSalary'];
									   ?>
									
									<?php echo "<tr>";
										echo "<td><a href=StaffDetails.php?StaffID=$StaffID style=color:#fff>$StaffID</a></td>";
										echo "<td>$StaffName</td>";
										echo "<td>$StaffPosition</td>";
										echo "<td>$StaffPhone</td>";
										?>
										<td><input type="button" id="deletebutton" class="btn btn-sm btn-custom btn-block" value="Delete" onclick="confirmDelete('<?php echo $StaffID;?>');"/></td>	
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