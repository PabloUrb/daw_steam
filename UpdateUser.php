<!DOCTYPE html>
<!--  Formulario para modificar perfil del usuario -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar perfil</title>
    </head>
    <body>
        <?php
        session_start();
        require_once 'bbdduser.php';
        if (isset($_SESSION["user"])) {
            $username = $_SESSION["user"];
            if (isset($_POST["modificar"])) {
                $pass = $_POST["pass"];
                $email = $_POST["email"];
                updateUser($username, $pass, $email);
            } else {
                // Traemos los datos actuales del usuario
                $datos = getUser($username);
                $fila = mysqli_fetch_array($datos);
                extract($fila);
                echo "<form action='' method='POST'>";
                echo "<p>Perfil de $username</p>";
                echo "<p>Password: <input type='password' name='pass' value='$password'></p>";
                echo "<p>Email: <input type='text' name='email' value='$email'></p>";
                echo "<p><input type='submit' name='modificar' value='Modificar'></p>";
                echo "</form>";
            }
        } else {
            echo "Usuario no autentificado";
        }
        ?>
    </body>
</html>
