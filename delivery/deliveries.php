<?php
include "../db.php";
// include "header.php";
include "../function.php";
if (!isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'deliver' ) {
  die("You don't have permission to access this page.");
  header("location: ../login.php");
}
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_POST['update'])) {

  $deliver_name = $_POST['deliver_name'];
  $deliver_id = $_POST['deliver_id'];
  $customer_name = $_POST['customer_name'];
  $delivery_address = $_POST['delivery_address'];
  $delivery_date = $_POST['deliver_date_time'];
  $product_time = $_POST['deliver_time'];
  $deliver_option = $_POST['deliver_option'];
  $bakers_name = $_POST['bakers_name'];
  $status = $_POST['status'];
  $payment_method=$_POST['payment'];

  $sql = "UPDATE orders SET payment='$payment_status' WHERE customer_name='$customer_name' AND product_id='$product_id'";
  if (mysqli_query($db, $sql)) {
    echo "Record updated successfully";
    header('location: deliver_page.php');
  } else {
    echo "Error updating record: " . mysqli_error($db);
  }
}

?>
<?php
include "header.php";
?>

<div class="div_container">
        <div class="aside">
            <div class="sidebar">
                <div id="deliveries-sidebar" class="visible">
                        <h3>Delivery Panel</h3>
                        <p style="font-size: bold;">BDeliveries.</p>
                        <ul>
                          <li><a href="deliver_page.php">Deliveries Status</a></li><br>
                          <li><a href="delivery_status.php">Status Delivery</a></li><br>
                          <li><a href="profile.php">Profile</a></li><br>
                          <li><a href="change_password.php">Change password</a></li><br>
                          <!-- <li><a href="logout.php">logout</a></li><br> -->
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
            <div id="deliveries-content" class="visible">

            <?php


$sql = "SELECT * FROM deliveries";
$result = mysqli_query($db, $sql);

echo "<table style='width:90%; border: 1px solid black;'>";
echo "<tr style='border: 1px solid black;'>";
echo "<th style='border: 1px solid black;'>Deliver Name</th>";
echo "<th style='border: 1px solid black;'>ID</th>";
echo "<th style='border: 1px solid black;'>Customer Name</th>";
echo "<th style='border: 1px solid black;'>Deliver Address</th>";
echo "<th style='border: 1px solid black;'>Delivery date</th>";
echo "<th style='border: 1px solid black;'>Delivery time</th>";
echo "<th style='border: 1px solid black;'>Delivery option</th>";
echo "<th style='border: 1px solid black;'>Bakers Name</th>";
echo "<th style='border: 1px solid black;'>Payment Method</th>";
// echo "<th style='border: 1px solid black;'>Payment</th>";
echo "</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr style='border: 1px solid black;'>";
  echo "<td style='border: 1px solid black;'>" . $row['deliver_name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['id'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['customer_name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['delivery_address'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['deliver_date_time'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['deliver_time'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['deliver_option'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['bakers_name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['payment_method'] . "</td>";
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
        document.getElementById("deliveries-sidebar").style.display = "block";
        document.getElementById("deliveries-content").style.display = "block";
    }
</script>
