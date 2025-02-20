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
        $message = "User deleted properly. ";
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <meta http-equiv="refresh" content="3;url=dashboard.php">
</head>
<body>
    <?php echo "$message"; ?>
</body>
</html>

