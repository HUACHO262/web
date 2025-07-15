<?php
include("auth.php");
include("conexion.php");

$cod = $_SESSION['usuario'];
$tipo =$_POST['lstcomentario'];
$descripcion = $_POST['txtdescrip'];

date_default_timezone_set('America/Lima');

// Obtener la fecha y hora actual
$fecha = date('Y-m-d H:i:s'); // Formato de fecha: Año-Mes-Día
$estado = "Enviado";




$sql = "INSERT into comentario(codalumno,opcion,descripcion,fecha,estado)
values('$cod','$tipo','$descripcion','$fecha','$estado')";

mysqli_query($cn,$sql);

header('location: comentario.php');





?>