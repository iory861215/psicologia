<?php

include 'conexion.php';

$fecha = $_GET['fecha'];


if ($fecha == '05-04-2022' or $fecha == '12-04-2022' or $fecha == '19-04-2022' or $fecha == '26-04-2022') {

    $consulta = "SELECT * FROM tarde";
    $ejecutar = $mysqli->query($consulta);

    $array = [];

    while ($fila = $ejecutar->fetch_assoc()) {
        $array[] = $fila;
    }

    echo json_encode($array);
} else {

    $consulta = "SELECT * FROM dia";
    $ejecutar = $mysqli->query($consulta);

    $array = [];

    while ($fila = $ejecutar->fetch_assoc()) {
        $array[] = $fila;
    }

    echo json_encode($array);
}
