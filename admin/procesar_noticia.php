<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once '../config/database.php';
$database = new Database();
$db = $database->getConnection();

// Configurar encabezados JSON
header('Content-Type: application/json');

// Determinar la acción
$action = $_GET['action'] ?? $_POST['action'] ?? '';

try {
    switch ($action) {
        case 'create':
            crearNoticia($db);
            break;
            
        case 'edit':
            editarNoticia($db);
            break;
            
        case 'delete':
            eliminarNoticia($db);
            break;
            
        default:
            echo json_encode(['success' => false, 'message' => 'Acción no válida']);
            break;
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}

function crearNoticia($db) {
    // Validar datos requeridos
    $required = ['titulo', 'resumen', 'contenido', 'categoria_id'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['success' => false, 'message' => "El campo $field es requerido"]);
            return;
        }
    }

    // Preparar datos
    $titulo = trim($_POST['titulo']);
    $resumen = trim($_POST['resumen']);
    $contenido = trim($_POST['contenido']);
    $categoria_id = intval($_POST['categoria_id']);
    $imagen = !empty($_POST['imagen']) ? trim($_POST['imagen']) : null;
    $autor = !empty($_POST['autor']) ? trim($_POST['autor']) : null;
    $destacada = isset($_POST['destacada']) ? 1 : 0;

    // Insertar en la base de datos
    $query = "INSERT INTO noticias (titulo, resumen, contenido, imagen, categoria_id, autor, destacada) 
              VALUES (:titulo, :resumen, :contenido, :imagen, :categoria_id, :autor, :destacada)";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':resumen', $resumen);
    $stmt->bindParam(':contenido', $contenido);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->bindParam(':categoria_id', $categoria_id);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':destacada', $destacada);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Noticia creada exitosamente', 'id' => $db->lastInsertId()]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al crear la noticia']);
    }
}

function editarNoticia($db) {
    // Validar ID
    if (empty($_POST['id'])) {
        echo json_encode(['success' => false, 'message' => 'ID de noticia no especificado']);
        return;
    }

    $id = intval($_POST['id']);

    // Validar datos requeridos
    $required = ['titulo', 'resumen', 'contenido', 'categoria_id'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['success' => false, 'message' => "El campo $field es requerido"]);
            return;
        }
    }

    // Preparar datos
    $titulo = trim($_POST['titulo']);
    $resumen = trim($_POST['resumen']);
    $contenido = trim($_POST['contenido']);
    $categoria_id = intval($_POST['categoria_id']);
    $imagen = !empty($_POST['imagen']) ? trim($_POST['imagen']) : null;
    $autor = !empty($_POST['autor']) ? trim($_POST['autor']) : null;
    $destacada = isset($_POST['destacada']) ? 1 : 0;

    // Actualizar en la base de datos
    $query = "UPDATE noticias 
              SET titulo = :titulo, resumen = :resumen, contenido = :contenido, 
                  imagen = :imagen, categoria_id = :categoria_id, autor = :autor, destacada = :destacada
              WHERE id = :id";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':resumen', $resumen);
    $stmt->bindParam(':contenido', $contenido);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->bindParam(':categoria_id', $categoria_id);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':destacada', $destacada);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Noticia actualizada exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar la noticia']);
    }
}

function eliminarNoticia($db) {
    // Validar ID
    if (empty($_GET['id'])) {
        echo json_encode(['success' => false, 'message' => 'ID de noticia no especificado']);
        return;
    }

    $id = intval($_GET['id']);

    // Eliminar de la base de datos
    $query = "DELETE FROM noticias WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Noticia eliminada exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar la noticia']);
    }
}