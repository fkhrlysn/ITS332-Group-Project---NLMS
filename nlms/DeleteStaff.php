<DOCTYPE!>
<html>
<head>
	<title>Course Registration System</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</style>
</head>
<body>

<header>
	
</header>
<section>

	<article>
		<?php
		include 'connection.php';
		function function_alert($message) { 
		// Display the alert box  
		echo "<script>alert('$message');</script>"; 
		} 
		$StaffID = $_GET['staffid'];
		$message = "Data Delete Succesfully";
		$message1 = "Could Not Delete Data";
		$sql = "DELETE FROM `staff` WHERE `staff`.`StaffID` = '$StaffID'";
		if( mysqli_query($conn,$sql)){
			header("refresh:0; url=staff.php");
			echo "<script type='text/javascript'>alert('$message');</script>";
		}else {
			header("refresh:0; url=staff.php");
			echo "<script type='text/javascript'>alert('$message');</script>";
		}

		?>
	</article>
</section>

<footer>
	
</footer>
</body>