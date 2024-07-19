<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar MySQL mediante Función</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">Editar Registros con Función PHP</h1>
                <br><br>
                <?php
                include ('conecta.php');
                $conecta = conectar();
                ?>
                <table class="table table-primary table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT * FROM registro";
                        $result = mysqli_query($conecta, $sql);
                        while ($row = mysqli_fetch_object($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row->Nombres; ?></td>
                            <td><?php echo $row->Apellidos; ?></td>
                            <td><?php echo $row->Telefono; ?></td>
                            <td><?php echo $row->Correo; ?></td>
                            <td>
                                <a class="btn btn-warning" href="editar.php?id=<?php echo $row->id; ?>">
                                    <i class="fas fa-pencil-alt"></i> Editar
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
                <!-- Botón para volver a la página anterior -->
                <a class="btn btn-secondary" href="javascript:history.go(-1);">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
                
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
