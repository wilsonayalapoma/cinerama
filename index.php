<?php
// Incluir configuración de la base de datos
require_once 'config/database.php';

// Obtener la página actual
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Páginas permitidas
$allowed_pages = ['home', 'national', 'international', 'sports', 'culture', 'video'];
if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}

// Obtener noticias destacadas
$database = new Database();
$db = $database->getConnection();

// Función para obtener noticias
function getNoticias($db, $categoria = null, $limit = 6) {
    $query = "SELECT n.*, c.nombre as categoria_nombre 
              FROM noticias n 
              LEFT JOIN categorias c ON n.categoria_id = c.id";
    
    if ($categoria) {
        $query .= " WHERE c.slug = :categoria";
    }
    
    $query .= " ORDER BY n.fecha_publicacion DESC LIMIT :limit";
    
    $stmt = $db->prepare($query);
    
    if ($categoria) {
        $stmt->bindParam(':categoria', $categoria);
    }
    
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Obtener noticias para la página actual
//if ($page == 'home') {
//    $noticias = getNoticias($db, null, 8);
//} else {
//    $noticias = getNoticias($db, $page, 8);
//}
// 
?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CineramaTv</title>
    <meta name="description" content="Las últimas noticias de actualidad nacional e internacional. Mantente informado con CineramaTV.">
    <meta name="keywords" content="noticias, actualidad, periódico, news, nacional, internacional">
    <meta name="author" content="CineramaTV">
    
    <!-- Open Graph -->
    <meta property="og:title" content="CineramaTV - Noticias de Actualidad en Bolivia">
    <meta property="og:description" content="Las últimas noticias de actualidad nacional e internacional">
    <meta property="og:image" content="https://cineramatv.com/assets/img/logo.png">
    <meta property="og:url" content="https://cineramatv.com/">
    <meta property="og:type" content="website">



    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Font Awesome para iconos -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="css/style.css" />
    <style>
      .user-icon {
        color: white;
        font-size: 1.2rem;
        margin-left: 15px;
        transition: color 0.3s ease;
      }
      
      .user-icon:hover {
        color: var(--accent-color);
      }
      
      .navbar-search-container {
        display: flex;
        align-items: center;
      }
      
      @media (max-width: 991px) {
        .navbar-search-container {
          margin-top: 15px;
          width: 100%;
          justify-content: center;
        }
        
        .user-icon {
          margin-left: 10px;
          margin-right: 10px;
        }
      }
    </style>
  </head>
  <body>
    <!-- Header (sería un include en PHP) -->
    <header>
      <div class="container-fluid bg-dark text-white py-2 text-center">
        <div class="row">
          <div class="col">
       <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="5000">
        <a href="https://www.oep.org.bo/"><img src="assets/img/Banner Resultaos (CINERAMA MULTIMEDIA)_Mesa de trabajo 1.png" class="d-block w-100" alt="Noticia 1" style="height:150px; object-fit:cover;cursor: pointer;"></a>
      </div>
      
      <div class="carousel-item" data-bs-interval="5000">
        <a href="https://www.oep.org.bo/"><img src="assets/img/Banner-CINERAMA-MULTIMEDIA-Jurados_Mesa-de-trabajo-1.png" class="d-block w-100" alt="Noticia 2" style="height:150px; object-fit:cover; cursor: pointer;"></a>
      </div>
      
      <div class="carousel-item" data-bs-interval="5000">
        <a href="https://www.oep.org.bo/"><img src="assets/img/Banner-CINERAMA-MULTIMEDIA-Sirepre_Mesa-de-trabajo-1.png" class="d-block w-100" alt="Noticia 3" style="height:150px; object-fit:cover; cursor: pointer;"></a>
      </div>
      
      <div class="carousel-item" data-bs-interval="5000">
        <a href="https://www.oep.org.bo/"><img src="assets/img/fondo1-1.webp" class="d-block w-100" alt="Noticia 4" style="height:150px; object-fit:cover; cursor: pointer;"></a>
      </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
        </div>
      </div>

      <nav class="navbar navbar-expand-lg navbar-light bg-custom">
        <div class="container">
          <a class="navbar-brand" href="#">CineramaTV</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a
                  class="nav-link active-nav spa-link"
                  data-page="home"
                  href="#"
                  >Inicio</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link spa-link" data-page="national" href="#"
                  >Nacional</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link spa-link" data-page="international" href="#"
                  >Internacional</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link spa-link" data-page="sports" href="#"
                  >Deportes</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link spa-link" data-page="culture" href="#"
                  >Cultura</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link spa-link" data-page="video" href="#"
                  >Video</a
                >
              </li>
            </ul>
            
            <div class="navbar-search-container">
              <form class="d-flex">
                <input
                  class="form-control me-2"
                  type="search"
                  placeholder="Buscar..."
                  aria-label="Search"
                />
                <button class="btn btn-outline-light" type="submit">
                  Buscar
                </button>
              </form>
              
              <!-- Icono de usuario -->
              <a href="#" class="user-icon" data-bs-toggle="modal" data-bs-target="#loginModal">
                <i class="fas fa-user-circle"></i>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <!-- Modal de Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" required>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Recordarme</label>
              </div>
              <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>
            <div class="text-center mt-3">
              <p>¿No tienes cuenta? <a href="#" class="text-primary">Regístrate</a></p>
              <a href="#" class="text-muted">¿Olvidaste tu contraseña?</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Contenido Principal (carga dinámica SPA) -->
    <main class="container my-3 spa-content" id="spa-content">
        <!-- El contenido se carga según la página -->
        <?php
        // Determinar qué módulo cargar y obtener las noticias correspondientes
        if ($page == 'home') {
            $noticias = getNoticias($db, null, 8);
            include 'modules/home.php';
        } else {
            $noticias = getNoticias($db, $page, 8);
            $module_file = "modules/$page.php";
            if (file_exists($module_file)) {
                include $module_file;
            } else {
                // Si el archivo no existe, cargar home por defecto
                $noticias = getNoticias($db, null, 8);
                include 'modules/home.php';
            }
        }
        ?>
    </main>

    <!-- Footer (sería un include en PHP) -->
    <footer class="footer-custom text-white py-4 mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h5>Cinerama Tv</h5>
            <p>Tu fuente confiable de noticias actualizadas las 24 horas.</p>
          </div>
          <div class="col-md-4">
            <h5>Enlaces útiles</h5>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Sobre nosotros</a></li>
              <li><a href="#" class="text-white">Contacto</a></li>
              <li><a href="#" class="text-white">Política de privacidad</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <h5>Síguenos</h5>
            <div class="d-flex gap-3">
              <a href="#" class="text-white"
                ><i class="fab fa-facebook fa-2x"></i
              ></a>
              <a href="#" class="text-white"
                ><i class="fab fa-twitter fa-2x"></i
              ></a>
              <a href="#" class="text-white"
                ><i class="fab fa-instagram fa-2x"></i
              ></a>
            </div>
          </div>
        </div>
        <hr />
        <p class="text-center mb-0">
          &copy;
          <?php echo date('Y'); ?>
          Cinerama. Todos los derechos reservados.
        </p>
      </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery para AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JS personalizado -->
    <script src="js/script.js"></script>
  </body>
</html>