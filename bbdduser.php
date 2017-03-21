<?php

/* 
 * Fichero para las funciones de la bbdd, tabla user
 */

require_once 'bbdd.php';

// Función que modifica el perfil de un usuario
function updateUser($username, $pass, $email) {
    $con = conectar("daw_steam");
    $update = "update user set password='$pass', email='$email' where username='$username'";
    if (mysqli_query($con, $update)) {
        echo "<p>Datos del perfil modificiados</p>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}


// Función que devuelve los datos de un usuario pasado como parámetro
function getUser($username) {
    $con = conectar("daw_steam");
    $query = "select * from user where username='$username'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

// Método que devuelve el tipo de un usuario
function getTipoUsuario($username) {
    $con = conectar("daw_steam");
    $query = "select type from user where username='$username'";
    $resultado = mysqli_query($con, $query);
    // Extraemos el tipo para devolver ya el string con el tipo de user
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);
    return $type;
}

// Función que verifica los datos de un user
function verificarUser($username, $password) {
    $con = conectar("daw_steam");
    $query = "select * from user where username='$username' 
            and password='$password'";
    $resultado = mysqli_query($con, $query);
    $filas = mysqli_num_rows($resultado);
    desconectar($con);
    if ($filas > 0) {
        return true;
    } else {    // Este else no hace falta
        return false;
    }
}

// Función que inserta un usuario de tipo usuario
function insertUser($nusuario, $pass, $email, $tipo) {
    $conexion = conectar("daw_steam");
    $insert = "insert into user values "
            . "('$nusuario', '$pass', '$email', '$tipo')";
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
