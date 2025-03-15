<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
$sector = $_SESSION["sector"];
global $RFC_CLINICA;
$RFC_CLINICA = $_SESSION['RFC_CLINICA'];

if ($sector != "Administrador") {
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
            <h1>Datos Clinica</h1>

            <?php
            require_once '../Database/Basedatos.php';
            global $result1;
            
                global $RFC_CLINICA;
                $connection1 = mysqli_connect(server, user, password, database, port);
                $query1 = "SELECT * FROM `LABORATORIO_INFORMACION` WHERE RFC_CLINICA='" . $RFC_CLINICA . "'; ";
                global $result1;
                $result1 = mysqli_query($connection1, $query1);
            
            if ($re = mysqli_fetch_assoc($result1)) {

            ?>
                <form method="post">
                    <label for="Nombre">Nombre del laboratorio:</label>
                    <br>
                    <input type="text" id="Nombre" name="Nombre" required value="<?php echo $re['LABORATORIO']; ?>" class="text">
                    <br />
                    <label for="Propietario">Propietario:</label>
                    <br>
                    <input type="text" id="Propietario" name="Propietario" required value="<?php echo $re['PROPIETARIO']; ?>" class="text">
                    <br />
                    <label for="RFC">RFC:</label>
                    <br>
                    <input type="text" id="RFC" name="RFC" required value="<?php echo $re['RFC_CLINICA']; ?>" class="text" readonly>
                    <br />
                    <label for="TELEFONO">Telefono:</label>
                    <br>
                    <input type="number" id="TELEFONO" name="TELEFONO" required value="<?php echo $re['TELEFONO']; ?>" class="text">
                    <br />
                    <label for="CORREO">Correo:</label>
                    <br>
                    <input type="email" id="CORREO" name="CORREO" required value="<?php echo $re['CORREO']; ?>" class="text">
                    <br />
                    <input type="submit" id="Enviar" name="Enviar" class="boton" value="Actualizar datos">
                </form>


            <?php
            }
            if (isset($_POST["Enviar"])) {
                $Nombre_Laboratorio = $_POST["Nombre"];
                $Propietario = $_POST["Propietario"];
                $Telefono = $_POST["TELEFONO"];
                $Correo = $_POST["CORREO"];

                $query2 = "UPDATE `LABORATORIO_INFORMACION` SET 
                `LABORATORIO`='$Nombre_Laboratorio',`PROPIETARIO`='$Propietario',`TELEFONO`='$Telefono',`CORREO`='$Correo'
                 WHERE RFC_CLINICA='" . $RFC_CLINICA . "';";
                $connection2 = mysqli_connect(server, user, password, database, port);
                $result2 = mysqli_query($connection2, $query2);
                if ($result2) {
                    echo "<script>
                        swal.fire({
                        position: 'center',
                        title: 'Buen trabajo',
                        icon: 'success',
                        }).then(function(){
                        document.location.href='LaboratorioInformacion.php';
                        });
                        </script>";
                    //   Activacion();
                }
                //   Activacion();
            }

          //  Activacion();

            ?>
        </center>
    </div>
</body>

</html>