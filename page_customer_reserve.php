<?php require_once 'init.php';
//for check reserve create a function that returns number of copies on reserve. compare to copies remaining
//if there are more copies remaining than on reserve rental is available.
$sql = "SELECT * FROM movie WHERE movie_num_dvd='0'";
$dvd_result = lib::db_query($sql);
$dvd_row_cnt = $dvd_result->num_rows;

$sql = "SELECT * FROM movie WHERE movie_num_bd='0'";
$bd_result = lib::db_query($sql);
$bd_row_cnt = $bd_result->num_rows;


?>
<?php require_once 'include_customer_header.php';?>
<?php
  if ($dvd_row_cnt == 0 && $bd_row_cnt == 0 ) {
    echo "There are no movies available for reservation. (ie: all movies have copies left in the store)";
  }
  else {?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
      Select a movie to reserve (Please select only one from ether menu. <b>NOT</b> both):
      <br>
      DVD:
      <select name="reserve_dvd_id">
      <option value="-1">--DVD--</option>
      <?php while ($dvd_row = $dvd_result->fetch_assoc()){ ?>
          <option value="<?= $dvd_row['movie_id'] ?>"><?= $dvd_row['movie_title'] ?></option>
        <?php }?>
      </select>
       <b>or</b> BluRay:
      <select name="reserve_bd_id">
        <option value="-1">--BluRay--</option>
        <?php while ($bd_row = $bd_result->fetch_assoc()){ ?>
            <option value="<?= $bd_row['movie_id'] ?>"><?= $bd_row['movie_title'] ?></option>
          <?php }?>
      </select>
      <br>
      <br>
      Please note that if you already have a movie on reserve that reservation will be forefeited upon reserving a new title.
      <br>
      <br>

       <input type="submit" value="Submit">
    </form>
  <?php }
  //start of driver
    if ( isset($get_post['reserve_dvd_id']) && isset($get_post['reserve_bd_id'])){
      if ( $get_post['reserve_dvd_id'] != "-1" && $get_post['reserve_bd_id'] != "-1" ) {
        echo "Please only select one movie.";
      }
      elseif(  ($get_post['reserve_dvd_id'] != "-1" && $get_post['reserve_bd_id'] = "-1") || ( $get_post['reserve_dvd_id'] = "-1" && $get_post['reserve_bd_id'] != "-1") ) {
        if ( $get_post['reserve_dvd_id'] != "-1"){
          $sql = "UPDATE customer SET customer_on_reserve='" . $get_post['reserve_dvd_id'] . "', customer_reserve_date='" . $_SERVER['REQUEST_TIME'] . "', customer_reserve_type='0' WHERE customer_id='" . $_SESSION['Login_Id'] . "'";
        }
        else {
          $sql = "UPDATE customer SET customer_on_reserve='" . $get_post['reserve_bd_id'] . "', customer_reserve_date='" . $_SERVER['REQUEST_TIME'] . "', customer_reserve_type='1' WHERE customer_id='" . $_SESSION['Login_Id'] . "'";
        }
        lib::db_query($sql);
        echo "<h5>Movie Succesfully Reserved!<h5>";
      }
      else {
        echo "Select an option before submitting!";
      }
    }

  ?>
<?php require_once 'include_customer_footer.php'; ?>
