<?php 

session_start();

echo "<h1> Welcome home, $_SESSION[c_name] </h1>";
echo "<hr>";
?>


<p> Click below to logout </p>

<form method="POST" action="customer_auth.php">
	<input type="submit" name="logout" value="Log out">
</form>