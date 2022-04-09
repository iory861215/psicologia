<?php

include 'conexion.php';

$nombre = $_GET['nombre'];
$email = $_GET['email'];
$tel = $_GET['tel'];
$ads = $_GET['ads'];
$hora = $_GET['hora'];
$opcion = $_GET['opcion'];
$fecha = $_GET['fecha'];


$consulta = "SELECT * FROM registro WHERE correo = '$email'";
$ejecConsulta = $mysqli->query($consulta);

$consultados = "SELECT * FROM registro WHERE fecha='$fecha' and hora='$hora'";
$ejecConsultados = $mysqli->query($consultados);

if ($nombre == '' or $email == '' or $ads == '' or $hora == '' or $tel == '') {
    echo '<p style="color:whitesmoke;background-color:red;padding:10px;border-radius:10px;">Debes de llenar todos los campos!!</p>';
} elseif (mysqli_num_rows($ejecConsulta) == 1) {
    echo '<p style="color:white;background-color:rgba(12, 7, 7, 0.8);padding:10px;border-radius:10px;">Ya hiciste una cita previamente!!</p>';
} elseif (mysqli_num_rows($ejecConsultados) == 1) {
    echo '<p style="color:white;background-color:rgba(226, 39, 53, 0.8);padding:5px;border-radius:10px;">No puedes elegir un horario que no esta disponible!!</p>';
}

