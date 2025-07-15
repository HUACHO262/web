<?php

include("conexion.php");

$archivo=$_FILES["archivo"]["tmp_name"];//obtiene el archivo
$opcion = $_POST["lstpractica"];

$fila=file($archivo); // lee el archivo y extrae

for ($i=0; $i < count($fila); $i++) { // recorre el archivo

list($cod,$nota)=explode(";",$fila[$i]); //iteracion sobre cada linea 

//echo $cod." ".$nota . "<br>" ;        //."".$paterno."".$materno."".$esc."".$aula;
$sql = "Update nota
set n$opcion=$nota
where codalumno = '$cod'";

//echo $sql. "<br>"; 
mysqli_query($cn,$sql);

header('location: cargaevaluacion.php');

}


?>

