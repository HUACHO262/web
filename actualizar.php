li<?php

include("auth.php");
include("conexion.php");
include("cabecera.php");

$cod=$_SESSION["usuario"]; // obtiene al usuario

$sql="SELECT a.*,d.* 

 from alumno a, datoespecifico d
  where a.codalumno = d.codalumno
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
    <link rel="stylesheet" href="css/estiloact.css"</link>
</head>
<body>
    <br>
    <center>
    BIENVENIDO <?php echo $r['paterno'] . " " . $r['materno'] . " " . $r['nombre']?>
   
    <br>
    
    
<?php
    
?>
<br>
<form action="p_actualizar.php" method="post">
<table border="1" cellspacing="0" align="center" bgcolor="lightblue" width="600">
    <tr>
        <td>CORREO</td>
        <td colspan="2">
            <input type="email" name="txtcorreo" size="60" value="<?php echo $r['correo'];?>" id="">
        </td>
        
    </tr>
    <tr>
        <td>DIRECCION</td>
        <td colspan="2"><input type="text" name="txtdireccion" size="60" value="<?php echo $r['direccion'];?>" id=""></td>
        
    </tr>
    <tr>
        <td>Celular</td>
        <td>F.NACIMIENTO</td>
        <td>SEXO</td>
    </tr>
    <tr>
        <td><input type="tel" name="txttelefono" size="60" value="<?php echo $r['telefono'];?>" id=""></td>
        <td><input type="date" name="txtfecha" size="60" value="<?php echo $r['fechanacimiento'];?>" id=""></td>
        <td>
            <?php
            $valorM = "";
            $valorF="";
            
            if ($r['sexo']=='M') {
                $valorM ="checked";
            }else {
                $valorF = "checked";
            }
            
            ?>
        
        
        <input type="radio" name="opcsexo" value="M" <?php echo $valorM?> id="">MASCULINO
         <input type="radio" name="opcsexo" value="F" <?php echo $valorM?> id="">FEMENINO</td>
    </tr>
</table>
<br>

<button type="submit" id="boton" >ACTUALIZAR</button>
</form>
</center>
<br>
<br>

    


  




</body>
</html>