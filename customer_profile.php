<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container">
      
    <?php 
        require 'include/header.php';
    ?> 

    <div class="container" style="margin-top: 20px;">
      <div class="row">
        <div class="col-md-3"></div>
        
        <div class="col-md-3">
            <div class="card bg-light text-dark">
               <img class="card-img-top" src="img/update_user.jpg" alt="Card image" style="width:100%">
               <div class="card-body">
                <h4 class="card-title">John Doe</h4>
                <p class="card-text">Some example text.</p>
                 <a href="#" class="btn btn-primary">Update Profile</a>
               </div>
             </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light text-dark">
               <img class="card-img-top" src="img/list.png" alt="Card image" style="width:100%">
               <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text.</p>
                    <a href="#" class="btn btn-primary">View Orders</a>
               </div>
             </div>
        </div>

        <div class="col-md-3"></div>
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