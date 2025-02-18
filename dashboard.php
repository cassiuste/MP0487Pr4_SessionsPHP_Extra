<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: login.html');
        exit();    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <!-- Tabla de usuarios con atributos hidden -->
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </table>
    <form action="logout.php" method="post"></form>
</body>
</html>