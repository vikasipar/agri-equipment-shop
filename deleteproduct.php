<?php
include 'dbconnect.php';

    $id = $_GET['deleteid'];

    // Delete child record
    $sql = "DELETE FROM `products` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location: dashboard.php');
    }
    else{
        die("Error : ". mysqli_connect_error());
    }

?>