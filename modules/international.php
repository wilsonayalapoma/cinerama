<?php
// Módulo de noticias internacionales
?>
<section class="news-section">
    <h2 class="section-title mb-4">Noticias Internacionales</h2>
    <div class="row">
        <div class="col-md-8">
            <!-- Noticia principal internacional -->
            <div class="card mb-4">
                <img src="https://via.placeholder.com/800x400?text=Noticia+Internacional+Principal" class="card-img-top" alt="Noticia internacional principal">
                <div class="card-body">
                    <span class="badge bg-primary mb-2">Internacional</span>
                    <h3 class="card-title">Título de noticia internacional importante</h3>
                    <p class="card-text"><small class="text-muted">Publicado el <?php echo date('d/m/Y'); ?> | Corresponsal: Juan Pérez</small></p>
                    <p class="card-text">Contenido completo de la noticia internacional. Aquí iría el desarrollo de la noticia con todos los detalles relevantes para los lectores sobre los acontecimientos en el mundo.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="btn btn-primary">Seguir leyendo</a>
                        <div>
                            <button class="btn btn-outline-secondary btn-sm me-2"><i class="fas fa-share-alt"></i></button>
                            <button class="btn btn-outline-secondary btn-sm"><i class="far fa-bookmark"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Grid de noticias internacionales -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card article-card h-100">
                        <img src="https://via.placeholder.com/400x250?text=Internacional+1" class="card-img-top" alt="Noticia internacional 1">
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">Europa</span>
                            <h5 class="card-title">Situación política en la Unión Europea</h5>
                            <p class="card-text">Breve descripción de la noticia internacional que aparecerá aquí como resumen.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                <small class="text-muted">Hace 3 horas</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card article-card h-100">
                        <img src="https://via.placeholder.com/400x250?text=Internacional+2" class="card-img-top" alt="Noticia internacional 2">
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">Asia</span>
                            <h5 class="card-title">Avances tecnológicos en Japón y Corea</h5>
                            <p class="card-text">Breve descripción de la noticia internacional que aparecerá aquí como resumen.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                <small class="text-muted">Hace 5 horas</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card article-card h-100">
                        <img src="https://via.placeholder.com/400x250?text=Internacional+3" class="card-img-top" alt="Noticia internacional 3">
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">América</span>
                            <h5 class="card-title">Relaciones comerciales en América del Norte</h5>
                            <p class="card-text">Breve descripción de la noticia internacional que aparecerá aquí como resumen.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                <small class="text-muted">Ayer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card article-card h-100">
                        <img src="https://via.placeholder.com/400x250?text=Internacional+4" class="card-img-top" alt="Noticia internacional 4">
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">África</span>
                            <h5 class="card-title">Desarrollo económico en países africanos</h5>
                            <p class="card-text">Breve descripción de la noticia internacional que aparecerá aquí como resumen.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                <small class="text-muted">Ayer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="bg-light-custom p-3 rounded mb-4">
                <h4>Por Región</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Europa
                        <span class="badge bg-primary rounded-pill">14</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Asia
                        <span class="badge bg-primary rounded-pill">9</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        América
                        <span class="badge bg-primary rounded-pill">12</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        África
                        <span class="badge bg-primary rounded-pill">7</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Oceanía
                        <span class="badge bg-primary rounded-pill">3</span>
                    </a>
                </div>
            </div>
            
            <div class="bg-light-custom p-3 rounded mb-4">
                <h4>Corresponsales</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/40x40?text=F" class="rounded-circle me-2" alt="Foto">
                            <div>
                                <h6 class="mb-0">María López - Europa</h6>
                                <small class="text-muted">Desde Bruselas</small>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/40x40?text=J" class="rounded-circle me-2" alt="Foto">
                            <div>
                                <h6 class="mb-0">Carlos Kim - Asia</h6>
                                <small class="text-muted">Desde Tokio</small>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/40x40?text=A" class="rounded-circle me-2" alt="Foto">
                            <div>
                                <h6 class="mb-0">Ana Rodríguez - América</h6>
                                <small class="text-muted">Desde Washington</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="bg-light-custom p-3 rounded">
                <h4>Zonas Horarias</h4>
                <div class="list-group">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Londres</h6>
                            <small><?php echo date('H:i', time() - 3600); ?></small>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Nueva York</h6>
                            <small><?php echo date('H:i', time() - 14400); ?></small>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Tokio</h6>
                            <small><?php echo date('H:i', time() + 32400); ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>