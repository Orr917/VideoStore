<?php require_once 'init.php';
$sql = "SELECT * FROM customer WHERE customer_id='" . $_SESSION['Login_Id'] . "'";
$result = lib::db_query($sql);
$row = $result->fetch_assoc();

$reserve_id = $row['customer_on_reserve'];
$reserve_type = $row['customer_reserve_type'];

$sql = "SELECT * FROM movie WHERE movie_id='" . $reserve_id . "'";
$result = lib::db_query($sql);
$row = $result->fetch_assoc();

if($reserve_type) {
  $copies_in_store = $row['movie_num_bd'];
}
else {
  $copies_in_store = $row['movie_num_dvd'];
}
?>
<?php require_once 'include_customer_header.php'; ?>
  <?php
    if ($copies_in_store > 0) {
      echo "Youre reservation of <u>" . $row['movie_title'] . "</u> is available! Rent it <a href='page_customer_rent.php'>Now!</a>";
    }
    else {
      echo "Youre reservation of <u>" . $row['movie_title'] . "</u> is unavailable. Care to rent <a href='page_customer_rent.php'>something else?</a>";

    }
   ?>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   As it currently stands the reservation system is not fully functional. It acts basically as a watch system that notifies the customer when there is an available copy rather than keeping it on hold.
<?php require_once 'include_customer_footer.php'; ?>
