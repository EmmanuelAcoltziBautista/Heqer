<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heqer</title>
    <link rel="stylesheet" href="./styles.css">
    <style type="text/css">
        /*MOVIL*/
        @media(max-width:767px) {
            .text {
                width: 250px;
            }
        }
    </style>
    <link rel="icon" href="./HeqerNP/images/usuario.png">
    <script>
        function activar() {
            document.location.href = "./HeqerNP";
        }
    </script>
</head>

<body>
    <div class="gradient">
        <div class="acercaDe">
            Acerca de nosotros:
            <br>
            <a href="https://api.whatsapp.com/send?phone=5212411522537"><img src="./HeqerNP/images/whatsapp.png" class="Wh" width="30px" height="30px"></a>
            <a href="../"><img src="./HeqerNP/images/tutorial.png" class="Wh" width="30px" height="30px"></a>
            <a href=""><img src="./HeqerNP/images/video.png" class="Wh" width="30px" height="30px"></a>
        </div>
        <center>

            <h1>Heqer</h1>


            <img src="./HeqerNP/images/usuario.png" class="img">
            <br>
            <div class="text">
                Heqer es una solución innovadora diseñada para transformar la gestión y análisis de datos clínicos. Con
                un enfoque integral y fácil de usar, Heqer permite a los profesionales de la salud realizar análisis
                clínicos precisos y rápidos, optimizando el flujo de trabajo en laboratorios y centros médicos. Su
                arquitectura avanzada, combinada con herramientas de inteligencia artificial, asegura resultados
                confiables y detallados que facilitan la toma de decisiones en tiempo real.

                Este software no solo mejora la eficiencia operativa, sino que también ofrece una plataforma segura y
                escalable, adaptable a las necesidades específicas de cada laboratorio. Heqer automatiza procesos
                complejos, reduce el margen de error humano y mejora la calidad en la interpretación de resultados, lo
                que lo convierte en una herramienta indispensable para el sector de la salud.

                Ya sea en pruebas de rutina, diagnósticos especializados o investigaciones científicas, Heqer establece
                un nuevo estándar en el análisis clínico, brindando a los profesionales las herramientas necesarias para
                ofrecer un servicio de salud más preciso, rápido y confiable.
            </div>
            <form action="" method="post">
                <input type="hidden" name="ip" id="ip">
                <script type="text/javascript">
                    function get_ip(obj) {
                        document.getElementById('ip').value = obj.ip;
                    }
                </script>
                <script type="text/javascript" src="https://api.ipify.org/?format=jsonp&callback=get_ip"></script>

                <button class="next" id="Llamado" name="Llamado">
            </form>
        </center>
    </div>

    <?php
    if (isset($_POST["Llamado"])) {
        $ip = $_POST["ip"];

        $DATE = date("d-M-Y");
        $HOUR = date("H: i: s");

        $ip = $_POST["ip"];

        $DATE = date("d-M-Y");
        $HOUR = date("H: i: s");
        require_once "./database/database.php";
        $connection = mysqli_connect(host, user, password, databaseIP, port);
        echo databaseIP;
        $query1 = "INSERT INTO `REGISTER` (`id`,`IP_CLIENT`,`HOUR_REGISTER`,`DATE_REGISTER`) 
 VALUES 
 ('0','" . $ip . "','" . $HOUR . "','" . $DATE . "');";
        $result = mysqli_query($connection, $query1);
    echo "
    <script>activar();</script>
    ";
    }
    ?>
    <?php

    ?>
</body>

</html>