<?php
// include "header.php";
include "../function.php";
if (!isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
  die("You don't have permission to access this page.");
}
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
<?php
include "header.php";
?>

<div class="div_container">
        <div class="aside">
            <div class="sidebar">
                <div id="user-sidebar" class="visible">
                        <h3> users</h3>
                        <p>Users.</p>
                        <ul>
                            <li><a href="admin_product_management.php">Manage products</a></li><br>
                            <li><a href="admin_order_management.php">Manage orders</a></li><br>
                            <li><a href="admin_change_password.php">Change Password</a></li><br>
                            <li><a href="admin_profile.php">Profile</a></li><br>
                            <li><a href="manage_user.php">Manage User</a></li><br>
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
            <div id="user-content" class="visible">

            <?php


$sql = "SELECT * FROM users";
$result = mysqli_query($db, $sql);

echo "<table style='width:100%; border: 1px solid black;margin: 10px;'>";
echo "<tr style='border: 1px solid black;'>";
echo "<th style='border: 1px solid black;'>ID</th>";
echo "<th style='border: 1px solid black;'>Full Names</th>";
echo "<th style='border: 1px solid black;'>Email</th>";
echo "<th style='border: 1px solid black;'>Contact</th>";
echo "<th style='border: 1px solid black;'>Location</th>";
echo "<th style='border: 1px solid black;'>User TYpe</th>";
// echo "<th style='border: 1px solid black;'>Payment</th>";
echo "</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr style='border: 1px solid black;'>";
  echo "<td style='border: 1px solid black;'>" . $row['id'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['fullnames'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['email'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['contact'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['location'] . "</td>";
  echo "<td style='border: 1px solid black;'>" . $row['user_type'] . "</td>";
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
include "../footer.php";

?>
<script>
    // Check if the URL contains the "register.php" string
    if (window.location.href.indexOf("manage_user.php") > -1) {
        // Show the registration sidebar and content
        document.getElementById("user-sidebar").style.display = "block";
        document.getElementById("user-content").style.display = "block";
    }
</script>