<!DOCTYPE html>
<html>
  <head>
    <title>ALLNET CAKES</title>
    <style>
      body {
        margin: 0;
        font-family: 'Times New Roman', Times, serif;
      }
      

      .hero-section img{
       height: 800px; 
       width: 100%; 
       background-size: cover;
        background-position: center;
      }
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
    <div class="hero-section">
        <img src="image/image2.jpg" alt="">
    </div>
    <h1 class="title">OUR FEATURED CAKE SELECTION</h1>
    <div class="featured-section">
  
  
       
      <div class="cake">
        <img src="image/bberry1.jpg" alt="Blueberry Cake">
        <h3>Blueberry Cake</h3>
        <p>A delicious cake made with fresh blueberries and a crumbly streusel topping.</p>
        <p>Price: 2200</p>
        <a class="add-to-cart" href="#">Add to Cart</a>
      </div>
      <div class="cake">
        <img src="image/rasp.jpg" alt="Raspberry Cake">
        <h3>Raspberry Cake</h3>
        <p>A delightful cake made with fresh raspberries and a creamy buttercream frosting.</p>
        <p>Price: 2400</p>
        <a class="add-to-cart" href="#">Add to Cart</a>
      </div>
      <div class="cake">
        <img src="image/coffee.jpg" alt="Coffee Cake">
        <h3>Coffee Cake</h3>
        <p>A rich and indulgent cake made with strong coffee and chocolate chips.</p>
        <p>Price: 2000</p>
        <a class="add-to-cart" href="#">Add to Cart</a>
      </div>

      <div class="cake">
        <img src="image/choco.jpg" alt="Red Velvet Cake">
        <h3>Red Velvet Cake</h3>
        <p>A moist and delicious cake with a striking red color and tangy cream cheese frosting.</p>
        <p>Price: 1600</p>
        <a class="add-to-cart" href="#">Add to Cart</a>
        </div>
        <div class="cake">
        <img src="image/fruit1.jpg" alt="Carrot Cake">
        <h3>Carrot Cake</h3>
        <p>A moist and flavorful cake made with fresh carrots and a hint of spice.</p>
        <p>Price: 1900</p>
        <a class="add-to-cart" href="#">Add to Cart</a>
        </div>
        <div class="cake">
        <img src="image/mint1.jpg" alt="Lemon Cake">
        <h3>Lemon Cake</h3>
        <p>A light and refreshing cake made with fresh lemon zest and juice.</p>
        <p>Price: 1700</p>
        <a class="add-to-cart" href="#">Add to Cart</a>
        </div>

    </div>
    
    

   <?php
   include'footer.php'; 

   ?>
  
  
