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


             /* while($row = mysqli_fetch_assoc($result)){
                  echo $row['im_id'] . '<br>';
                  echo $row['i_name'] . '<br>';
                  echo $row['category'] . '<br>';
                  echo $row['price'] . '<br>';
                  echo '<img src="' . "$row[image]".     '">';
              }*/
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
        if (empty($_SESSION["c_id"])):
      ?>

        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>You have to log in first to buy food</strong>
        </div>
           
       <?php endif; ?> 


      <table class="table table-hover">
          <thead class="thead-light">
              <tr>
                  <th>Image</th>
                  <th>Item</th>
                  <th>Price</th>
              </tr>
          </thead>
          <tbody>
              
              <?php if (isset($rows)): 
                    foreach ($rows as $row) :
              ?>
                
                <tr>
                    <td> <?php echo '<img src="' . "$row[4]".     '">';?></td>
                    <td> <?php echo $row[1]; ?></td>
                    <td> <?php echo $row[3]; ?></td>

                </tr>

              <? 
                 endforeach;
                endif; 
              ?>

          </tbody>
      </table>



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