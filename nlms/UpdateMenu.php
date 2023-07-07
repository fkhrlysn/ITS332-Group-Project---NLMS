<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Title Page-->
    <title>Add Menu</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/add.css" rel="stylesheet" media="all">
</head>

<body>
	<?php
		include 'connection.php';
		$MenuID = $_GET['MenuID'];
		$sql = "SELECT * FROM `menu` WHERE `menu`.`MenuID` = '$MenuID'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$MenuName = $row['MenuName'];
				$MenuPrice = $row['MenuPrice'];
			}
		}
		else {
			echo "Failed";
		}	
	?>
    <div class="page-wrapper bg-custom p-t-100 p-b-30 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Update Menu</h2>
                    <form action="UpdateMenuAction.php" method="POST">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Name" name="name" value="<?php echo $MenuName; ?>"readonly>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Menu Code" name="menucode" value="<?php echo $MenuID; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="number" min="0" step="any" placeholder="Price" name="price" value="<?php echo $MenuPrice; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Update</button>
                            <a href="Menu1.php" class="btn btn--radius btn--green">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->