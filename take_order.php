<?php 

session_start();

require_once 'include/order_class.php';

if (isset($_POST['buy'])) {

	// Need validation
	$im_id = $_POST['im_id']; 
	$i_name = $_POST['i_name'];
	$price = $_POST['price']; 
	$quantity = $_POST['quantity'];

	$category = $_POST['category'];

	// Create an order object
	$o = new Order($im_id, $i_name, $price, $quantity);

	// Create an array of order objects in SESSION if doesn't exist
	if (! isset($_SESSION['orders'])) {
		$arr = array();
		$_SESSION['orders'] = $arr;
	}

	array_push($_SESSION['orders'], $o);

	// Redirect the user to browse_food page

	header("Location: browse_food.php?category=$category&item_added=true");
}