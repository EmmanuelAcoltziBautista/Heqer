<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
$sector=$_SESSION["sector"];
$RFC_CLINICA=$_SESSION['RFC_CLINICA'];

if($sector!="Laboratorista"){
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
    <link rel="stylesheet" href="../estilosCss/estilos1.css">
    <link rel="stylesheet" href="../estilosCss/Iconos.css">
    <style type="text/css">
        /*MOVIL*/
        @media(max-width:767px) {
            nav {
                width: 320px;
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

        <a href="../exit/ExitSession.php">Cerrar sesión</a>
        <center>
            <h1>Laboratorista</h1>
            <!--a href="./Sangre.php"><img src="../images/prueba.png">ES</a>
<a href="./Popo.php"><img src="../images/popo.png">EMF</a>
<a href="./Orina.php"><img src="../images/orina.png">EGO</a-->

            <nav>
                <a href="./NuevoEstudio.php"><img src="../images/inventario.png">Nuevo Estudio</a>
                <br>
                <a href="./LlenarEstudio.php"><img src="../images/Estudio.png">Llenar estudio</a>
                <br>
                <a href="./Estudios.php"><img src="../images/Finalizado.png">Estado de estudios</a>
            
            </nav>
        </center>
    </div>
</body>

</html>