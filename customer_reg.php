<?php 
  require_once 'include/dbcon.php';

  if (isset($_POST['submit'])) {

    $name = trim($_POST['name']);
    $ph_no = mysqli_real_escape_string($link, trim($_POST['ph_no']));
    $password = trim($_POST['password']);
    $c_password = trim($_POST['c_password']);
    $address = trim($_POST['address']);


    // If any of the mandatory filed is empty, then flag error message
    if (empty($name) or empty($ph_no) or empty($password) or empty($c_password) or empty($address)) {
        $err_empty = true;
    }
    else 
    {

        // Check if the phone number already exist
        $sql="SELECT * FROM customer WHERE phone_no='$ph_no'";

        $result = mysqli_query($link, $sql)
            or die('DB Error');

        if(mysqli_num_rows($result) === 0){
            if ($password !== $c_password) {
                $err_pswd = "The passwords didn't match";
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
                    mysqli_stmt_execute($stmt);

                    mysqli_stmt_close($stmt);
                    mysqli_close($link);

                    header("Location: index.php?cus_reg=true");
                }
                else{
                    // DB Error
                }
            }
        }
        else {
            $err_ph_exist = "This phone no. has already been registered";
        }
        
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
      
      <?php require 'include/header.php'; ?>

      <?php if(! empty($err_empty)): ?>

          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Please fill out all the required information</strong>
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
                     <span class="badge badge-pill badge-danger">Required</span>

                     <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required="required" value="<?php echo empty($name)? '' : $name; ?>">
                   </div>
                   
                   <div class="form-group">
                     <label for="ph_no" class="font-weight-bold">Phone Number:</label>
                     <span class="badge badge-pill badge-danger">Required</span>

                     <input type="text" class="form-control" id="ph_no" placeholder="Enter your phone no" name="ph_no" required="required" value="<?php echo empty($ph_no)? '' : $ph_no; ?>" aria-describedby="phoneHelpBlock">

                     <small id="phoneHelpBlock" class="form-text text-danger">
                        <?php echo !empty($err_ph_exist) ? $err_ph_exist : ''; ?>
                     </small> 
                   </div>

                   <div class="form-group">
                     <label for="pwd" class="font-weight-bold">Password:</label>
                     <span class="badge badge-pill badge-danger">Required</span>

                     <input type="password" class="form-control" id="pwd" placeholder="Enter your password" name="password" required="required">
                   </div>

                   <div class="form-group">
                     <label for="cpwd" class="font-weight-bold">Confirm Password:</label>
                     <span class="badge badge-pill badge-danger">Required</span>

                     <input type="password" class="form-control" id="cpwd" placeholder="Confirm password" name="c_password" required="required" aria-describedby="passwordHelpBlock">
                     
                     <small id="passwordHelpBlock" class="form-text text-danger">
                        <?php echo !empty($err_pswd) ? $err_pswd : ''; ?>
                     </small> 
                   </div>

                   <div class="form-group">
                     <label for="addrs" class="font-weight-bold">Address:</label>
                     <span class="badge badge-pill badge-danger">Required</span>

                     <textarea id="addrs" class="form-control" placeholder="Enter your adderess" name="address" required="required" rows="3"><?php echo empty($address)? '' : $address; ?></textarea>
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