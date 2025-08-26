<?php
require_once 'config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

if (!$email) {
    echo json_encode(['success' => false, 'message' => 'Email no válido']);
    exit;
}

try {
    $database = new Database();
    $db = $database->getConnection();
    
    // Verificar si el email ya existe
    $checkQuery = "SELECT id FROM suscriptores WHERE email = :email";
    $checkStmt = $db->prepare($checkQuery);
    $checkStmt->bindParam(':email', $email);
    $checkStmt->execute();
    
    if ($checkStmt->rowCount() > 0) {
        echo json_encode(['success' => false, 'message' => 'Este email ya está suscrito']);
        exit;
    }
    
    // Insertar nuevo suscriptor
    $query = "INSERT INTO suscriptores (email) VALUES (:email)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => '¡Gracias por suscribirte!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al procesar la suscripción']);
    }
    
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error de base de datos']);
}
?>