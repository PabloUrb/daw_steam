<?php

/* 
 * Fichero para las funciones de bbdd relacionadas con los juegos
 */

require_once 'bbdd.php';

function insertGame($name, $genre, $price) {
    $con = conectar("daw_steam");
    $insert = "insert into game values ('$name', '$genre', $price)";
    if (mysqli_query($con, $insert)) {
        echo "<p>Juego dado de alta</p>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function existeJuego($nombre) {
    $con = conectar("daw_steam");
    $query = "select * from game where name='$nombre'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    desconectar($con);
    if ($rows == 0) {
        return false;
    }
    return true;
}

function selectAllGenre() {
    $con = conectar("daw_steam");
    $select = "select * from genre";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

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
    } 
        return true;
}