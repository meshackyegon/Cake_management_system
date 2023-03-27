<?php
require "db.php";
include "function.php";
include "header.php";
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Process the form data when an item is added to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cart'])) {
    // Retrieve the item details from the form data
    $item_image = $_POST['image'];
    $item_name = $_POST['name'];
    $item_description = $_POST['description'];
    $item_price = $_POST['price'];

    // Add the item to the cart array in the session
    $_SESSION['cart'][] = array(
        'image' => $item_image,
        'name' => $item_name,
        'description' => $item_description,
        'price' => $item_price
    );
}

// Reset the cart if the "Clear Cart" button is clicked
if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = array();
}

// Display the items in the cart
if (!empty($_SESSION['cart'])) {
    echo "<ul>";
    foreach ($_SESSION['cart'] as $item) {
      echo "<li><img src='image/{$item['image']}' alt='{$item['name']}' width='100' height='100'><br>{$item['name']} - {$item['price']}</li>";

    }
    echo "</ul>";
    echo "<form method='post'>";
    echo "<input type='submit' name='clear_cart' value='Clear Cart'>";
    echo "</form>";
} else {
    echo "Your cart is empty.";
}

?>
<form method="post" action="">
  <input type="hidden" name="action" value="add-to-db">
  <!-- <input type='hidden' name='product_id' value='product_id'> -->
  <input type='hidden' name='product_id' value="product_id">
  <input type='hidden' name='product_description' value='product_description'>
  <?php foreach ($_SESSION['cart'] as $item): ?>
    <input type="hidden" name="image" value="<?php echo $item['image']; ?>">
    <input type="hidden" name="name" value="<?php echo $item['name']; ?>">
    <input type="hidden" name="price" value="<?php echo $item['price']; ?>">
  <?php endforeach; ?>
<input  style='border: 1px solid black;' type='hidden' name='bakers_name' value='not assigned'>
<input  style='border: 1px solid black;' type='hidden' name='bakers_status' value='not worked on'>

<input  style='border: 1px solid black;' type='hidden' name='payment' value='not paid'>

  <button type="submit" name="submit_cart">Submit Cart</button>
</form>
<?php
include "footer.php";
?>

<?php
if(isset($_POST['submit_cart'])){
  $customer_name = $_SESSION['user'];
  $product_id = $_POST['product_id'];
  $product_name = $_POST['name'];
  $product_description = $_POST['product_description'];
  $product_price = $_POST['price'];
  $product_image = $_POST['image'];
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


