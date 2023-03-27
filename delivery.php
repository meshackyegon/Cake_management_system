<?php
include "header.php";
include "function.php";

/*if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}*/

if(isset($_POST['deliver'])){
    $customer_name = $_SESSION['user'];
    $deliver_name=$_POST['delivery_name'];
    $delivery_address = $_POST['delivery-address'];
    $delivery_date = $_POST['delivery-date'];
    $delivery_time = $_POST['delivery-time'];
    $delivery_option = $_POST['delivery-option'];
    $delivery_option = $_POST['delivery-option'];
    $delivery_option = $_POST['delivery-option'];
    $bakers_name = $_POST['bakers_name'];
    $bakers_status = $_POST['status'];
    $payment_method = $_POST['payment-method'];
    // $payment = $_POST['payment'];
  
    $sql = "INSERT INTO deliveries (deliver_name,customer_name, delivery_address, deliver_date_time, deliver_time, deliver_option, bakers_name, status, payment_method) 
            VALUES ('$deliver_name','$customer_name', '$delivery_address', '$delivery_date', '$delivery_time', '$delivery_option','$bakers_name','$bakers_status' ,'$payment_method')";
  
    $result = mysqli_query($db, $sql);
    if ($result) {
      //echo "Record inserted successfully into the orders table";
      header("location: order.php");
    } else { 
      echo "Error inserting record: " . mysqli_error($db);
    }
  }

?>


 
<div class="div_container">
    <div class="aside">
        <div class="sidebar">
            <div id="delivery-sidebar" class="visible">
                    <h1>Delivery</h1>
                   
                    <ul>
                        <li><a href="cart.php">Cart</a></li><br>
                        <li><a href="order.php">Order cake</a></li><br>
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
            <div id="delivery-content" class="visible">
                <form method="post" action="delivery.php" onsubmit="return submitConfirmation()">
                <input  style='border: 1px solid black;' type='hidden' name='delivery_name' value='not assigned'>
                <!-- <input  style='border: 1px solid black;' type='hidden' name='payment' value='not paid'>"; -->
              
                <label for="delivery-address">Address:</label>
                <input style= "padding: 20px;" type="text" id="delivery-address" name="delivery-address">
                <br><br>
               
                <label for="delivery-date">Date:</label>
                <input style= "width: 50%; padding: 20px; " type="date" id="delivery-date" name="delivery-date">
                <br><br>
                <label for="delivery-time">Time:</label>
                <input style= "width: 50%; padding: 20px;" type="time" id="delivery-time" name="delivery-time">
                <br><br>
               
                <label for="delivery-option">Delivery Option:</label>
                <select style= "padding: 20px;" id="delivery-option" name="delivery-option">
                    <option value="standard">Standard Delivery</option>
                    <option value="express">Express Delivery</option>
                    <option value="pickup">Pickup</option>
                </select>
                <input  style='border: 1px solid black;' type='hidden' name='bakers_name' value='not assigned'>
                <input  style='border: 1px solid black;' type='hidden' name='status' value='in queue'>
                <br><br>
                
                <label for="payment-method">Payment Method:</label>
                <select style= "padding: 20px;" id="payment-method" name="payment-method">
                    <option value="credit-card">Credit/Debit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="cash-on-delivery">Cash on Delivery</option>
                </select>
                <br><br>
                <button type="submit" value="Delivery" name="deliver">Deliver</button>
                <!-- <button type="button" onclick="resetForm()">Cancel</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>

<script>
    // Check if the URL contains the "register.php" string
    if (window.location.href.indexOf("delivery.php") > -1) {
        // Show the registration sidebar and content
        document.getElementById("delivery-sidebar").style.display = "block";
        document.getElementById("delivery-content").style.display = "block";
    }
</script>