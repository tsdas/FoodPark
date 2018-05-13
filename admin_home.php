<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <title>FoodPark | Admin Home</title>
  </head>
  <body>
    
    <div class="container">
      
    <?php 
        require 'include/admin_header.php';
    ?> 

      <div class="container" style="margin-top: 20px;">
        <div class="row">

           <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="img/customer1.jpg" alt="Card image" style="width:100%">
                
                <div class="card-body">
                  <a href="view_customer.php?customer1=true" class="btn btn-primary">View Customer Info</a>
                </div>

              </div>
          </div>
          
          <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="img/veglogo.jpg" alt="Card image" style="width:100%">
                
                <div class="card-body">
                  <a href="view_food.php?category1=veg" class="btn btn-primary">View Veg Items</a>
                </div>

              </div>
          </div>
          
          <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="img/chicken.jpg" alt="Card image" style="width:100%">

                <div class="card-body">
                 
                  <a href="view_food.php?category1=non-veg" class="btn btn-primary">View Non-Veg Items</a>
                </div>
            
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="img/fastfood.jpg" alt="Card image" style="width:100%">
                
                <div class="card-body">
                
                  <a href="view_food.php?category1=other" class="btn btn-primary">View Other Items</a>
                </div>
              </div>
          </div>
        </div>


      
      <?php require 'include/footer.php';?> 

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>