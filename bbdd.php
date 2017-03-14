<?php

// Fichero con las funciones relacionadas con la bbdd

// Función que inserta un usuario de tipo usuario
function insertUser($nusuario, $pass, $email) {
    $conexion = conectar("daw_steam");
    $insert = "insert into user values "
            . "('$nusuario', '$pass', '$email', 'usuario')";
    if (mysqli_query($conexion, $insert)) {
        echo "<p>Usuario dado de alta</p>";
    } else {
        echo mysqli_error($conexion);
    }
    desconectar($conexion);
}


// Función que devuelve true si existe un usuario con el nombre
// de usuario que se le pasa y false si no existe 
function existeUsuario($nombre_usuario) {
    $conexion = conectar("daw_steam");
    $consulta = "select * from user where username='$nombre_usuario';";
    // Ejecutamos la consulta
    $resultado = mysqli_query($conexion, $consulta);
    // Contamos cuantas filas tiene el resultado
    $contador = mysqli_num_rows($resultado);
    desconectar($conexion);
    // Si devuelve 1 es que ya existe un usuario con ese nombre de usuario
    // Si devuelve 0 no existe
    if ($contador == 0) {
        return false;
    } else {
        return true;
    }
    
}

function conectar($database) {
    $con = mysqli_connect("localhost", "root", "root", $database)
            or die("No se ha podido conectar con la BBDD.");
    return $con;
}

function desconectar($conexion) {
    mysqli_close($conexion);
}