<?php
// $showAlert = false;
// $showError = false;
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     include 'dbconnect.php';
//     $username = $_POST['name'];
//     $number = $_POST['number'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $cpassword = $_POST['cpassword'];
//     $type = $_GET['type'];

//     // check whether this email-id already exists
//     $existQuery = "SELECT * FROM $type WHERE Email = '$email'";
//     $result =  mysqli_query($conn, $existQuery);
//     $numofexistsrows = mysqli_num_rows($result);
//     if($numofexistsrows > 0) {
//         $showError = "<strong>Error!</strong> Email Already Exists";

//         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//             $showError = "<strong>Error!</strong> The email address is not valid";
//         }
        
//     }
//     else{
//         if(($password == $cpassword)){
//             // $hash = password_hash($password, PASSWORD_DEFAULT);
//             $sql = "INSERT INTO $type (`name`, `number`, `email`, `password`) VALUES ('$username', '$number', '$email', '$password');";
//             $result = mysqli_query($conn, $sql);
//             if($result){
//                 $showAlert = true;
//             }
//         }
//         else{
//             $showError = "<strong>Error!</strong> passwords do not match";
//         }
//     }
// }

$showAlert = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'dbconnect.php';
    $username = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $type = $_GET['type'];

    // Function to validate the mobile number format (10 digits only)
    function validateMobileNumber($number)
    {
        return preg_match('/^[0-9]{10}$/', $number);
    }

    // Function to validate email format
    function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Function to validate password match
    function validatePassword($password, $cpassword)
    {
        return $password === $cpassword;
    }

    // Check whether this email-id already exists
    $existQuery = "SELECT * FROM $type WHERE Email = '$email'";
    $result = mysqli_query($conn, $existQuery);
    $numofexistsrows = mysqli_num_rows($result);
    if ($numofexistsrows > 0) {
        $showError = "<strong>Error!</strong> Email Already Exists";
    } else {
        if (validatePassword($password, $cpassword)) {
            if (validateMobileNumber($number) && validateEmail($email)) {
                $sql = "INSERT INTO $type (`name`, `number`, `email`, `password`) VALUES ('$username', '$number', '$email', '$password');";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $showAlert = true;
                }
            } else {
                $showError = "<strong>Error!</strong> Invalid mobile number or email format.";
            }
        } else {
            $showError = "<strong>Error!</strong> Passwords do not match";
        }
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
    <title>| Farm Star > Sign-Up Form |</title>

    <style>
        * {
            margin: 0%;
            padding: 0%;
        }

        .heading {
            color: #07cc07;
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 50px;
            margin-bottom: -45px;
        }

        a {
            text-decoration: none;
        }

        form {
            margin: auto 10%;
            margin-top: 0px;
            padding: 20px;
            font-size: 1.1rem;
        }

        .btns{
            width: 100%;
            margin: auto;
            margin-top: 0;
            display: flex;
            align-items: center;
            flex-direction : column;
        }

        .button {
            margin-bottom: -36%;
        }

        .form-check {
            margin-left: 20%;
            margin-top: 20px;
        }

        .newbtn {
            text-decoration: none;
            margin-top : -32px;
        }
        .newbtn:hover{
            text-decoration: none;
        }

        button a {
            text-decoration: none;
        }
        button a:hover {
            text-decoration: none;
        }

        .form {
            width: 100%;
            margin-top: 60px;
            display: flex;
            flex-direction: row-reverse;
            font-weight: 400;
            margin-bottom: -90px;
        }

        .form-left {
            width: 50%;
        }

        .form-right img {
            width: 100%;
            margin-top: 13%;
        }

        .form-right {
            width: 50%;
            height: 90%;
            padding-bottom: 50px;
            /* border-right: 2px solid #07cc07; */
        }

        @media screen and (max-width: 580px) {
            .form {
                flex-direction: column;
                margin-top: 20px;
                width: 100%;
            }

            /* .newbtn {
                margin-left: 20%;
            } */

            .btns{
                display: flex;
            }

            .button {
                margin-top: 0px;
            }

            .form-left {
                width: 100%;
            }

            .row {
                display: flex;
                flex-direction: row;
            }

            .form-right {
                display: none;
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
            <a href="index.html">CareTracker</a>
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

    if($showAlert){
        
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong>Your account is created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>';
    }
    if($showError){
        echo '<div class="alert alert-danger" role="alert">'.$showError.'</div>';
    }

    ?>


    <div class="heading">

        <?php
                if($_GET['type'] == "client"){
                    $person = "customer";
                }else{
                    $person = $_GET['type'];
                }
                echo '<h2>Sign up as  '.$person.' </h2>';
        ?>
    </div>

    <div class="form">
        <div class="form-left">

            <!-- <form action="signup.php" method="POST"> -->
            <form action="signup.php?type=<?php echo $_GET['type']; ?>" method="post">

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="name" name="name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobileNumber" class="col-sm-2 col-form-label">Mobile Number</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="number" placeholder="number" name="number" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password1" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password1" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password2" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password2" name="cpassword" placeholder="Password" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" required>
                            <label class="form-check-label" for="gridCheck1">
                                Terms & Conditions
                            </label>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="btns">
                <div class="form-group row">
                    <div class="col-sm-10 button">
                        <button type="submit" class="btn btn-success">Sign Up</button>
                    </div>
                </div>
                <br><br>
                <div class="form-group row">
                    <div class="col-sm-10 button1">
                        
                        <button type="submit" class="btn btn-warning newbtn">
                        <?php
                        echo '<a href="login.php?type='.$_GET['type'].'"
                        style="color:#ffff; text-decoration:none;">Already Have An
                        Account</a>';
                        ?></button>
                    </div>
                </div>
                </div>

            </form>
        </div>
        <div class="form-right">
            <img src="https://wallpapercave.com/wp/wp3708744.jpg" alt="form">
        </div>
    </div>


    <script>
    function validateForm() {
        const name = document.getElementById('name').value;
        const mobileNumber = document.getElementById('number').value;
        const password1 = document.getElementById('password1').value;
        const password2 = document.getElementById('password2').value;

        const namePattern = /^[A-Za-z ]+$/;
        const mobilePattern = /^[0-9]{10}$/;

        if (!namePattern.test(name)) {
            alert('Please enter a valid user name (only letters and spaces are allowed).');
            return false;
        }

        if (!mobilePattern.test(mobileNumber)) {
            alert('Please enter a valid 10-digit mobile number.');
            return false;
        }

        if (password1 !== password2) {
            alert('Passwords do not match. Please re-enter your password.');
            return false;
        }

        return true;
    }
</script>
With this v

</body>

</html>