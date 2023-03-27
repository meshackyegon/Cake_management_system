
<?php
include "db.php";
include "function.php";
include "header.php";

/*if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}*/
?>
<?php  
?>
<?php
if(isset($_POST['save_order'])){
  $customer_name = $_SESSION['user'];
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_description = $_POST['product_description'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $bakers_name= $_POST['bakers_name'];
  $bakers_status= $_POST['bakers_status'];
  $payment = $_POST['payment'];

  $sql = "INSERT INTO orderss (customer_Name, product_id, product_name, product_description, product_price, product_image, bakers_name, status, payment) 
          VALUES ('$customer_name', '$product_id', '$product_name', '$product_description', '$product_price', '$product_image','$bakers_name','$bakers_status', '$payment')";

  $result = mysqli_query($db, $sql);
  if ($result) {
    //echo "Record inserted successfully into the orders table";
    header("location: order.php");
  } else { 
    echo "Error inserting record: " . mysqli_error($db);
  }
}
// $_SESSION['user'] = $user_id;
?>


        
    <div class="main">
        <div class="content">
            <div id="profile-content" class="visible">
              <?php

$sql = "SELECT * FROM products";
$result = mysqli_query($db, $sql);

echo "<table style='width:100%; border:collapse; min-height: 50vh;'>";
echo "<tr style='border: 1px solid black;'>";
// echo "<th style='border: 1px solid black;'>Customer Name</th>";
echo "<th style='border: 1px solid black;'>Product ID</th>";
echo "<th style='border: 1px solid black;'>Product Name</th>";
echo "<th style='border: 1px solid black;'>Product Description</th>";
echo "<th style='border: 1px solid black;'>Product Price</th>";
echo "<th style='border: 1px solid black;'>Product Image</th>";
// echo "<th style='border: 1px solid black;'>Bakers Name</th>";
// echo "<th style='border: 1px solid black;'>Bakery status</th>";
echo "<th style='border: 1px solid black;'>Action</th>";
echo "</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr style='border: 1px solid black;'>";
//echo "<td style='border: 1px solid black;'>" . $row['customer_Name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['product_id'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['product_name'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['product_description'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['product_price'] . "</td>";
  echo "<td style='border: 1px solid black;'><img src='./image/" . $row['product_image'] . "' width='100' height='100'></td>";
  // echo "<td style='border: 1px solid black;'>" . $row['payment'] . "</td>";
  echo "<td style='border: 1px solid black;'>";
  echo "<form action='orders.php' method='post'>";
  // echo "<input type='hidden' name='customer_name' value='" . $customer_name. "'>";
  echo "<input type='hidden' name='product_id' value='" . $row['product_id'] . "'>";
  echo "<input type='hidden' name='product_name' value='" . $row['product_name'] . "'>";
  echo "<input type='hidden' name='product_price' value='" . $row['product_price'] . "'>";
  echo "<input type='hidden' name='product_description' value='" . $row['product_description'] . "'>";
  echo "<input type='hidden' name='product_image' value='" . $row['product_image'] . "'>";
  echo "<input  style='border: 1px solid black;' type='hidden' name='bakers_name' value='not assigned'>";
  echo "<input  style='border: 1px solid black;' type='hidden' name='bakers_status' value='not worked on'>";
  // echo "<option value='paid'>Paid</option>";
  echo "<input  style='border: 1px solid black;' type='hidden' name='payment' value='not paid'>";
  // echo "<option value='cash'>Cash</option>";
  echo "<input type='submit' name='save_order' value='Save'>";
  echo "</form>";
  echo "</td>";
  echo "</tr>";
}
echo "</table>";?>

</div>
        </div>
    </div>

<?php
include "footer.php";
?>

