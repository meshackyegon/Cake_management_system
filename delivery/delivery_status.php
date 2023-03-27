<?php
include "../db.php";
include "../function.php";
if (!isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'deliver' ) {
  die("You don't have permission to access this page.");
  header("location: ../login.php");
}
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_POST['update'])) {

  $deliver_name = $_SESSION['user'];;
  $deliver_id = $_POST['deliver_id'];
  $customer_name = $_POST['customer_name'];
  $delivery_address = $_POST['delivery_address'];
  $delivery_date = $_POST['deliver_date_time'];
  $product_time = $_POST['deliver_time'];
  $deliver_option = $_POST['deliver_option'];
  $bakers_name = $_POST['bakers_name'];
  $status = $_POST['status'];
  $payment_method=$_POST['payment'];

  // $sql = "UPDATE deliveries SET payment='$payment_status' WHERE customer_name='$customer_name' AND product_id='$product_id'";
  // check payment status before updating details
$query = "SELECT * FROM deliveries WHERE customer_name='$customer_name' AND product_id='$product_id' LIMIT 1";
$result = mysqli_query($db, $query);
$delivery = mysqli_fetch_assoc($result);

if ($delivery['payment'] != 'paid' && $delivery['payment'] != 'cash')  {
    // throw error message and do not update details
    array_push($errors, "Payment status must be 'paid' to update details. Please contact an admin for more information.");
    return;
}

// update delivery details if payment is 'paid'
$sql = "UPDATE deliveries SET payment='$payment_status', deliver_name='".$_SESSION['user']."' WHERE customer_name='$customer_name' AND product_id='$product_id'";
mysqli_query($db, $sql);

  // $sql = "UPDATE deliveries SET deliver_name='$$deliver_name' WHERE customer_name='$customer_name' AND id='$product_id'";
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
                <div id="order-sidebar" class="visible">
                        <h3>Delivery Panel</h3>
                        <p style="font-size: bold;">Delivery Panel</p>
                        <ul>
                          <li><a href="deliveries.php">Deliveries</a></li><br>
                          <li><a href="deliver_page.php">Deliver Page</a></li><br>
                          <li><a href="profile.php">Profile</a></li><br>
                          <li><a href="change_password.php">Change password</a></li><br>
                          <li><a href="../logout.php">logout</a></li><br>
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

$sql="SELECT D.deliver_name, D.id, O.customer_Name, D.delivery_address, D.deliver_date_time, D.deliver_time, D.deliver_option, O.bakers_name, D.status, D.payment_method FROM  orderss O LEFT JOIN deliveries D ON  O.customer_Name=D.customer_name";
$result = mysqli_query($db, $sql);

echo "<table style='width:90%; border: 1px solid black;'>";
echo "<tr style='border: 1px solid black;'>";
echo "<th style='border: 1px solid black;'>Delivery Name</th>";
echo "<th style='border: 1px solid black;'>Delivery ID</th>";
echo "<th style='border: 1px solid black;'>Customer Name</th>";
echo "<th style='border: 1px solid black;'>Delivery address</th>";
echo "<th style='border: 1px solid black;'>Delivery date</th>";
echo "<th style='border: 1px solid black;'>delivery time</th>";
echo "<th style='border: 1px solid black;'>delivery option</th>";
echo "<th style='border: 1px solid black;'>Bakers name</th>";
echo "<th style='border: 1px solid black;'>Delivery Status</th>";
// echo "<th style='border: 1px solid black;'>Payment Method</th>";
echo "</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr style='border: 1px solid black;'>";
  echo "<td style='border: 1px solid black;'>" . $row['deliver_name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['id'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['customer_Name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['delivery_address'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['deliver_date_time'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['deliver_time'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['deliver_option'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['bakers_name'] . "</td>";
  // echo "<td style='border: 1px solid black;'>" . $row['status'] . "</td>";
  // echo "<td style='border: 1px solid black;'>" . $row['payment_method'] . "</td>";
  echo "<td style='border: 1px solid black;'>";
  echo "<form action='deliver_page.php' method='post'>";
  echo "<input type='hidden' name='deliver_name' value='" . $row['deliver_name'] . "'>";
  echo "<input type='hidden' name='deliver_id' value='" . $row['id'] . "'>";
  echo "<input type='hidden' name='customer_name' value='" . $row['customer_Name'] . "'>";
  echo "<input type='hidden' name='delivery_address' value='" . $row['delivery_address'] . "'>";
  echo "<input type='hidden' name='deliver_date_time' value='" . $row['deliver_date_time'] . "'>";
  echo "<input type='hidden' name='deliver_time' value='" . $row['deliver_time']. "'>";
  echo "<input type='hidden' name='deliver_option' value='" . $row['deliver_option']. "'>";
  echo "<input type='hidden' name='bakers_name' value='" . $row['bakers_name']. "'>";
  echo "<select  type='hidden' name='status'>";
  echo "<option selected='true' style='display: none'></option>";
  echo "<option value='delivered'>Delivered</option>";
  echo "<option value='in progresst'>In progress</option>";
  echo "<option value='Not ready'>Not ready</option>";
  echo "</select>";
  echo "<select type='hidden' name='payment'>";
  echo "<option selected='true' style='display: none'></option>";
  echo "<option value='paid'>Paid</option>";
  echo "<option value='notyet'>Not Yet</option>";
  echo "<option value='cash'>Cash</option>";
  echo "</select>";
  echo "<input type='submit' name='update' value='Save'>";
  echo "</form>";
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
