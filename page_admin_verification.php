<?php
require_once 'init.php';


?>
<html>
  <head>
    <title>Admin Verification</title>
  </head>
  <body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
      Username: <input type="text" name = "Username"><br>
    	Password: <input type = "password" name = "Password"><br>
      <input type="submit" value="submit">
    </form>
    <?php
    if ( isset($get_post['Username']) || isset($get_post['Password']) ) {
      $sql = "SELECT * FROM user WHERE user_id='". $_SESSION['Login_Id'] ."'";
      $result = lib::db_query($sql);
      $row = $result->fetch_assoc();

      if($row['user_customer_admin'] == 2 || $row['user_customer_admin'] == 3){
        //2 => user has access to admin and not customer 3 => user has access to both
      if( $row['user_username'] == $get_post['Username'] && $row['user_password'] == $get_post['Password'] ){
        header("Location: page_admin_menu.php");
      }
      else {
        echo "Wrong username or password. Please try again or <br>";
      }
    }
    else {
      echo "Youre account does not have administrative access.<br>";
    }
  }

     ?>
    <a href="menu.php">Go Back</a>
  </body>
</html>
