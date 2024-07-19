<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['nombres']) && isset($_POST['correo']) && isset($_POST['tipo']) && isset($_POST['mensaje'])) {
        
        $nombres = $conn->real_escape_string(trim($_POST['nombres']));
        $correo = $conn->real_escape_string(trim($_POST['correo']));
        $tipo = $conn->real_escape_string(trim($_POST['tipo']));
        $mensaje = $conn->real_escape_string(trim($_POST['mensaje']));

        $stmt = $conn->prepare("INSERT INTO pqrs (Nombres, Correo, Tipo, Mensaje) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombres, $correo, $tipo, $mensaje);

        if ($stmt->execute()) {
            echo "Nuevo registro creado exitosamente";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: Todos los campos son obligatorios.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PQRS</title>
    <link rel="stylesheet" href="css/pqrs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="container-img">
            <img src="img\logo2.png" alt="Imagen del encabezado">
        </div>
        <div class="enlaces">
            <ul>
                <a href="banco.php" class="btn"><i class="fa-solid fa-reply"></i></a>
                <li class="listas"><a href="calificanos.php">Califícanos</a></li>
                <li class="listas"><a href="#">Contacto</a></li>
                <li class="listas"><a href="#">Correo</a></li>
                <li class="promociones"><a href="#">Atención al cliente</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="registro">
                <h1>Formulario PQRS</h1>
                <form action="" method="post">
                    <div class="campo">
                        <label for="nombres">Nombres:</label>
                        <input type="text" id="nombres" name="nombres" required>
                    </div>
                    <div class="campo">
                        <label for="correo">Correo:</label>
                        <input type="email" id="correo" name="correo" required>
                    </div>
                    <div class="campo">
                        <label for="tipo">Tipo:</label>
                        <select id="tipo" name="tipo" required>
                            <option value="Petición">Petición</option>
                            <option value="Queja">Queja</option>
                            <option value="Reclamo">Reclamo</option>
                            <option value="Sugerencia">Sugerencia</option>
                        </select>
                    </div>
                    <div class="campo">
                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
                    </div>
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </main>
    
</body>

<footer>
        
        <p><i class="fa-solid fa-tty"></i> Contáctenos a la Línea gratuita 018000-00001 o al Correo electronico  Bancoop_@gmail.com</p>
        <p>Banco de entídad financiera - Todos los derechos reservados.</p>

        <div class="link-container">
        <h5><a href="terminos.php ">Aplican terminos y condiciones</a></h5> 
      </div>
        
    </footer>

</html>
