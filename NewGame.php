<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Juego</title>
    </head>
    <body>
        <?php
        session_start();
        require_once 'bbddgames.php';
        if (isset($_SESSION["user"])) {
            if ($_SESSION["type"] == "admin") {
                ?>
                <form action="" method="POST">
                    <p>Nombre: <input type="text" name="nombre"></p>
                    <p>Género: <select name="genero">
                            <?php
                            $generos = selectAllGenre();
                            while ($fila = mysqli_fetch_array($generos)) {
                                extract($fila);
                                echo "<option value='$idgenre'>$name</option>";
                            }
                            ?>
                        </select></p>
                    <p>Precio: <input type="number" name="precio" step="any"></p>
                    <input type="submit" name="new" value="Nuevo Juego">
                </form>
                <?php
                if (isset($_POST["new"])) {
                    $nombre = $_POST["nombre"];
                    if (existeJuego($nombre)) {
                        echo "<p>Ya existe un juego con ese nombre.</p>";
                    } else {
                        $genero = $_POST["genero"];
                        $precio = $_POST["precio"];
                        insertGame($nombre, $genero, $precio);
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
