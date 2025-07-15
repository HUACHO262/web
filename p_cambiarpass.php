<?php
include("auth.php");
include("conexion.php");


$cod = $_SESSION["usuario"];

$pass = $_POST["txtpass"];
$repass = $_POST["txtrepass"];

if (strcmp($pass,$repass)==0) {
    
        if (strlen($pass)==8) {
    $sql = "UPDATE usuario 
    set passwoard = '$pass'
    where codalumno = '$cod'";

    mysqli_query($cn,$sql);

    header('location: cerrarsesion.php');
    
      }else {
    header('location: cambiarpass.php');
}

}else {
    header('location: cambiarpass.php');
}


?>