<!doctype html>
<?php session_start(); ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/update.css">

    <title>My Profile</title>
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
			if( $_SESSION['position']='manager'){
				include 'navigationManager.php';
			}
			else{
				include 'navigation.php';
			}
		?>
		</header>
        <div class="container update">
            <h2 style="text-align: center">My Profile</h2>
			<table class="table table-borderless">
			<?php include 'connection.php';
				$StaffID = $_SESSION['StaffID'];
				$sql = "SELECT * FROM `staff` WHERE `staff`.`StaffID` = '$StaffID'";
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
					$StaffName = $row['StaffName'];
					$email = $row['email'];
					$StaffPhone = $row['StaffNoPhone'];
					$StaffPosition = $row['StaffPosition'];
					$StaffSalary = $row['StaffSalary'];
					}
					echo "<tr>";
						echo "<td><b>Staff ID: </td>";
						echo "<td>$StaffID</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td><b>Staff Name: </td>";
						echo "<td>$StaffName</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td><b>Staff Position: </td>";
						echo "<td>$StaffPosition</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td><b>Staff No.Phone: </td>";
						echo "<td>$StaffPhone</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td><b>Staff Email: </td>";
						echo "<td>$email</td>";
					echo "</tr>";
				}
				else {
					echo "Failed";
				}
			?>
			</table>
				<div class="text-center">
					<a href="UpdateProfile.php" class="btn btn-success ">Update Profile</a>
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
      
	
      </script>
    </body>
</html>