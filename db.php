<?php
 $serverName="localhost";
 $username="mesh";
 $password="@Meshack1";
 $dbname="cake_management";

 $db= mysqli_connect($serverName, $username, $password, $dbname);
 if(!$db){
    die("Database connection failed: " .mysqli_connect_error());
 }
 if (isset($_GET['del'])) {
	$product_id = $_GET['del'];
	mysqli_query($db, "DELETE FROM products WHERE product_id=$product_id");
	$_SESSION['message'] = "Record deleted!"; 
	header('location: admin/product_management.php');
 }

