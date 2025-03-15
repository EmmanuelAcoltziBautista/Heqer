
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
            if (!empty($_GET["ID"])) {

                require_once "../Database/Basedatos.php";
                $conex = mysqli_connect(server, user, password, database, port);
                $id_Empleado = $_GET["ID"];

                $que = "DELETE FROM `PERSONAL` WHERE ID='$id_Empleado'";
                $resu = mysqli_query($conex, $que);

 
                header('Location:Usuarios.php');
            }
            ?>
