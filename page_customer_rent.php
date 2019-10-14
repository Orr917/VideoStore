<?php
  require_once 'init.php';

  $sql = "SELECT * FROM movie";



  $result = lib::db_query($sql);
  $row = $result->fetch_assoc();
  $row_cnt = $result->num_rows;


 ?>
<?php require_once 'include_customer_header.php' ?>
<form action="class_customer_rent.php" method="POST">
  Select a movie that you would like to rent:
  <br>
  <select name="movie_id">
    <option value="<?=  $row['movie_id'] ?>"><?= htmlspecialchars($row['movie_title']) ?></option>

    <?php while ( $row = $result->fetch_assoc() ) { ?>

      <option value="<?=  $row['movie_id'] ?>"><?= htmlspecialchars($row['movie_title']) ?></option>
    <?php } // end while ?>
  </select>
  <select name="dvd_bd">
    <option value="dvd">DVD</option>
    <option value="bd">BluRay</option>
  </select>
  <br>
  <br>
  <input type="submit" value="Submit">
</form>
Please note you may only rent 7 movies at a time
<?php require_once 'include_customer_footer.php' ?>
