<?php
    include 'dbconnect.php';
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header("location: login.php?type=admin");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="shortcut icon" type="image/x-icon" href="resource/boy.png">
    <title>| Dashboard > Customer Database |</title>
    <style>
        button a:hover{
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="box">

        <!-- <nav>
            <div class="logo">
                <a href="index.html" style="text-decoration:none;">CareTracker</a>
            </div>
            <ul class="nav-links">
            <form action="logout.php" method="post">
                <input type="submit" value="Logout" class="btn btn-success"></form>
            </ul>
        </nav> -->

        <?php
            if(isset($_SESSION['loggedin'])){
            include "navbar2.php";
        }else{
            include "navbar1.php";
        }
        ?>

        <div class="heading">
                    <h2>Welcome <?php echo $_SESSION['name']; ?>!</h2>
                </div>
        <div class="content">
        
            <div class="left">
                <a href="dashboard.php" class="btn btn-primary add-child-btn">Equipment Database</a>
                <a href="customerdb.php" class="btn btn-warning add-child-btn">Customer Database</a>
                <br><br><br>


                <table class="table" style="border:3px solid #cdcddd;">
                    <thead class="table-active">
                        <tr>
                            <th></th>
                            <th id="ops" scope="col">No.</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mob. Number</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    
                    $sql = "SELECT * FROM `client`";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        $number = 0;
                        while($row=mysqli_fetch_assoc($result)){
                            $id = $row['cid'];
                            $name = $row['name'];
                            $price = $row['number'];
                            $email = $row['email'];
                            $number = $number+1;

                            echo '<tr>
                            <td><br></td>
                            <td id="ops" class="align-middle"><b>'.$number.'</b></td>

                            <td class="align-middle"><b>'.$id.'</b></td>

                            <td class="align-middle"><b>'.$name.'</b></td>

                            <td class="align-middle"><b>'.$number.'</b></td>

                            <td class="align-middle"><big><b>'.$email.'</b></big></td>
                 
                            </tr>';
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

    </div>

</body>

</html>