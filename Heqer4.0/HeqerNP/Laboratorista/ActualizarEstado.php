<?php
session_start();
require_once '../Database/Basedatos.php';
$conexionbd = mysqli_connect(server, user, password, database, port);
if (!empty($_GET["ID"])) {
    $ID = $_GET["ID"];
    $query = "UPDATE `ALTAS` SET ESTADO='Finalizado' WHERE ID=" . $ID . ";";
    $resultado = mysqli_query($conexionbd, $query);
    if ($resultado) {
        echo "<script>document.location.href='Estudios.php'</script>";
    }
}
