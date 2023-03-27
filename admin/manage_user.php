<?php
// include "../header.php";
include "../function.php";
// if (!isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
//   die("You don't have permission to access this page.");
// }
/*if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}*/
?>
<?php
include "header.php";
?>

<div class="div_container">
        <div class="aside">
            <div class="sidebar">
                <div id="manage-user-sidebar" class="visible">
                        <h3>Manage users</h3>
                        <p>Users.</p>
                        <ul>
                            <li><a href="admin_product_management.php">Manage products</a></li><br>
                            <li><a href="admin_view_user.php">View user</a></li><br>
                            <li><a href="admin_change_password.php">Change password</a></li><br>
                            <li><a href="admin_profile.php">Profile</a></li><br>
                            <li><a href="admin_order_management.php">Manage orders</a></li><br>
                            <!-- <li><a href="deliveries.php">Deliveries</a></li><br> -->
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
            <div id="manage-user-content" class="visible">

            <form style ="width:70%; margin:auto; margin-bottom: 30px; " method="post" action="function.php">

                <?php echo display_error(); ?>

                <div class="input-group">
                  <label>Full names</label>
                  <input type="text" name="full-name" value="<?php echo $username; ?>">
                </div>

               
                <div class="input-group">
                  <label>Email</label>
                  <input type="email" name="email" value="<?php echo $email; ?>">
                </div>
                
                <div class="input-group">
                  <label>Contact</label>
                  <input type="text" name="contact" value="<?php echo $contact; ?>">
                </div>
                <div class="input-group">
                  <label>Location</label>
                  <input type="text" name="location" value="<?php echo $location; ?>">
                </div>
                <div class="input-group">
                  <label>User type</label>
                  <select name="user_type" id="user_type" >
                    <option value=""></option>
                    <option value="admin">Admin</option>
                    <option value="deliver">delivery</option>
                    <option value="baker">baker</option>
                    <option value="user">user</option>
                  </select>
                </div>
                <div class="input-group">
                  <label>Password</label>
                  <input type="password" name="password">
                </div>
                <div class="input-group">
                  <label>Confirm password</label>
                  <input type="password" name="cpassword">
                </div>
                <div class="input-group">
                  <button type="submit" class="btn" name="Register"> + Create user</button>
                </div>
              </form>
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
        document.getElementById("manage-user-sidebar").style.display = "block";
        document.getElementById("manage-user-content").style.display = "block";
    }
</script>