<?php
require_once 'init.php';
$sql = "SELECT * FROM customer ORDER BY customer_num_total_rentals DESC LIMIT 10";
$result = lib::db_query($sql);
$row = $result->fetch_assoc();

$frequent_id = $row['customer_id'];
$sql = "SELECT * FROM user WHERE user_id='". $frequent_id ."'";
$frequent_result = lib::db_query($sql);
$frequent_row = $frequent_result->fetch_assoc();

$fname = $frequent_row['user_fname'];
$lname = $frequent_row['user_lname'];

?>
<?php require_once 'include_admin_header.php'; ?>
  <table width="" border="1" cellspacing="0" cellpadding="5">
    <tr>
      <th>Name</th>
      <th>Total Rentals</th>
    </tr>
    <tr>
      <td><?= $fname?> <?= $lname?></td>
      <td><?= $row['customer_num_total_rentals']?></td>
    </tr>
    <?php while ($row = $result->fetch_assoc() ) {
        $frequent_id = $row['customer_id'];
        $sql = "SELECT * FROM user WHERE user_id='". $frequent_id ."'";
        $frequent_result = lib::db_query($sql);
        $frequent_row = $frequent_result->fetch_assoc();

        $fname = $frequent_row['user_fname'];
        $lname = $frequent_row['user_lname'];
      ?>
      <tr>
        <td><?= $fname?> <?= $lname?></td>
        <td><?= $row['customer_num_total_rentals']?></td>
      </tr>
    <?php } ?>
  </table>
<?php require_once 'include_admin_footer.php'; ?>
