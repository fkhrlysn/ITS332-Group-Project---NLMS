<?php
	include'connection.php';
	session_start();
	function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
	}	 
	$email = $_POST["email"];
	$pass = $_POST["password"];
	$phone = $_POST["phone"];
	$message = "Succesfully Update";
	$message1 = "Update Failed";
	echo $email;
	$StaffID = $_SESSION['StaffID'];
	
	$sql = "UPDATE `staff` SET `Pass`='$pass',`email`='$email',`StaffNoPhone`='$phone' WHERE `StaffID`='$StaffID'";
	$result = $conn->query($sql);
	if(result)
	{
		header("refresh:0; url=MyProfile.php");
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else
	{
		header("refresh:0; url=MyProfile.php");
		echo "<script type='text/javascript'>alert('$message1');</script>";
	}
?>