<?php
    session_start();
    // Unset all session variables
    $_SESSION = array();
    // Destroy the session
    session_destroy();
    $type = $_GET['type'];
    // Redirect to the login page
    header("Location: login.php?type=$type");
    exit;
?>