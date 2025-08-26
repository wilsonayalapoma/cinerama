<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once '../config/database.php';
$database = new Database();
$db = $database->getConnection();

// Obtener estadísticas para el dashboard
$stats = [
    'suscriptores' => $db->query("SELECT COUNT(*) FROM suscriptores WHERE activo = 1")->fetchColumn(),
    'noticias' => $db->query("SELECT COUNT(*) FROM noticias")->fetchColumn(),
    'comentarios' => $db->query("SELECT COUNT(*) FROM comentarios WHERE aprobado = 1")->fetchColumn(),
    'categorias' => $db->query("SELECT COUNT(*) FROM categorias")->fetchColumn()
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CineramaTV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'partials/header.php'; ?>
    
    <div class="container-fluid mt-4">
        <h2>Dashboard</h2>
        
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $stats['suscriptores']; ?></h5>
                        <p class="card-text">Suscriptores</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $stats['noticias']; ?></h5>
                        <p class="card-text">Noticias</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $stats['comentarios']; ?></h5>
                        <p class="card-text">Comentarios</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $stats['categorias']; ?></h5>
                        <p class="card-text">Categorías</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Acciones Rápidas</div>
                    <div class="card-body">
                        <a href="noticias.php?action=create" class="btn btn-primary me-2">Nueva Noticia</a>
                        <a href="suscriptores.php" class="btn btn-success me-2">Ver Suscriptores</a>
                        <a href="enviar_newsletter.php" class="btn btn-info">Enviar Newsletter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>