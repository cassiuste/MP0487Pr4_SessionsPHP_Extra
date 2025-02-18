<?php
    session_start();
    if (!isset($_SESSION['activeUser'])) {
        header('Location: login.html');
        exit();    
    }

    if(isset($_GET['id'])){
        $userId = htmlspecialchars($_GET['id']);
        unset($_SESSION['users'][$userId]);
        echo "User deleted correctly. ";
        header('Location: dashboard.php');
        exit(); 
    }

