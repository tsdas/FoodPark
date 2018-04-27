<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/main.css">


    <title>Welcome to FoodPark</title>
  </head>

  <body>

    <div class="container">
    
      <?php 
        require 'header.php';
      ?> 

      <div class="container" style="margin-top: 20px;">
        <div class="row">
          
          <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="img/veg.png" alt="Card image" style="width:100%">
                
                <div class="card-body">
                  <h4 class="card-title">Veg Items</h4>
                  <p class="card-text">Here you'll find our all veg items</p>
                  <a href="#" class="btn btn-primary">View Items</a>
                </div>

              </div>
          </div>
          
          <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="img/non-veg.jpeg" alt="Card image" style="width:100%">

                <div class="card-body">
                  <h4 class="card-title">Non-Veg Items</h4>
                  <p class="card-text">Here you'll find our non-veg items</p>
                  <a href="#" class="btn btn-primary">View Items</a>
                </div>
            
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="img/other.jpg" alt="Card image" style="width:100%">
                
                <div class="card-body">
                  <h4 class="card-title">Other Items</h4>
                  <p class="card-text">Here you'll find desserts and beverages</p>
                  <a href="#" class="btn btn-primary">View Items</a>
                </div>
              </div>
          </div>
          
          <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="img/ts.jpeg" alt="Card image" style="width:100%">
                
                <div class="card-body">
                  <h4 class="card-title">Today's Special</h4>
                  <p class="card-text">Check out our today's specials</p>
                  <a href="#" class="btn btn-primary">View Items</a>
                </div>
              </div>
          </div>
        </div>
      </div>

  
      
      <?php 
        require 'footer.php';
      ?>


    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>