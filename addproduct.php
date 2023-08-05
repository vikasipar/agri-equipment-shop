<?php

// start the session
// session_start();

// check if the user is logged in
// if (!isset($_SESSION['name'])) {
//     // if not, redirect to login page
//     header('Location: login.php?type=admin');
//     exit;
// }

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'dbconnect.php';

    $name = $_POST['name'];
    $src = $_POST['src'];
    $price = $_POST['price'];
    $brand = $_POST['brand'];
    $origin = $_POST['origin'];
    $about = $_POST['about'];

    $sql = "INSERT INTO `products`(`src`, `name`, `price`, `brand`, `origin`, `about`) VALUES ('$src', '$name', '$price', '$brand', '$origin', '$about')";

    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:dashboard.php?type=admin');
    }
    else{
        header('location:index.php?type=admin');
        echo 'insert failed!';
        die("Error : ". mysqli_connect_error());
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="resource/boy.png">
    <link rel="stylesheet" href="design.css">
    <title>| Farm Star |</title>

    <style>
        * {
            margin: 0%;
            padding: 0%;
        }
        body {
            text-align: center;
  line-height: 1.6;
  margin: 0;
  padding: 0;
}

h3{
    margin-left: 5%;
    margin-top: 2%;
    color:#07cc07;
}

.container {
  width: 80%;
  margin: auto;
  padding: 20px;
}

form {
    text-align: left;
  margin: 2.4% 29%;
  background-color: #f7f7f7;
  border: 1px solid #ddd;
  padding: 2% 5%;
  border-radius: 5px;
}

form label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

form input[type="text"],
form input[type="number"],
form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

form textarea {
  resize: vertical;
}

form .btn {
    width: 100%;
  text-align: center;
  margin-top: 2%;
}

form button[type="submit"] {
  width: 100%;
  background-color: #07cc07;
  color: #fff;
  border: none;
  font-size: 1.1rem;
  padding: 11px 20px;
  border-radius: 5px;
  cursor: pointer;
}

form button[type="submit"]:hover {
  background-color: #049a04;
}


        @media screen and (max-width:580px) {
            .form {
                width: 90%;
            }

            .form-left {
                display: none;
            }

            .form-right {
                width: 95%;
                margin: auto;
                margin-top: 10px;
            }

            .heading h2 {
                font-size: 1.5rem;
            }

            form {
                width: 90%;
                margin: auto;
                margin: 2% auto;
                padding: 5px;
            }
            .bottom{
                display: flex;
                flex-direction: column;
                text-align: center;
            }
            button {
                margin: auto;
            }
            #mob-dashbrd{
                display: block;
                margin: 20px auto;
            }
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

    <h3>Add New Equipment</h3>

    <div class="form">
        <div class="form-right">
            <form method="post" action="addproduct.php?type=admin">
                <label for="src">Image URL:</label>
                <input type="text" id="src" name="src" required>
                <br>
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>
                <br>
                <label for="brand">Manufacturer:</label>
                <input type="text" id="brand" name="brand" required>
                <br>
                <label for="origin">Country of Origin:</label>
                <input type="text" id="origin" name="origin" required>
                <br>
                <label for="about">Product Description:</label>
                <textarea id="about" name="about" required></textarea>
                <br>
                <div class="btn">
                    <button type="submit">Add Product</button>
                </div>
            </form>
        

            </div class="dashboard">
                <a href="dashboard.php"><label id="dashbrd" class="btn btn-warning">Back To Dashboard</label></a>
            </div>
        </div>
    </div>
</body>

</html>