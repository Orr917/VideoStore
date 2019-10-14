<?php
  require_once 'init.php';

  $return_id = $get_post["return_id"];
  $user_id = $_SESSION['Login_Id'];

  $sql = "SELECT * FROM customer WHERE customer_id='$user_id'";//get current fine amount
  $fine_result = lib::db_query($sql);
  $fine_row = $fine_result->fetch_assoc();

  $sql = "SELECT * FROM checked_out WHERE rented_id='$return_id'";
  $result = lib::db_query($sql);
  $row = $result->fetch_assoc();
  $fine = $fine_row['customer_fine'];
  $time = $_SERVER['REQUEST_TIME'] + 18000;
  $time_due = $row['rented_due_date'];

  if ($time > $time_due) {
    while($time > $row['rented_due_date']){
      $fine = $fine + 2;
      $time_due= $time_due - 86400;
    }

    $fine = $fine + $fine_row['customer_fine'];
    $sql = "UPDATE customer SET customer_fine='". $fine . "'";
    lib::db_query($sql);
  }

  $num_rentals = $fine_row['customer_num_current_rentals'];
  $num_rentals = $num_rentals - 1;

  $sql = "DELETE FROM checked_out WHERE rented_id='$return_id'";
  lib::db_query($sql);

  $sql = "UPDATE customer SET customer_num_current_rentals='". $num_rentals ."', customer_fine='" . $fine . "' WHERE customer_id='" . $user_id . "'";
  lib::db_query($sql);

  $sql = "SELECT * FROM movie WHERE movie_id='". $row['rented_movie_id'] ."'";
  $result_update = lib::db_query($sql);
  $row_update = $result_update->fetch_assoc();
  if ($row['rented_movie_type'] == 0) {
    $movie_num_dvd = $row_update['movie_num_dvd'];
    $movie_num_dvd = $movie_num_dvd + 1;
    $sql = "UPDATE movie SET movie_num_dvd='". $movie_num_dvd ."' WHERE movie_id='" . $row['rented_movie_id'] . "'";
  }
  else {
    $movie_num_bd = $row_update['movie_num_bd'];
        $movie_num_bd = $movie_num_bd + 1;
    $sql = "UPDATE movie SET movie_num_bd='". $movie_num_bd ."' WHERE movie_id='" . $row['rented_movie_id'] . "'";
  }
  lib::db_query($sql);
?>
 <?php require_once 'include_customer_header.php' ?>

 <?php require_once 'include_customer_footer.php' ?>
