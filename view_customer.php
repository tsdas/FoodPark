<?php 

    require_once 'include/dbcon.php';

    session_start();

     if (isset($_GET['customer1']) and $_GET['customer1'] === 'true'){ 

      $sql = "SELECT * FROM customer";
  
       if($result = mysqli_query($link, $sql)) 
       {

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
    ?> 

      <?php if(isset($_SESSION["a_id"])): ?>

       <div class="container">
           <div class="row">

            <div class="col-md-3"> </div>

               <div class="col-md-6">
            
       <?php endif; ?>


                    <?php if (!empty($rows)): ?>

                        <div class="table-responsive">

                          <table class="table table-hover">
                              <thead class="thead-dark">
                                  <tr>
                                      <th>Name</th>
                                      <th>Address</th>
                                      <th>Phone Number</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                  <?php  foreach ($rows as $row): ?>
                                    
                                    <tr>
                                        
                                        <td><strong> <?php echo $row[1]; ?> </strong></td>
                                        <td><strong> <?php echo $row[2]; ?> </strong></td>
                                        <td><strong><?php echo number_format($row[3]); ?> </strong></td>
                                   </tr>
                                   <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                  </div>

                  <div class="col-md-3"> </div>
            </div>
        </div>
        <?php else: ?>

                        <h2 class="text-muted text-center m-5 p-5 "> No Customer Information Exist
                           
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