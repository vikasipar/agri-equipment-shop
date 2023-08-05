<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="dashboard.css" rel="stylesheet">
  <title>Farm Star</title>

  <style>
    h2{
      margin-left: 5%;
    }
  </style>
</head>
<body>

<?php
            if(isset($_SESSION['loggedin'])){
            include "navbar2.php";
        }else{
            include "navbar1.php";
        }
        ?>

  <h2>Shopping Cart</h2>

        <div class="heading">
                    <h2>Welcome <?php echo $_SESSION['name']; ?>!</h2>
                </div>
        <div class="content">
        
            <div class="left">
                <a href="addproduct.php" class="btn btn-primary add-child-btn"><b>+</b> Add Equipment</a>
                <a href="customerdb.php" class="btn btn-warning add-child-btn">Customer Database</a>
                <br><br>


                <table class="table" style="border:3px solid #cdcddd;">
                    <thead class="table-active">
                        <tr>
                            <th></th>
                            <th id="ops" scope="col">No.</th>
                            <th scope="col">Equipment Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    // session_start();
                    if(isset($_SESSION['cid'])){
                        $cid = $_SESSION['cid'];
                    
                    // $sql = "SELECT * FROM `shoping` WHERE `cid`= '$cid'";
                    $sql = "SELECT shoping.*, products.name AS equipment_name, products.price AS equipment_price
        FROM `shoping`
        INNER JOIN `products` ON shoping.pid = products.id
        WHERE `shoping.cid` = '$cid' OR `shoping.pid` = `products.id+1`";

$result = mysqli_query($conn, $sql);

if ($result) {
    $number = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['equipment_name']; // Use the fetched equipment name
        $quantity = $row['quantity'];
        $total = $row['total'];
        $price = $total / $quantity;

        $number = $number + 1;

        echo '<tr>
                <td><br></td>
                <td id="ops" class="align-middle"><b>' . $number . '</b></td>
                <td class="align-middle"><b>' . $name . '</b></td>
                <td class="align-middle"><b>' . $price . '</b></td>
                <td class="align-middle"><b>' . $quantity . '</b></td>
                <td class="align-middle"><b>' . $total . '</b></td>
              </tr>';
    }
  }
                  }
                    ?>  
                    </tbody>
                </table>
            </div>

            <div class="right">
                <div class="para">

              </div>
            </div>
        </div>
  
</body>
</html>
