<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    session_start();

    include 'dbconnect.php';

    // Get the form data
    $key = $_GET['key'];
    $quantity = $_POST['quantity'];
    $cid = $_SESSION['cid'];
    $total = $quantity * $_POST['price'];

    $sql = "INSERT INTO shoping (pid, quantity, cid, total)
            VALUES ('$key', '$quantity', '$cid', '$total')";

    if ($conn->query($sql) === true) {
        // Rental successful, you can display a success message or redirect to a confirmation page
        // echo '<div class="alert alert-success" role="alert">Equipment rented successfully!</div>';
            header("location: payment.php");

    } else {
        // Error in rental process
        echo '<div class="alert alert-danger" role="alert">Error renting equipment: ' . $conn->error . '</div>';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Star</title>
<style>
body {
  margin: 0;
  padding: 0;
}

header {
  background-color: #07cc07;
  color: #fff;
  text-align: center;
  padding: 20px;
}

.equipment-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  padding: 20px;
}
.cart{
    font-size: 1.3rem;
}
.equipment-card {
  width: 60%;
  border: 4px solid #ddd;
  border-radius: 5px;
  padding: 10px;
  margin: 10px;
  text-align: center;
}

.equipment-card img {
  width: 30%;
  height: auto;
  margin-bottom: 10px;
}

form input{
    height:2rem;
}

form #button {
  background-color: #07cc07;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

#button:hover {
  background-color: #09bb09;
}
</style>

</head>
<body>
<?php
    if(!isset($_SESSION['loggedin'])){
        include "navbar1.php";
    }else{
        include "navbar2.php";
    }
?>
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farm Equipment Rental</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Farm Equipment Shopping</h1>
  </header>

  <section class="equipment-list">
    <div class="equipment-card">
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

  $heroproduct = $products[$_GET['key']];

  echo '<div class="hero-section">';

    echo '<div class="hero-left">';
      echo '<img src="'.$heroproduct['src'].'" alt="hero-product" width="97%">';
    echo '</div>';

    echo '<div class="hero-right">';
        echo '<div class="title">';
            echo '<h2> ' . $heroproduct['name'] . '</h2>';
            echo '<h3> ' . $heroproduct['brand'] . '</h3>';
            echo '<h2> MRP : Rs ' . $heroproduct['price'] . '</h2><br>';
        echo '</div>';
        echo '<div class="cart">';
        echo '<form method="post" action="buy.php?key='.$key.'">';
            // echo '<a href="cart.php?type='.$_SESSION['type'].'&&key='.$key.'"';
        
            echo '<label for="quantity">Quantity</label>';
            echo '&nbsp;&nbsp;&nbsp;';
            echo '<input type="number" id="quantity" name="quantity" min="1" required>';
            echo '<input type="hidden" name="price" value="' . $heroproduct['price'] . '"><br><br>';
            echo '<input id="button" type="submit" name="submit" value="Buy Now">';
    echo '</form>';
    echo '</div>';

    echo '</div>';
echo '</div><br>';
}
    ?>

    <!-- Add more equipment cards here -->
  </section>


<script>
  function rentEquipment(equipmentName) {
  // Implement your logic to handle the rental process here
  alert('You are renting: ' + equipmentName);
  // You can redirect to a checkout page or perform other actions as needed
}
</script>

</body>
</html>