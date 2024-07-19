<?php

include 'php/conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM registro WHERE Correo = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$correo]);
    $user = $stmt->fetch();

    
    if ($user && password_hash($password, $user['Contraseña'])) {  
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['correo'] = $user['Correo'];

        
        header("Location: banco.php");
        exit();
    } else {
        
        $error_message = "Correo o contraseña incorrectos.";
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
  <link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src='js/index.js'></script>
</head>

<body>
<header>
        <div class="container-img">
           
            <img src="img/logo2.png" alt="">
        </div>
        <div class="enlaces">
            <ul>
                <a>
                    <a href="inicio.php" class="btn"><i class="fa-solid fa-reply"></i></a>
                </a>
            </ul> 
        </div>
    </header>
  <div class="container">
    <div class="header"></div><br>
    <div class="form-container">
      <div class="form-title">
        
      
        <h2>Iniciar Sesión</h2>
      </div>
      <?php if (isset($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
      <?php endif; ?>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
          <label for="correo">Correo Electrónico:</label>
          <input type="email" id="correo" name="correo" required />
        </div><br>
        <div class="form-group">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" pattern="(?=.*\d).{8,}" title="Debe contener al menos 8 caracteres, incluyendo al menos un número." required />
        </div><br><br>
        <div class="form-group">
          <input type="submit" value="Iniciar Sesión" />
        </div>
      </form>
      <div class="link-contraseña">
        <h5>¿Olvidaste tu clave? <a href="contraseña.php">Recuperar contraseña</a></h5>
      </div>
      <div class="link-container">
        <h5>¿Aún no tienes una cuenta? <a href="registrob.php">Registrarme</a></h5>
      </div>
      
    </div>
  </div>
 
  

</body>

</html>
