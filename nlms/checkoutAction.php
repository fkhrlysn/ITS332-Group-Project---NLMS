<?php
	include 'connection.php';
	session_start();
	$NoTable = $_POST["noTable"];

	$OrderDate = $_POST["orderDate"];

	
	$StaffID = $_SESSION['StaffID'];
	$Payment = "unsuccessful";
	
	if(!empty($_SESSION["shopping_cart"]))	
    {
        $total = 0;
		foreach($_SESSION["shopping_cart"] as $key => $value)
		{
			$value['item_name'];
			$value['item_name'];
			$value['item_quantity'];
			$value['item_price'];
			number_format($value["item_quantity"] * $value["item_price"],2);
			$total = $total + ($value["item_quantity"] * $value['item_price']);
		}
		$totalPrice = number_format($total,2);
	}
	$StaffID = $_SESSION['StaffID'];
	$sql = "INSERT INTO `order`(`NoTable`, `OrderDate`, `TotalPrice`, `PaymentStatus`, `StaffID`) VALUES ('$NoTable','$OrderDate','$totalPrice','$Payment','$StaffID')";
	$result = mysqli_query($conn,$sql);
	if($result)
	{
		header("refresh:0; url=Payment.php");
	}
	else
	{
		echo"failed";
	}
?>
  