<section class="news-section">
    <div class="row">
        <div class="col-md-8">
            <!-- Video como noticia principal -->
            <div class="video-container mb-4">
                <iframe src="https://owncloud1692001.fasthostunlimited.com/embed/video" allowfullscreen></iframe>
            </div>
            
            <h2 class="section-title my-4">Últimas Noticias</h2>
            <div class="row">
                <?php if (isset($noticias) && is_array($noticias) && count($noticias) > 0): ?>
                    <?php foreach ($noticias as $noticia): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card article-card">
                            <img src="<?php echo $noticia['imagen'] ?: 'https://via.placeholder.com/400x250?text=Noticia'; ?>" 
                                 class="card-img-top" alt="<?php echo $noticia['titulo']; ?>">
                            <div class="card-body">
                                <span class="badge bg-primary mb-2"><?php echo $noticia['categoria_nombre']; ?></span>
                                <h5 class="card-title"><?php echo $noticia['titulo']; ?></h5>
                                <p class="card-text"><?php echo $noticia['resumen']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="noticia.php?id=<?php echo $noticia['id']; ?>" class="btn btn-primary btn-sm">Leer más</a>
                                    <small class="text-muted">
                                        <?php echo date('d/m/Y', strtotime($noticia['fecha_publicacion'])); ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-info">No hay noticias disponibles en este momento.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="bg-light-custom p-3 rounded mb-4">
                <h4>Noticias Destacadas</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">Destacada 1: Resumen breve</a>
                    <a href="#" class="list-group-item list-group-item-action">Destacada 2: Resumen breve</a>
                    <a href="#" class="list-group-item list-group-item-action">Destacada 3: Resumen breve</a>
                </div>
            </div>
            
            <div class="bg-light-custom p-3 rounded">
                <h4>Boletín informativo</h4>
                <p>Suscríbete para recibir las últimas noticias</p>
                <form id="formSuscripcion">
                    <div class="mb-3">
                        <input type="email" class="form-control" id="emailSuscripcion" 
                               placeholder="Tu email" required>
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" id="btnSuscribir">
                        <span id="btnText">Suscribirse</span>
                        <div id="btnLoading" class="spinner-border spinner-border-sm d-none" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                    </button>
                </form>
                <div id="mensajeSuscripcion" class="mt-2"></div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const formSuscripcion = document.getElementById('formSuscripcion');
    const emailInput = document.getElementById('emailSuscripcion');
    const btnSuscribir = document.getElementById('btnSuscribir');
    const btnText = document.getElementById('btnText');
    const btnLoading = document.getElementById('btnLoading');
    const mensajeSuscripcion = document.getElementById('mensajeSuscripcion');
    const emailError = document.getElementById('emailError');

    formSuscripcion.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = emailInput.value.trim();
        
        // Validación básica
        if (!email) {
            emailInput.classList.add('is-invalid');
            emailError.textContent = 'Por favor ingresa tu email';
            return;
        }
        
        if (!/\S+@\S+\.\S+/.test(email)) {
            emailInput.classList.add('is-invalid');
            emailError.textContent = 'Por favor ingresa un email válido';
            return;
        }
        
        emailInput.classList.remove('is-invalid');
        
        // Mostrar loading
        btnText.classList.add('d-none');
        btnLoading.classList.remove('d-none');
        btnSuscribir.disabled = true;
        mensajeSuscripcion.textContent = '';
        mensajeSuscripcion.className = 'mt-2';
        
        // Enviar petición AJAX
        fetch('procesar_suscripcion.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'email=' + encodeURIComponent(email)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                mensajeSuscripcion.textContent = data.message;
                mensajeSuscripcion.className = 'mt-2 alert alert-success';
                formSuscripcion.reset();
            } else {
                mensajeSuscripcion.textContent = data.message;
                mensajeSuscripcion.className = 'mt-2 alert alert-danger';
            }
        })
        .catch(error => {
            mensajeSuscripcion.textContent = 'Error de conexión. Intenta nuevamente.';
            mensajeSuscripcion.className = 'mt-2 alert alert-danger';
        })
        .finally(() => {
            // Ocultar loading
            btnText.classList.remove('d-none');
            btnLoading.classList.add('d-none');
            btnSuscribir.disabled = false;
        });
    });

    // Limpiar mensajes cuando el usuario empiece a escribir
    emailInput.addEventListener('input', function() {
        if (this.classList.contains('is-invalid')) {
            this.classList.remove('is-invalid');
        }
        mensajeSuscripcion.textContent = '';
        mensajeSuscripcion.className = 'mt-2';
    });
});
</script>