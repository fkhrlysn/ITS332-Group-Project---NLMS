<?php
include('connection.php');

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 
$menuName = $_POST['name'];
$MenuID = $_POST['menucode'];
$price = $_POST['price'];
$message = "Menu Update Succesfully";
$message1 = "Update Menu Failed";

$sql = "UPDATE `menu` SET MenuPrice='$price' WHERE `menu`.`MenuID` = '$MenuID'";
$result = mysqli_query($conn,$sql);
if($result)
{	
	header("refresh:0; url=MenuDetails.php?MenuID=$MenuID");
	echo "<script type='text/javascript'>alert('$message');</script>";
}
else
{
	header("refresh:0; url=MenuDetails.php?MenuID=$MenuID");
	echo "<script type='text/javascript'>alert('$message1');</script>";
}
?>