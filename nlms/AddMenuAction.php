<?php
require_once('connection.php');
$menuName = $menuid = $price = '';

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 
$menuName = $_POST['name'];
$menuid = $_POST['menucode'];
$price = $_POST['price'];
$message = "Menu Added Succesfully";
$message1 = "Menu Already Available";

$sql = "INSERT INTO menu (MenuID,MenuName,MenuPrice)
		VALUES ('$menuid','$menuName','$price')";
$result = mysqli_query($conn,$sql);
if($result)
{
	
	header("refresh:0; url=AddMenu.php");
	echo "<script type='text/javascript'>alert('$message');</script>";
}
else
{
	header("refresh:0; url=AddMenu.php");
	echo "<script type='text/javascript'>alert('$message1');</script>";
}
?>