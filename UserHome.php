<!DOCTYPE html>
<!-- HomePage del usuario -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pagina del usuario</title>
    </head>
    <body>
        <?php
        session_start();
        // Nos aseguramos de que haya un usuario autentificado
        if (isset($_SESSION["user"])) {
            // Cogemos la variable de sesión y saludamos al usuario
            $username = $_SESSION["user"];
            echo "hola $username";
        } else {
            echo "No estás autentificado.";
        }
        ?>
    </body>
</html>
