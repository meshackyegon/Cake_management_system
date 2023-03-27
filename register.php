<?php
include "header.php";
include "function.php";

?>

<style>


</style>

<div class="container">
        
   
            <div id="order-content" class="visible">
                <form method="post" action="function.php" onsubmit="return submitConfirmation()">
                    <?php echo display_error(); ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <br>
                    <label for="full-name">Full Name:</label><br>
                    <input id="fname" type="text" name="full-name" onkeyup="validatefName()"> <span id="fullname-error"></span><br>
                
                    <label for="email">Email:</label><br>
                    <input  id="email" type="email" name="email"  onkeyup="validateEmail()" value="<?php echo $email; ?>"> <span id="email-error"></span><br>
                  
                    <label for="contact">Contact:</label><br>
                    <input id="contact" type="text" name="contact"  onkeyup="validateContact()"><span id="contact-error"></span><br>
                
                    <label for="contact">Location:</label><br> 
                    <input id="location" type="text" name="location"  onkeyup="validateLocation()"> <span id="location-error"></span><br>
                   
                    <label for="password">Password:</label><br>
                    <input  id="pwd" type="password" name="password" onkeyup="validatePassword()">  <span id="password-error"></span><br>
                   
                    <label for="password">Confirm Password:</label><br>
                    <input id="cpwd" type="password" name="cpassword"  onkeyup="validatecPassword()"> <span id="cpassword-error"></span><br> <br>
                    
                    
                    <button class="button" type="submit" value="Submit" name="Register" onclick="if (!validateForm()) return false;">Register</button>

                    <span id="submit-error"></span>
                    <p style="text-align: center">Already have an account <a href="login.php">Login</a></p>
                </form>
                <script src="script.js"></script>
            </div>
      
</div>
<?php
include "footer.php";
?>

<script>
    // Check if the URL contains the "register.php" string
    if (window.location.href.indexOf("register.php") > -1) {
        // Show the registration sidebar and content
        document.getElementById("registration-sidebar").style.display = "block";
        document.getElementById("registration-content").style.display = "block";
    }
</script>
