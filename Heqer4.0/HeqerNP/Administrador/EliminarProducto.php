
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
<?php
            if (!empty($_GET["id_Producto"])) {

                require_once "../Database/Basedatos.php";
                $conex = mysqli_connect(server, user, password, database, port);
                $id_Producto = $_GET["id_Producto"];

                $que = "DELETE FROM `INVENTARIO` WHERE ID='$id_Producto'";
                $resu = mysqli_query($conex, $que);

 
                header('Location:Inventario.php');
            }
            ?>
