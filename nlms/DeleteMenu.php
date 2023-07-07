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
		session_start();
		include 'connection.php';
		function function_alert($message) {   
			echo "<script>alert('$message');</script>"; 
		} 
		$MenuID = $_GET['menuid'];
		$message = "Data Delete Succesfully";
		$message1 = "Could Not Delete Data";
		$message2 = "You Not Worthy To Delete This Data";
		$sql = "DELETE FROM `menu` WHERE `menu`.`MenuID` = '$MenuID'";
		if( $_SESSION['position']=='manager'){
			if( mysqli_query($conn,$sql)){
				header("refresh:0; url=Menu1.php");
				echo "<script type='text/javascript'>alert('$message');</script>";
			}else {
				header("refresh:0; url=Menu1.php");
				echo "<script type='text/javascript'>alert('$message1');</script>";
			}
		}
		else{
			header("refresh:0; url=Menu1.php");
			echo "<script type='text/javascript'>alert('$message2');</script>";
		}
		?>
	</article>
</section>

<footer>
	
</footer>
</body>