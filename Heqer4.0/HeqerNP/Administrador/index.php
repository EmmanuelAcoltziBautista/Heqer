<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
$sector = $_SESSION["sector"];
$RFC_CLINICA = $_SESSION['RFC_CLINICA'];

if ($user == null and $pass == null) {
    header('Location:../');
}
if ($sector != "Administrador") {
    header('Location:../');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heqer</title>
    <link rel="stylesheet" href="../estilosCss/estilos1.css">
    <link rel="stylesheet" href="../estilosCss/Iconos.css">
    <link rel="icon" href="../images/usuario.png">
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
            <h1>Administrador</h1>
            <nav>
                <a href="./LaboratorioInformacion.php"><img class="img" src="../images/usuario.png">Informacion del laboratorio</a>
                <br>

                <a href="CrearUsuarios.php"><img class="img" src="../images/addUser.png">Agregar empleado</a>
                <br>

                <a href="./Personal.php"><img class="img" src="../images/empleados.png">Empleados</a>
                <br>
                <a href="Precios.php"><img class="img" src="../images/editar.png">Modificar Precios</a>
                <br>
                <a href="Inventario.php"><img class="img" src="../images/inventario.png">Inventario</a>
                <br>
                <a href="Ganancias.php"><img class="img" src="../images/Ganancias.png">Ganancias</a>
                <br>

            </nav>

        </center>
    </div>
</body>

</html>