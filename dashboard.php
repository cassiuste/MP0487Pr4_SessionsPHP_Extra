<?php
session_start();
    // Active user es la variable con la que se verificara 
    // la session, que es el id del usuario
if (!isset($_SESSION['activeUser'])) {
    header('Location: login.html');
    exit();
}

// Si se envia el edit que rediriga a la pagina 'edit'
if(isset($_POST['edit'])){
    $id = htmlspecialchars($_POST['id']);
    header("location: edit.php?id=$id");
    exit();
}

// Si se envia el delete que rediriga a la pagina 'delete'
if(isset($_POST['delete'])){
    $id = htmlspecialchars($_POST['id']);
    header("location: delete.php?id=$id");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
            table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 5px;
            }

            input[type=submit] {
                margin-top: 10px;
            }
        </style>

</head>

<body>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php
            // Itera sobre la lista de usuarios almacenados en la session
            foreach ($_SESSION['users'] as $id => $user) {
            ?>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="name" value="<?php echo $user['name']; ?>">
                            <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
                            <input type="submit" name="edit" value="Edit">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <!-- Boton para poder cerrar la sesion -->
    <form action="logout.php" method="post">
        <input type="submit" value="Sign out">
    </form>
</body>

</html>