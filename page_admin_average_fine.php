<?php
 require_once 'init.php';

 $sql = "SELECT * FROM customer";
 $result=lib::db_query($sql);
 $row = $result->fetch_assoc();

 $total_fines = $row['customer_fine'];
 $row_cnt = $result->num_rows;
while ($row = $result->fetch_assoc()) {
  $total_fines = $total_fines + $row['customer_fine'];
}
if ($row_cnt != 0){
  $avg_fines = bcdiv($total_fines, $row_cnt, 2);
}
else {
  $avg_fines = "NULL";
}
 ?>
<?php require_once 'include_admin_header.php'; ?>
  The average amount of fines paid per customer is: $<?= $avg_fines?>
<?php require_once 'include_admin_footer.php'; ?>
