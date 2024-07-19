<?php
// Incluir el archivo de conexión a la base de datos
include 'php/conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Verificar si la nueva contraseña y la confirmación coinciden
    if ($newPassword !== $confirmPassword) {
        $error_message = "La nueva contraseña y la confirmación no coinciden.";
    } else {
        // Crear una consulta SQL para verificar el usuario por correo y contraseña anterior.
        $sql = "SELECT * FROM registro WHERE email = ? AND password = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$email, $oldPassword]);
        $user = $stmt->fetch();

        // Verificar si el usuario existe y la contraseña anterior es correcta
        if ($user) {
            // Actualizar la contraseña en la base de datos
            $updateSql = "UPDATE registro SET password = ? WHERE email = ?";
            $updateStmt = $con->prepare($updateSql);
            $updateStmt->execute([$newPassword, $email]);

            // Redireccionar o mostrar un mensaje de éxito
            header("Location:login.php");
            exit();
        } else {
            // Mostrar un mensaje de error
            $error_message = "Correo electrónico o contraseña anterior incorrectos.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Bancoop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/contraseña.css'>
    <link rel="shortcut icon" href="Imagenes/logo.png">
    <script src='js/contraseña.js'></script>
</head>
<body>
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validarReset()" id="resetForm">
        <h2>Recuperar Contraseña</h2>
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="oldPassword">Contraseña Anterior:</label>
        <input type="password" id="oldPassword" name="oldPassword" required>

        <label for="newPassword">Nueva Contraseña:</label>
        <input type="password" id="newPassword" name="newPassword" required>

        <label for="confirmPassword">Confirmar Contraseña:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required><br><br><br>

        <button type="submit">Restablecer Contraseña</button>
    </form>
  </div>
</body>
</html>
