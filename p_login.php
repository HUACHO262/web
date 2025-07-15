<?php 

session_start();

include("conexion.php");

$usu=$_POST['txtusuario'];
$pass=$_POST['txtpass'];


$sql = "SELECT * FROM usuario WHERE codalumno = '$usu' AND passwoard = '$pass'";


$f=mysqli_query($cn, $sql);

$r=mysqli_fetch_assoc($f);

$valor=$r["codalumno"];

if ($valor==null) {
    header('location: index.php');
} else {

    $_SESSION["usuario"]=$valor;
    $_SESSION["auth"]=1;

    header("location: principal.php");
}



?>