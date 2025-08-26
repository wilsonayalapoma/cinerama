<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once '../config/database.php';
$database = new Database();
$db = $database->getConnection();
?>


<?php
// Obtener estadísticas
$querySuscriptores = "SELECT COUNT(*) as total FROM suscriptores WHERE activo = 1";
$totalSuscriptores = $db->query($querySuscriptores)->fetch()['total'];

$queryNoticias = "SELECT COUNT(*) as total FROM noticias";
$totalNoticias = $db->query($queryNoticias)->fetch()['total'];

$queryComentarios = "SELECT COUNT(*) as total FROM comentarios WHERE aprobado = 1";
$totalComentarios = $db->query($queryComentarios)->fetch()['total'];
?>

<!-- Mostrar estadísticas -->
<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalSuscriptores; ?></h5>
                <p class="card-text">Suscriptores Activos</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalNoticias; ?></h5>
                <p class="card-text">Noticias Publicadas</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalComentarios; ?></h5>
                <p class="card-text">Comentarios</p>
            </div>
        </div>
    </div>
</div>