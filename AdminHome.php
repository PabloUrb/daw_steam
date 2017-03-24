<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page Administrator</title>
    </head>
    <body>
        <?php
        session_start();
        // Nos aseguramos de que haya un usuario autentificado
        if (isset($_SESSION["user"])) {
            if ($_SESSION["type"] == "admin") {
                // Cogemos la variable de sesión y saludamos al usuario
                $username = $_SESSION["user"];
                echo "<h2>hola $username</h2>";
                ?>
                <p><a href="NewUserAdmin.php">Alta de usuarios</a></p>
                <p><a href="NewGenre.php">Alta de géneros</a></p>
                <a href="NewGame.php">Alta de juegos</a>
                <?php
            } else {
                echo "No eres administrador.";
            }
        } else {
            echo "No estás autentificado.";
        }
        ?>
    </body>
</html>
