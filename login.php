<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if(!empty($_SESSION['users'])){
        foreach ($_SESSION['users'] as $key => $user) {
            if ($user['email'] === $email) {
                if ($user['password'] === $password) {
                    $_SESSION['activeUser'] = $key;
                    header('location: dashboard.php');
                    exit;
                } else {
                    echo "Wrong credentials. ";
                    exit;
                }
            }
        }
    }
    echo "User not found. ";
}
