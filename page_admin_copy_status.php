<?php
  require_once 'init.php';

  $sql = "SELECT * FROM movie";



  $result = lib::db_query($sql);
  $row = $result->fetch_assoc();
  $row_cnt = $result->num_rows;


 ?>
<?php require_once 'include_admin_header.php';?>
  <form action="class_admin_copy_status.php" method="GET">
    Select Movie Title:
    <br>
    <select name="movie_select">
      <option value="<?=  $row['movie_id'] ?>"><?= htmlspecialchars($row['movie_title']) ?></option>

      <?php while ( $row = $result->fetch_assoc() ) { ?>

        <option value="<?=  $row['movie_id'] ?>"><?= htmlspecialchars($row['movie_title']) ?></option>
      <?php } // end while ?>
    </select>
    <br>
    <br>
    <input type="submit" value="Submit">
  </form>
<?php require_once 'include_admin_footer.php';?>
