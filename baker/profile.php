<?php

// session_start();
include "../function.php";

// Check if user is logged in
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

// if (isset($_GET['logout'])) {
// 	session_destroy();
// 	unset($_SESSION['user']);
// 	header("location: login.php");
// }

// Connect to database
include "../db.php";
// include "function.php";
// include "function.php";
// include "function.php";
// $logged_in_user = $_SESSION['user'];
?>
<?php
// $sql = "SELECT fullnames, username, email, location, contact FROM users WHERE username = '$logged_in_user'";
// $result = mysqli_query($db, $sql);
$logged_in_user = mysqli_real_escape_string($db, $_SESSION['user']);
// $sql = "SELECT fullnames, username, email, location, contact FROM users WHERE username = '".$logged_in_user."'";
$sql = "SELECT fullnames, email, location, contact FROM users WHERE email= '".$_SESSION['user']."'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $fullname = $row["fullnames"];
        $email = $row["email"];
        $location = $row["location"];
        $contact = $row["contact"];
    }
} else {
    echo "no user found";
}

mysqli_close($db);
?>



<?php
include "header.php";
?>
<div class="nav">
      <ul>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="baker_page.php">Baker page</a></li>
        <li><a href="bakeries.php">Bakers orders</a></li>
        <li><a href="../logout.php">Logout</a></li>
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
                <div id="profile-sidebar" class="visible">
                        <h3>Profile</h3>
                        <?php
          echo " ".$_SESSION['user']; 
        ?>
                        <p>Here is your details.</p>
                        <ul>
                        <li><a href="profile.php">Profile</a></li><br>
                        <li><a href="baker_page.php">Baker page</a></li><br>
                        <li><a href="bakeries.php">Bakers orders</a></li><br>
                        </ul>
                </div>
            </div>
        </div>
    <div class="main">
        <div class="content">
            <div id="profile-content" class="visible">
<!-- Edit Profile Form -->
                <form method="post" action="profile.php">
                <label for="name">Full Name:</label>
                  <input type="text" name="fullname" value="<?php echo $fullname; ?>">
                  <br>
                  <label for="email">Email:</label>
                  <input type="email" name="email" value="<?php echo $email; ?>">
                  <br>
                  <label for="location">Location:</label>
                  <input type="text" name="location" value="<?php echo $location; ?>">
                  <br>
                  <label for="contact">Contact:</label>
                  <input type="text" name="contact" value="<?php echo $contact; ?>">
                  <br>
                  <input type="submit" name="edit_profile" value="Save Changes">
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
    if (window.location.href.indexOf("register.php") > -1) {
        // Show the registration sidebar and content
        document.getElementById("profile-sidebar").style.display = "block";
        document.getElementById("profile-content").style.display = "block";
    }
</script>
<?php
if(isset($_POST['edit_profile'])){
        $fullname = $row["fullnames"];
        $email = $row["email"];
        $location = $row["location"];
        $contact = $row["contact"];
}