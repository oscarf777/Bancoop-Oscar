<?php


include('conecta.php');
$conecta = conectar();

// Consulta para obtener el registro específico
$sql = "SELECT * FROM registro WHERE id=''";
$result = mysqli_query($conecta, $sql);
if (!$result) {
    echo "<div class='alert alert-danger mt-3'>Error al consultar la base de datos.</div>";
    exit; // Termina la ejecución del script si hay error en la consulta
}
$row = mysqli_fetch_object($result);

// Verificar si se ha enviado el formulario
if(isset($_POST['submit'])){
    // Procesar la actualización del registro
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];
    $rol = $_POST["rol"];
    
    $tbl = "registro";
    $actualiza = "UPDATE $tbl SET Nombres= '$nombres', Apellidos='$apellidos', Telefono='$telefono', Correo='$correo', Contraseña='$contraseña', Rol='$rol' WHERE id='$id'";
    
    mysqli_query($conecta, $actualiza) or die ("NO SE LOGRA ACTUALIZAR REGISTRO". mysqli_error($conecta));
    
    echo "<div class='alert alert-success mt-3'>REGISTRO ACTUALIZADO CON ÉXITO</div>";
    header("Location: index.php"); // Redirige a la página principal después de actualizar
    exit; // Termina la ejecución después de redirigir
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Editar Registros con Función PHP</h1>
        <br><br>
        <form action="" method="post">
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" class="form-control" id="nombres" value="<?php echo isset($row->Nombres) ? $row->Nombres : ''; ?>" name="nombres">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" value="<?php echo isset($row->Apellidos) ? $row->Apellidos : ''; ?>" name="apellidos">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" value="<?php echo isset($row->Telefono) ? $row->Telefono : ''; ?>" name="telefono">
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" value="<?php echo isset($row->Correo) ? $row->Correo : ''; ?>" name="correo">
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" class="form-control" id="contraseña" value="<?php echo isset($row->Contraseña) ? $row->Contraseña : ''; ?>" name="contraseña">
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select class="form-control" id="rol" name="rol">
                    <option value="1" <?php if(isset($row->Rol) && $row->Rol == '1') echo 'selected'; ?>>1</option>
                    <option value="2" <?php if(isset($row->Rol) && $row->Rol == '2') echo 'selected'; ?>>2</option>
                    <option value="3" <?php if(isset($row->Rol) && $row->Rol == '3') echo 'selected'; ?>>3</option>
                    <option value="4" <?php if(isset($row->Rol) && $row->Rol == '4') echo 'selected'; ?>>4</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success float-right" name="submit">Actualizar</button>
            <a href="index.php" class="btn btn-warning float-left">Atrás</a>
        </form>
    </div>
</body>
</html>
