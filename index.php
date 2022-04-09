<?php
include 'modulos/conexion.php';
$ads = "SELECT DISTINCT ads FROM usuarios";
$ejecutarads = $mysqli->query($ads);


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>citas</title>
    <link rel="shortcut icon" href="img/cita.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="datapicker/jquery-ui-1.13.0.custom/jquery-ui.css">
    <link rel="stylesheet" href="datapicker/jquery-ui-1.13.0.custom/jquery-ui.structure.css">
    <link rel="stylesheet" href="datapicker/jquery-ui-1.13.0.custom/jquery-ui.theme.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="principal">
        <div id="marco">
            <div id="fondo"></div>
            <div id="informacion">
                <div id="datos">
                    <label for="nombre">Nombre y apellidos:</label>
                    <input type="text" id="nombre">
                    <label for="ads">Adscripción:</label>
                    <select name="ads" id="ads">

                        <?php while ($fila = $ejecutarads->fetch_assoc()) { ?>
                            <option value="<?php echo $fila['ads'] ?>"><?php echo $fila['ads'] ?></option>

                        <?php }    ?>

                    </select>
                    <label for="email">Correo:</label>
                    <input type="email" id="email">
                    <label for="tel">Celular:</label>
                    <input type="number" id="tel">
                    <label for="tel">Modalidad de cita:</label>
                    <select name="opcion" id="opcion">
                        <option value="presencial">Presencial</option>
                        <option value="zoom">Zoom</option>
                        <option value="telefono">Telefonica</option>
                    </select>
                    <label for="tel">Fecha:</label>
                    <input type="text" id="datepicker" name="fecha" onchange="verHorario()">
                </div>
                <div id="caja">
                    <ul id="lista">
                    </ul>
                </div>
                <div id="respuesta">

                </div>
                <div id="confirmar">
                    <input type="button" value="Confirmar" id="confirmar">
                </div>
            </div>
        </div>
    </div>

    <script src="datapicker/jquery-ui-1.13.0.custom/external/jquery/jquery.js"></script>
    <script src="datapicker/jquery-ui-1.13.0.custom/jquery-ui.js"></script>
    <script src="js/app.js"></script>

</body>

</html>