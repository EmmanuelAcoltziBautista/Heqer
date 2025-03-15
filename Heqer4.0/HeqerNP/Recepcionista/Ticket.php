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

/*
aqui recibo el valor de la clave para que el pago sea mas rapido
 */
$claveRecibida="";
if(!empty($_GET["CLAVE"])){
    $claveRecibida=$_GET["CLAVE"];
    
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
    <script>
document.getElementById("PAGO").disabled=true;
function Enabled(){
    document.getElementById("PAGO").disabled=false;
}

    </script>
    <link rel="stylesheet" href="../estilosCss/estilos1.css">
    <style type="text/css">

        /*MOVIL*/
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
            <h1>Pago</h1>

            <form method="post">
                <label for="CLAVE">Clave:</label>
                <input type="text" id="CLAVE" name="CLAVE" placeholder="CLAVE" required class="text" value="<?php echo $claveRecibida; ?>">
                <input type="submit" id="Enviar" name="Enviar" value="Mostrar" class="boton" onClick="Enabled()">
            </form>


            <?php
            require_once "../Database/Basedatos.php";
            $CLAVE = "";
            $MONTOS = "";
            if (isset($_POST["Enviar"])) {
                $conexionbd = mysqli_connect(server, user, password, database, port);
                $CLAVE = $_POST["CLAVE"];
                $query = "SELECT * FROM `TICKET` WHERE CLAVE='" . $CLAVE . "' AND RFC_CLINICA='".$RFC_CLINICA."';";
                $RESULTADO = mysqli_query($conexionbd, $query);
                if ($registro = mysqli_fetch_assoc($RESULTADO)) {
                    $MONTOS = $registro["MONTO"];
                    $concepto = $registro["CONCEPTO"];
                    //echo "<p class >El registro de ".$registro["CLAVE"]." tiene un monto de ".$registro["MONTO"]." CONCEPTO:".$registro["CONCEPTO"];
                    if ($concepto == "Pagado") {
                        echo "<script>
    swal.fire({
        position:'center',
        title:'Este estudio ya a sido pagado',
        icon:'success',
    
    
    });
    </script>";
                        $MONTOS = 0;
                    }
                }
            }

            ?>
            <form method='post'>
                <label for="CLAVE1">Clave:</label>

                <input type='text' id='CLAVE1' name='CLAVE1' readonly="readonly" class="text" value='<?php echo $CLAVE; ?>' required></input>
                <label for="MONTO1">Monto:</label>
                <input type='text' id='MONTO1' name='MONTO1' readonly="readonly" class="text" value='<?php echo $MONTOS; ?>' required></input>
                <input type='submit' id='PAGO' name='PAGO' value='Acreditar pago' class="boton">
            </form>


            <?php
            date_default_timezone_set('America/Mexico_City');

            if (isset($_POST['PAGO'])) {
                $CLAVE1 = $_POST['CLAVE1'];
                $MONTO1 = $_POST['MONTO1'];
                $conexionbd5 = mysqli_connect(server, user, password, database, port);
                $query6 = "UPDATE `TICKET` SET CONCEPTO='Pagado' WHERE CLAVE='" . $CLAVE1 . "' AND RFC_CLINICA='".$RFC_CLINICA."';";
                //echo $query6;
                $resultado1 = mysqli_query($conexionbd5, $query6);
                $conexion6 = mysqli_connect(server, user, password, database, port);
                $query7 = "INSERT INTO GANANCIAS (`ID`,`FECHA`,`MONTO`,`RFC_CLINICA`) VALUES
                ('0','".date('d-m-Y')."','".$MONTO1."','".$RFC_CLINICA."')";
                $SALIDAG = mysqli_query($conexion6, $query7);
                if ($SALIDAG or $resultado1) {
                    echo "<script>
    swal.fire({
        position:'center',
        title:'Pago acreditado',
        icon:'success',
    
    
    });
    </script>";
                }
            }
            ?>
    </div>
</body>

</html>