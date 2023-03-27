<?php
include "db.php";
include "header.php";
include "function.php";
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

?>
<div class="nav">
      <ul>
        <!-- <li><a href="cart.php">Add cart</a></li> -->
        <li><a href="deliveries.php">Deliveries</a></li>
        <li><a href="view_users.php">View user</a></li>
        <li><a href="../profile.php">Profile</a></li>
        <li><a href="change_password.php">Change password</a></li>
        <li><a href="../logout.php">logout</a></li>
        <?php
            if(isset($_SESSION['user']))

            {
                echo "Welcome ".$_SESSION['user']; 
            }
        ?>
      </ul>
</nav>
<div class="container">
        <div class="aside">
            <div class="sidebar">
                <div id="order-sidebar" class="visible">
                        <h3>Orders</h3>
                        <p style="font-size: bold;">Kindly pick your order.</p>
                        <ul>
                          <li><a href="deliveries.php">Deliveries</a></li><br>
                          <li><a href="view_users.php">View user</a></li><br>
                          <li><a href="../profile.php">Profile</a></li><br>
                          <li><a href="change_password.php">Change password</a></li><br>
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
