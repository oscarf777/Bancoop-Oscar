<?php
include('conecta.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $codigo = intval($_POST['id']); 

    $conecta = conectar(); 

    
    $eliminar_registro = "DELETE FROM registro WHERE id = $codigo";

    if (mysqli_query($conecta, $eliminar_registro)) {
       
        echo '<script>
                alert("Registro eliminado.");
                setTimeout(function() {
                    window.location.href = "eliminados.php"; // Redirige a la página de eliminados
                }, 1000); // 1000 milisegundos = 1 segundo
              </script>';
    } else {
        
        echo "Error al eliminar el registro: " . mysqli_error($conecta);
    }

    mysqli_close($conecta); 
} else {
    echo "No se ha recibido el ID del registro.";
}
?>
