<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Title Page-->
    <title>My Profile</title>

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
	<link href="css/register.css" rel="stylesheet" media="all">
</head>

<body>
	<?php
		include 'connection.php';
		session_start();
		$StaffID = $_SESSION['StaffID'];
		$sql = "SELECT * FROM `staff` WHERE `staff`.`StaffID` = '$StaffID'";
		$result = $conn->query($sql);
				
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
			$StaffName = $row['StaffName'];
			$email = $row['email'];
			$pass = $row['Pass'];
			$StaffPhone = $row['StaffNoPhone'];
			$StaffPosition = $row['StaffPosition'];
			$StaffSalary = $row['StaffSalary'];
			}
		}
		else {
			echo "Failed";
		}	
	?>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title">Update Form</h2>
                <form action="UpdateProfileAction.php" method="POST">
                    <div class="input-group">
                        <label class="label">Name</label>
                        <input class="input--style-4" type="text" name="name" value="<?php echo $StaffName ?>" readonly>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Staff ID</label>
                                <input class="input--style-4" type="text" name="staffid" value="<?php echo $StaffID ?>" readonly>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Password</label>
                                <input class="input--style-4" type="password" name="password" value="<?php echo $pass ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Phone Number</label>
                                <input class="input--style-4" type="text" name="phone" value="<?php echo $StaffPhone ?>" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="email" name="email" value="<?php echo $email ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Salary</label>
                                <input class="input--style-4" type="number" name="salary" value="<?php echo $StaffSalary ?>" readonly>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Position</label>
                                <input class="input--style-4" type="text" name="position" value="<?php echo $StaffPosition?>" readonly>
                            </div>
                        </div>
                    </div>
					<div class="p-t-15">
                        <button class="btn btn-primary btn--blue" type="submit" name="signup-submit">Submit</button>
                        <a href="MyProfile.php" class="btn btn-primary btn--blue">Back</a>
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