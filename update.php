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
        $updated = false;
        // Se itera sobe el array de usuarios que tiene la session, y se utiliza el operador '&'
        // para que modifique el array almacenado en la memoria y no haga una copia
        foreach($_SESSION['users'] as $key => &$user){
            // La key es el id del usuario
            if($key === $userId){
                $user['name'] = $name;
                $user['email'] = $email;
                $updated = true;
            }
        }
        // Que el mensaje sea de exito si lo pudo modificar
        $updated? $message = "User updated properly. ": $message = "User couldn't be updated. ";
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update</title>
        <!-- Lleva al "dashboard.php" despues de 3 segundos -->
        <meta http-equiv="refresh" content="3;url=dashboard.php">
    </head>
    <body>
        <?php echo "$message" ?>
    </body>
    </html>