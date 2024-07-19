<?php 
include("conecta.php");
$conecta = conectar();

$consulta = "TRUNCATE TABLE registro";

// Ejecutar la consulta y verificar si se ejecutó correctamente
if (mysqli_query($conecta, $consulta)) {
    echo "<div class='contenedor margen-superior-5'>";
    echo "<p>LOS REGISTROS SE ELIMINARON CON ÉXITO.</p>";
    echo "<p><a class='boton boton-primario' href='javascript:history.go(-1)'>VOLVER ATRÁS</a></p>";
    echo "</div>";
} else {
    echo "<div class='contenedor margen-superior-5'>";
    echo "<p>NO SE LOGRA ELIMINAR LOS REGISTROS: " . mysqli_error($conecta) . "</p>";
    echo "<p><a class='boton boton-primario' href='javascript:history.go(-1)'>VOLVER ATRÁS</a></p>";
    echo "</div>";
}

// Cerrar la conexión
mysqli_close($conecta);
?>
