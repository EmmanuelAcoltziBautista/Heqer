<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
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
    <link rel="stylesheet" href="../estilosCss/estilos1.css">
    <link rel="stylesheet" href="../estilosCss/Iconos.css">
    <link rel="icon" href="../images/usuario.png">

</head>

<body>
    <div class="gradiente">
        <a href="../exit/ExitSession.php">Cerrar sesión</a>
        <center>
            <h1>Administrador</h1>
            <nav>
                <a href="CrearUsuarios.php"><img class="img" src="../images/addUser.png">Agregar empleado</a>
                <br>
                <a href="EliminarUsuarios.php"><img class="img" src="../images/DeleteUser.png">Eliminar empleado</a>
                <br>
                <a href="Precios.php"><img class="img" src="../images/editar.png">Modificar Precios</a>
            </nav>

        </center>
    </div>
</body>

</html>