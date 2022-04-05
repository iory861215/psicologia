<?php

include 'conexion.php';

$consulta = "SELECT hora FROM horario WHERE status=''";
$ejecutar = $mysqli->query($consulta);

$array = [];

while ($fila = $ejecutar->fetch_assoc()) {
    $array[] = $fila;
}

echo json_encode($array);
