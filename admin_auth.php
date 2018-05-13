<?php 

if (isset($_POST['submit'])) {

require_once 'include/dbcon.php';

	// Need input validation
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	$sql = "SELECT a_id FROM admin WHERE user_name = '$user_name' and password = '$password'";

	if ($result = mysqli_query($link, $sql)) {
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			{
				// Valid login
				session_start();

				$_SESSION['a_id']= $row['a_id'];
				$_SESSION['username']= $row['user_name'];

				// Send customer to his account
				header('Location: admin_home.php');
			}
			
			}
		else {
			// Invalid login
			header('Location: admin_login.php?error=login');
		}
	}
	
}
elseif (isset($_GET['logout']) and $_GET['logout'] == true)  {
	// Starting session
	session_start();

	// Destroying session completely
	session_destroy();

	header('Location: admin_login.php');
}

else {
	header('Location:admin_login.php');
}