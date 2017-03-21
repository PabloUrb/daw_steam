<?php

/* 
 * Fichero para las funciones de bbdd relacionadas con los juegos
 */

require_once 'bbdd.php';

function insertGenero($genero) {
    $con = conectar("daw_steam");
    $insert = "insert into genre values (null, '$genero')";
    if (mysqli_query($con, $insert)) {
        echo "<p>Género dado de alta</p>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function existeGenero($genero) {
    $con = conectar("daw_steam");
    $consulta = "select * from genre where name='$genero'";
    $resultado = mysqli_query($con, $consulta);
    $contador = mysqli_num_rows($resultado);
    desconectar($con);
    if ($contador == 0) {
        return false;
    } else {
        return true;
    }
    
}