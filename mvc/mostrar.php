<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h1 class="text-center">Agregar clientes</h1>
    <form name="form1" method="POST" action="agregar.php" class="mt-4">
        <div class="form-group">
            <label for="id">Código del cliente:</label>
            <input type="text" class="form-control" name="id" id="id">
        </div>
        <div class="form-group">
            <label for="Nombres">Nombres del cliente:</label>
            <input type="text" class="form-control" name="Nombres" id="Nombres">
        </div>
        <div class="form-group">
            <label for="Apellidos">Apellidos del cliente:</label>
            <input type="text" class="form-control" name="Apellidos" id="Apellidos">
        </div>
        <div class="form-group">
            <label for="Telefono">Teléfono del cliente:</label>
            <input type="text" class="form-control" name="Telefono" id="Telefono">
        </div>
        <div class="form-group">
            <label for="Correo">Correo del cliente:</label>
            <input type="email" class="form-control" name="Correo" id="Correo">
        </div>
        <div class="form-group">
            <label for="Contraseña">Contraseña del cliente:</label>
            <input type="password" class="form-control" name="Contraseña" id="Contraseña">
        </div>
        <div class="form-group">
            <label for="Rol">Rol del cliente:</label>
            <select class="form-control" name="Rol" id="Rol">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <br><br>
        <p>
            <a class="btn btn-primary mr-2" href="buscar.php">Buscar</a>
            <a class="btn btn-primary mr-2" href="editar.php">Editar</a>
            <a class="btn btn-warning mr-2" href="eliminados.php">Eliminar</a>
            <!-- Espacio -->
            <span class="mr-5"></span>
            <span class="mr-5"></span>
            <span class="mr-5"></span>
            <span class="mr-5"></span>
            <span class="mr-5"></span>
            <span class="mr-5"></span>
            <button type="submit" class="btn btn-success">Enviar Datos</button>
        </p>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
