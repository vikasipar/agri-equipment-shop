<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">

  <link href="products.css" rel="stylesheet">
  <title>Farm Star</title>
</head>
<body>

<?php
if(isset($_SESSION['loggedin'])){
  include "navbar2.php";
}else{
  include "navbar1.php";
}
?>
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light py-2">
        <a class="navbar-brand" href="../index.php" style="text-decoration: none;"><b>
                <men>Farm Star</men></b>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="color:white; background:green">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse nav-buttons">
            <ul class="navbar-nav mr-auto">
              
                <li class="nav-item">
                  <button>
                    <a class="nav-link active px-4" href="?type=bottomweardata">LOGIN</a>
                    </button>
                </li>

                <li class="nav-item">
                  <button>
                    <a class="nav-link active px-4" href="?type=bottomweardata">CART</a>
                    </button>
                </li>
            </ul>
        </div>
</nav> -->
<br><br>
  <?php
  // session_start();

    $key = 0;

    if (isset($_GET['key'])) {
      $key = $_GET['key'];
    }

    $path = '';
    $url = 'http://localhost/farm%20equipment%20rental%20system/src/data.php';
    $json_data = file_get_contents($url);
    $products = json_decode($json_data, true);

    if (!empty($products)) {
    
      $heroproduct = $products[$key];

      echo '<div class="hero-section">';

        echo '<div class="hero-left">';
          echo '<img src="'.$heroproduct['src'].'" alt="hero-product" width="97%">';
        echo '</div>';

        echo '<div class="hero-right">';
        echo '<div class="title">';
            echo '<h1> ' . $heroproduct['name'] . '</h1>';
            echo '<h2> ' . $heroproduct['brand'] . '</h2>';
            echo '<h2> MRP : Rs ' . $heroproduct['price'] . '</h2>';
          echo '</div>';
          echo '<div class="cart">';

          if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
            $rent = "login.php?type=client";
            $buy = "login.php?type=client";
          }else{
            $rent = "rent.php?key=$key";
            $buy = "buy.php?key=$key";
          }

            echo '<a href="'.$buy.'"';
              echo '<button id="buy-btn">Buy Now</button>';
            echo '</a>';
            echo '<a href="'.$rent.'"';
              echo '<button id="rent-btn">Rent Now</button>';
            echo '</a>';
          echo '</div>';
          echo '<ul class = "details">';
            echo '<li><b>Product Type: </b> Tools / Equipments</li>';
            echo '<li><b>Country of Origin:</b> ' . $heroproduct['origin'] . '</li>';
            echo '<li><b>Product Description:</b> ' . $heroproduct['about'] . '</li>';
          echo '</ul>';
        echo '</div>';

      echo '</div>';


      echo '<h1 id="cards-title">People Also Viewed</h1>  ';

      echo '<div class="cards">';
      
      foreach ($products as $product) {

        if($product['id'] !== $heroproduct['id']){
          echo '<div class="card">';
          echo '<a href="?key=' . $product['id'] . '">';

          echo '<img src="' . $product['src'] . '" alt="' . $product['name'] .' " title="'.$product['id'].'">';
          echo $product['name'] . '<br>';
          echo 'Rs. '. $product['price'] . '<br>';
  
          echo '</div>';
        }
      }  
        echo '</div>';
    }
    else {
      echo '<p>No products found.</p>';
    }

  ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>
</html>
