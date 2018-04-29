<?php 

define('DB_HOST', 'localhost');
define('DB_USER', 'zyandeep');
define('DB_PASSWD', '123qwe!@');
define('DB_NAME', 'foodpark');

// Connect to the database
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
		
if ($link === false) {
	die('Error connecting to the database ' . mysqli_connect_error());	
}