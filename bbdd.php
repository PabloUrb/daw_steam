<?php

// Fichero con conectar y desconectar



function conectar($database) {
    $con = mysqli_connect("localhost", "root", "root", $database)
            or die("No se ha podido conectar con la BBDD.");
    return $con;
}

function desconectar($conexion) {
    mysqli_close($conexion);
}