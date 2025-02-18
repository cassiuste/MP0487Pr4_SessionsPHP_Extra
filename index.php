<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: login.html');
        exit();    
    } else {
        header('Location: dashboard.php');
        exit();    
    }
?>