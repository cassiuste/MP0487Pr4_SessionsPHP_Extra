<?php
    session_start();
    // Active user es la variable con la que se verificara 
    // la session, que es el id del usuario
    if (!isset($_SESSION['activeUser'])) {
        header('Location: login.html');
        exit();    
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $userId = htmlspecialchars($_POST['id']);
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);

        // Se itera sobe el array de usuarios que tiene la session, y se utiliza el operador '&'
        // para que modifique el array almacenado en la memoria y no haga una copia
        foreach($_SESSION['users'] as $key => &$user){
            // La key es el id del usuario
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