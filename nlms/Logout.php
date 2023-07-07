<script>
	function function_alert($message) {   
		echo "<script>alert('$message');</script>"; 
} 
</script>
<?php
session_start();
session_destroy();
include 'connection.php';
$message = "You Have Succesfully Log Out";
header("refresh:0; url=login.php");
echo "<script type='text/javascript'>alert('$message');</script>";
?>
