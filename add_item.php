<?php 
  
  // Can only access by admin

  require_once 'include/dbcon.php';
  require_once 'include/app_vars.php';

  if (isset($_POST['submit'])) {

    // Need input validation
    $item = $_POST['i_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $pic = $_FILES['image']['name'];
    $new_pic = date("Y-m-d h:i:s") . '_' . $pic;


    $source = $_FILES['image']['tmp_name'];
    $destination = FP_UPLOADPATH . $new_pic;

    // moving the image from 'temp' folder into img/item
    move_uploaded_file($source, $destination);

    
    $is_ok = false;
    
    
    // Prepare an insert statement
    $sql = "INSERT INTO item (i_name, category, price, image) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssis", $item, $category, $price, $destination);

        // Execute the query
        mysqli_stmt_execute($stmt);

        // Everything is OK
        $is_ok = true;
    }
    else {
        // Redirect user to db error page
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
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

    <title>Admin | Add Item</title>
  </head>



  <body>
    
    <div class="container">
      
      <?php 
        require_once 'include/header.php';
     
        if (!empty($is_ok) && $is_ok === true): ?>

          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong> Item <?php echo "'$item'"; ?> is added! </strong> 
          </div>

      <?php endif; ?>
      

      <div class="form-container">
        <div class="row">
             <div class="col-md-3"></div>

             <div class="col-md-6">

               <h3 class="text-center bg-primary text-white"> Add New Item </h3>

               <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                   
                   <div class="form-group">
                     <label for="i_name" class="font-weight-bold">Item Name:</label>
                     <input type="text" class="form-control" id="i_name" placeholder="Enter item name" name="i_name" required="required">
                   </div>
                   <div class="form-group">
                      <label for="category" class="font-weight-bold">Category: </label>
                      <select class="form-control" id="category" name="category">
                        <option selected="selected" value="veg">Veg</option>
                        <option value="non-veg">Non Veg</option>
                        <option value="other">Other</option>
                      </select>
                    </div>
                   <div class="form-group">
                     <label for="price" class="font-weight-bold">Price:</label>
                     <input type="text" class="form-control" id="price" placeholder="Enter price" name="price" required="required">
                   </div>
      

                  <div class="form-group">
                    <label for="file" class="font-weight-bold">Choose the item's image to upload: </label>
                    <input type="file" id="file" name="image" class="form-control-file" required="required">
                  </div>
                    
                  <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                  <input class="btn btn-primary" type="reset" value="Reset">

                  
               </form>
             </div>
             
             <div class="col-md-3"></div>
         </div>
      </div>

      <?php 
        require_once 'include/footer.php';
      ?> 

    </div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>