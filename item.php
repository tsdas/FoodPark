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

    <style type="text/css">
      h3 {
        padding: 5px;
        height: 60px;
        margin-bottom: 20px;
      }
    </style>

  </head>

  <body>

    <div class="container">
    
      <?php 
        require 'header.php';
      ?> 

     <div style="margin-top: 20px; margin-bottom: 20px">
       <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">

              <h3 class="text-center bg-dark text-white"> Add New Item </h3>

              <form method="POST" action="#">
                  <div class="form-group">
                    <label for="i_name" class="font-weight-bold">Item Name:</label>
                    <input type="text" class="form-control" id="i_name" placeholder="Enter item name" name="i_name">
                  </div>
                  <div class="form-group">
                     <label for="category" class="font-weight-bold">Category</label>
                     <select class="form-control" id="category" name="category">
                       <option selected="selected">Veg</option>
                       <option>Non Veg</option>
                       <option>Other</option>
                     </select>
                   </div>
                  <div class="form-group">
                    <label for="price" class="font-weight-bold">Price:</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
                  </div>

                 <div class="form-group">
                   <label for="file" class="font-weight-bold">Choose the item's image to upload: </label>
                   <input type="file" id="file" name="file" class="form-control">
                 </div>


                 <div class="row">
                   <div class="col-md-4"></div>
                   <div class="col-md-4">
                      <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                   <div class="col-md-4"></div>
                 </div>

              </form>
            </div>
            
            <div class="col-md-3"></div>
        </div>
     </div>



      
      <?php 
        require 'footer.php';
      ?>


    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5mdXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>