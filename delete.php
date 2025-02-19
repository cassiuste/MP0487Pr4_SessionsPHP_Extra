<?php
    session_start();
    // Active user es la variable con la que se verificara 
    // la session, que es el id del usuario
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

