<?php
?>
<html>
  <head>
    <title>Logged In</title>
  </head>
  <body>
    <div id="header">
      <table>
        <tr>
          <th style="padding: 15px;"><a href="page_admin_menu.php"><h4>Admin Menu</h4></a></td>
          <th style="padding: 15px;"><a href="page_admin_movie_form.php"><h4>Movie Form</h4></a></td>
          <th style="padding: 15px;"><a href="page_admin_copy_status.php"><h4>Copy Status</h4></a></td>
          <th style="padding: 15px;"><a href="page_admin_add_customer.php"><h4>Add Customer</h4></a></td>
          <th style="padding: 15px;"><a href="page_admin_ten_most_rented.php"><h4>Top 10 rented Movies</h4></a></td>
          <th style="padding: 15px;"><a href="page_admin_frequent_renters.php"><h4>Top 10 Frequent Renters</h4></a></td>
          <th style="padding: 15px;"><a href="page_admin_average_fine.php"><h4>Average Fine Paid</h4></a></td>
        </tr>
      </table>

      Logged in as: <?php echo $_SESSION["FirstName"]; ?>
      <a style="float:right;"href="logout.php">Logout</a>
      <hr>

    </div>
    <div id="content">
