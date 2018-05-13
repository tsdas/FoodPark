<?php 

    require_once 'include/dbcon.php';

    session_start();

    if (isset($_GET['category1'])) {
       $category1 = $_GET['category1'];

       if ($category1 == "veg") {
          $sql = "SELECT * FROM item WHERE category='veg'";
       }
       elseif ($category1 == "non-veg") {
          $sql = "SELECT * FROM item WHERE category='non-veg'";   
       }
       elseif ($category1 == "other") {
          $sql = "SELECT * FROM item WHERE category='other'";
       }
       elseif ($category1 == "ts") {
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

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container">
      
    <?php 
        require 'include/admin_header.php';
   

    if (isset($_GET['is_ok']) and $_GET['is_ok'] === 'true'):?>

          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong> Item's been added to today's special </strong> 
          </div>

      <?php endif; ?>
<?php if(isset($_SESSION["a_id"])): ?>

       <div class="container">
           <div class="row">

            <div class="col-md-2"> </div>

               <div class="col-md-8">
            
       <?php endif; ?>


                    <?php if (!empty($rows)): ?>

                        <div class="table-responsive">

                          <table class="table table-hover">
                              <thead class="thead-dark">
                                  <tr>
                                     <th>Image</th>
                                      <th>Item</th>
                                      <th>Price</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                  <?php  foreach ($rows as $row): ?>
                                    
                                    <tr>
                                        
                                        <td> <?php echo '<img class="rounded" src="' . "$row[4]".'">';?></td>
                                        <td><strong> <?php echo $row[1]; ?> </strong></td>
                                        <td><strong>Rs. <?php echo number_format($row[3]); ?> </strong></td>

                                        <?php if (isset($_SESSION["a_id"])): ?>
                                            <td> 
                                              <form  class="form-inline" method="POST" action="add_todayspecial.php">
                                                    
                                                     <input type="hidden" name="im_id" value="<?php echo $row[0];?>">
                                                     <input type="hidden" name="i_name" value="<?php echo $row[1];?>">
                                                     <input type="hidden" name="price" value="<?php echo $row[3];?>">

                                                     <input type="hidden" name="category1" value="<?php echo $category1; ?>">

        


                                                      <button class="btn btn-primary" type="submit" name="ts">Add Today's Special</button>
                                                    </form>
                                             </td>
                                        <?php endif; ?>
                                    </tr>
                                   <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                  </div>

                  <div class="col-md-2"> </div>
            </div>
        </div>
        <?php else: ?>

                          <h2 class="text-muted text-center m-5 p-5 "> No item for category 
                            <?php echo !empty($category1) ? "'$category1'" : ''; ?> 

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