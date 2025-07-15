<?php

include("conexion.php");

$archivo=$_FILES["archivo"]["tmp_name"];

$fila=file($archivo);

for ($i=0; $i <count($fila) ; $i++) { 
    


list($cod,$nombre,$paterno,$materno,$esc,$aula)=explode(";",$fila[$i]);

//echo $cod." ".$nombre." ".$paterno."".$materno." ".$esc." ".$aula."<br>";

/*
$sqlalumno = "insert into alumno values ('$cod', '$nombre', '$paterno', '$materno', '$esc', '$aula')";

$sqlnota = "insert into nota(codalumno) values ('$cod')";

$pass = generapass();

$sqlusuario = "insert into usuario values ('$cod', '$pass')";

mysqli_query($cn, $sqlalumno);
mysqli_query($cn, $sqlnota);
mysqli_query($cn, $sqlusuario);
*/
$sql = "INSERT into datoespecifico(codalumno)
values ('$cod')";
mysqli_query($cn,$sql);
}



function generapass(){

//armate una plantilla
$plantilla = "qwertyuiopasdfghjklzxcvbnm1234567890";
$password = "";

//substr(cadena, posicion inicio, cuantos caraceres a extraer)
//rand(valor minimo, valor máximo)


    for ($i=1; $i < 8; $i++) { 

        $password = $password.substr($plantilla,rand(1,36),1);

    }

    return $password;
    
}

?>