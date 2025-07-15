<?php

include("conexion.php");

$cod = $_SESSION['usuario'];

// Configuración de la paginación
$registros_por_pagina = 4; // Número de registros por página
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1; // Página actual, por defecto 1
$inicio = ($pagina_actual - 1) * $registros_por_pagina; // Cálculo del offset

// Consulta principal con LIMIT para la paginación
$sql = "SELECT a.*, c.* 
        FROM alumno a, comentario c
        WHERE a.codalumno = c.codalumno AND a.codalumno = '$cod'
        LIMIT $inicio, $registros_por_pagina";

$f = mysqli_query($cn, $sql);

// Obtener el total de registros para calcular las páginas
$total_registros_query = "SELECT COUNT(*) AS total FROM alumno a, comentario c WHERE a.codalumno = c.codalumno AND a.codalumno = '$cod'";
$total_registros_result = mysqli_query($cn, $total_registros_query);
$total_registros = mysqli_fetch_assoc($total_registros_result)['total'];
$total_paginas = ceil($total_registros / $registros_por_pagina); // Total de páginas
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
    <link rel="stylesheet" href="css/estilovistas.css">
   
</head>
<body>
    <center>
        <table border="1" cellspacing="0" align="center" bgcolor="white" width="800">
            <tr>
                <th>Fecha</th>
                <th>Tipo de Consulta</th>
                <th>Descripción</th>
                <th>Estado</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($f)) { ?>
                <tr>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['opcion']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php 
                    if ($row["estado"]=="Enviado") {
                        echo "<img src='img/enviado2.png' alt='Enviado' title='Enviado' width='30'>";
                    }elseif ($row["estado"]== "Leido") {
                        echo "<img src='img/Leido2.png' alt='Leído' title='Leído' width='30'>";
                    }?></td>

                    
                </tr>
            <?php } ?>
        </table>

        <!-- Paginación -->
        <div class="pagination">
            

            <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
                <a href="?pagina=<?php echo $i; ?>" style="margin: 0 5px; <?php echo $i == $pagina_actual ? 'font-weight: bold; color: red;' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php } ?>

            
        </div>
    </center>
</body>
</html>