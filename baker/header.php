<!DOCTYPE html>
<html>
  <head>
    <title>Online Cake ordering System</title>
    <link rel="stylesheet" href="style.css">
  
  </head>
  <body>

    <!-- Header -->

    <header>
      <div class="logo">
        <h1>ALLNET CAKES</h1>
      </div>
      <ul>
        <li><a href="cake-catalogue.php">Menu</a></li>
        <?php if(isset($_SESSION["user"])) { ?>
        <li><a href="../logout.php">Logout</a></li>
        <?php } else { ?>
          <li><a href="../register.php">Register</a></li>
        <li><a href="../login.php">Login</a></li>
        <?php } ?>
        <li><a href="../cake-catalogue.php" class="btn">Order Online</a></li>
      </ul>
    </header>
    