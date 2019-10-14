<?php
  require_once 'init.php';

  $sql = "SELECT * FROM checked_out WHERE rented_customer_id='". $_SESSION["Login_Id"] ."'";
  $result_checked_out = lib::db_query($sql);
  $row_checked_out = $result_checked_out->fetch_assoc();

  $movie_id = $row_checked_out["rented_movie_id"];
  $sql = "SELECT * FROM movie WHERE movie_id='" . $movie_id . "'";
  $result = lib::db_query($sql);
  $row = $result->fetch_assoc();

 ?>
<?php require_once 'include_customer_header.php' ?>
<form action="class_customer_return.php" method="POST">
  Select a movie that you would like to return:
  <br>
  <select name="return_id">
    <?php if($row_checked_out["rented_movie_type"] == 0){
    ?>
      <option value="<?=  $row_checked_out['rented_id'] ?>"><?= htmlspecialchars($row['movie_title']) ?> DVD</option>
    <?php }// end if
    else{?>
      <option value="<?=  $row_checked_out['rented_id'] ?>"><?= htmlspecialchars($row['movie_title']) ?> BluRay</option>
    <?php }//end else ?>
    <?php while ( $row_checked_out = $result_checked_out->fetch_assoc() ) {
        $movie_id = $row_checked_out["rented_movie_id"];
        $sql = "SELECT * FROM movie WHERE movie_id='" . $movie_id . "'";
        $result = lib::db_query($sql);
        $row = $result->fetch_assoc();

        if($row_checked_out["rented_movie_type"] == 0){
       ?>
          <option value="<?=  $row_checked_out['rented_id'] ?>"><?= htmlspecialchars($row['movie_title']) ?> DVD</option>
        <?php }// end if
        else{?>
          <option value="<?=  $row_checked_out['rented_id'] ?>"><?= htmlspecialchars($row['movie_title']) ?> BluRay</option>
        <?php }//end else?>
    <?php } // end while ?>
  </select>
  <br>
  <br>
  <input type="submit" value="Submit">
</form>
<br>
Please keep in mind there is a $2 late fine for every 24 hours that the movie is late.
<?php require_once 'include_customer_footer.php' ?>
