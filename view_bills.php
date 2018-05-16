<?php
    session_start();
    require_once 'include/dbcon.php';

    if (isset($_GET['search']) and !empty($_GET['bill_date'])) {

        // Need validation 
        $bill_date = $_GET['bill_date'];

        $sql = "SELECT o_id, DATE_FORMAT(date,'%d-%M-%Y') AS date, total_amount, status FROM bill WHERE date='$bill_date' ORDER BY date DESC";        
    }
    else {
        $sql = "SELECT o_id, DATE_FORMAT(date,'%d-%M-%Y') AS date, total_amount, status FROM bill ORDER BY date DESC";
    }

    if ($result = mysqli_query($link, $sql)) {
        if(mysqli_num_rows($result) > 0) {
            $bills = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Free result set
            mysqli_free_result($result);
        }
        else {
            $no_bill=true;
        }
    }
    else {
        // DB Error
    }


    // Close connection
    mysqli_close($link);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <title>Food Park | View Orders</title>
  </head>
  <body>
    
    <div class="container">
      
    <?php require 'include/header.php'; ?> 

    <div class="container">
        <div class="row my-2">
            <div class="col-md-7">

                <?php if (!isset($no_bill)): ?>
                    <h4 class="text-dark mt-2">
                        You have placed the following orders...
                    </h4>
                <?php endif; ?>

            </div>
            <div class="col-md-5">
                <form class="form-inline" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <label class="text-dark font-weight-bold" for="date">Search for orders:</label>
                  <input name="bill_date" type="date" class="form-control form-control-lg mx-2" id="date">
                  <button type="submit" name="search" class="btn btn-lg btn-primary">Go</button>
                </form>
            </div>
        </div>
    </div>


    <?php if (isset($no_bill) and $no_bill === true): ?>
        <h2 class="text-muted text-center py-2 my-5">
            No order on <?php echo $bill_date; ?>
        </h2>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped table-sm my-3">
             <thead class="thead-dark">
                   <tr>
                     <th>Order ID</th>
                     <th>Date</th>
                     <th>Total Amount</th>
                     <th>Remark</th>
                   </tr>
              </thead>
               <tbody>
                    <?php foreach ($bills as $bill): ?>
                        <tr>
                            <td>
                                <a href="generate_bill.php?order_id=<?php echo $bill['o_id']; ?>" data-toggle="tooltip" data-placement="right" title="View the bill">Order #: <?php echo $bill['o_id']; ?></a>
                            </td>

                            <td> <?php echo $bill['date']; ?> </td>
                            <td> Rs. <?php echo number_format($bill['total_amount']); ?> </td>
                            <td>
                                <?php if($bill['status'] == NULL): ?>
                                    <strong class="text-warning"> Unpaid </strong>

                                <?php elseif($bill['status'] == 1): ?>
                                    <strong class="text-success"> Paid </strong>

                                <?php else: ?>
                                    <strong class="text-danger"> Cancelled by admin </strong>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>    
              </tbody>  
            </table>
        </div>

    <?php endif; ?>


   
      
    <?php require 'include/footer.php'; ?> 

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

  </body>
</html>