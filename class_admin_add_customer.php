<?php
  require_once 'init.php';

  $user_id = $_GET['customer_select'];

  $sql = "UPDATE user SET user_customer_admin = '1' WHERE user_id = '" . $user_id . "'";
  lib::db_query($sql);

  $sql = "SELECT * FROM user WHERE user_id='" . $user_id . "'";

  $result = lib::db_query($sql);
  $row = $result->fetch_assoc();
  $fname = $row["user_fname"];

  $sql = "INSERT INTO customer VALUES ('$user_id','0','0','0','0','0')";
  lib::db_query($sql);

?>
<?php require_once 'include_admin_header.php'; ?>
  Successfully added.
<?php require_once 'include_admin_footer.php'; ?>
