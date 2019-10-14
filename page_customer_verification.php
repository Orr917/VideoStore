<?php
require_once 'init.php';


?>
<html>
  <head>
    <title>Customer Verification</title>
  </head>
  <body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
      Please enter customer ID number:
      <input type ="number" name="customer_v_number" min="0">
      <input type="submit" value="submit">
    </form>
    <?php
    if (isset($get_post['customer_v_number'])) {
      $sql = "SELECT * FROM user WHERE user_id='". $_SESSION['Login_Id'] ."'";
      $result = lib::db_query($sql);
      $row = $result->fetch_assoc();

      if($row['user_customer_admin'] == 1 || $row['user_customer_admin'] == 3){
        //1 => user has access to customer and not admin 3 => user has access to both
      $customer_v_number = $get_post['customer_v_number'];
      if($_SESSION['Login_Id'] == $customer_v_number){
        header("Location: customer_menu.php");
      }
      else {
        echo "Wrong customer ID please try again or <br>";
      }
    }
    else {
      echo "You're account does not have access to the customer menu Please ask an admin to add you as a customer. <br>";
    }
  }

     ?>
    <a href="menu.php">Go Back</a>
    <br>
    <br>
    <br>
    <br>
    (Hint: soley for testing pursposes your customer_id = <?= $_SESSION['Login_Id']?>)
  </body>
</html>
