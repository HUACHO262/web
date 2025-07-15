<?php
include("auth.php");
include("conexion.php");
include("cabecera.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$cod = $_SESSION["usuario"];
$sql = "SELECT a.*, d.*
FROM alumno a
JOIN datoespecifico d ON a.codalumno = d.codalumno
WHERE a.codalumno = '$cod'";

$f = mysqli_query($cn, $sql);
if (!$f) {
    die("Error en la consulta: " . mysqli_error($cn));
}

$r = mysqli_fetch_assoc($f);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Alumno</title>
</head>

<body>
    <br>
    <center>
        Bienvenido(a) <?php echo htmlspecialchars($r["nombre"] . " " . $r["paterno"] . " " . $r["materno"]); ?>
    </center>
    <br>

    <table border="1" cellspacing="0" align="center" bgcolor="lightblue" width="600">
        <tr>
            <td rowspan="6" align="center" valign="middle">
                <img src="img_alumno/<?php echo htmlspecialchars($r["codalumno"]); ?>.png" width="200" height="200">
            </td>
            <td align="right">CODIGO</td>
            <td><?php echo htmlspecialchars($r["codalumno"]); ?></td>
        </tr>
        <tr>
            <td align="right">AP. PATERNO</td>
            <td><?php echo htmlspecialchars($r["paterno"]); ?></td>
        </tr>
        <tr>
            <td align="right">AP. MATERNO</td>
            <td><?php echo htmlspecialchars($r["materno"]); ?></td>
        </tr>
        <tr>
            <td align="right">NOMBRES</td>
            <td><?php echo htmlspecialchars($r["nombre"]); ?></td>
        </tr>
        <tr>
            <td align="right">ESCUELA</td>
            <td><?php echo htmlspecialchars($r["escuela"]); ?></td>
        </tr>
        <tr>
            <td align="right">AULA</td>
            <td><?php echo htmlspecialchars($r["aula"]); ?></td>
        </tr>
    </table>

    <br>
    <?php if ($r["estado"] == 0): ?>
        <center><h1 style='color:white;'>ACTUALICE SUS DATOS ESPECÍFICOS</h1></center>
    <?php else: ?>
        <table align="center" border="1" cellspacing="0" bgcolor="lightblue" width="600">
            <tr>
                <td>CORREO:</td>
                <td colspan="2"><?php echo htmlspecialchars($r["correo"]); ?></td>
            </tr>
            <tr>
                <td>DIRECCIÓN:</td>
                <td colspan="2"><?php echo htmlspecialchars($r["direccion"]); ?></td>
            </tr>
            <tr>
                <td>CELULAR:</td>
                <td>F. NACIMIENTO</td>
                <td>SEXO</td>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($r["telefono"]); ?></td>
                <td><?php echo htmlspecialchars($r["fechanacimiento"]); ?></td>
                <td><?php echo htmlspecialchars($r["sexo"]); ?></td>
            </tr>
        </table>
    <?php endif; ?>
</body>
</html>
