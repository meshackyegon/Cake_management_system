<?php
include "../db.php";
// include "header.php";
include "../function.php";
if (!isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
  die("You don't have permission to access this page.");
}
/*if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}*/



//   $sql = "UPDATE orders SET payment='$payment_status' WHERE customer_name='$customer_name' AND product_id='$product_id'";
//   if (mysqli_query($db, $sql)) {
//     echo "Record updated successfully";
//     header('location: order_management.php');
//   } else {
//     echo "Error updating record: " . mysqli_error($db);
//   }
// }

?>
<?php
include "header.php";
?>

<div class="div_container">
        <div class="aside">
            <div class="sidebar">
                <div id="order-sidebar" class="visible">
                        <h3>Admin Panel</h3>
                        <p style="font-size: bold;">Admin.</p>
                        <ul>
                          <li><a href="manage_user.php">Add User</a></li><br>
                          <li><a href="admin_order_management.php">Order Management</a></li><br>
                          <li><a href="admin_view_user.php">View user</a></li><br>
                          <li><a href="admin_deliveries.php">Deliveries</a></li><br>
                          <li><a href="admin_profile.php">Profile</a></li><br>
                          <li><a href="admin_change_password.php">Change password</a></li><br>
                          <li><a href="logout.php">logout</a></li><br>
                          <?php
                            if(isset($_SESSION['user']))

                            {
                                echo "Welcome ".$_SESSION['user']; 
                            }
                          ?>
                        </ul>
                </div>
            </div>
        </div>
    <div class="main">
        <div class="content">
            <div id="order-content" class="visible">
<?php


$sql = "SELECT * FROM deliveries";
$result = mysqli_query($db, $sql);

echo "<table style='width:100%; border: 1px solid black;'>";
echo "<tr style='border: 1px solid black;'>";
echo "<th style='border: 1px solid black;'>Delivery Name</th>";
echo "<th style='border: 1px solid black;'>Delivery ID</th>";
echo "<th style='border: 1px solid black;'>Customer Name</th>";
echo "<th style='border: 1px solid black;'>Delivery address</th>";
echo "<th style='border: 1px solid black;'>Delivery date</th>";
echo "<th style='border: 1px solid black;'>Delivery time</th>";
echo "<th style='border: 1px solid black;'>Delivery option</th>";
echo "<th style='border: 1px solid black;'>Payment</th>";
echo "</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr style='border: 1px solid black;'>";
  echo "<td style='border: 1px solid black;'>" . $row['deliver_name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['id'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['customer_name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['delivery_address'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['deliver_date_time'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['deliver_time'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['deliver_option'] . "></td>";
  echo "<td style='border: 1px solid black;'>" . $row['payment_method'] . "</td>";
  echo "<td style='border: 1px solid black;'>";
  echo "</td>";
  echo "</tr>";
}
echo "</table>";
?>
</div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>

<script>
    // Check if the URL contains the "register.php" string
    if (window.location.href.indexOf("register.php") > -1) {
        // Show the registration sidebar and content
        document.getElementById("order-sidebar").style.display = "block";
        document.getElementById("order-content").style.display = "block";
    }
</script>
