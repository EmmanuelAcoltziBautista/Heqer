<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
$sector = $_SESSION["sector"];
global $RFC_CLINICA, $resultado;
$RFC_CLINICA = $_SESSION['RFC_CLINICA'];

//global $RFC_CLINICA1 = $_SESSION['RFC_CLINICA'];
if ($sector != "Administrador") {
    header('Location:../');
}

if ($user == null and $pass == null) {
    header('Location:../');
}
?>
<?php
require_once "../Database/Basedatos.php";
function recarga()
{
    global $RFC_CLINICA, $resultado;
    $conexionbd = mysqli_connect(server, user, password, database, port);
    $query = "SELECT * FROM `INVENTARIO` WHERE RFC_CLINICA='" . $RFC_CLINICA . "';";
    $resultado = mysqli_query($conexionbd, $query);
}
recarga();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heqer</title>
    <link rel="stylesheet" href="../estilosCss/alert.css">
    <script src="../js/alert.js"></script>
    <link rel="icon" href="../images/usuario.png">

    <link rel="stylesheet" href="../estilosCss/estilos1.css">

    <style type="text/css">
        select {
            font-size: 20px;
            margin: 3px;
            padding: 3px;

        }

        table {
            color: #fff;
        }

        td {
            padding: 10px
        }

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
            <h1>Inventario</h1>

            <form action="" method="post">
                <h1>Agregar nuevo producto</h1>
                <input type="text" name="Nombre" id="Nombre" placeholder="Nombre" class="text">
                <input type="number" name="Stock" id="Stock" placeholder="Stock" class="text">
                <br>
                <input type="submit" value="Agregar" class="boton" name="Agregar" id="Agregar">
            </form>


            <?php
            if (isset($_POST["Agregar"])) {

                $connection1 = mysqli_connect(server, user, password, database, port);
                $Nombre = $_POST["Nombre"];
                $Stock = $_POST["Stock"];
                $query1 = "INSERT INTO `INVENTARIO` (`ID`,`NOMBRE`,`STOCK`,`RFC_CLINICA`)
                 VALUES ('0','" . $Nombre . "','" . $Stock . "' ,'" . $RFC_CLINICA . "');";
                $result1 = mysqli_query($connection1, $query1);
                if ($result1) {
                    echo "<script>
                    var con='Listo se ha actualizado';
swal.fire(
    {
        position:'center',
        title:con,    
        icon:'success',
    }
    );
I
                    </script>";
                }
                recarga();
            }


            ?>




            <nav>
                <h1>Lista de productos</h1>
                <table id="Empleado" name="Empleado">
                    <tr>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Actuzalizar</th>
                        <th>Eliminar</th>
                    </tr>
                    <ul>
                        <?php
                        while ($res = mysqli_fetch_assoc($resultado)) {

                            echo "<tr><td>" .
                                $res["NOMBRE"] . "</td><td>"
                                . $res["STOCK"] .
                                '</td><td>
                                <a href="EditarInventario.php?id_Producto=' . $res["ID"] . '" class="botonActualizar">Actualizar</a>
                                </td>
                                <td>
                                <a href="EliminarProducto.php?id_Producto=' . $res["ID"] . '" class="botonEliminar">Eliminar</a>
                                </td></tr>';
                        }
                        ?>
                    </ul>
                </table>
            </nav>


    </div>
</body>

</html>