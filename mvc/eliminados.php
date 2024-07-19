<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Bancoop</title>
    <link type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Eliminar un Registro en la Base de Datos</h1>
        <br>
        <form name="form1" method="post" action="elimina.php">
            <div class="form-group">
                <label for="no">Digite el código a eliminar:</label>
                <input type="text" class="form-control" id="no" name="no">
            </div>
            <button type="submit" class="btn btn-success">Enviar Datos</button>
        </form>
        <br>
        <a href="index.php" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Volver</a>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conecta.php');
                $conecta = conectar();
                $registros = "SELECT * FROM registro";
                $result = mysqli_query($conecta, $registros);
                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $mostrar['id']; ?></td>
                    <td><?php echo $mostrar['Nombres']; ?></td>
                    <td><?php echo $mostrar['Apellidos']; ?></td>
                    <td><?php echo $mostrar['Telefono']; ?></td>
                    <td><?php echo $mostrar['Correo']; ?></td>
                    <td><?php echo $mostrar['Contraseña']; ?></td>
                    <td><?php echo $mostrar['Rol']; ?></td>
                    <td>
                        <form method="post" action="destruir.php" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $mostrar['id']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
