<?php
include 'conexion.php';


$fecha = $_GET['fecha'];
$hora = $_GET['hora'];

$consulta = "SELECT * FROM registro WHERE fecha='$fecha' and hora='$hora'";
$ejecConsulta = $mysqli->query($consulta);

if (mysqli_num_rows($ejecConsulta) == 0) {
    echo '<p style="color:white;background-color:rgba(106, 229, 178, 0.8);padding:5px;border-radius:10px;">Horario disponible</p>';
} else {

    echo '<p style="color:white;background-color:rgba(226, 39, 53, 0.8);padding:5px;border-radius:10px;">Horario no disponible</p>';
}
