<?php
require_once 'init.php';
//SELECT column1, column2, hit_pages,...FROM YourTable ORDER BY hit_pages DESC LIMIT 5
$sql = "SELECT * FROM movie ORDER BY movie_num_rentals DESC LIMIT 10";
$result = lib::db_query($sql);
$row = $result->fetch_assoc();
?>
<?php require_once 'include_admin_header.php'; ?>
  <table width="" border="1" cellspacing="0" cellpadding="5">
    <tr>
      <th>Title</th>
      <th>Total Rentals</th>
    </tr>
    <tr>
      <td><?= $row['movie_title']?></td>
      <td><?= $row['movie_num_rentals']?></td>
    </tr>
    <?php while ($row = $result->fetch_assoc() ) { ?>
      <tr>
        <td><?= $row['movie_title']?></td>
        <td><?= $row['movie_num_rentals']?></td>
      </tr>
    <?php } ?>
  </table>
<?php require_once 'include_admin_footer.php'; ?>
