<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <title>FoodPark | Admin Login </title>
  </head>
  
  <body>
    
    <div class="container">
    
    <?php 
        require 'include/admin_header.php';

        // Check for invalid login
        if (isset($_GET['error']) and $_GET['error'] === 'login'): ?>
          
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Oops! That was an invalid login.</strong> Try again
          </div>
          
      <?php endif; ?>

        

        <div class="form-container">  

            <div class="row">

               <div class="col-md-4"></div>
                
                <div class="col-md-4 ">

                    <h3 class="text-center bg-primary text-white"> Admin Login</h3>

            <form method="POST" action="admin_auth.php">
                   <div class="form-group">
                    <label for="user_name" class="font-weight-bold">User Name:</label>
                      <input type="text" class="form-control form-control-sm" id="user_name" placeholder="Enter your user name" name="user_name" required="required">
                   </div>
                    <div class="form-group">
                    <label for="pwd" class="font-weight-bold">Password:</label>
                     <input type="password" class="form-control form-control-sm" id="pwd" placeholder="Enter your password" name="password" required="required">
                     </div>

                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
            </form>

                </div>
                <div class="col-md-4 "></div>
            </div>
        </div>          
      


      
      <?php 
        require 'include/footer.php';
      ?> 

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>