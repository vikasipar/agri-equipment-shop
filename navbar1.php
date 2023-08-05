<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <link rel="shortcut icon" type="image/x-icon" href="resource/boy.png">
    <title>| FARM STAR |</title>

</head>

<body>
    <nav>
        <div class="logo">
        FARM STAR
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#about">About</a></li>

         <?php

            include 'dbconnect.php';
            session_start();

            // $type = $_GET['type'];

            if (isset($_SESSION['name'])) {
                echo '<li><a href="cart.php?type=client">Cart</a></li>';
                echo '<li><a href="index.php?type=client">Welcome ' . $_SESSION['name'] . '</a></li>';
                echo '<li><a href="logout.php?type=client">Logout</a></li>';
            } else {
                echo '<li><a href="login.php?type=admin">Admin</a></li>';
                echo '<li><a href="login.php?type=client">Customer</a></li>';
            }
            // echo '<li><a href="cart.php?type=admin">Cart</a></li>';
            // echo '<li><a href="index.php?type=client">Welcome '.$_SESSION['name'].'</a></li>';
            // echo '<li><a href="logout.php?type=client">Logout</a></li>';
         ?>
            
        </ul>
        <div class="hamburger">
            <img src="resource/menu.png" alt="Menu" height="20px">
        </div>
    </nav>
</body>
</html>