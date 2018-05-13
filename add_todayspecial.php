<?php 

session_start();

require_once 'include/dbcon.php';

if (isset($_POST['ts'])) {

	// Need validation
	$im_id = $_POST['im_id']; 
	$i_name = $_POST['i_name'];
	$price = $_POST['price']; 
	$category = $_POST['category1'];

    
    // Prepare an insert statement
    $sql = "INSERT INTO todays_special (im_id, date) VALUES (?, ?)";
    $dat = date("Y-m-d");

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "is", $im_id, $dat);

        // Execute the query
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($link);

        // Everything is OK
        header("Location: view_food.php?is_ok=true&&category1=$category");
    }
    else {
        // Redirect user to db error page
    }

   
  }

?>