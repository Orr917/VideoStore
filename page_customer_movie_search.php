<?php require_once 'init.php'; ?>
<?php require_once 'include_customer_header.php'; ?>
  Portions of search are acceptable for example try selecting title then seraching 'the'
  <br>
  <br>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
      Search By:
      <br>
      <input type="radio" name="search_type" value="title"> Title
      <br>
      <input type="radio" name="search_type" value="director"> Director
      <br>
      <input type="radio" name="search_type" value="producer"> producer
      <br>
      <br>
      <input type="text" name="search" placeholder="Ex: Wes Anderson">
      <br>
      <br>
      <input type="submit" value="Search">
      <br>
      <br>
    <form>
    <?php
      if (isset($get_post['search']) && isset($get_post['search_type']) ) {
        echo "Results for " . $get_post['search'] . ":<br>";
          if ($get_post['search_type'] == "title") {
            $sql = "SELECT * FROM movie_info WHERE movie_title LIKE'%" . $get_post['search'] . "%'";
          }
          elseif ($get_post['search_type'] == "director") {
            $sql = "SELECT * FROM movie_info WHERE movie_info_director LIKE'%" . $get_post['search'] . "%'";
          }
          else {
            $sql = "SELECT * FROM movie_info WHERE movie_info_producer LIKE'%" . $get_post['search'] . "%'";
          }
          $result = lib::db_query($sql);
          if ($result->num_rows > 0){
          ?>

            <table width="" border="1" cellpadding="5" cellspacing="0">
              <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Director</td>
                <td>Producer</td>
              </tr>
              <?php while ($row = $result->fetch_assoc()) {?>
                <tr>
                  <td><?= $row['movie_info_pid'] ?></td>
                  <td><?= $row['movie_title'] ?></td>
                  <td><?= $row['movie_info_director'] ?></td>
                  <td><?= $row['movie_info_producer'] ?></td>
                </tr>



            <?php } // end while?>
            </table>
      <?php } // end if rows empty
          else {
            echo "No results for '" . $get_post['search'] . "' found.";
          }
        }
      else {
        echo "Please fill in the form before hitting search!";
      }
    ?>
<?php require_once 'include_customer_footer.php'; ?>
