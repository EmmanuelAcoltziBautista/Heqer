<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
$sector=$_SESSION["sector"];
$RFC_CLINICA=$_SESSION['RFC_CLINICA'];

if($sector!="Recepcionista"){
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



    <link rel="stylesheet" href="../estilosCss/estilos.css">
    <link rel="stylesheet" href="../estilosCss/Iconos.css">
    <link rel="stylesheet" href="../estilosCss/estilos1.css">
    <style type="text/css">
        .BoxSalida {
            background: rgb(255, 255, 255);
            border: 3px solid rgb(0, 0, 0);
            font-size: 14px;
            font-family: Arial;
            font-weight: normal;
            width: 50%;
        }

        .AlineacionD {
            text-align: right;
            margin: 2px;
            padding: 2px;
        }

        .AlineacionI {
            text-align: left;
            margin: 2px;
            padding: 2px;
        }

        /*MOVIL*/
     @media(max-width:767px) {
            form {
                width: 300px;
            }
        }
    </style>
    <script src="../js/Imprimir.js">
    </script>

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
        <p>
            <center>
                <h1>Resultados </h1>
                <form method="post">
                    <label for="CLAVE">Clave</label>
                    <input type="text" id="CLAVE" name="CLAVE" placeholder="Clave:" class="text">
                    <input type="submit" id="enviar" name="enviar" value="Mostrar" class="boton">
                </form>
                <?php
                $SALIDAout = "";
                $CLAVE = "";
                require_once '../Database/Basedatos.php';

                date_default_timezone_set('America/Mexico_City');
                $encabezado = "";
                $SALIDAout1 = "";
                $contenido = "";
                $footerEstudio="";
                if (isset($_POST["enviar"])) {


                    $conexionbd1 = mysqli_connect(server, user, password, database, port);

                    $db = database;
                    $CLAVE = $_POST["CLAVE"];
                    $queryInformacion = "SELECT * FROM `ALTAS` WHERE CLAVE='$CLAVE' AND RFC_CLINICA='".$RFC_CLINICA."';";

                    $informacion = mysqli_query($conexionbd1, $queryInformacion);

                   
                    if ($info = mysqli_fetch_assoc($informacion)) {
                       $footerEstudio=$info["ESTUDIO"];
                        $SALIDAout1 = "
                        
                        Fecha de muestras:  " . $info["FECHA"] . "\n Hora de muestras:" . $info["HORA"];

                        $encabezado = "
                         <table border='1' cellpadding='4' cellspacing='0'>
                        <tr>
                         <td>
                         <b>Nombre: </b> </td><td>" . $info["NOMBRE"] ."<td>"
                         ."</tr>
                        <tr>".
                            
                            "<td><b>Edad:  </b></td><td>" . $info["EDAD"] ."</td>"
                           ."</tr>
                        <tr>".
                         
                            "<td><b>Sexo:  </b></td><td>" . $info["SEXO"] ."</td>".
                          "</tr>
                        <tr>".
                         
                           " <td><b>Direccion:  </b></td><td>" . $info["DIRECCION"] .
                            " </td>"."
                             
                            </table>
                             ";
                        //$encabezado = $uno . $dos . $tres . $cuatro;
                    }

                    $conexionbd = mysqli_connect(server, user, password, database, port);
                    $query = "SELECT * FROM `RESTUDIO` WHERE CLAVE='$CLAVE' AND RFC_CLINICA='".$RFC_CLINICA."';";
                    $search = mysqli_query($conexionbd, $query);


                ?>

                    <?php

                    $contenido = " 
               
                    <table border='1' cellpadding='4' cellspacing='0'>
            <tr>
                <th><b>Parametros</b></th>
                <th><b>Resultados</b></th>
                <th><b>Valores de referencia</b></th>
                
            </tr>
            
            ";
                    while ($registro = mysqli_fetch_assoc($search)) {
                    ?>

                        <?php
                        $contenido .= "
                        <center>
                        <tr>";
                        $contenido .= "<td>"
                            . $registro["PREGUNTA"] .
                            "</td>
                        <td>"
                            . $registro["RESPUESTA"] .
                            "</td>
                        <td>" .
                            $registro["VALORES_DE_REFERENCIA"] .
                            "</td>";
                        $contenido .= "</tr>
                        </center>
                        ";
                        ?>


                    <?php

                    }
                    $contenido .= "</table>";

                    $SALIDAoUT = $SALIDAout1 . $encabezado . $contenido;
                    //   echo $SALIDAout;
                    $image="<img src='./PDF/Header.png'>";
                    $_SESSION["img"]=$image;
                    $_SESSION["arr"] = $SALIDAout1;
                    $_SESSION["en"] = $encabezado;
                    $_SESSION["con"] = $contenido;
                    $_SESSION["footerEstudio"]=$footerEstudio;


                    ?>
                <?php
                    echo "<script>
            window.open('PDF/index.php',target='_blank');
            </script>";
                }

                ?>

            </center>
    </div>
</body>

</html>