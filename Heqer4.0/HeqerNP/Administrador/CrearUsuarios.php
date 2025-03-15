<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
$sector=$_SESSION["sector"];
$RFC_CLINICA=$_SESSION['RFC_CLINICA'];

if($sector!="Administrador"){
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
    <link rel="stylesheet" href="../estilosCss/alert.css">
    <script src="../js/alert.js"></script>
    <title>Heqer</title>
    <link rel="stylesheet" href="../estilosCss/estilos1.css">
    <link rel="icon" href="../images/usuario.png">
    <style type="text/css">
        /*MOVIL*/
        @media(max-width:767px) {
            form {
                width: 320px;
            }
        }

        select {
            font-size: 20px;
            margin: 3px;
            padding: 3px;

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
        <a href="../exit/ExitSession.php">Cerrar secion</a>
        <center>
            <h1>Crear usuarios</h1>

            <form method="post">
                <label for="Nombre">Ingresa el nombre:</label>
                <br>
                <input type="text" id="Nombre" name="Nombre" required class="text">
                <br />
                <label for="Contrasena">Ingresa la contraseña:</label>
                <br>
                <input type="password" id="Contrasena" name="Contrasena" class="text">
                <br />
                <label for="Salario">Salario:</label>
                <br>
                <input type="number" id="Salario" name="Salario" required class="text">
                <br />
                <label for="Sector">Area:</label>
                <br>
                <select id="Sector" name="Sector">
                    <option value="Administrador">Administrador</option>
                    <option value="Laboratorista">Laboratorista</option>
                    <option value="Recepcion">Recepcion</option>
                    <!--option value="Contador">Contador</option-->
                </select>
                <br />
                <input type="submit" id="Enviar" name="Enviar" class="boton" value="Registrar empleado">
            </form>


            <?php

            require_once '../Database/Basedatos.php';
            $conexionbd = mysqli_connect(server, user, password, database, port);
            $conexion = mysqli_connect(server, user, password, database, port);
            $q1 = "SELECT * FROM `PERSONAL`;";
            $RESULT = mysqli_query($conexion, $q1);
            $VAR1 = 0;
            while ($salida = mysqli_fetch_assoc($RESULT)) {
                $VAR1 = $salida["ID"] + 1;
            }
            if (isset($_POST["Enviar"])) {

                $NOMBRE = $_POST["Nombre"];
                $CONTRASENA = $_POST["Contrasena"];
                $SECTOR = $_POST["Sector"];
                $SALARIOS=$_POST["Salario"];
                

                $query = "INSERT INTO `PERSONAL` (`ID`,`NOMBRE`,`CONTRASENA`,`SECTOR`,`SALARIOS`,`RFC_CLINICA`)
 VALUES('0','" . $NOMBRE . "','" . $CONTRASENA . "','" . $SECTOR . "','".$SALARIOS."','".$RFC_CLINICA."');";

                $resultado = mysqli_query($conexionbd, $query);
                if ($resultado) {

                    echo "<script>
var con='El numero de usuario es: '+$VAR1;
swal.fire(
    {
        position:'center',
        title:con,    
        icon:'success',
    }
    );
</script>";
                } else {
                    echo "<script>
swal.fire({
    position:'center',
    title:'Error',
    icon:'warning',
});

</script>";
                }
            }
            ?>
        </center>
    </div>
</body>

</html>