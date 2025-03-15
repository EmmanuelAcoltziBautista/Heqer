
<?php
//CONNECTION WITH DATABASE

require_once "../Database/Basedatos.php";
//REESTART SESSION
session_start();

//COLLECT ARRAYS

$querys = array();
$i = $_SESSION["i"];
$CLAVE = $_SESSION["CLAVE"];
$preguntas = $_SESSION["PREGUNTAS"];
$respuestas = array();
$valores_referencia=$_SESSION["VALORES_DE_REFERENCIA"];
$RFC_CLINICA=$_SESSION['RFC_CLINICA'];


//ONE AT ONE

for ($i0 = 0; $i0 <= $i; $i0++) {
    $pregunta = $preguntas[$i0];
//    $valores=$valores_referencia[$i0];
    //    echo "<br/>" . $_POST[$pregunta];
    $respuestas[] = $_POST[$pregunta];
}


//INSERT ONE AT ONER


for ($i1 = 0; $i1 <= $i - 1; $i1++) {
    $query = "INSERT INTO `RESTUDIO` (`ID`,`CLAVE`,`PREGUNTA`,`RESPUESTA`,`VALORES_DE_REFERENCIA`,`RFC_CLINICA`) VALUES 
    ('0','$CLAVE','$preguntas[$i1]','$respuestas[$i1]','$valores_referencia[$i1]','$RFC_CLINICA')";
    $conexionbd = mysqli_connect(server, user, password, database, port);
    $result = mysqli_query($conexionbd, $query);
    $cerrar = mysqli_close($conexionbd);
}

header('Location:./LlenarEstudio.php');
?>
