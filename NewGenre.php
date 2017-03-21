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
        <?php
        session_start();
        if (isset($_SESSION["user"])) {
            if ($_SESSION["type"] == "admin") {
                ?>
                <form action="" method="POST">
                    <p>Nombre del género: <input type="text" name="nombre"></p>
                    <input type="submit" value="Nuevo" name="alta">
                </form>
                <?php
                require_once 'bbddgames.php';
                // Si han pulsado el botón registramos el usuario
                if (isset($_POST["alta"])) {
                    // Recogemos el nombre de usuario
                    $genero = $_POST["nombre"];
                    // Comprobamos si ya existe
                    if (existeGenero($genero) == true) {
                        echo "<p>Ya existe el género en la bbdd</p>";
                    } else {
                        // Registramos el género en la bbdd
                        insertGenero($genero);
                    }
                }
                ?>
        <p><a href="AdminHome.php">Inicio</a></p>
        <?php
            } else {
                echo "No eres administrador";
            }
        } else {
            echo "No estás autentificado";
        }
        ?>
    </body>
</html>
