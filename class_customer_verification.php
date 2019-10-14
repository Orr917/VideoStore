<?php
require_once 'init.php';

  $customer_v_number = $get_post['customer_v_number'];

  if($_SESSION['Login_Id'] == $customer_v_number){
    header("Location: customer_menu.php");
  }
  else {
    echo "Wrong customer ID please try again or go ";
  }
 ?>
