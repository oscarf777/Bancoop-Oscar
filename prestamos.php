<?php
include 'php/conexion.php'; // Reemplaza 'php/conexion.php' con la ruta correcta a tu archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y limpiar datos del formulario
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = htmlspecialchars($_POST["email"]);
    $telefono = htmlspecialchars($_POST["telefono"]);
    $monto = htmlspecialchars($_POST["monto"]);
    $plazo = htmlspecialchars($_POST["plazo"]);

    // Validación de teléfono
    if (!preg_match('/^\d{10}$/', $telefono)) {
        echo "El número de teléfono debe tener 10 dígitos.";
        exit();
    }

    // Preparar y ejecutar la consulta SQL
    $sql = "INSERT INTO prestamos (Nombre, Email, Telefono, Monto, Plazo) VALUES (?, ?, ?, ?, ?)";

    try {
        $stmt = $con->prepare($sql);
        $stmt->execute([$nombre, $email, $telefono, $monto, $plazo]);
        echo "Préstamo guardado correctamente.";
        header("Location: login.php"); // Redireccionar a una página de éxito o login
        exit();
    } catch (PDOException $e) {
        echo "Error al guardar el préstamo: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bancoop</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css\prestamos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header>
        <div class="container-img">.
            <img src="img\logo2.png" alt="Logo">
        </div>
        <div class="enlaces">
            <ul>
                <a href="banco.php" class="btn"><i class="fa-solid fa-reply"></i></a>
                <li href="" class="btn">Servicios</li>
                <li href="" class="btn">Productos</li>
                <li href="" class="btn">Guarderia</li>
                <li href="" class="btn">Promociones</li>
            </ul>
        </div>
    </header>

    <section>
        <div class="container-articulo">
            <div class="articulos">
                <h2>Por que un dia seguro, seguro que es un gran dia! </h2>
                <img src="img\sura.webp" alt="seguros sura">
                <p>Quedate tranquilo que tu salud esta en nuestras manos!con nuestra poliza de seguros todo riesgo puedes estar tranquilo en todo momento garantizar la supervivencia y el bienestar de nuestros compañeros caninos. Desde su más tierna infancia hasta la etapa senior, es fundamental comprender y atender sus necesidades específicas. Fórmate con el Máster en Educación Animal y adquiere las habilidades necesarias para proporcionar una crianza responsable y una educación adecuada a tus queridos perros.</p>
                <a href="https://www.epssura.com/">Ver más...</a>
            </div>
            <div class="articulos">
                <h2>Consejos esenciales para ahorrar dinero con Bancoop</h2>
                <img src="img\ahorro.avif" alt="Consejos para tu ahorro">
                <p>Existen cuidados del perro que son fundamentales para garantizar su supervivencia y felicidad. En el Día Internacional del Perro, nos enfocamos en cómo atender las necesidades de nuestros fieles compañeros, desde su etapa de cachorros hasta su vida senior.</p>
                <a href="https://aratiendas.com/blog/hogar/10-consejos-para-el-cuidado-y-bienestar-de-tu-mascota/">Ver más...</a>
            </div>
        </div>

        <div class="container">
    <h1>Solicitud de Préstamo</h1><br><br>
    <form action="guardar_prestamo.php" method="post" id="solicitudForm">
        <div class="campo">
            <label for="nombre">Nombre completo:</label>
            <input class="container-input" type="text" id="nombre" name="nombre" required>
        </div>

        <div class="campo">
            <label for="email">Correo electrónico:</label>
            <input class="container-input" type="email" id="email" name="email" required>
        </div>

        <div class="campo">
            <label for="telefono">Teléfono:</label>
            <input class="container-input" type="text" id="telefono" name="telefono" required>
        </div>

        <div class="campo">
            <label for="monto">Monto solicitado:</label>
            <input class="container-input" type="text" id="monto" name="monto" required>
        </div>

        <div class="campo">
            <label for="plazo">Plazo de pago:</label>
            <select class="container-input" id="plazo" name="plazo" required>
                <option value="">Seleccionar plazo</option>
                <option value="12">12 meses</option>
                <option value="24">24 meses</option>
                <option value="36">36 meses</option>
                <option value="48">48 meses</option>
            </select>
        </div><br>


        <div class="buttom">
            <input type="submit" value="Enviar" />
        </div>
    </form>
</div>




    </section>

    
<script>
    document.getElementById('monto').addEventListener('input', function(e) {
        // Limpiar el valor actual (quitar puntos anteriores)
        let monto = e.target.value.replace(/\./g, '');

        // Formatear el monto con puntos cada 3 dígitos
        monto = monto.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        // Asignar el valor formateado de nuevo al campo de entrada
        e.target.value = monto;
    });
</script>
</body>

    <footer>
        
        <p><i class="fa-solid fa-tty"></i> Contáctenos a la Línea gratuita 018000-00001 o al Correo electronico  Bancoop_@gmail.com</p>
        <p>Banco de entídad financiera - Todos los derechos reservados.</p>

        <div class="link-container">
        <a href="terminos.php ">Aplican terminos y condiciones</a>
      </div>
        
    </footer>

</html>