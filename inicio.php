<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Bancoop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/inicio.css'>
    <!-- Incluye Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src='main.js'></script>
</head>

<body>
<header>
        <div class="container-img">
            
            <img src="img/logo2.png" alt="Bancoop">
        </div>
        
        <div class="enlaces">
            <ul>
                <a>
                    <a href="registrob.php" class="btn">Hazte Cliente</a>
                    <a href="login.php" class="btn">Ingresar</a>
                </a>
            </ul>
        </div>
    </header>

    <main>

        <div class="container">
        <div class="card">
            <h1>Solicita tu prestamo aquí.</h1>
            <div class="card-img">
                <img src="img/prestamo.jpeg" alt="">
            </div><br>
            <form action="login.php">
                <button type="submit">Ir</button>
            </form>
        </div>

        <div class="card">
            <h1>transacciones banco a banco.</h1>
            <div class="card-img">
                <img src="img/transaccion.jpg" alt="">
            </div><br>
        </div> 
        <div class="card">
            <h1>Productos y servicios de Bancoop.</h1>
            <div class="card-img">
                <img src="img\productos y ....jpg" alt="">
            </div><br>
        </div> 
        <div class="card">
            <h1>Necesidades y mas para tí.</h1>
            <div class="card-img">
                <img src="img\necesidades2.jpg" alt="">
            </div><br>
        </div> 
    </div>

    <div class="container">
        <!-- División 1 -->
        <div class="card">
            <!-- Título y contenido -->
            <h3>Adquire tu tarjeta debito o credito.</h3>
            <div class="card-img">
                <img src="img/VISA.jpg" alt="">
            </div>
        </div>
        
        <!-- División 2 -->
        <div class="card">
            <!-- Título y contenido -->
            <h3>Educacion financiera.</h3>
            <div class="card-img">
                <img src="img/grado1.jpg" alt="">
            </div>
        </div>
        
        <!-- División 3 -->
        <div class="card">
            <!-- Título y contenido -->
            <h3>Renueva tu carro.</h3>
            <div class="card-img">
                <img src="img\mazda30.jpg" alt="">
            </div>
        </div>
        <!-- División 4 -->
        <div class="card">
            <!-- Título y contenido -->
            <h3> Casa propia!</h3>
            <div class="card-img">
                <img src="img/casa-propia.jpg" alt=""><br>
            </div>
        </div>
    </div>

            <script>
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

            // Función para alternar la visibilidad de la contraseña
            document.getElementById('togglePassword').addEventListener('click', function(event) {
                var passwordInput = document.getElementById('password');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            });
            </script>


    </main>

    <footer>
        <!-- Información de contacto -->
        <p><i class="fa-solid fa-tty"></i> Contáctenos a la Línea gratuita 018000-00001 o al Correo electronico
            Bancoop_@gmail.com</p>
        <p>Banco de entídad financiera - Todos los derechos reservados.</p>

        <div class="link-container">
            <h5><a href="terminos.php ">Aplican terminos y condiciones</a></h5>
        </div>

    </footer>
</body>

</html>