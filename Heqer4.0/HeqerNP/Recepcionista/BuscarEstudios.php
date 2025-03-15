<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
$sector = $_SESSION["sector"];
$RFC_CLINICA = $_SESSION['RFC_CLINICA'];

if ($sector != "Recepcionista") {
    header('Location:../');
}

if ($user == null and $pass == null) {
    header('Location:../');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heqer</title>
    <link rel="icon" href="../images/usuario.png">
    <link rel="stylesheet" href="../estilosCss/alert.css">
    <script src="../js/alert.js"></script>

    <link rel="stylesheet" href="../estilosCss/estilos1.css">
    <style type="text/css">
        /*MOVIL*/
        table,
        th,
        td {
            color: rgb(255, 255, 255);

        }
        @media(max-width:767px) {
            form {
                width: 300px;
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
        <a href="../exit/ExitSession.php">Cerrar sesión</a>
        <center>
            <h1>Busqueda de estudios</h1>

            <form method="post">
                <label for="FECHA">FECHA DEL ESTUDIO:</label>
                <input type="date" id="FECHA" name="FECHA" class="text">
                <input type="submit" id="Enviar" name="Enviar" value="Buscar" class="boton">
            </form>
            <nav>
                <table border="1" class="table">


                    <tr>
                        <th>CLAVE</th>
                        <th>ESTUDIO</th>
                        <th>FECHA DE INICIO</th>
                        <th>ESTADO</th>

                    </tr>
                    <?php
                    require_once "../Database/Basedatos.php";
                    $CLAVE = "";
                    $MONTOS = "";
                    if (isset($_POST["Enviar"])) {
                        $conexionbd = mysqli_connect(server, user, password, database, port);
                        $FECHA = $_POST["FECHA"];
                        $query = "SELECT * FROM `ALTAS`
                 WHERE FECHA='" . $FECHA . "' AND RFC_CLINICA='" . $RFC_CLINICA . "';";
                        //  echo $query;
                        $RESULTADO = mysqli_query($conexionbd, $query);
                        while ($re = mysqli_fetch_assoc($RESULTADO)) {

                            echo "<tr><td>" . $re["CLAVE"] . "</td><td>" . $re["ESTUDIO"] . "</td>
                    <td>" . $re["FECHA"] . "</td><td>" . $re["ESTADO"] . '</td></tr>';
                        }
                    }
                    ?>
                </table>
            </nav>
    </div>
</body>

</html>