<?php 
  require_once 'include/dbcon.php';

  if (isset($_POST['submit'])) {

    // Need input validation
    $name = $_POST['name'];
    $ph_no = $_POST['ph_no'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $c_password = $_POST['c_password'];

    $is_ok = false;
    
    if ($password !== $c_password) {
        $err_pswd = "Sorry, the passwords are not equal.";
    }
    else {

        // Hash the password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare an insert statement's template
        $sql = "INSERT INTO customer (name, address, phone_no, password) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $name, $address, $ph_no, $password);

            // Execute the query
            if (mysqli_stmt_execute($stmt)) {

                // Everything is OK
                $is_ok = true;
            }
        }
        else{
            // Redirect user to db error page
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }
    
  }

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">


    <title>FoodPark | Customer Registration</title>
  </head>



  <body>
    
    <div class="container">
      
      <?php require_once 'include/header.php';
      
      if (isset($is_ok) and $is_ok === true): ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>You've been registered successfully!</strong>
          Now, log in to buy food
        </div>

     <?php elseif(isset($is_ok) and $is_ok === false): ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong> The customer couldn't be registered </strong>
        </div>

    <?php endif; ?>
    
     
     
        
      <div class="form-container">
        <div class="row">
             <div class="col-md-3"></div>

             <div class="col-md-6">
               <h3 class="text-center bg-primary text-white"> Customer Registration </h3>

               <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                   <div class="form-group">
                     <label for="name" class="font-weight-bold">Name:</label>
                     <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required="required">
                   </div>
                   <div class="form-group">
                     <label for="ph_no" class="font-weight-bold">Phone Number:</label>
                     <input type="text" class="form-control" id="ph_no" placeholder="Enter your phone no" name="ph_no" required="required">
                   </div>
                   <div class="form-group">
                     <label for="pwd" class="font-weight-bold">Password:</label>
                     <input type="password" class="form-control" id="pwd" placeholder="Enter your password" name="password" required="required">
                   </div>
                   <div class="form-group">
                     <label for="cpwd" class="font-weight-bold">Confirm Password:</label>
                     <input type="password" class="form-control" id="cpwd" placeholder="Confirm password" name="c_password" required="required" aria-describedby="passwordHelpBlock">
                     
                     <small id="passwordHelpBlock" class="form-text text-danger">
                        <?php echo !empty($err_pswd) ? $err_pswd : ''; ?>
                     </small> 
    

                   </div>
                   <div class="form-group">
                     <label for="addrs" class="font-weight-bold">Address:</label>
                     <textarea id="addrs" class="form-control" placeholder="Enter your adderess" name="address" required="required" rows="3"></textarea>
                   </div>

                   <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                   <input class="btn btn-primary" type="reset" value="Reset">
               </form>
             </div>
             
             <div class="col-md-3"></div>
         </div>
      </div>

      <?php 
        require_once 'include/footer.php';
      ?> 

    </div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>