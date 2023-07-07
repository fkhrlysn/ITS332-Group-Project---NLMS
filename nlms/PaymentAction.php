<?php
session_start();
include 'connection.php';
$Pay = $_POST["payment"];
$sql="SELECT * FROM `order` WHERE OrderNo = (SELECT MAX(OrderNo) FROM `order`)";
$result = $conn->query($sql);
$message = "insufficient Money, Please Try Again";

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 
if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$OrderNo = $row['OrderNo'];
		$NoTable = $row['NoTable'];
		$OrderDate = $row['OrderDate'];
		$TotalPrice = $row['TotalPrice'];
		$Status = $row['PaymentStatus'];
		$StaffID = $row['StaffID'];
	}	
}
$Balance = $Pay - $TotalPrice;
$_SESSION['balance'] = $Balance;
echo $Balance;
if($Balance >= 0)
{
	$Status = "Succesful";
	$sql2 = "UPDATE `order` SET `PaymentStatus`='$Status'";
	$result2 = mysqli_query($conn,$sql2);
	if($result2)
	{
		header("refresh:0; url=Bill.php");
	}
}
else
{
	header("refresh:0; url=Payment.php");
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
