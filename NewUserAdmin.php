<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
            <p>Nombre de usuario: <input type="text" name="nombre"></p>
            <p>Password: <input type="password" name="pass"></p>
            <p>Email: <input type="email" name="email"></p>
            <p>Tipo: <select name="tipo">
                    <option value="usuario">Usuario</option>
                    <option value="admin">Admin</option>
                </select></p>
            <input type="submit" value="Registrarse" name="alta">
        </form>
        <?php
        require_once 'bbdduser.php';
        // Si han pulsado el botón registramos el usuario
        if (isset($_POST["alta"])) {
            // Recogemos el nombre de usuario
            $nusuario = $_POST["nombre"];
            // Comprobamos si ya existe
            if (existeUsuario($nusuario) == true) {
                echo "<p>Ya existe ese nombre de usuario en la bbdd</p>";
            } else {
                // Recogemos el resto de datos
                $pass = $_POST["pass"];
                $email = $_POST["email"];
                $tipo = $_POST["tipo"];
                // Registramos el usuario en la bbdd
                insertUser($nusuario, $pass, $email, $tipo);
            }
        }
        ?>
        <p><a href="AdminHome.php">Volver</a></p>
    </body>
</html>
