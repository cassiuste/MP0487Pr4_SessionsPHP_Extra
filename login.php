<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Si el array de users esta vacio es que no hay usuarios en la sesion
    if(!empty($_SESSION['users'])){
        //Se itera sobre los usuarios almacenados dentro del array de users de la session
        foreach ($_SESSION['users'] as $key => $user) {
            if ($user['email'] === $email) {
                // Se usa el password verify porque use el algoritmo BCRYPT para la contrasena
                // y esa es la manera para verificarla de manera como en un entorno de produccion
                if (password_verify($password, $user['password'])) {
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
