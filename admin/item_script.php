<?php

require '../include/dbcon.php';

if (isset($_GET['i_name'])) {
	$i_name = $_GET['i_name'];

	$sql = "SELECT * FROM item WHERE i_name='$i_name'";

	if($result = mysqli_query($link, $sql)){
		if (mysqli_num_rows($result) > 0) {
			echo "This Food item already exist";
		}
	}

}