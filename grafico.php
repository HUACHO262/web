<?php
//biblioteca GD, que es una biblioteca gráfica integrada en PHP para la creación de imágenes
// Incluye las conexiones y autenticaciones necesarias
include("auth.php");
include("conexion.php");


$cod = $_SESSION["usuario"]; // Obtiene al usuario

$sql = "SELECT a.*, n.* 
        FROM alumno a, nota n
        WHERE a.codalumno = n.codalumno
        AND a.codalumno = '$cod'"; // Consulta

$f = mysqli_query($cn, $sql); // Ejecuta la consulta

$r = mysqli_fetch_assoc($f); // Asocia la consulta

// Datos para el gráfico
$practicas = ["PRAC 1", "PRAC 2", "PRAC 3", "PRAC 4"]; // Nombres de las prácticas
$notas = [$r['n1'], $r['n2'], $r['n3'], $r['n4']]; // Puntajes de las prácticas

// Crear la imagen
$width = 500;
$height = 300;
$image = imagecreate($width, $height);

// Colores
$backgroundColor = imagecolorallocate($image, 55, 255, 88); // Fondo verde
$barColor = imagecolorallocate($image, 0, 102, 204); // azul para las barras
$textColor = imagecolorallocate($image, 0, 0, 0); // Negro para el texto

// Definir la posición de las barras
$barWidth = 60; // Ancho de cada barra
$spacing = 120; // Espacio entre las barras
$xOffset = 50; // Desplazamiento horizontal inicial
$yOffset = $height - 50; // Desplazamiento vertical para las barras (50px desde la base)

// Dibujar las barras
foreach ($notas as $index => $value) {
    imagefilledrectangle($image, 
        $xOffset + ($index * $spacing), 
        $yOffset - $value, 
        $xOffset + ($index * $spacing) + $barWidth, 
        $yOffset, 
        $barColor
    );
    
    // Agregar las etiquetas debajo de las barras (las prácticas)
    imagestring($image, 5, 
        $xOffset + ($index * $spacing) + ($barWidth / 2) - 10, 
        $yOffset + 5, 
        $practicas[$index], 
        $textColor
    );

    // Agregar los valores encima de las barras (las notas)
    imagestring($image, 5, 
        $xOffset + ($index * $spacing) + ($barWidth / 2) - 10, 
        $yOffset - $value - 20, 
        $value, 
        $textColor
    );
}

// Establecer el tipo de contenido de la respuesta
header('Content-Type: image/png');

// Mostrar la imagen
imagepng($image);

// Liberar la memoria
imagedestroy($image);


?>