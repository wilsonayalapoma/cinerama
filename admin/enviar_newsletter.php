<?php
// Código para enviar newsletters
// Esto podría integrarse con servicios como PHPMailer o Amazon SES
?>
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

<!-- Formulario para crear y enviar newsletters -->
<form id="formNewsletter">
    <div class="mb-3">
        <label>Asunto</label>
        <input type="text" name="asunto" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Contenido</label>
        <textarea name="contenido" class="form-control" rows="10" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar Newsletter</button>
</form>