<?php 

if (isset($_POST['submit'])) {

	require_once 'include/dbcon.php';

	// Need input validation
	$ph_no = $_POST['ph_no'];
	$password = $_POST['password'];

	$sql = "SELECT * from customer WHERE phone_no = '$ph_no'";

	if ($result = mysqli_query($link, $sql)) {
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);

			$hashed_pwd = $row['password'];

			if (password_verify($password, $hashed_pwd)) {
				// Valid login
				session_start();

				$_SESSION['c_id']= $row['c_id'];
				$_SESSION['c_name']= $row['name'];

				// Create an unique order id for this session
				

				// Send customer to his account
				header('Location: index.php');
			}
			else {
				// Invalid login
				header('Location: index.php?error=login');
			}
		}
		else {
			// Invalid login
			header('Location: index.php?error=login');
		}
	}
	else {
		// Redirect user to db error page
	}
}
elseif (isset($_POST['logout'])) {
	// Starting session
	session_start();

	// Destroying session completely
	session_destroy();

	header('Location: index.php');
}

else {
	header('Location: index.php');
}