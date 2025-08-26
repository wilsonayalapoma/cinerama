<?php
session_start();
// Verificar autenticación aquí

require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

// Obtener suscriptores
$query = "SELECT * FROM suscriptores ORDER BY fecha_registro DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$suscriptores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Suscriptores - CineramaTV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="suscriptores.php">Suscriptores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="noticias.php">Noticias</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h2 class="mt-3">Gestión de Suscriptores</h2>
                
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Fecha Registro</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($suscriptores as $suscriptor): ?>
                            <tr>
                                <td><?php echo $suscriptor['id']; ?></td>
                                <td><?php echo $suscriptor['email']; ?></td>
                                <td><?php echo date('d/m/Y H:i', strtotime($suscriptor['fecha_registro'])); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo $suscriptor['activo'] ? 'success' : 'secondary'; ?>">
                                        <?php echo $suscriptor['activo'] ? 'Activo' : 'Inactivo'; ?>
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger">Desactivar</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>