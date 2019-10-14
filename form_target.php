<html>
<head></head>
<body><hr>

<?php
require_once 'init.php';
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "video_store";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully<br>";

    $uname = isset($_POST["Username"]) ? $_POST["Username"] : "";
	  $password = isset($_POST["Password"]) ? $_POST["Password"] : "";

    $sql = "SELECT user_fname, user_lname, user_id FROM user WHERE user_username='" . $uname ."'";
    $sql .= " AND user_password = '" . $password . "'";
    //echo($sql);
    $result = $conn->query($sql);

    if ($result->num_rows == 0){
      header("Location: error.html");
    }
    else
    {
      $row = $result->fetch_assoc();
      $fname = $row["user_fname"];
      $lname = $row["user_lname"];
      $user_id = $row["user_id"];
      $customer_admin = $row["user_customer_admin"];
      $_SESSION["FirstName"] = $fname;
      $_SESSION["LastName"] = $lname;
      $_SESSION["Login_Id"] = $user_id;
      $_SESSION["Customer_Admin"] = $customer_admin;

      $sql = "SELECT * FROM customer WHERE customer_id='" . $user_id . "'";
      $result = lib::db_query($sql);
      $row = $result->fetch_assoc();
      $customer_num_rentals = $row["customer_num_rentals"];
      $_SESSION["Num_Rentals"] = $customer_num_rentals;

      header("Location: menu.php");
    }
?>
<hr>
</body>
</html>
