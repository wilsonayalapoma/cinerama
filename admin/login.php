<?php
session_start();
require_once '../config/database.php';

// Si ya está logueado, redirigir al dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    if (!empty($username) && !empty($password)) {
        try {
            $database = new Database();
            $db = $database->getConnection();
            
            // Buscar usuario en la base de datos
            $query = "SELECT id, username, password_hash, nombre_completo FROM administradores 
                      WHERE username = :username AND activo = 1 LIMIT 1";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $admin = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Verificar contraseña
                if (password_verify($password, $admin['password_hash'])) {
                    // Login exitoso
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_id'] = $admin['id'];
                    $_SESSION['admin_username'] = $admin['username'];
                    $_SESSION['admin_nombre'] = $admin['nombre_completo'];
                    
                    header('Location: dashboard.php');
                    exit;
                } else {
                    $error = 'Credenciales incorrectas';
                }
            } else {
                $error = 'Credenciales incorrectas';
            }
        } catch (PDOException $e) {
            $error = 'Error de conexión: ' . $e->getMessage();
        }
    } else {
        $error = 'Por favor complete todos los campos';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - CineramaTV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #293E5A 0%, #660666 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="card-body p-4">
            <div class="text-center mb-4">
                <h2 class="card-title">CineramaTV Admin</h2>
                <p class="text-muted">Panel de Administración</p>
            </div>
            
            <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <input type="text" name="username" class="form-control" required 
                           value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>
            
            <div class="text-center mt-3">
                <small class="text-muted">
                    Usuario: <strong>admin</strong> | Contraseña: <strong>admin123</strong>
                </small>
            </div>
        </div>
    </div>
</body>
</html>