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
            <p>Usuario: <input type="text" name="user"></p>
            <p>Password: <input type="password" name="pass"</p>
            <input type="submit" name="login" value="Login">
        </form>
        <?php
        require_once 'bbdduser.php';;
        if(isset($_POST["login"])){
            //recogemos los datos del login
            $username = $_POST["user"];
            $pass = $_POST["pass"];
            if(verificarUser($username, $pass)){
                //guardar datos del usuario en variable de sesión
                session_start();
                $_SESSION["user"] = $username;
                //dirigimos al usuario a su homepage
                header("Location: UserHome.php");
            }else{
                echo "nombre de usuario o contraseña incorrectos";
            }
        }
        ?>
        <a href="index.php"></a>
    </body>
</html>
