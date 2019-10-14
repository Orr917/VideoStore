<?php
  require_once 'init.php';

  $user_id = $_SESSION["Login_Id"];
  $rented_date = $_SERVER['REQUEST_TIME'];
  $rented_due_date = $rented_date + 622800;
  $movie_id = $get_post["movie_id"];


  $customer_num_current_rentals = $_SESSION["Num_Rentals"];

  if ($customer_num_current_rentals <= 7) {

  $sql = "SELECT * FROM movie WHERE movie_id='" . $movie_id . "'";
  $result = lib::db_query($sql);
  $row = $result->fetch_assoc();
  $movie_title = $row["movie_title"];

  if ($get_post["dvd_bd"] == "dvd") {
    if($row["movie_num_dvd"] > 0) {
      $num_dvd = $row["movie_num_dvd"] - 1;
      $sql = "UPDATE movie SET movie_num_dvd='" . $num_dvd . "' WHERE movie_id='" . $movie_id . "'";
      lib::db_query($sql);
      $sql = "INSERT INTO checked_out VALUES (NULL,'$user_id', '$movie_id', '$rented_date', '$rented_due_date', '0')";

    }
    else {
      header("Location: page_customer_out_of_stock.php");
    }
  }
  else {
    if($row["movie_num_bd"] > 0) {
      $num_dvd = $row["movie_num_bd"] - 1;
      $sql = "UPDATE movie SET movie_num_bd='" . $num_dvd . "' WHERE movie_id='" . $movie_id . "'";
      lib::db_query($sql);
      $sql = "INSERT INTO checked_out VALUES (NULL, '$user_id', '$movie_id', '$rented_date', '$rented_due_date', '1')";

    }
    else {
      header("Location: page_customer_out_of_stock.php");
    }
  }
  lib::db_query($sql);

  $sql = "SELECT * FROM customer WHERE customer_id='" . $user_id . "'";
  $result = lib::db_query($sql);
  $row = $result->fetch_assoc();
  $customer_num_current_rentals = $row["customer_num_current_rentals"] + 1;
  $customer_num_total_rentals = $row['customer_num_total_rentals'] + 1;
  $sql = "UPDATE customer SET customer_num_current_rentals='" . $customer_num_current_rentals . "', customer_num_total_rentals='". $customer_num_total_rentals ."' WHERE customer_id='" . $user_id . "'";
  lib::db_query($sql);
  $sql = "SELECT * FROM movie WHERE movie_id='". $movie_id ."'";
  $result = lib::db_query($sql);
  $row = $result->fetch_assoc();
  $movie_num_rentals = $row['movie_num_rentals'] + 1;

  $sql = "UPDATE movie SET movie_num_rentals='". $movie_num_rentals ."' WHERE movie_id='". $movie_id ."'";
  lib::db_query($sql);


}
else {
  header("Location: page_customer_max_rentals.php");
}
?>
<?php require_once 'include_customer_header.php' ?>
You have rented <?= $movie_title?>. The movie is due back on <?= date('Y-m-d h:i:sa',$rented_due_date)?>
<?php require_once 'include_customer_footer.php' ?>
