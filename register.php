<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $id = uniqid();
        $emailRegistered = false;

        if(!empty($_SESSION['users'])){
            foreach($_SESSION['users'] as $key => $user){
                if($user['email'] === $email){
                    $emailRegistered = true;
                    echo "Email already registered. ";
                }    
            }
            if(!$emailRegistered){
                $user = ["name" => $name, "email" => $email, "password" => $password];
                $_SESSION['users'][$id] = $user;
                $_SESSION['activeUser'] = $id;
                echo "The user was registered correctly. ";
                sleep(4);
                header('location: login.html');

            }
        }
        else{
            $user = ["name" => $name, "email" => $email, "password" => $password];
            $_SESSION['users'][$id] = $user;
            $_SESSION['activeUser'] = $id;
            echo "The user was registered correctly. ";
            sleep(4);
            header('location: login.html');
        }
    }