//PARA HORARIOS EN LA TARDE
elseif (mysqli_num_rows($ejecConsulta) == 0  and $fecha == '05-04-2022') {
    if ($opcion == 'zoom') {

        $insertar = "INSERT INTO registro(nombre, ads, correo, tel, fecha, hora, modalidad) VALUES('$nombre', '$ads', '$email', '$tel', '$fecha', '$hora', '$opcion')";
        $ejecutar = $mysqli->query($insertar);

        $update = "UPDATE tarde SET status='ocupado' WHERE hora='$hora'";
        $ejecUpdate = $mysqli->query($update);

        echo '<p style="color:white;background-color:rgba(12, 7, 7, 0.8);padding:10px;border-radius:10px;">Cita agregada y enlace!!</p>';
    } else {
        $insertar = "INSERT INTO registro(nombre, ads, correo, tel, fecha, hora, modalidad) VALUES('$nombre', '$ads', '$email', '$tel', '$fecha', '$hora', '$opcion')";
        $ejecutar = $mysqli->query($insertar);

        $update = "UPDATE tarde SET status='ocupado' WHERE hora='$hora'";
        $ejecUpdate = $mysqli->query($update);

        echo '<p style="color:white;background-color:rgba(12, 7, 7, 0.8);padding:10px;border-radius:10px;text-align:center;">Cita agregada!!<br>Acudir 5 minutos antes de su cita</p>';
    }
} elseif (mysqli_num_rows($ejecConsulta) == 0 and $fecha == '12-04-2022') {
    if ($opcion == 'zoom') {

        $insertar = "INSERT INTO registro(nombre, ads, correo, tel, fecha, hora, modalidad) VALUES('$nombre', '$ads', '$email', '$tel', '$fecha', '$hora', '$opcion')";
        $ejecutar = $mysqli->query($insertar);

        $update = "UPDATE tarde SET status='ocupado' WHERE hora='$hora'";
        $ejecUpdate = $mysqli->query($update);

        echo '<p style="color:white;background-color:rgba(12, 7, 7, 0.8);padding:10px;border-radius:10px;">Cita agregada y enlace!!</p>';
    } else {
        $insertar = "INSERT INTO registro(nombre, ads, correo, tel, fecha, hora, modalidad) VALUES('$nombre', '$ads', '$email', '$tel', '$fecha', '$hora', '$opcion')";
        $ejecutar = $mysqli->query($insertar);

        $update = "UPDATE tarde SET status='ocupado' WHERE hora='$hora'";
        $ejecUpdate = $mysqli->query($update);

        echo '<p style="color:white;background-color:rgba(12, 7, 7, 0.8);padding:10px;border-radius:10px;text-align:center;">Cita agregada!!<br>Acudir 5 minutos antes de su cita</p>';
    }
} elseif (mysqli_num_rows($ejecConsulta) == 0 and $fecha == '19-04-2022') {
    if ($opcion == 'zoom') {

        $insertar = "INSERT INTO registro(nombre, ads, correo, tel, fecha, hora, modalidad) VALUES('$nombre', '$ads', '$email', '$tel', '$fecha', '$hora', '$opcion')";
        $ejecutar = $mysqli->query($insertar);

        $update = "UPDATE tarde SET status='ocupado' WHERE hora='$hora'";
        $ejecUpdate = $mysqli->query($update);

        echo '<p style="color:white;background-color:rgba(12, 7, 7, 0.8);padding:10px;border-radius:10px;">Cita agregada y enlace!!</p>';
    } else {
        $insertar = "INSERT INTO registro(nombre, ads, correo, tel, fecha, hora, modalidad) VALUES('$nombre', '$ads', '$email', '$tel', '$fecha', '$hora', '$opcion')";
        $ejecutar = $mysqli->query($insertar);

        $update = "UPDATE tarde SET status='ocupado' WHERE hora='$hora'";
        $ejecUpdate = $mysqli->query($update);

        echo '<p style="color:white;background-color:rgba(12, 7, 7, 0.8);padding:10px;border-radius:10px;text-align:center;">Cita agregada!!<br>Acudir 5 minutos antes de su cita</p>';
    }
} elseif (mysqli_num_rows($ejecConsulta) == 0 and $fecha == '26-04-2022') {
    if ($opcion == 'zoom') {

        $insertar = "INSERT INTO registro(nombre, ads, correo, tel, fecha, hora, modalidad) VALUES('$nombre', '$ads', '$email', '$tel', '$fecha', '$hora', '$opcion')";
        $ejecutar = $mysqli->query($insertar);

        $update = "UPDATE tarde SET status='ocupado' WHERE hora='$hora'";
        $ejecUpdate = $mysqli->query($update);

        echo '<p style="color:white;background-color:rgba(12, 7, 7, 0.8);padding:10px;border-radius:10px;">Cita agregada y enlace!!</p>';
    } else {
        $insertar = "INSERT INTO registro(nombre, ads, correo, tel, fecha, hora, modalidad) VALUES('$nombre', '$ads', '$email', '$tel', '$fecha', '$hora', '$opcion')";
        $ejecutar = $mysqli->query($insertar);

        $update = "UPDATE tarde SET status='ocupado' WHERE hora='$hora'";
        $ejecUpdate = $mysqli->query($update);

        echo '<p style="color:white;background-color:rgba(12, 7, 7, 0.8);padding:10px;border-radius:10px;text-align:center;">Cita agregada!!<br>Acudir 5 minutos antes de su cita</p>';
    }
} //PARA HORARIOS EN EL DIA
elseif (mysqli_num_rows($ejecConsulta) == 0  and $fecha !== '05-04-2022'  or $fecha !== '12-04-2022'  or $fecha !== '19-04-2022'  or $fecha !== '26-04-2022') {
    if ($opcion == 'zoom') {
        $insertar = "INSERT INTO registro(nombre, ads, correo, tel, fecha, hora, modalidad) VALUES('$nombre', '$ads', '$email', '$tel', '$fecha', '$hora', '$opcion')";
        $ejecutar = $mysqli->query($insertar);

        $update = "UPDATE dia SET status='ocupado' WHERE hora='$hora'";
        $ejecUpdate = $mysqli->query($update);
        echo '<p style="color:white;background-color:rgba(12, 7, 7, 0.8);padding:10px;border-radius:10px;">Cita agregada y mandar enlace!!</p>';
    } else {
        $insertar = "INSERT INTO registro(nombre, ads, correo, tel, fecha, hora, modalidad) VALUES('$nombre', '$ads', '$email', '$tel', '$fecha', '$hora', '$opcion')";
        $ejecutar = $mysqli->query($insertar);

        $update = "UPDATE dia SET status='ocupado' WHERE hora='$hora'";
        $ejecUpdate = $mysqli->query($update);
        echo '<p style="color:white;background-color:rgba(12, 7, 7, 0.8);padding:10px;border-radius:10px;text-align:center;">Cita agregada!!<br>Acudir 5 minutos antes de su cita</p>';
    }
}
