<?php
$showAlert = false;
$showError = false;
$newAlert = false;

// session_start();

// // check if the session variable exists
// if (isset($_SESSION['success_msg'])) {
//     // unset the session variable
//     $newAlert =  true;
// }


// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     include 'dbconnect.php';

//     // Get the username and password values from the POST array
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $type = $_GET['type'];
 
//     // query to check if the user exists in the database
//     $sql = "Select * from $type where Email='$username'";

//     // query to store the result in $result variable
//     $result = mysqli_query($conn, $sql);

//     // Get the number of rows returned from the database
//     $num = mysqli_num_rows($result);

//     // If the user exists in the database, then set the login flag to true
//     if($num == 1){
//         // Get the user's name from the database and store it in a session variable
//         while($row = mysqli_fetch_assoc($result)){
//                 // $login = true;
//                 //session_start();
//                 $_SESSION['loggedin'] = true;
//                 $_SESSION['username'] = $username;
//                 $_SESSION['name'] = $row['name'];
//                 $_SESSION['cid'] = $row['cid'];
//                 // Redirect the user to the dashboard.html page
//                 // header("location: dashboard.php");
//                // header("location: index.php");
//         }
//     }
//     else{
//         $showError = "Invalid Credentials";
//     }
// }

session_start();

// check if the session variable exists
if (isset($_SESSION['success_msg'])) {
    // unset the session variable
    $newAlert =  true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'dbconnect.php';

    // Get the username and password values from the POST array
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_GET['type'];

    // query to check if the user exists in the database
    $sql = "SELECT * FROM $type WHERE Email='$username'";

    // query to store the result in $result variable
    $result = mysqli_query($conn, $sql);

    // Get the number of rows returned from the database
    $num = mysqli_num_rows($result);

    // If the user exists in the database, then set the login flag to true
    if ($num == 1) {
        // Get the user's data from the database
        $row = mysqli_fetch_assoc($result);

        // Compare the passwords directly (since they are not hashed)
        if ($password == $row['password']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $row['name']; // Save the name in session
            $_SESSION['cid'] = $row['cid'];
            $type = $_GET['type'];

            if($type == "admin"){
                header("location: dashboard.php?type=admin");
            }
            // Redirect the user to the dashboard.html page
            // header("location: index.php");
        } else {
            $showError = "Invalid Data";
        }
    } else {
        $showError = "Invalid Credentials";
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
    <link rel="shortcut icon" type="image/x-icon" href="resource/boy.png">
    <link rel="stylesheet" href="design.css">
    <title>| Farm Star > Sign-in Form |</title>
    <style>
        * {
            margin: 0%;
            padding: 0%;
        }

        .form {
            width: 100%;
            display: flex;
            font-weight: 400;
        }

        .form-left {
            width: 50%;
            display: flex;
        }

        .form-right {
            width: 50%;
            /* border-left: 2px solid #07cc07; */
            font-size: 1.2rem;
        }

        .heading {
            width: 90%;
            margin-top: 50px;
        }

        .heading h2 {
            font-size: 2.5rem;
            color: #07cc07;
            display: flex;
            justify-content: center;
        }

        #img1 {
            display: none;
        }

        #img2 {
            width: 100%;
            margin: auto;
            margin-top: 20%;
        }

        form a{
            color: #07cc07;
        }
        .row {
            margin: 20px;
        }

        form {
            width: 75%;
            margin: 10% auto;
            padding: 20px;
        }
        .center-footer{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        #fpass{
            margin-left: 65%;
        }
        .new-acc{
            width: 100%;
            display: flex;
            justify-content: center;
        }

        @media screen and (max-width: 580px) {
            .heading {
                width: 90%;
                margin: 10px;
            }

            .form {
                flex-direction: column;
            }

            .form-left {
                width: 90%;
                margin: auto;
            }

            .form-right {
                width: 99%;
                margin: auto;
                margin-top: 60px;
            }

            form {
                width: 95%;
                margin: auto;
            }

            #img1 {
                display: block;
                width: 70%;
                margin: auto;
                padding-bottom: 20px;
                border-bottom: 1px solid rgb(191, 190, 190);
            }

            #img2 {
                display: none;
            }
            #fpass{
            margin-left: 5%;
            }
            .center-footer{
                display: flex;
                text-align: left;
                left: 1;
            }
            .new-acc{
                width: 60vw;
                display: flex;
                text-align: center;
            }
        }
    </style>
</head>

<body>

        <?php
        include "navbar.php";
        ?>
    <!-- <nav>
        <div class="logo">
            <a href="index.php">Farm Star</a>
        </div>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="index.html#about">About</a></li>
            <li><a href="index.html#stat">Statistics</a></li>
            <li><a href="signup.php">Register</a></li>
            <li><a href="index.html#contact">Contact</a></li>
        </ul>
        <div class="hamburger">
            <img src="resource/menu.png" alt="Menu" height="20px">
        </div>
    </nav> -->

    <?php

    if($newAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'."Your password has been reset successfully".'</div>';
    }

    if($showAlert){
        
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong>you logged-in successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>';
    }
    if($showError){
        echo '<div class="alert alert-danger" role="alert">'.$showError.'</div>';
    }

    ?>

    <br><br>
    <div class="form">
        <div class="form-left">
            <img id="img2" src="https://wallpapercave.com/wp/wp3708744.jpg" alt="log-in">
            <img id="img1" src="resource/login.svg" alt="log-in">
        </div>
        <div class="form-right">
            <div class="heading">
            <?php
                if($_GET['type'] == "client"){
                    $person = "customer";
                }else{
                    $person = $_GET['type'];
                }
                echo '<h2>Sign in as  '.$person.' </h2>';
            ?>
            </div>
            <!-- <form action="login.php" method="post"> -->
            <form action="login.php?type=<?php echo $_GET['type']; ?>" method="post">
                <div class="form-group row" id="element">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="email" name="username" required>
                    </div>
                </div>


                <div class="form-group row" id="element">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="password" name="password" required>
                    </div>
                </div>

                <div class="form-group row my-3" id="element">
                    <ele id="fpass">
                        <?php
                        // echo '<a href="resetPassword.php?type='.$_GET['type'].'">forgot password</a>';
                        ?>
                    </ele>
                </div>

                <div class="center-footer">
                <div class="form-group row my-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </div>
                </div>
                </div>
                

                <div class="form-group row new-acc mx-5 px-5">
                    <div class="col-sm-10">
                        <?php
                        echo '<p >Create New Account <a href="signup.php?type='.$_GET['type'].'">click here</a></p>';
                        ?>
                    </div>
                </div>
                
                
            </form>

        </div>
    </div>

</body>

</html>