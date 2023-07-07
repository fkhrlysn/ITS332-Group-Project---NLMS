<?php 

if(isset($_POST['login-submit'])) {
	require('connection.php');

	$staffid = $_POST['staffid'];
	$password = $_POST['password'];
	

	if(empty($staffid) || empty($password)) {
		header("Location: ../login.php?error=emptyfields");
		exit();
	}

	else {
		$sql = "SELECT * FROM staff WHERE StaffID=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../login.php?error=sqlerror");
			exit();
		}

		else {
			mysqli_stmt_bind_param($stmt, "s", $staffid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)) {
				$passwordCheck = password_verify($password, $row['Pass']);
		if($passwordCheck == false) {
					header("Location: ../login.php?error=wrongpassword1");
					exit();
				}
				else if($passwordCheck == true) {
					session_start();
					$_SESSION['StaffID'] = $row['StaffID'];
					$_SESSION['position'] = $row['StaffPosition'];

					header("Location: ../home.php?login=success");
					exit();
				}
				else {
					header("Location: ../login.php?error=wrongpassword");
					exit();
				}
			}
			else {
				header("Location: ../login.php?error=nouser");
				exit();
			}
		}
	}
}

else {
	header("Location: ../login.php?error=wtf");
	exit();
}