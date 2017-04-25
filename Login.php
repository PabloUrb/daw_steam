<<<<<<< HEAD
<!DOCTYPE html>
<!--
    Formulario de Login para los usuarios
-->
<html>
    <head>
        <meta charset="UTF-8">
        
        <title>Login</title>
    </head>
    <body>
        <div>
        <form action="" method="POST">
            <p>Usuario: <input type="text" name="user"></p>
            <p>Password: <input type="password" name="pass"></p>
            <input type="submit" name="login" value="Login">
        </form>
        <?php
        require_once 'bbdduser.php';
        if (isset($_POST["login"])) {
            // Recogemos los datos del login
            $username = $_POST["user"];
            $pass = $_POST["pass"];
            if (verificarUser($username, $pass)) { // verificarUser(..)==true
                // Guardar datos del usuario en variable de sesión
                session_start();
                $_SESSION["user"] = $username;
                $tipo = getTipoUsuario($username);
                $_SESSION["type"] = $tipo;
                if ($tipo == "usuario") {
                    // Dirigimos al usuario a su homePage.
                    header("Location: UserHome.php");
                } else if ($tipo == "admin") {
                    // Dirigimos a la página de administrador
                    header("Location: AdminHome.php");
                } else { // Aquí no debería entrar nunca
                    echo "Tipo de usuario incorrecto";
                }
            } else {
                echo "Nombre de usuario o contraseña incorrectos";
            }
        }
        ?></div>
    </body>
</html>

