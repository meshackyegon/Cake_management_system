<?php
include "header.php";
include "function.php";
?>


<main>

<div class="container">
    <form method="post" action="function.php">
      <?php echo display_error(); ?>

      <h2 style="text-align: center;">Login</h2><br>
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br> <br>

      <button class="button" type="submit" value="Submit" name="login">Login</button>
      <p ><a href="forgot_password.php">Forgot password</a></p>
      <p style="text-align: center">Do not have an account <a href="register.php">Sign Up</a></p>
    </form>
  </div>

</main>

<?php
   include'footer.php'; 

   ?>