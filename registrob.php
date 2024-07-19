<?php

include 'php/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    
    
    if (!preg_match('/^\d{10}$/', $telefono)) {
        echo "El número de teléfono debe tener 10 dígitos.";
        exit();
    }

    
    $sql = "INSERT INTO registro (Nombres, Apellidos, Telefono, Correo, Contraseña) VALUES (?, ?, ?, ?, ?)";
    
    
    $stmt = $con->prepare($sql);
    
    
    $stmt->execute([$nombres, $apellidos, $telefono, $correo, $password]);
    
   
    header("Location:login.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoop</title>
    <link rel="stylesheet" href="./css/registrob.css">
</head>
<body>
    <div class="container">
        <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
            <h2>Registrate Con Nosotros!</h2>

            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="password">Contraseña:</label>
            <div class="password-container">
                <input type="password" id="password" name="password" required>
                <i class="password-toggle" id="togglePassword"></i>
            </div><br><br>

            <button type="submit">Registrarme</button>
        </form>
    </div>
    <div class="volver-container">
        <button onclick="window.location.href='inicio.php'">Volver</button>
    </div>

    <script>
        // Capitalize the first letter of each word in names and surnames
        document.getElementById('nombres').addEventListener('keyup', function(event) {
            this.value = this.value.replace(/(?:^|\s)\S/g, function(a) {
                return a.toUpperCase();
            });
        });

        document.getElementById('apellidos').addEventListener('keyup', function(event) {
            this.value = this.value.replace(/(?:^|\s)\S/g, function(a) {
                return a.toUpperCase();
            });
        });

        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });

        // Client-side validation for phone number
        function validateForm() {
            var telefono = document.getElementById('telefono').value;
            if (!/^\d{10}$/.test(telefono)) {
                alert("El número de teléfono debe tener 10 dígitos.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
