<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="design.css">
    <link rel="shortcut icon" type="image/x-icon" href="resource/boy.png">
    <title>| Farm Star |</title>

</head>

<body>

<?php
if(isset($_SESSION['loggedin'])){
  include "navbar2.php";
}else{
  include "navbar1.php";
}
?>

    <div class="first">
        <div class="first-left">
            <!-- <img id="img" src="https://www.qualityequip.com/webres/File/5045EWEB.jpg" alt="safe planet" /> -->
            <img id="img" src="https://www.pngarts.com/files/8/Green-Tractor-Download-Transparent-PNG-Image.png" alt="safe planet" />
        </div>
        <div class="first-right">
            <div class="main-header">
                " Welcome to Farm Equipment Rental and Selling Service!"
            </div><br>
            <div class="sub-header">
                We are your one-stop destination for all your farm equipment needs. Whether you're a farmer looking to rent high-quality machinery for a short-term project or a seller eager to connect with potential buyers, we've got you covered.
            </div>
        </div>
    </div>

    <div id="about" class="second">
        <div class="second-left">
            <div class="heading">
                <h1>What is Farm Star?</h1>
            </div>
            <br>
            <div class="content">
                <h2>Our platform offers a wide range of top-notch farm equipment available for rent, providing cost-effective solutions to enhance your agricultural operations. Additionally, if you have farm equipment to sell, our user-friendly interface makes it effortless to list your products and reach a wide audience of interested buyers. Experience convenience and efficiency as we bridge the gap between equipment owners and users, empowering the farming community to thrive and flourish. Join us today and explore the endless possibilities that our Online Farm Equipment Rental and Selling Service has to offer!</h2>
            </div>
        </div>
    </div>

    <div class="forth">
        <div>
            <h1>Our Bestsellers</h1>
            <div class="cards">
                <div class="card">
                    <a href="products.php?key=0" alt="sprayer">
                        <img src="https://m.media-amazon.com/images/I/51mCR6eY+NL._SL1100_.jpg" ><br>
                        BALWAAN SINGLE MOTOR BATTERY SPRAYER<br><br>
                        Rs. 2890
                    </a>
                </div>
                <div class="card">
                    <a href="products.php?key=4" alt="sprayer">
                        <img src="https://m.media-amazon.com/images/I/519CJGA+iKL._SL1500_.jpg" ><br>
                        KHURPA-7 SIC014<br><br>
                        Rs. 429
                    </a>
                </div>
                <div class="card">
                    <a href="products.php?key=6" alt="sprayer">
                        <img src="https://m.media-amazon.com/images/I/61LDLyQlxqL._SL1024_.jpg" ><br>
                        TARPAULIN (WATERPROOF, HEAVY DUTY)<br><br>
                        Rs. 439
                    </a>
                </div>
                <div class="card">
                    <a href="products.php?key=8" alt="sprayer">
                        <img src="https://m.media-amazon.com/images/I/71z94b9ORCL._SL1500_.jpg" ><br>
                        BALWAAN BX-52 BRUSH CUTTER<br><br>
                        Rs. 8799
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="fifth">
        <div class="fifth-left">
            <div class="heading">
                <h1>Contact Us</h1><br>
            </div>
            <div class="for-flex">
                <div class="content">
                    <br>
                    <h2 id="slogan">Farm Star: Farm Equipment Rental and Selling Service</h2><br><br>
                    <h2>Email</h2>
                    <h3>farmstar@gmail.com</h3><br>
                    <h2>Location</h2>
                    <h3>Sinhgad Institute of Management, Vadgaon Bk, Pune</h3>
                </div>

                <div class="fifth-right">
                    <div class="form">
                        <img src="src/images/contact.png" alt="contact" title="contact-us">
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>