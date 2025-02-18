<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
    
        if (!isset($_SESSION['email'])) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $password;
            echo "The user was registered correctly. ";
            sleep(4);
            header('location: login.html');
        } 
        else {
            if($email === $_SESSION['email']){ 
                echo "Email already registered. ";
            }
            else{
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                $_SESSION['password'] = $password;
                echo "The user was registered correctly. ";
                sleep(4);
                header('location: login.html');
            }
        }
    }
?>