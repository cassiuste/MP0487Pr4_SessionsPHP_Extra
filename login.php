<?php
    session_start();
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
    
        if (isset($_SESSION['email'])) {
            if($email === $_SESSION['email']){
                if ($password === $_SESSION['password']) {
                    header('location: dashboard.php');
                    exit;
                }
                else{
                    echo "Wrong credentials. ";
                }
            }
        } else {
            echo "User not found. ";
        }
    }
    
?>
