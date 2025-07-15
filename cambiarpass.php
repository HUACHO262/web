<?php

include("auth.php");
include("conexion.php");
include("cabecera.php");

$cod=$_SESSION["usuario"]; // obtiene al usuario




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilopass.css">
</head>
<body>
    
    <center>
    
   
    
    
    
<?php
    
?>
<br>
<form action="p_cambiarpass.php" method="post">

    <table border="1" cellspacing="0" align="center" bgcolor="lightblue" width="600">
        <tr>
            <td>Ingresar nueva contraseña</td>
            <td> <input type="password" name="txtpass"></td>
        </tr>
        <tr>
            <td>Repetir la contraseñá</td>
            <td><input type="password" name="txtrepass" id=""></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <center>

                <button type="submit" id="boton" >CAMBIAR CONTRASEÑA</button>
                </center>
                
            </td>
            
        </tr>
    </table>

</form>


  




</body>
</html>