<?php 

require_once 'include/order_class.php';
require_once 'include/dbcon.php';

session_start();

if (isset($_GET['im_id'])) {
    // Cancle the order of that item
   // And recalculate the bill amount

   foreach ($_SESSION['orders'] as $key => $order) {
        if ($order->getID() == $_GET['im_id']) {
            $_SESSION['total_amount'] -= $order->getAmount();

            $item_del_msg = 'Item "' . $order->getName() . '" has been removed';

            unset( $_SESSION['orders'][$key] );
        }
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

    <title> FoodPark | Make Payment</title>
  </head>
  <body>
    
    <div class="container">
      
    <?php 
        require 'include/header.php';
    ?> 

    
    <?php if(isset($item_del_msg)): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong> <?php echo $item_del_msg; ?> </strong> 
        </div>

    <?php endif; ?>




    <?php if (empty($_SESSION['orders'])): ?> 
        
        <h2 class="text-muted text-center p-3 mt-5">
            You haven't buy any food yet!
        </h2>
        <h5 class="text-muted text-center p-2 mb-5"> Buy some food items from the store first </h5>

     <?php 
        else:    
        // Calculate the total bill amount
        $total_amount = 0;    
     ?>  

        <h4 class="text-muted p-3 mt-3">
            You have ordered the following items...
        </h4>
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Item</th>
                        <th>Price per item</th>
                        <th>Quantity</th>
                        <th colspan="2">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['orders'] as $order): ?>

                        <tr>
                            <td> <?php echo $order->getName(); ?> </td>
                            <td> Rs. <?php echo number_format($order->getPricePerItem()); ?> </td>
                            <td> <?php echo $order->getQuantity(); ?> </td> 
                            <td> Rs. <?php echo number_format($order->getAmount()); ?> </td>
                            <td>
                            <a href="make_payment.php?im_id=<?php echo $order->getID(); ?>" class="btn btn-primary" role="button">
                                Cancel</a>  
                             </td>

                            <?php $total_amount +=  $order->getAmount(); ?> 
                        </tr>

                    <?php endforeach; ?>
               </tbody>
            </table>
        </div>
        

        <?php 
            // Store the total payable amount in the $_SESSION
            $_SESSION['total_amount'] = $total_amount;
             
        ?>


        <h4 class="text-right text-dark p-3 mt-3"> Your total bill amount = Rs.<?php echo number_format($_SESSION['total_amount']); ?> </h4>


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