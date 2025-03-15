<!--
Created-By: Emmanuel Acoltzi Bautista
Date: 13-07-2024



-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heqer</title>
    <script src="./js/alert.js"></script>

    <link rel="stylesheet" href="./estilosCss/alert.css">
    <link rel="icon" href="./images/usuario.png">
    <link rel="stylesheet" href="./estilosCss/estilos1.css">

    <style>
        .logo {
            width: 200px;
            height: 200px;
        }

        @media(max-width:767px) {
            .logo {
                width: 190px;
                height: 190px;

            }

            form {
                width: 350px;
            }

        }

        .Tutorial {
            display: inline-flex;
        }

        .Wh {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <div class="gradiente">
        <div class="acercaDe">
            Acerca de nosotros:
            <br>
            <a href="https://api.whatsapp.com/send?phone=5212411522537"><img src="./images/whatsapp.png" class="Wh" width="30px" height="30px"></a>
            <a href="../../TheBoringLife"><img src="./images/tutorial.png" class="Wh"></a>
            <a href=""><img src="./images/video.png" class="Wh"></a>
        </div>
        <center>




            <h1>Heqer</h1>
            <h4>Versión 4.0</h4>
            <img src="images/usuario.png" class="logo">
            <form method="post">
                <label for="Usuario"><b>N. Usuario</b></label>
                <br>
                <input type="number" id="Usuario" name="Usuario" placeholder="Usuario:" required class="text">
                <br />

                <label for="Contrasena"><b>Contraseña</b></label>
                <br>
                <input type="password" id="Contrasena" name="Contrasena" placeholder="Contraseña:" required class="text">
                <br />
                <input type="hidden" name="ip" id="ip">


                <input type="submit" class="boton" id="Enviar" name="Enviar" value="Ingresar">
            </form>
            <script>
                function get_ip(obj) {
                    document.getElementById('ip').value = obj.ip;
                }
            </script>
            <script src="https://api.ipify.org/?format=jsonp&callback=get_ip"></script>



            <?php
            //En esta seccion pregunto si toco el boton
            
            if (isset($_POST["Enviar"])) {






                require_once "./Database/Basedatos.php";
                $conexionbd = mysqli_connect(server, user, password, database, port);
                $Usuario = $_POST["Usuario"];
                $Contrasena = $_POST["Contrasena"];
                


                $query = "SELECT * FROM `PERSONAL` WHERE ID=" . $Usuario . " AND CONTRASENA='" . $Contrasena . "';";
                $ConsultaUsuarios = mysqli_query($conexionbd, $query);
                if ($res = mysqli_fetch_assoc($ConsultaUsuarios)) {
                    $query2 = "SELECT `SECTOR`,`RFC_CLINICA` FROM `PERSONAL` WHERE ID=$Usuario";
                    $ConsultaSector = mysqli_query($conexionbd, $query2);
                    $r = mysqli_fetch_assoc($ConsultaSector);


                    if ($r["SECTOR"] == "Administrador") {
                        session_start();
                        $_SESSION['user'] = $Usuario;
                        $_SESSION['pass'] = $Contrasena;
                        $_SESSION['RFC_CLINICA']=$r["RFC_CLINICA"];
                        $_SESSION['sector'] = "Administrador";
                        header('Location: ./Administrador');
                    }
                    if ($r["SECTOR"] == "Laboratorista") {
                        session_start();
                        $_SESSION['user'] = $Usuario;
                        $_SESSION['pass'] = $Contrasena;
                        $_SESSION['sector'] = "Laboratorista";
                        $_SESSION['RFC_CLINICA']=$r["RFC_CLINICA"];

                        header('Location: ./Laboratorista');
                    }
                    if ($r["SECTOR"] == "Recepcion") {
                        session_start();
                        $_SESSION['user'] = $Usuario;
                        $_SESSION['pass'] = $Contrasena;
                        $_SESSION['sector'] = "Recepcionista";
                        $_SESSION['RFC_CLINICA']=$r["RFC_CLINICA"];

                        header('Location: ./Recepcionista');
                    }
                    /*            	if($r["SECTOR"]=="Contador"){
		header('Location: Contador.php');
	}
*/
                } else {
                    echo "<script>swal.fire(
                {
                    position:'center',
                    title:'Error',
                    icon:'warning',

            }
        );</script>";
                }

                AssignarIp();
            }

            ?>
            <?php

            function AssignarIp()
            {
                $ip=$_POST["ip"];

                $DATE = date("d-M-Y");
                $HOUR = date("H: i: s");
                require_once "../database/database.php";
                $connection = mysqli_connect(host, user, password, databaseIP, port);
                //echo databaseIP;
                $query1 = "INSERT INTO `REGISTER` (`id`,`IP_CLIENT`,`HOUR_REGISTER`,`DATE_REGISTER`) 
             VALUES 
             ('0','" . $ip . "','" . $HOUR . "','" . $DATE . "');";
                $result = mysqli_query($connection, $query1);
            }
            ?>

    </div>
    <center>

</body>

</html>

<script src="./js/NoP.js">

</script>