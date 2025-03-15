<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
$sector = $_SESSION["sector"];
$RFC_CLINICA=$_SESSION['RFC_CLINICA'];

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
$db = database;
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
            <h1>Nuevo Estudios</h1>

            <form method="post" class="NuevoEstudio">
                <label for="Estudio">Nombre del Estudio</label>
                <input type="text" name="Estudio" id="Estudio" placeholder="Escribe aqui..." required class="text">

                <label for="Seccion">Parametros</label>
                <input type="text" id="Seccion" name="Seccion" placeholder="Escribe aqui..." required class="text">
                <br>
                <label for="Referencia">Valor de referencia</label>
                <input type="text" id="Referencia" name="Referencia" placeholder="Escribe aqui..." required class="text">

                <br />

                <div class="checkbox-wrapper-22">
                    <label class="switch" for="Existe">
                        <input type="checkbox" id="Existe" name="Existe" />
                        <div class="slider round"></div>
                    </label>
                    <label for="Existe">Ya existe el estudio</label>

                </div>


                <!--input type="checkbox" name="Existe" id="Existe" class="check"><label for="Existe">Ya existe el estudio</label-->

                <input type="submit" id="Enviar" name="Enviar" value="Agregar" class="boton">

            </form>

        </center>

        <?php

        if (isset($_POST["Enviar"])) {
            $SO = $_POST["Existe"];
            //                echo $SO;
            $Estudio = $_POST["Estudio"];
            $Campo = $_POST["Seccion"];
            $Valor_referencia = $_POST["Referencia"];

            $CONEXI = mysqli_connect(server, user, password, database, port);

            $query = "INSERT INTO `$db`.`FESTUDIO` (`ID`,`ESTUDIO`,`PREGUNTA`,`VALORES_DE_REFERENCIA`,`RFC_CLINICA`) VALUES 
            ('0','" . $Estudio . "','" . $Campo . "','" . $Valor_referencia . "','".$RFC_CLINICA."');";
            //pregunto si ya existe el estudio
            if ($SO == null) {
                $queryPrecio = "INSERT INTO `$db`.`PRECIOS` (`ID`,`ESTUDIO`,`PRECIO`,`RFC_CLINICA`)
                 VALUES ('0','" . $Estudio . "','0','".$RFC_CLINICA."');";
                $resultadoPrecio = mysqli_query($CONEXI, $queryPrecio);
                $resultadoQuery = mysqli_query($conexionbd, $query);
            } else { //si no existe
                //        $queryPrecio="UPDATE `PRECIOS` SET `PRECIO`='' WHERE 1";
                //solo agrego esto
                $resultadoQuery = mysqli_query($conexionbd, $query);
            }
            echo "<script>
swal.fire({
    position:'center',
    title:'Buen trabajo',
    icon:'success',


});
</script>";
        }
        ?>

        <form method="post">
            <label for="">Estudio</label>
            <select id="TextoBusqueda" name="TextoBusqueda" class="text">
                <?php
                $conexionbd5 = mysqli_connect(server, user, password, database, port);
                $query5 = "SELECT ESTUDIO FROM FESTUDIO WHERE RFC_CLINICA='".$RFC_CLINICA."' GROUP BY ESTUDIO;";
                $resultados = mysqli_query($conexionbd5, $query5);
                while ($ejecu = mysqli_fetch_assoc($resultados)) {
                    echo "<option value='" . $ejecu['ESTUDIO'] . "'>" . $ejecu['ESTUDIO'] . "</option>";
                }
                ?>
            </select>
            <input class="boton" type="submit" id="Buscar" name="Buscar" value="Seleccionar" class="text">
        </form>


        <nav>
            <table border="1">
                <tr>
                    <th>Estudio</th>
                    <th>Parametros</th>
                    <th>Valores de referencia</th>
                    <th>Eliminar</th>
                </tr>
                <ul>


                    <?php
                    $conexion = mysqli_connect(server, user, password, database, port);
                    if (isset($_POST["Buscar"])) {
                        $TextoBusqueda = $_POST["TextoBusqueda"];
                        $query1 = "SELECT * FROM `FESTUDIO` WHERE ESTUDIO='" . $TextoBusqueda . "' AND RFC_CLINICA='".$RFC_CLINICA."';";
                        $resultadoBusqueda = mysqli_query($conexion, $query1);


                        while ($registro = mysqli_fetch_assoc($resultadoBusqueda)) {
                            $eli = "EliminarCampo.php?ID=" . $registro['id'];
                            echo "<tr><td>" . $registro["ESTUDIO"] . "</td><td>" . $registro["PREGUNTA"] . "</td><td>" . $registro["VALORES_DE_REFERENCIA"] . "</td><td><a href='" . $eli . "'>Eliminar</a></td>";
                        }
                    }


                    ?>

        </nav>

</body>

</html>