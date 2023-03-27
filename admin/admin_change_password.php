<?php
// session_start();
 include "../db.php";
 include "../function.php";
 include "header.php";


// if (!isset($_SESSION['logged_in_user'])) {
//   header('Location: login.php');
//   exit;
// }

if (isset($_POST['change'] )) {
  $current_password = $_POST['current_password'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];

  // Validate input
  if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
    $error = 'Please fill in all fields.';
  } else if ($new_password !== $confirm_password) {
    $error = 'New password and confirm password do not match.';
  } else {

    // Get the current hashed password from the database
    $query = "SELECT password FROM users WHERE username = '" . $_SESSION['user'] . "'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    // Verify current password
    if (md5($current_password) !== $user['password']) {
      $error = 'Incorrect current password.';
    } else {
      // Update the password in the database
      $query = "UPDATE users SET password = '" . md5($new_password) . "' WHERE username = '" . $_SESSION['user'] . "'";
      mysqli_query($db, $query);

      // Redirect to profile page
      header('Location: profile.php');
      exit;
    }
  }
}
?>


<div class="div_container">
        <div class="aside">
            <div class="sidebar">
                <div id="order-sidebar" class="visible">
                        <h3>Admin Panel</h3>
                        <p style="font-size: bold;">Admin.</p>
                        <ul>
                          <li><a href="admin_deliveries.php">Deliveries Report</a></li><br>
                          <li><a href="admin_order_management.php">Order management</a></li><br>
                          <li><a href="admin_product_management.php">Product Management</a></li><br>
                          <li><a href="admin_profile.php">Profile</a></li><br>
                          <li><a href="manage_user.php">Manage Users</a></li><br>
                          <!-- <li><a href="admin_change_password.php">Change password</a></li><br> -->
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
            <div id="order-content" class="visible">

            <div class="main">
        <div class="content">
            <div id="delivery-content" class="visible">

          <div >
                <!-- padding: 27px 15px; -->
                    <script type="text/javascript" src="script.js"></script>
                      <button onclick="myFunction()">Change password</button>
                      <div style="text-align: left;">
                      <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Change Your Password</h1>
                      </div>
                      <div >
                      <div id="myDIV">
                        <form  style="width: 300px;"action="" method="post" >
                                <label>Current password</label><br>
                                <input type="text" name="current_password" placeholder="Enter current password" required=""><br>
                                <label>New password</label><br>
                                <input type="text" name="new_password" placeholder="New Password" required=""><br>
                                <label>Confirm new password</label><br>
                                <input type="text" name="confirm_password" placeholder=" Confirm New Password" required=""><br>
                                <button class="btn btn-default" type="submit" name="change" onclick="submitConfirmation()">change</button>
                        </form>
                        <script src="../script.js"></script>
                      </div>
                    </div>
                </div>
            

</div>
        </div>
    </div>
</div>
<?php
include "../footer.php";
?>

<script>
    // Check if the URL contains the "register.php" string
    if (window.location.href.indexOf("register.php") > -1) {
        // Show the registration sidebar and content
        document.getElementById("order-sidebar").style.display = "block";
        document.getElementById("order-content").style.display = "block";
    }
</script>