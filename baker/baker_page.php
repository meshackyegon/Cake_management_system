<?php
include "../db.php";
include "../function.php";
if (!isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'baker' ) {
  die("You don't have permission to access this page.");
  header("location: .../login.php");
}
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_POST['update'])) {
  $customer_name = $_POST['customer_name'];
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_description = $_POST['product_description'];
  $product_price = $_POST['product_price'];
  $bakers_name = $_SESSION['user'];//$_POST['bakers_name']
  $bakers_status = $_POST['bakers_status'];

  $sql = "UPDATE orderss SET bakers_name='$bakers_name', status='$bakers_status' WHERE customer_name='$customer_name' AND product_id='$product_id'";
  if (mysqli_query($db, $sql)) {
    echo "Record updated successfully";
    header('location: baker_page.php');
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
                        <h3>Bakers</h3>
                        <p style="font-size: bold;">View bakeries order.</p>
                        <ul>
                          <!-- <li><a href="deliveries.php">Deliveries</a></li><br> -->
                          <li><a href="bakeries.php">Baker Orders</a></li><br>
                          <li><a href="profile.php">Profile</a></li><br>
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


$sql = "SELECT * FROM orderss";
$result = mysqli_query($db, $sql);

echo "<table style='width:90%; border: 1px solid black;'>";
echo "<tr style='border: 1px solid black;'>";
echo "<th style='border: 1px solid black;'>Customer Name</th>";
echo "<th style='border: 1px solid black;'>Product ID</th>";
echo "<th style='border: 1px solid black;'>Product Name</th>";
echo "<th style='border: 1px solid black;'>Product Description</th>";
echo "<th style='border: 1px solid black;'>Bakers Name</th>";
echo "<th style='border: 1px solid black;'>Status</th>";
echo "</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr style='border: 1px solid black;'>";
  echo "<td style='border: 1px solid black;'>" . $row['customer_Name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['product_id'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['product_name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['product_description'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['bakers_name'] . "</td>";
  // echo "<td style='border: 1px solid black;'>" . $row['status'] . "</td>";
  echo "<td style='border: 1px solid black;'>";
  echo "<form action='baker_page.php' method='post'>";
  echo "<input type='hidden' name='customer_name' value='" . $row['customer_Name'] . "'>";
  echo "<input type='hidden' name='product_id' value='" . $row['product_id'] . "'>";
  echo "<input type='hidden' name='product_name' value='" . $row['product_name'] . "'>";
  echo "<input type='hidden' name='product_description' value='" . $row['product_description'] . "'>";
  echo "<input type='hidden' name='bakers_name' value='" . $row['bakers_name'] . "'>";
  // echo "<input type='hidden' name='bakes_status' value='" . $row['status'] . "'>";
  echo "<select name='bakers_status'>";
  echo "<option selected='true' style='display: none'></option>";
  echo "<option value='not_assigned'>Not assigned</option>";
  echo "<option value='ready'>Ready</option>";
  echo "<option value='in progress'>In progress</option>";
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
