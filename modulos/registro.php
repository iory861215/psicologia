<?php

include 'conexion.php';

$nombre = $_GET['nombre'];
$email = $_GET['email'];
$ads = $_GET['ads'];
$hora = $_GET['hora'];


$consulta = "SELECT * FROM registro WHERE nombre ='$nombre' AND correo = '$email'";
$ejecConsulta = $mysqli->query($consulta);

if ($nombre == '' or $email == '' or $ads == '' or $hora == '') {
    echo '<p style="color:whitesmoke;background-color:red;padding:10px;border-radius:10px;">Debes de llenar todos los campos!!</p>';
} elseif (mysqli_num_rows($ejecConsulta) == 0) {
    $insertar = "INSERT INTO registro(nombre, ads, correo, hora) VALUES('$nombre', '$ads', '$email', '$hora')";
    $ejecutar = $mysqli->query($insertar);

    $update = "UPDATE horario SET status='ocupado' WHERE hora='$hora'";
    $ejecUpdate = $mysqli->query($update);

    echo '<p style="color:white;background-color:rgba(12, 7, 7, 0.8);;padding:10px;border-radius:10px;">Cita agregada!!</p>';

    //METER CODIGO PARA MADAR UN CORREO A LA PERSONA QUE HACE LA CITA OPCIONAL PENDIENTE

} else {
    echo '<p style="color:white;background-color:rgba(12, 7, 7, 0.8);padding:10px;border-radius:10px;">Ya hiciste una cita previamente!!</p>';
}



/* 
echo $nombre;
echo $email;
echo $ads;
echo $hora; */
