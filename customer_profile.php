<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <title> FoodPark | Customer Profile </title>
  </head>
  <body>
    
    <div class="container">
      
    <?php 
        require 'include/header.php';
    ?> 

    <div class="container">
      <div class="row mt-4 mb-4">
        
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <div class="card bg-light text-dark">
              <img class="card-img-top" src="img/update_profile.jpg">
               <div class="card-body">
                <h4 class="card-title">My Profile</h4>
                <p class="card-text">Here you can update your information</p>
                 <a href="#" class="btn btn-primary">Update Profile</a>
               </div>
             </div>
        </div>
        <div class="col-md-3">
            <img class="card-img-top" src="img/orders.jpg">

            <div class="card bg-light text-dark">
               <div class="card-body">
                    <h4 class="card-title">My Orders</h4>
                    <p class="card-text">Here you can review your orders</p>
                    <a href="view_bills.php" class="btn btn-primary">View Orders</a>
               </div>
             </div>
        </div>
        <div class="col-md-3"></div>



       <!--  <div class="col-md-4">
            <div class="card bg-light text-dark">
              <img class="card-img-top" src="img/update_profile.jpeg" width="50%" height="30%">

               <div class="card-body">
                <h4 class="card-title">My Profile</h4>
                <p class="card-text">Here you can update your information</p>
                 <a href="#" class="btn btn-primary">Update Profile</a>
               </div>
             </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light text-dark">
               <div class="card-body">
                    <h4 class="card-title">My Orders</h4>
                    <p class="card-text">Click here to review your orders</p>
                    <a href="#" class="btn btn-primary">View Orders</a>
               </div>
             </div>
        </div> -->

       
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