<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once '../config/database.php';
$database = new Database();
$db = $database->getConnection();

// Obtener todas las noticias
$query = "SELECT n.*, c.nombre as categoria_nombre 
          FROM noticias n 
          LEFT JOIN categorias c ON n.categoria_id = c.id 
          ORDER BY n.fecha_publicacion DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener categorías para formularios
$categorias = $db->query("SELECT * FROM categorias")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Noticias - CineramaTV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'partials/header.php'; ?>
    
    <div class="container-fluid mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Gestión de Noticias</h2>
            <a href="?action=create" class="btn btn-primary">Nueva Noticia</a>
        </div>

        <?php if (isset($_GET['action']) && $_GET['action'] == 'create'): ?>
            <!-- Formulario de creación -->
            <div class="card">
                <div class="card-header">Crear Nueva Noticia</div>
                <div class="card-body">
                    <form action="procesar_noticia.php" method="POST">
                        <div class="mb-3">
                            <label>Título</label>
                            <input type="text" name="titulo" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Resumen</label>
                            <textarea name="resumen" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Contenido</label>
                            <textarea name="contenido" class="form-control" rows="6" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Categoría</label>
                            <select name="categoria_id" class="form-control" required>
                                <?php foreach ($categorias as $categoria): ?>
                                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Imagen URL</label>
                            <input type="url" name="imagen" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Autor</label>
                            <input type="text" name="autor" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Guardar Noticia</button>
                        <a href="noticias.php" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <!-- Lista de noticias -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Categoría</th>
                            <th>Fecha</th>
                            <th>Autor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($noticias as $noticia): ?>
                        <tr>
                            <td><?php echo $noticia['titulo']; ?></td>
                            <td><?php echo $noticia['categoria_nombre']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($noticia['fecha_publicacion'])); ?></td>
                            <td><?php echo $noticia['autor'] ?: 'Anónimo'; ?></td>
                            <td>
                                <a href="?action=edit&id=<?php echo $noticia['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="procesar_noticia.php?action=delete&id=<?php echo $noticia['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar noticia?')">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>