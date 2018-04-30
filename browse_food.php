<?php 
    require_once 'include/dbcon.php';

    session_start();

    if (isset($_GET['category'])) {
       $category = $_GET['category'];

       if ($category == "veg") {
          $sql = "SELECT * FROM item WHERE category='veg'";
       }
       elseif ($category == "non-veg") {
          $sql = "SELECT * FROM item WHERE category='non-veg'";   
       }
       elseif ($category == "other") {
          $sql = "SELECT * FROM item WHERE category='other'";
       }
       elseif ($category == "ts") {
          $sql = "select item.im_id, i_name, category, price, image from item, todays_special where item.im_id=todays_special.im_id";
       }

       if($result = mysqli_query($link, $sql)) {

            // Fetching all the records
            $rows = mysqli_fetch_all($result);

            mysqli_free_result($result);
            mysqli_close($link);
       } 
       else{
          // Redirect user to db error page
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

    <title>FoodPark | Browse Food</title>
  </head>
  <body>
    
    <div class="container">
      
      <?php 
        require 'include/header.php';
        if (empty($_SESSION["c_id"]) ):
      ?>

        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong> You must login first to buy food.</strong>  
        </div>
    
       <?php endif; ?> 


       <?php if (!empty($rows)): ?> 

       <div class="container">
           <div class="row">

            <?php if(isset($_SESSION["c_id"])): ?>

               <div class="col-sm-9">
            
            <?php endif; ?>

                        <div class="table-responsive">

                          <table class="table table-hover">
                              <thead class="thead-dark">
                                  <tr>
                                      <th>Image</th>
                                      <th>Item</th>
                                      <th>Price</th>
                                    
                                      <?php
                                        echo (isset($_SESSION["c_id"])) ? "<th>Quantity</th>" : ''; 
                                       ?>
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                  <?php  foreach ($rows as $row): ?>
                                    
                                    <tr>
                                        <td> <?php echo '<img class="rounded" src="' . "$row[4]".'">';?></td>
                                        <td><strong> <?php echo $row[1]; ?> </strong></td>
                                        <td><strong>Rs. <?php echo number_format($row[3]); ?> </strong></td>
                                        
                                        <?php if (isset($_SESSION["c_id"])): ?>
                                            <td>    
                                                <form  class="form-inline" method="POST" action="bill_cal.php">
                                                 <input type="text" class="form-control form-control-sm mr-2" name="quantity">


                                                  <button class="btn btn-primary" type="submit" name=""> Buy Now</button>
                                                </form>  
                                            </td>
                                        <?php endif; ?>
                                               
                                         
                                    </tr>

                                  <? endforeach; ?>

                              </tbody>
                          </table>
                        </div>


            <?php if(isset($_SESSION["c_id"])): ?>

                </div>
               
                   <div class="col-sm-3">
                       <div class="card bg-light border-info mt-2 sticky-top">
                            <div class="card-header"> Make Final Payment </div>
                            <div class="card-body">
                               <a href="#" class="btn btn-primary btn-block"> Proceed </a>
                            </div>
                        </div>
                   </div>

            <?php endif ?>

           </div>
       </div>

       <?php else: ?>

           <h2 class="text-muted text-center m-5 p-5 "> No item for category 
               <?php echo !empty($category) ? "'$category'" : ''; ?> 
           </h2>

       <?php endif; ?> 


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