<?php?>
<html>
  <head>
    <title>Logged In</title>
  </head>
  <body>
    <div id="header">
      <table>
        <tr>
          <th style="padding: 15px;"><a href="customer_menu.php"><h4>Customer Menu</h4></a></td>
          <th style="padding: 15px;"><a href="page_customer_rent.php"><h4>Rent</h4></a></td>
          <th style="padding: 15px;"><a href="page_customer_return.php"><h4>Return</h4></a></td>
          <th style="padding: 15px;"><a href="page_customer_reserve.php"><h4>Reserve</h4></a></td>
          <th style="padding: 15px;"><a href="page_customer_check_reserve.php"><h4>Check Reservation</h4></a></td>
          <th style="padding: 15px;"><a href="page_customer_movie_search.php"><h4>Movie Search</h4></a></td>
        </tr>
      </table>

      Logged in as: <?php echo $_SESSION["FirstName"]; ?>
      <a style="float:right;"href="logout.php">Logout</a>
      <hr>

    </div>
    <div id="content">
