<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
$sector = $_SESSION["sector"];
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
            <h1>Actualizar</h1>

            <?php
            global $id_Producto;
            if (!empty($_GET["id_Producto"])) {
                $id_Producto = $_GET["id_Producto"];
            }
            require_once "../Database/Basedatos.php";
            $conexionbd = mysqli_connect(server, user, password, database, port);
            $query = "SELECT * FROM `INVENTARIO` WHERE ID=' $id_Producto ' AND RFC_CLINICA='" . $RFC_CLINICA . "';";
            $resultado = mysqli_query($conexionbd, $query);
            global $Nombre_Producto;
            global $Stock_Producto;

           // echo $query;
            if ($res = mysqli_fetch_assoc($resultado)) {
                $Nombre_Producto = $res["NOMBRE"];
                $Stock_Producto = $res["STOCK"];
            }

            ?>
            <form action="" method="post">
                <h1>EditarProducto</h1>
                <input type="text" id="Nombre" name="Nombre" value="<?php echo $Nombre_Producto; ?>" class="text">
                <input type="number" name="Stock" id="Stock" class="text" value="<?php echo $Stock_Producto; ?>">
                <br>
                <input type="submit" value="Agregar" class="boton" name="Actualizar" id="Actualizar">
            </form>
    </div>
    <?php

    if (isset($_POST["Actualizar"])) {

        $connection2 = mysqli_connect(server, user, password, database, port);
        $Nombre = $_POST["Nombre"];
        $Stock = $_POST["Stock"];
        $query2 = "UPDATE `INVENTARIO` SET `STOCK`='$Stock', `NOMBRE`='$Nombre'
                 WHERE `ID`='$id_Producto' and `RFC_CLINICA`='$RFC_CLINICA';";

        $result2 = mysqli_query($connection2, $query2);
        if ($result2) {
            echo "<script>
                    var con='Buen trabajo';
swal.fire(
    {
        position:'center',
        title:con,    
        icon:'success',
    }
        ).then(function(){
        document.location.href='Inventario.php';
        });
I
                    </script>";
        }
    }


    ?>
</body>

</html>