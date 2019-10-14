<?php
  require_once 'init.php';

  $sql = "SELECT * FROM user WHERE user_customer_admin = 0";

  $result = lib::db_query($sql);
  $row = $result->fetch_assoc();
  $row_cnt = $result->num_rows;


 ?>
<?php require_once 'include_admin_header.php';?>
  <form action="class_admin_add_customer.php" method="GET">
    Select Movie Title:
    <br>
    <select name="customer_select">
      <option value="<?=  $row['user_id'] ?>"><?= htmlspecialchars($row['user_fname']) ?> <?= htmlspecialchars($row['user_lname'])?></option>

      <?php while ( $row = $result->fetch_assoc() ) { ?>

        <option value="<?=  $row['user_id'] ?>"><?= htmlspecialchars($row['user_fname']) ?> <?= htmlspecialchars($row['user_lname'])?></option>
      <?php } // end while ?>
    </select>
    <br>
    <br>
    <input type="submit" value="Submit">
  </form>
<?php require_once 'include_admin_footer.php';?>
