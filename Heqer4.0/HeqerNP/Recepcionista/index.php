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
    <link rel="stylesheet" href="../estilosCss/estilos1.css">
    <link rel="stylesheet" href="../estilosCss/Iconos.css">

    <style type="text/css">
     /*MOVIL*/
     @media(max-width:767px) {
            nav {
                width: 350px;
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
            <h1>Recepcion</h1>


            <nav>
                <a href="Altas1.php"><img src="../images/addUser.png">Agregar registro</a>
                <br>
                <a href="Ticket.php"><img src="../images/editar.png">Pago</a>
                <br>
                <a href="Result.php"><img src="../images/result.png">Resultados</a>
                <br>
                <a href="BuscarEstudios.php"><img src="../images/Busqueda.png">Buscar estudios</a>
            
            </nav>

        </center>
    </div>
</body>

</html>