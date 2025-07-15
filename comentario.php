<?php

include("auth.php");
include("conexion.php");
include("cabecera.php");

$cod=$_SESSION["usuario"]; // obtiene al usuario

$sql="SELECT a.*,c.* 

 from alumno a, comentario c
  where a.codalumno = c.codalumno
  and a.codalumno = '$cod'";//consulta

$f=mysqli_query($cn,$sql);// ejecuta la consulta

$r=mysqli_fetch_assoc($f);// asocia la consulta



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACTANOS</title>
</head>
<body>  
    
    <center>
   
   
   
    
    

<br>
<form action="p_comentario.php" method="post">
<table border="1" cellspacing="0" align="center" bgcolor="lightblue" width="600">
    <tr>
        <td>TIPO DE CONSULTA:</td>
        <td colspan="2">
            <select name="lstcomentario" id="">
                <option value="">SELECIONA UNA OPCION</option>
                <option value="Sugerencia">SUGERENCIA</option>
                <option value="Consulta">CONSULTA</option>
                <option value="Queja">QUEJA</option>
            </select>
        
    </tr>
    <tr>
        <td>Descripcion</td>
        <td colspan="2"><input type="text" name="txtdescrip" size="60"  id=""></td>
        
    </tr>
    
</table>
<br>

<button type="submit" id="boton" >ENVIAR</button>
</form>
</center>   


<div>

 <?php include("comentariovista.php");?>
</div>
<br>
        




    


  




</body>
</html>