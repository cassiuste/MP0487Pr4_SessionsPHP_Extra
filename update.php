<?php
    session_start();
    if (!isset($_SESSION['activeUser'])) {
        header('Location: login.html');
        exit();    
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $userId = htmlspecialchars($_POST['id']);
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);

        foreach($_SESSION['users'] as $key => &$user){
            if($key === $userId){
                $user['name'] = $name;
                $user['email'] = $email;
                echo "User was correctly updated. ";
                sleep(3);
                header('Location: dashboard.php');
                exit(); 
            }
        }
        echo "User was not updated";
    }