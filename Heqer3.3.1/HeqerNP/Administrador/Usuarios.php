<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
if ($user == null and $pass == null) {
    header('Location:../');
}
?>
<?php
require_once "../Database/Basedatos.php";
$conexionbd = mysqli_connect(server, user, password, database, port);
$query = "SELECT * FROM `USUARIOS`;";
$resultado = mysqli_query($conexionbd, $query);

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
        table{
            color:#fff;
        }
td{
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
        <a href="./">Regresar</a>
        <a href="../exit/ExitSession.php">Cerrar sesión</a>
        <center>
            <h1>Empleados</h1>
 <nav>
            <table id="Empleado" name="Empleado">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Acceso</th>
    <th>Contraseña</th>
    <th>Eliminar</th>
</tr>
<ul>
<?php
                    while ($res = mysqli_fetch_assoc($resultado)) {
                        $id_Empleado=$res["ID"];
                        echo "<tr><td>" . $res["ID"] . "</td><td>" . 
                        $res["NOMBRE"] . "</td><td>" . $res["SECTOR"] . "</td><td>"
                        .$res["CONTRASENA"].
                        '</td><td><a href="Eliminar.php?ID='.$id_Empleado.'" class="botonEliminar">Eliminar</a></td></tr>';
                    }
                    ?>
            </ul>   
            </table>
            </nav>
    </div>
</body>

</html>