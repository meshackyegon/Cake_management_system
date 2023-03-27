<?php
// include "header.php";
// Start the PHP session
session_start();

// Check if the cart array has been initialized


?>
<!DOCTYPE html>
<html>
<head>
  <title>Cake Catalogue</title>


  <style>

.featured-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
        padding: 50px 0;
      }
      .cake {
        margin: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        width: 350px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        
}
      

      .title{
        text-align: center;
       
      }

      .cake img{
        height: 250px; 
        width: 80%; 
        background-size: cover;
        background-position: center;
        display: block;
        margin: 0 auto;
      
      }
      .cake h3 {
        margin-top: 0;
        font-size: 24px;
      }
      .cake p {
        margin: 10px 0;
  
      }

      .cake a{
        color: blue; 
        font-size: 105%; 
      }

  </style>

</head>
<body>
<?php 
    include 'header.php'; 
?>

<br><br><br>
  
  <div class="search" style="
  display: flex;
  justify-content: center;
  align-items: center;

  ">

    <form action="cart.php" method="get">
      <input type="text" name="search" placeholder="Search cakes" style="
      margin-top: 30px;
      padding: 10px;
  border-radius: 8px;
  border: 1px solid black;
  width: 400px;">
      <button type="submit"  style="
      background-color: purple; 
  border: none;
  color: white;
  padding: 5px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 3px;
  margin-left: 10px;
  width: 100px;
      ">Search</button>
    </form>
  
  </div>


  <div class="featured-section">

<?php

echo"<br><br>";
// Create a form to add an item to the cart
echo "<div class='cake'>";
echo "<form method='post' action='cart.php'>";
echo "<input type='hidden' name='image' value='bberry1.jpg'>";
echo "<input type='hidden' name='name' value='Blueberry Cake'>";
echo "<input type='hidden' name='description' value='A moist and flavorful cake made with fresh carrots and a hint of spice.'>";
echo "<input type='hidden' name='price' value='2200'>";
echo "<button type='submit' name='cart'>Add to Cart</button>";
echo "<img src='image/bberry1.jpg' alt='Blueberry Cake'>";
echo "<h3>Blueberry Cake</h3>";
echo "<p>A moist and flavorful cake made with fresh carrots and a hint of spice.</p>";
echo "<p>Price: 2200</p>";
echo "</div>";

echo "<div class='cake'>";
// echo "<form method='post'>";

echo "<input type='hidden' name='image' value='bberry1.jpg'>";
echo "<input type='hidden' name='name' value='Blueberry Cake'>";
echo "<input type='hidden' name='description' value='A moist and flavorful cake made with fresh carrots and a hint of spice.'>";
echo "<input type='hidden' name='price' value='2200'>";
echo "<button type='submit' name='cart'>Add to Cart</button>";
echo "<img src='image/bberry1.jpg' alt='Blueberry Cake'>";
echo "<h3>Blueberry Cake</h3>";
echo "<p>A moist and flavorful cake made with fresh carrots and a hint of spice.</p>";
echo "<p>Price: 2200</p>";
echo "</div>";

echo "<div class='cake'>";
// echo "<form method='post'>";
echo "<input type='hidden' name='image' value='rasp.jpg'>";
echo "<input type='hidden' name='name' value='Raspberry Cake'>";
echo "<input type='hidden' name='description' value='A moist and flavorful cake made with fresh carrots and a hint of spice.'>";
echo "<input type='hidden' name='price' value='2400'>";
echo "<button type='submit' name='cart'>Add to Cart</button>";
echo "<img src='image/rasp.jpg' alt='Raspberry Cake'>";
echo "<h3>Raspberry Cake</h3>";
echo "<p>A moist and flavorful cake made with fresh carrots and a hint of spice.</p>";
echo "<p>Price: 2400</p>";
echo "</div>";

echo "<div class='cake'>";
// echo "<form method='post'>";
echo "<input type='hidden' name='image' value='coffee.jpg'>";
echo "<input type='hidden' name='name' value='Coffee Cake'>";
echo "<input type='hidden' name='description' value='A moist and flavorful cake made with fresh carrots and a hint of spice.'>";
echo "<input type='hidden' name='price' value='2000'>";
echo "<button type='submit' name='cart'>Add to Cart</button>";
echo "<img src='image/coffee.jpg' alt='Coffee Cake'>";
echo "<h3>Coffee Cake</h3>";
echo "<p>A moist and flavorful cake made with fresh carrots and a hint of spice.</p>";
echo "<p>Price: 2000</p>";
echo "</div>";


