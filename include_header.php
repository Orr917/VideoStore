<?php
  session_start();
?>
<html>
  <head>
    <title>Logged In</title>
  </head>
  <body>
    <div id="header">
      <table>
        <tr>
          <th style="padding: 15px;"><a href="page_customer_verification.php"><h3>Customer Menu</h3></a></td>
          <th style="padding: 15px;"><a href="page_admin_verification.php"><h3>Admin Menu</h3></a></td>
        </tr>
      </table>

      Logged in as: <?php echo $_SESSION["FirstName"]; ?>
      <a style="float:right;"href="logout.php">Logout</a>
      <hr>

    </div>
    <div id="content">
