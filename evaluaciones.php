<?php

include("auth.php");
include("conexion.php");
include("cabecera.php");

$cod=$_SESSION["usuario"]; // obtiene al usuario

$sql="SELECT a.*,n.* 

 from alumno a, nota n
  where a.codalumno = n.codalumno
  and a.codalumno = '$cod'";//consulta

$f=mysqli_query($cn,$sql);// ejecuta la consulta

$r=mysqli_fetch_assoc($f);// asocia la consulta

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilonotas.css">
</head>
<body>
    <br>
    <center>
    BIENVENIDO <?php echo $r['paterno'] . " " . $r['materno'] . " " . $r['nombre']?>
    </center>
    <br>
    <table border="1" cellspacing="0" align="center" bgcolor="lightblue" width="600">
        <tr>
            <td rowspan="1" align="center" valign="middle">
                PRACTICAS 1
            </td>
            <td align="right">PUNTAJE</td>
          
        </tr>
        <tr>
            
            <td align="right">PRACTICA 1</td>
            <td align="center"><?php echo $r['n1']?></td>
        </tr>
        <tr>
            
            <td align="right">PRACTICA 2</td>
            <td align="center"><?php echo $r['n2']?></td>
        </tr>
        <tr>
            
            <td align="right">PRACTICA 3</td>
            <td align="center"><?php echo $r['n3']?></td>
        </tr>
        <tr>
            
            <td align="right">PRACTICA 4</td>
            <td align="center"><?php echo $r['n4']?></td>
        </tr>
       
    </table>
    <center><h2 style="color: greenyellow;">ESTADISTICAS DE PRACTICAS</h2></center>
      
    <div class="image-container" align="center">
           <img src="grafico.php" alt=" Grafico de Notas">

    </div>
    <br>
    <br>
    



    


  




</body>
</html>