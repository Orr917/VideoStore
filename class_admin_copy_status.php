<?php
  require_once 'init.php';

  $movie_id = $_GET['movie_select'];

  $sql = "SELECT movie_title, movie_num_dvd, movie_num_bd FROM movie WHERE movie_id='" . $movie_id . "'";



    $result = lib::db_query($sql);
    $row = $result->fetch_assoc();
    $movie_title = $row['movie_title'];
    $movie_num_bd = $row['movie_num_bd'];
    $movie_num_dvd = $row['movie_num_dvd'];

?>
<?php require_once 'include_admin_header.php'; ?>
  <table width="" border="1" cellspacing="0" cellpadding="5">
    <tr>
      <td>ID</td>
      <td>Title</td>
      <td>Number of DVDs Remaining</td>
      <td>Number of BluRays Remaining</td>
    </tr>
    <tr>
      <td><?= $movie_id?></td>
      <td><?= $movie_title?></td>
      <td><?= $movie_num_dvd?></td>
      <td><?= $movie_num_bd?></td>
    </tr>
  </table>
<?php require_once 'include_admin_footer.php'; ?>
