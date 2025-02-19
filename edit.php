<?php
    session_start();
    // Active user es la variable con la que se verificara 
    // la session, que es el id del usuario
    if (!isset($_SESSION['activeUser'])) {
        header('Location: login.html');
        exit();    
    }
    
    if(isset($_GET['id'])){
        $id = htmlspecialchars($_GET['id']);
        ?>
        <form action="update.php" method="post">
            <label for="name">Name: </label>
            <input type="text" name="name" value="<?php echo $_SESSION['users'][$id]['name']; ?>" required>
            <br>
            <label for="name">Email: </label>
            <input type="email" name="email" value="<?php echo $_SESSION['users'][$id]['email']; ?>" required>
            <br>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Save changes">
        </form>
        <?php
    }