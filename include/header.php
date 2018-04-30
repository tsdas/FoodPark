<style>
  .jumbotron {
    background-image: url("img/bg.jpg");
    margin-bottom: 0;
    background-repeat: no-repeat;
  }
</style>


<header>
 
 <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-2 text-light">Food Park</h1>
    <h3 class="text-light">Hello! Welcome to Food Park.</h3>
  </div>
</div>


  <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">

    <a class="navbar-brand" href="index.php">
      <img src="img/logo.jpg" alt="Logo" style="width:40px;" class="img-thumbnail">
    </a>

  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-md-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Items
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="browse_food.php?category=veg">Veg</a>
            <a class="dropdown-item" href="browse_food.php?category=non-veg">Non-veg</a>
            <a class="dropdown-item" href="browse_food.php?category=other">Others</a>
            <a class="dropdown-item" href="browse_food.php?category=ts">Today's Special</a>
          </div>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Log in</a>
        </li>

      </ul>
    </div>
  </nav>
  
</header>




<!-- The user login modal -->
 <div class="modal fade" id="myModal">
   <div class="modal-dialog">
     <div class="modal-content">
     
       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title"> Customer Login </h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       
       <!-- Modal body -->
       <div class="modal-body">

            <form method="POST" action="customer_auth.php">
                <div class="form-group">
                  <label for="ph_no" class="font-weight-bold">Phone Number:</label>
                  <input type="text" class="form-control form-control-sm" id="ph_no" placeholder="Enter your phone no" name="ph_no" required="required">
                </div>
                <div class="form-group">
                  <label for="pwd" class="font-weight-bold">Password:</label>
                  <input type="password" class="form-control form-control-sm" id="pwd" placeholder="Enter your password" name="password" required="required">
                </div>

                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
            </form>

       </div>
       
       <!-- Modal footer -->
       <div class="modal-footer">
            New customer? &nbsp; <a href="customer_reg.php">Click here for registration</a>
       </div>
       
     </div>
   </div>
 </div>