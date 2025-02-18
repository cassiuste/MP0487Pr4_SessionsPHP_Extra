<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
    header('Location: login.html');
    exit();
}

if(isset($_POST['edit'])){
    $id = htmlspecialchars($_POST['id']);
    header("location: edit.php?id=$id");
    exit;
}

if(isset($_POST['delete'])){
    $id = htmlspecialchars($_POST['id']);
    header("location: delete.php?id=$id");
    exit;
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
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </thead>
        <tbody>
            <?php
            foreach ($_SESSION['users'] as $id => $user) {
            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                </tr>
                <tr>
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
    <form action="logout.php" method="post">
        <input type="submit" value="Sign out">
    </form>
</body>

</html>