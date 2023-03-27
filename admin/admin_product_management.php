
<?php
// include "header.php";
include "../function.php";
if (!isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
  die("You don't have permission to access this page.");
}
/*if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}*/
?>

<?php 
	if (isset($_GET['edit'])) {
		$product_id = $_GET['edit'];
		$update = true;
    // $product_name="";
		// $record = mysqli_query($db, "SELECT * FROM products WHERE product_id='"._GET['edit']."'");
    $record = mysqli_query($db, "SELECT * FROM products WHERE product_id=$product_id");

		if (count($record) === 1 ) {
			$n = mysqli_fetch_array($record);
			$product_id = $n['product_id'];
      $product_name = $n['product_name'];
      $product_description = $n['product_description'];
      $product_price = $n['product_price'];
      $product_image = $n['product_image'];
		}
	}
?>
<?php
include "header.php";
?>

<style>
  .input{
  width: 50%;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: none;
  box-sizing: border-box;
  }

  .label{
    display: block;
  margin-bottom: 5px;
  font-weight: bold;
  color: #333;
  }


</style>

<div class="div_container">
        <div class="aside">
            <div class="sidebar">
                <div id="manage-product-sidebar" class="visible">
                        <h3>Admin Panel</h3>
                        <p>products.</p>
                        <ul>
                           <li><a href="manage_user.php">Add User</a></li><br>
                           <li><a href="admin_change_password.php">Change Password</a></li><br>
                            <li><a href="admin_profile.php">Profile</a></li><br>
                            <li><a href="admin_view_user.php">View user</a></li><br>
                            <li><a href="manage_user.php">Manage users</a></li><br>
                            <li><a href="admin_order_management.php">Manage orders</a></li><br>
                            <!-- <li><a href="../logout.php">logout</a></li><br> -->
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
            <div id="manage-product-content" class="visible">
              <form style="width:50%; margin: auto; "action="admin_product_management.php" method="post" enctype="multipart/form-data">
                <h2  class="label">Product Management</h2>
                
                  <label  class="label" for="action">Action:</label>
                  <select class="input" id="action" name="action">
                    <option value="add">Add</option>
                    <option value="edit">Edit</option>
                    <option value="remove">Remove</option>
                  </select>
                
             
                  <label class="label" for="product_name">Product Name:</label>
                  <input class="input" type="text" id="product_name" name="product_name" value="<?php echo $product_name; ?>">
               
             
                  <label class="label" for="product_description">Product Description:</label>
                  <textarea class="input" id="product_description" name="product_description" value="<?php echo $product_description; ?>"></textarea>
               
                  <label class="label" for="product_price">Product Price:</label>
                  <input class="input" type="number" id="product_price" name="product_price" value="<?php echo $product_price;?>">
                
                  <label class="label" for="product_image">Product Image:</label>
                  <input class="input" type="file" id="product_image" name="product_image" value="<?php echo $product_image;?>">
                
                  <button type="submit" value="Submit" name="submit_product_management"  onclick="submitConfirmation()">Save</button>
               
              </form>
              <script src="../script.js"></script>
              <?php
              $results= mysqli_query($db, "SELECT * from products");
              
              ?>
              <table style="
              
              border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 1000px;
    ">
                <thead>
                    <tr stle=" background-color: #009879;
    color: #ffffff;
    text-align: left;">
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                
                <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['product_description']; ?></td>
                        <td><?php echo $row['product_price']; ?></td>
                        <td><?php echo $row['product_image']; ?></td>
                        <td>
                            <a href="product_management.php?edit=<?php echo $row['product_id']; ?>" class="edit_btn" >Edit</a>
                        </td>
                        <td>
                            <a href="../db.php?del=<?php echo $row['product_id']; ?>" class="del_btn" >Remove</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
              </div>
        </div>
    </div>
</div>



<?php
include "../footer.php";

?>
<script>
    // Check if the URL contains the "register.php" string
    if (window.location.href.indexOf("manage_user.php") > -1) {
        // Show the registration sidebar and content
        document.getElementById("manage-product-sidebar").style.display = "block";
        document.getElementById("manage-product-content").style.display = "block";
    }
</script>
<?php
include "../db.php";

if (isset($_POST['submit_product_management'])) {
  $action = $_POST['action'];
  $product_name = $_POST['product_name'];
  $product_description = $_POST['product_description'];
  $product_price = $_POST["product_price"];//$_POST['product_price'];
  $product_image = $_FILES['product_image']['name'];
  

  if ($action == "add") {
    // move_uploaded_file($product_image_tmp, "../image/$product_image");
    // move_uploaded_file($_FILES['product_image']['tmp_name'],"image/".$_FILES['product_image']['name']);
    $product_image=$_FILES["product_image"]["name"];
    $target = "../image/".basename($product_image);
    
    $query = "INSERT INTO products (product_name, product_description, product_price, product_image)
              VALUES ('$product_name', '$product_description', '$product_price', '$product_image')";
    $result = mysqli_query($db, $query);
    move_uploaded_file($_FILES['product_image']['tmp_name'], $target);
   
    
    if ($result) {
      ?>
      <script>
        alert("product update successfully");
      </script>
      
      <?php
      
      
      header("Location: manage_products.php");
    } else {
      echo "Error: " . mysqli_error($db);
    }
  } else {
    // code for editing or removing a product
  }
}
?>