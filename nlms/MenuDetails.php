<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/update.css">

    <title>Menu</title>
    </head>
    <body>
		<header>
			<?php include 'navigation.php'; ?>
		</header>
        <div class="container update">
            <h2 style="text-align: center">Menu Details</h2>
			<table class="table table-borderless">
			<?php include 'connection.php';
				$MenuID = $_GET['MenuID'];
				$sql = "SELECT * FROM `menu` WHERE `menu`.`MenuID` = '$MenuID'";
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
					$MenuName = $row['MenuName'];
					$MenuPrice = $row['MenuPrice'];
					}
					echo "<tr>";
						echo "<td><b>Menu Code: </td>";
						echo "<td>$MenuID</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td><b>Menu Name: </td>";
						echo "<td>$MenuName</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td><b>Menu Price: </td>";
						echo "<td>$MenuPrice</td>";
					echo "</tr>";
				}
				else {
					echo "Failed";
				}
			?>
			</table>
			 <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
					<div class="text-right">
						<button type="button"  class="btn btn-success"style="text-align:right" onclick="update('<?php echo $MenuID; ?>');"/>Update</button>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="text-left">
						<button type="button" class="btn btn-success" style="text-align:right" onclick="back()">Back</button>
					</div>
				</div>
			</div>
		</div>
   
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
          td = tr[i].getElementsByTagName("td")[0];
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
      
	function back()
	{
		location.href = "Menu1.php";
	}
	function update(MenuID)
	{
		window.location.href='UpdateMenu.php?MenuID='+MenuID;
	}		
      </script>
    </body>
</html>