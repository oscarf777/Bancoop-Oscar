<?php
include('conecta.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conecta = conectar();

    
    $nombres = isset($_POST["Nombres"]) ? $_POST["Nombres"] : '';
    $apellidos = isset($_POST["Apellidos"]) ? $_POST["Apellidos"] : '';
    $telefono = isset($_POST["Telefono"]) ? $_POST["Telefono"] : '';
    $correo = isset($_POST["Correo"]) ? $_POST["Correo"] : '';
    $contraseña = isset($_POST["Contraseña"]) ? $_POST["Contraseña"] : '';
    $rol = isset($_POST["Rol"]) ? $_POST["Rol"] : '';

    
    if (empty($nombres) || empty($apellidos) || empty($telefono) || empty($correo) || empty($contraseña) || empty($rol)) {
        die("Error: Todos los campos son obligatorios.");
    }

   
    $sentencia = "INSERT INTO registro (Nombres, Apellidos, Telefono, Correo, Contraseña, Rol) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conecta, $sentencia);

   
    if ($stmt === false) {
        die("Error en la preparación de la sentencia: " . mysqli_error($conecta));
    }

    
    mysqli_stmt_bind_param($stmt, 'ssssss', $nombres, $apellidos, $telefono, $correo, $contraseña, $rol);

  
    if (mysqli_stmt_execute($stmt)) {
        echo "<div class='container mt-5'>";
        echo "<h1 class='text-center'>Registro Exitoso</h1>";
        echo "</div>";
    
        echo '<script>
                alert("Registro Exitoso.");
                setTimeout(function() {
                    window.location.href = "index.php"; 
                }, 1000); // 1000 milisegundos = 1 segundo
              </script>';
    } else {
        die("Error al insertar el registro: " . mysqli_stmt_error($stmt));
    }
     {
        die("NO SE LOGRA INSERTAR REGISTRO: " . mysqli_error($conecta));
    }

    
    mysqli_stmt_close($stmt);
    mysqli_close($conecta);
} else {
    
    echo "No se ha recibido el formulario correctamente.";
}
?>
