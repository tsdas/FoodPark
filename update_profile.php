<?php 
  session_start();

  require_once 'include/dbcon.php';

  if (isset($_GET['c_id'])){

    $c_id = $_GET['c_id'];

     // Get all of that customer info from DB
    $sql = "SELECT * FROM customer WHERE c_id=$c_id";

    if ($result = mysqli_query($link, $sql)) {
        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            $name = $row['name'];
            $ph_no = $row['phone_no'];
            $address = $row['address'];

        }
        else {
            // No customer with that c_id
        } 
    }
    else {
        // DB Error
    }

  }
  elseif (isset($_POST['submit'])) {
    $c_id = $_POST['c_id'];
    $name = trim($_POST['name']);
    $ph_no = trim($_POST['ph_no']);
    $address = trim($_POST['address']);
    $password = trim($_POST['password']);
    $c_password = trim($_POST['c_password']);


    if (empty($name) or empty($ph_no) or empty($address)) {
        $err_req = true;
    }
    else {
        if (empty($password) and empty($c_password)) {
            // Only update name, ph_no and address

            // Prepare an insert statement
            $sql = "UPDATE customer SET name=?, address=?, phone_no=? WHERE c_id=?";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssi", $name, $address, $ph_no, $c_id);

                mysqli_stmt_execute($stmt);

                header("Location: customer_profile.php?update=true");
            }
            else {
                // DB Error
            }

        }
        elseif (!empty($password) and !empty($c_password)) {
            if ($password === $c_password) {
                // Update name, ph_no, address and password

                // Hash the password
                $password = password_hash($password, PASSWORD_DEFAULT);

                // Prepare an insert statement
                $sql = "UPDATE customer SET name=?, address=?, phone_no=?, password=? WHERE c_id=?";

                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "ssssi", $name, $address, $ph_no, $password, $c_id);

                    mysqli_stmt_execute($stmt);

                    header("Location: customer_profile.php?update=true");
                }
                else {
                    // DB Error
                }

            }
            else {
                $err_pswd = "The two passwords didn't match"; 
            }
        }
        else {
            $err_pswd = "The two passwords didn't match";
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

    <title>FoodPark | Update Profile</title>
  </head>
  <body>
    
    <div class="container">
      
    <?php require 'include/header.php';?> 


    <?php if(! empty($err_req)): ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong> Please fill out all the required information </strong>
        </div>

    <?php endif; ?>




     <div class="form-container">
       <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">
              <h3 class="text-center bg-primary text-white"> Update Your Information </h3>

              <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                  <div class="form-group">
                    <label for="name" class="font-weight-bold">Name:</label>
                    <span class="badge badge-pill badge-danger">Required</span>

                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required="required" value="<?php echo $name ?>">
                  </div>

                  <div class="form-group">
                    <label for="ph_no" class="font-weight-bold">Phone Number:</label>
                    <span class="badge badge-pill badge-danger">Required</span>

                    <input type="text" class="form-control" id="ph_no" placeholder="Enter your phone no" name="ph_no" required="required" value="<?php echo $ph_no ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="pwd" class="font-weight-bold">New Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter your password" name="password">
                  </div>

                  <div class="form-group">
                    <label for="cpwd" class="font-weight-bold">Confirm New Password:</label>
                    <input type="password" class="form-control" id="cpwd" placeholder="Confirm password" name="c_password" aria-describedby="passwordHelpBlock" value="">
                    
                    <small id="passwordHelpBlock" class="form-text text-danger">
                       <?php echo !empty($err_pswd) ? $err_pswd : ''; ?>
                    </small> 
                  </div>

                  <div class="form-group">
                    <label for="addrs" class="font-weight-bold">Address:</label>
                    <span class="badge badge-pill badge-danger">Required</span>

                    <textarea id="addrs" class="form-control" placeholder="Enter your adderess" name="address" required="required" rows="3"><?php echo $address ?></textarea>
                  </div>

                  <input type="hidden" name="c_id" value="<?php echo $c_id; ?>">
                  <input class="btn btn-primary" type="submit" name="submit" value="Update">
                  <input class="btn btn-primary" type="reset" value="Reset">
              </form>
            </div>
            
            <div class="col-md-3"></div>
        </div>
     </div>     


      
    <?php require 'include/footer.php';?> 

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>