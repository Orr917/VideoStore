<?php require_once 'init.php';?>
<?php require_once 'include_customer_header.php' ?>
  <?php echo "Sorry you already have " . $_SESSION["Num_Rentals"] . " movies rented.";?>
  <br>
  Please note the maximum number of rentals allowed is 7. Please return some movies!
<?php require_once 'include_customer_footer.php' ?>
