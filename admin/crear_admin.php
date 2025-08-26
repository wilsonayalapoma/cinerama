<?php
// Script temporal para crear administradores
// ELIMINAR ESTE ARCHIVO DESPUÉS DE USARLO por seguridad

require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $email = trim($_POST['email']);
    $nombre = trim($_POST['nombre']);
    
    if (!empty($username) && !empty($password)) {
        $database = new Database();
        $db = $database->getConnection();
        
        // Encriptar contraseña
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO administradores (username, password_hash, email, nombre_completo) 
                  VALUES (:username, :password_hash, :email, :nombre)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password_hash', $password_hash);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nombre', $nombre);
        
        if ($stmt->execute()) {
            $mensaje = "Administrador creado exitosamente!";
        } else {
            $mensaje = "Error al crear administrador";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Crear Administrador</h2>
            <?php if (isset($mensaje)): ?>
            <div class="alert alert-info"><?php echo $mensaje; ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="mb-3">
                    <label>Usuario</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Crear Administrador</button>
            </form>
            
            <div class="mt-3">
                <div class="alert alert-warning">
                    <strong>⚠️ IMPORTANTE:</strong> Elimina este archivo después de usarlo por seguridad.
                </div>
            </div>
        </div>
    </div>
</body>
</html>