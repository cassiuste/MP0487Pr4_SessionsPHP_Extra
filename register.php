<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        // Utilizo el 'uniqid()' para darle a cada usuario un id especifico generado aleatoriamente
        $id = uniqid();
        $emailRegistered = false;
        $accountCreated = false;
        $message = "";

        if(!empty($_SESSION['users'])){
            // Si hay usuarios en la lista de la session que itere sobre los usuarios para
            // ver si hay uno que coincida con el mail
            foreach($_SESSION['users'] as $key => $user){
                if($user['email'] === $email){
                    $emailRegistered = true;
                    $message = "Email already registered. ";
                }    
            }
            // Si no encuentra un email que coincide, que cree el usuario
            if(!$emailRegistered){
                // En el array de los usuarios se almecenaran la id como una key, y la
                // informacion propia del usuario como un array.
                // la contraseña utiliza el algoritmo de encriptacion para que sea mas parecido
                // a como se utilizaria en un entorno de produccion.
                $user = ["name" => $name, "email" => $email, "password" => password_hash($password, PASSWORD_BCRYPT)];
                $_SESSION['users'][$id] = $user;
                // la variable que dice si hay un usuario activo
                // tiene como valor el id de ese usuario.
                $_SESSION['activeUser'] = $id;
                $message = "The user was correctly registered. ";
                $accountCreated = true;
            }
        }
        else{
            // Si el array de usuarios esta vacido es que todavia no hay usuarios en la session
            $user = ["name" => $name, "email" => $email, "password" => password_hash($password, PASSWORD_BCRYPT)];
            $_SESSION['users'][$id] = $user;
            $_SESSION['activeUser'] = $id;
            $message = "The user was correctly registered. ";
            $accountCreated = true;
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <?php
        if($accountCreated){
            // Si se crea la cuenta, que aparezca el mensaje de exito y
            // lo rediriga a la pagina del login, si no se crea
            // que le aparezca el mensaje pero se quede en esta pagina porque
            // no lo indica la activadad
            echo "<meta http-equiv='refresh' content='3;url=login.html'>";
        }
        ?>
    </head>
    <body>
        <?php echo "$message"; ?>
    </body>
    </html>