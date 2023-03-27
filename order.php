<?php
include "header.php";
include "function.php";
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>

<div class="div_container">
        <div class="aside">
           
                <div id="order-sidebar" class="visible">
                        <h3>Orders</h3>
                        <p style="font-size: bold;">Kindly pick your order.</p>
                        <ul>
                            <li><a href="orders.php">orders</a></li><br>
                          <li><a href="delivery.php">Delivery</a></li><br>
                          <li><a href="profile.php">Profile</a></li><br>
                          <li><a href="change_password.php">Change password</a></li><br>
                          <li><a href="logout.php">logout</a></li><br>

                        </ul>
                </div>
            
        </div>
    <div class="main">
        <div class="content">
            <div id="order-content" class="visible">

                    <?php

$sql = "SELECT * FROM orderss WHERE Customer_Name='".$_SESSION['user']."'";
$result = mysqli_query($db, $sql);

echo "<table style='width:100%; border: 1px solid black;'>";
echo "<tr style='border: 1px solid black;'>";
echo "<th style='border: 1px solid black;'>Customer Name</th>";
echo "<th style='border: 1px solid black;'>Product ID</th>";
echo "<th style='border: 1px solid black;'>Product Name</th>";
echo "<th style='border: 1px solid black;'>Product Description</th>";
echo "<th style='border: 1px solid black;'>Product Price</th>";
echo "<th style='border: 1px solid black;'>Product Image</th>";
echo "<th style='border: 1px solid black;'>Bakers Name</th>";
echo "<th style='border: 1px solid black;'>Bakery Status</th>";
echo "<th style='border: 1px solid black;'>Payment</th>";
// echo "<th style='border: 1px solid black;'>action</th>";
echo "</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr style='border: 1px solid black;'>";
  echo "<td style='border: 1px solid black;'>" . $row['customer_Name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['product_id'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['product_name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['product_description'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['product_price'] . "</td>";
  echo "<td style='border: 1px solid black;'><img src='image/" . $row['product_image'] . "' width='100' height='100'></td>";
  echo "<td style='border: 1px solid black;'>" . $row['bakers_name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['status'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['payment'] . "</td>";
//   echo "<form action='orders.php' method='post'>";
//   echo "<input type='hidden' name='customer_name' value='" .$row['customer_Name']. "'>";
//   echo "<input type='hidden' name='product_id' value='" . $row['product_id'] . "'>";
//   echo "<input type='hidden' name='product_name' value='" . $row['product_name'] . "'>";
//   echo "<input type='hidden' name='product_price' value='" . $row['product_price'] . "'>";
//   echo "<input type='hidden' name='product_description' value='" . $row['product_description'] . "'>";
//   echo "<input type='hidden' name='product_image' value='" . $row['product_image'] . "'>";
  // echo "<input  style='border: 1px solid black;' type='hidden' name='payment' value='not paid'>";
  echo "</form>";
  // echo "<option value='cash'>Cash</option>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($db);
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

