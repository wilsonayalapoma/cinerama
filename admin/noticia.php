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

// Obtener noticia para editar si existe
$noticiaEditar = null;
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM noticias WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $noticiaEditar = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Noticias - CineramaTV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
    function confirmarEliminacion(id) {
        return confirm('¿Estás seguro de que quieres eliminar esta noticia?');
    }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">CineramaTV Admin</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
                <a class="nav-link" href="noticias.php">Noticias</a>
                <a class="nav-link" href="suscriptores.php">Suscriptores</a>
                <a class="nav-link" href="../index.php" target="_blank">Ver Sitio</a>
                <a class="nav-link" href="logout.php">Cerrar Sesión</a>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Gestión de Noticias</h2>
            <a href="?action=create" class="btn btn-primary">Nueva Noticia</a>
        </div>

        <?php if (isset($_GET['action']) && ($_GET['action'] == 'create' || $_GET['action'] == 'edit')): ?>
            <!-- Formulario de creación/edición -->
            <div class="card">
                <div class="card-header">
                    <?php echo isset($noticiaEditar) ? 'Editar Noticia' : 'Crear Nueva Noticia'; ?>
                </div>
                <div class="card-body">
                    <form action="procesar_noticia.php?action=<?php echo isset($noticiaEditar) ? 'edit' : 'create'; ?>" method="POST">
                        <?php if (isset($noticiaEditar)): ?>
                            <input type="hidden" name="id" value="<?php echo $noticiaEditar['id']; ?>">
                        <?php endif; ?>
                        
                        <div class="mb-3">
                            <label>Título *</label>
                            <input type="text" name="titulo" class="form-control" 
                                   value="<?php echo isset($noticiaEditar) ? htmlspecialchars($noticiaEditar['titulo']) : ''; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label>Resumen *</label>
                            <textarea name="resumen" class="form-control" rows="3" required><?php echo isset($noticiaEditar) ? htmlspecialchars($noticiaEditar['resumen']) : ''; ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label>Contenido *</label>
                            <textarea name="contenido" class="form-control" rows="6" required><?php echo isset($noticiaEditar) ? htmlspecialchars($noticiaEditar['contenido']) : ''; ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label>Categoría *</label>
                            <select name="categoria_id" class="form-control" required>
                                <option value="">Seleccionar categoría</option>
                                <?php foreach ($categorias as $categoria): ?>
                                <option value="<?php echo $categoria['id']; ?>" 
                                    <?php if (isset($noticiaEditar) && $noticiaEditar['categoria_id'] == $categoria['id']) echo 'selected'; ?>>
                                    <?php echo $categoria['nombre']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label>Imagen URL</label>
                            <input type="url" name="imagen" class="form-control" 
                                   value="<?php echo isset($noticiaEditar) ? htmlspecialchars($noticiaEditar['imagen']) : ''; ?>" 
                                   placeholder="https://ejemplo.com/imagen.jpg">
                        </div>
                        
                        <div class="mb-3">
                            <label>Autor</label>
                            <input type="text" name="autor" class="form-control" 
                                   value="<?php echo isset($noticiaEditar) ? htmlspecialchars($noticiaEditar['autor']) : ''; ?>" 
                                   placeholder="Nombre del autor">
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="destacada" class="form-check-input" 
                                   <?php if (isset($noticiaEditar) && $noticiaEditar['destacada']) echo 'checked'; ?>>
                            <label class="form-check-label">Noticia destacada</label>
                        </div>
                        
                        <button type="submit" class="btn btn-success">
                            <?php echo isset($noticiaEditar) ? 'Actualizar' : 'Crear'; ?> Noticia
                        </button>
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
                            <th>Destacada</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($noticias as $noticia): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($noticia['titulo']); ?></td>
                            <td><?php echo $noticia['categoria_nombre']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($noticia['fecha_publicacion'])); ?></td>
                            <td><?php echo $noticia['autor'] ? htmlspecialchars($noticia['autor']) : 'Anónimo'; ?></td>
                            <td>
                                <?php if ($noticia['destacada']): ?>
                                    <span class="badge bg-warning">⭐ Destacada</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="?action=edit&id=<?php echo $noticia['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="procesar_noticia.php?action=delete&id=<?php echo $noticia['id']; ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirmarEliminacion(<?php echo $noticia['id']; ?>)">Eliminar</a>
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