
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Usuario</title>
    </head>
    <body>
        <form action="" method="POST">
            <p>Nombre de usuario: <input type="text" name="nombre"></p>
            <p>Password: <input type="password" name="pass"></p>
            <p>Email: <input type="email" name="email"></p>
            <input type="submit" value="Registrarse" name="alta">
        </form>
        <?php
            require_once 'bbdduser.php';
            // Si han pulsado el botón registramos el usuario
            if (isset($_POST["alta"])) {
                // Recogemos el nombre de usuario
                $nusuario = $_POST["nombre"];
                // Comprobamos si ya existe
                if (existeUsuario($nusuario) == true ) {
                    echo "<p>Ya existe ese nombre de usuario en la bbdd</p>";
                } else {
                    // Recogemos el resto de datos
                    $pass = $_POST["pass"];
                    $email = $_POST["email"];
                    // Registramos el usuario en la bbdd
                    insertUser($nusuario, $pass, $email, "usuario");
                }
            }
        ?>
        <p><a href="index.php">Inicio</a></p>
    </body>
</html>



