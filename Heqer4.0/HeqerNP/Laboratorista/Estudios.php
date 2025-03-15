<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
$sector = $_SESSION["sector"];
$RFC_CLINICA = $_SESSION['RFC_CLINICA'];

if ($sector != "Laboratorista") {
    header('Location:../');
}


if ($user == null and $pass == null) {
    header('Location:../');
}
?>
<?php
require_once '../Database/Basedatos.php';
$conexionbd = mysqli_connect(server, user, password, database, port);
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Heqer</title>
    <link rel="icon" href="../images/usuario.png">
    <link rel="stylesheet" href="../estilosCss/estilos1.css">
    <link rel="stylesheet" href="../estilosCss/Iconos.css">
    <link rel="stylesheet" href="../estilosCss/alert.css">
    <script src="../js/alert.js"></script>
    <link rel="stylesheet" href="../estilosCss/Check.css">
    <style type="text/css">
        select {
            font-size: 20px;
            margin: 3px;
            padding: 3px;

        }

        select {
            font-size: 20px;
            margin: 3px;
            padding: 3px;

        }

        table,
        th,
        td {
            color: rgb(255, 255, 255);

        }

        .check {
            color: rgb(255, 255, 255);
            width: 20px;
            font-size: 20px;
            height: 20px;
        }

        /*MOVIL*/
        @media(max-width:767px) {
            form {
                width: 300px;
            }

            table {
                width: 150px;
            }
        }
    </style>

</head>

<body>
    <div class="gradiente">
        <div class="acercaDe">
            Acerca de nosotros:
            <br>
            <a href="https://api.whatsapp.com/send?phone=5212411522537"><img src="../images/whatsapp.png" class="Wh" width="30px" height="30px"></a>
            <a href="../../TheBoringLife"><img src="../images/tutorial.png" class="Wh"></a>
            <a href=""><img src="../images/video.png" class="Wh"></a>
        </div>

        <a href="./">Regresar</a>
        <a href="../exit/ExitSession.php">Cerrar seción</a>
        <center>

            <h1>Busqueda de altas</h1>
            <nav>
                <table border="1">


                    <tr>
                        <th>CLAVE</th>
                        <th>ESTUDIO</th>
                        <th>FECHA DE INICIO</th>
                        <th>ESTADO</th>
                        <th>FINALIZAR</th>


                    </tr>
                    <?php
                    $query = "SELECT * FROM `ALTAS` WHERE RFC_CLINICA='" . $RFC_CLINICA . "' ORDER BY ID DESC;";
                    $Ejec = mysqli_query($conexionbd, $query);
                    while ($re = mysqli_fetch_assoc($Ejec)) {
                        echo "<tr><td>" . $re["CLAVE"] . "</td><td>" . $re["ESTUDIO"] . "</td>
                    <td>" . $re["FECHA"] . "</td><td>" . $re["ESTADO"] . '</td>
                    <td><a href="ActualizarEstado.php?ID=' . $re["ID"] . '">Finalizar</a></td></tr>
                    ';
                    ?>



                    <?php
                    }
                    ?>
                </table>
            </nav>
    </div>

</body>

</html>