echo "<div class='cake'>";
// echo "<form method='post'>";
echo "<input type='hidden' name='image' value='choco.jpg'>";
echo "<input type='hidden' name='name' value='Red Velvet Cake'>";
echo "<input type='hidden' name='description' value='A moist and delicious cake with a striking red color and tangy cream cheese frosting.'>";
echo "<input type='hidden' name='price' value='1600'>";
echo "<button type='submit' name='cart'>Add to Cart</button>";
echo "<img src='image/choco.jpg' alt='Red Velvet Cake'>";
echo "<h3>Red Velvet Cake</h3>";
echo "<p>A moist and delicious cake with a striking red color and tangy cream cheese frosting.</p>";
echo "<p>Price: 1600</p>";
// echo "</form>";
echo "</div>";

echo "<div class='cake'>";
// echo "<form method='post'>";
echo "<input type='hidden' name='image' value='fruit1.jpg'>";
echo "<input type='hidden' name='name' value='Carrot Cake'>";
echo "<input type='hidden' name='description' value='A moist and flavorful cake made with fresh carrots and a hint of spice.'>";
echo "<input type='hidden' name='price' value='1900'>";
echo "<button type='submit' name='cart'>Add to Cart</button>";
echo "<img src='image/fruit1.jpg' alt='Carrot Cake'>";
echo "<h3>Carrot Cake</h3>";
echo "<p>A moist and flavorful cake made with fresh carrots and a hint of spice.</p>";
echo "<p>Price: 1900</p>";
echo "</div>";

echo "<div class='cake'>";
// echo "<form method='post'>";
echo "<input type='hidden' name='image' value='mint1.jpg'>";
echo "<input type='hidden' name='name' value='Lemon Cake'>";
echo "<input type='hidden' name='description' value='A moist and flavorful cake made with fresh carrots and a hint of spice.'>";
echo "<input type='hidden' name='price' value='2200'>";
echo "<button type='submit' name='cart'>Add to Cart</button>";
echo "<img src='image/mint1.jpg' alt='Lemon Cake'>";
echo "<h3>Lemon Cake</h3>";
echo "<p>A moist and flavorful cake made with fresh carrots and a hint of spice.</p>";
echo "<p>Price: 2200</p>";
echo "</div>";

echo "<div class='cake'>";
// echo "<form method='post'>";
echo "<input type='hidden' name='image' value='image3.jpg'>";
echo "<input type='hidden' name='name' value='Chocolate Cake'>";
echo "<input type='hidden' name='description' value='A moist and flavorful cake made with fresh chocolate and a hint of spice.'>";
echo "<input type='hidden' name='price' value='2000'>";
echo "<button type='submit' name='cart'>Add to Cart</button>";
echo "<img src='image/image3.jpg' alt='Chocolate Cake'>";
echo "<h3>Chocolate Cake</h3>";
echo "<p>A moist and flavorful cake made with fresh chocolate and a hint of spice.</p>";
echo "<p>Price: 2000</p>";
echo "</div>";

echo "<div class='cake'>";
// echo "<form method='post'>";
echo "<input type='hidden' name='image' value='image.jpg'>";
echo "<input type='hidden' name='name' value='Pitroot Cake'>";
echo "<input type='hidden' name='description' value='A moist and flavorful cake made with fresh pitroots and a hint of spice.'>";
echo "<input type='hidden' name='price' value='1900'>";
echo "<button type='submit' name='cart'>Add to Cart</button>";
echo "<img src='image/image6.jpg' alt='Pitroot Cake'>";
echo "<h3>Pitroot Cake</h3>";
echo "<p>A moist and flavorful cake made with fresh pit and a hint of spice.</p>";
echo "<p>Price: 1900</p>";
echo "</div>";

echo "<div class='cake'>";
// echo "<form method='post'>";
echo "<input type='hidden' name='image' value='image20.jpg'>";
echo "<input type='hidden' name='name' value='Strawberry Cake'>";
echo "<input type='hidden' name='description' value='A moist and flavorful cake made with fresh strawberry and a hint of spice.'>";
echo "<input type='hidden' name='price' value='2100'>";
echo "<button type='submit' name='cart'>Add to Cart</button>";
echo "<img src='image/image20.jpg' alt='Strawberry Cake'>";
echo "<h3>Strawberry Cake</h3>";
echo "<p>A moist and flavorful cake made with fresh strawberry and a hint of spice.</p>";
echo "<p>Price: 2100</p>";
echo "</div>";

echo "<div class='cake'>";
// echo "<form method='post'>";
echo "<input type='hidden' name='image' value='image7.jpg'>";
echo "<input type='hidden' name='name' value='Vanilla Cake'>";
echo "<input type='hidden' name='description' value='A moist and flavorful cake made with fresh vanilla and a hint of spice.'>";
echo "<input type='hidden' name='price' value='1800'>";
echo "<button type='submit' name='cart'>Add to Cart</button>";
echo "<img src='image/image7.jpg' alt='Vanilla Cake'>";
echo "<h3>Vanilla Cake</h3>";
echo "<p>A moist and flavorful cake made with fresh vanilla and a hint of spice.</p>";
echo "<p>Price: 1800</p>";
echo "</div>";



echo "</form>";
echo "</div>";

include "footer.php";
?>