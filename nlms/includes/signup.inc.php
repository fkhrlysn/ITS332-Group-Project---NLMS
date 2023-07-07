<?php 

if (isset($_POST['signup-submit'])) {

	require_once('connection.php');

	$name = $_POST['name'];
	$staffid = $_POST['staffid'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$salary = $_POST['salary'];
	$position = $_POST['position'];

	// $password_repeat = $_POST['passwordRepeat'];

	if (empty($name) || empty($staffid) || empty($password) || empty($phone) || empty($email) || empty($salary) || empty($position)) {
		header("Location: ../registration.php?error=emptyfields&name= ".$name."staffid= ".$staffid);
		exit();
	}

	else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]+$/", $staffid)) {
		header("Location: ../registration.php?error=invalidemailid");
		exit();
	}

	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../registration.php?error=invalidemail&uid=".$name);
		exit();
	}

	else if(!preg_match("/^[a-zA-Z0-9]+$/", $staffid)) {
		header("Location: ../registration.php?error=invalidid&email=".$email);
		exit();
	}

	// else if($password !== $password_repeat) {
	// 	header("Location: ../signup.php?error=passwordcheck&uid= ".$name."email= ".$email);
	// 	exit();
	// }

	else {
		$sql = "SELECT StaffID FROM staff WHERE StaffID=?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../registration.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "s", $staffid);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);

			if($resultCheck > 0) {
				header("Location: ../registration.php?error=idtaken&mail=".$email);
				exit();
			}
			else {
				$sql = "INSERT INTO staff (StaffID, StaffName, Pass, email, StaffNoPhone, StaffPosition, StaffSalary) VALUES (?, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);

				if(!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../registration.php?error=sqlerror");
					exit();
				}
				else {
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "sssssss", $staffid, $name, $hashedPassword, $email, $phone, $position, $salary);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);

					header("Location: ../registration.php?signup=success");
					exit();
				}
			}
		}
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

else {
	header("Location: ../registration.php");
	exit();
}