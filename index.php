<?php
    session_start();
    if (!isset($_SESSION['activeUser'])) {
        header('Location: login.html');
        exit();    
    } else {
        header('Location: dashboard.php');
        exit();    
    }
?>