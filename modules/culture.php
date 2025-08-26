<?php
// Módulo de noticias culturales
?>
<section class="news-section">
    <h2 class="section-title mb-4">Cultura</h2>
    <div class="row">
        <div class="col-md-8">
            <!-- Noticia principal cultural -->
            <div class="card mb-4">
                <img src="https://via.placeholder.com/800x400?text=Noticia+Cultural+Principal" class="card-img-top" alt="Noticia cultural principal">
                <div class="card-body">
                    <span class="badge bg-info mb-2">Arte</span>
                    <h3 class="card-title">Inauguración de la nueva exposición en el Museo Nacional</h3>
                    <p class="card-text"><small class="text-muted">Publicado el <?php echo date('d/m/Y'); ?> | Por: Laura Méndez</small></p>
                    <p class="card-text">Crítica y análisis de la nueva exposición que reúne obras de artistas contemporáneos. Entrevistas con los curadores y artistas participantes. Horarios y información para visitantes.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="btn btn-primary">Seguir leyendo</a>
                        <div>
                            <button class="btn btn-outline-secondary btn-sm me-2"><i class="fas fa-share-alt"></i></button>
                            <button class="btn btn-outline-secondary btn-sm"><i class="far fa-bookmark"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Grid de noticias culturales -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card article-card h-100">
                        <img src="https://via.placeholder.com/400x250?text=Cultura+1" class="card-img-top" alt="Noticia cultural 1">
                        <div class="card-body">
                            <span class="badge bg-info mb-2">Música</span>
                            <h5 class="card-title">Festival de jazz anuncia su cartel completo</h5>
                            <p class="card-text">Breve descripción de la noticia cultural que aparecerá aquí como resumen.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                <small class="text-muted">Hace 3 horas</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card article-card h-100">
                        <img src="https://via.placeholder.com/400x250?text=Cultura+2" class="card-img-top" alt="Noticia cultural 2">
                        <div class="card-body">
                            <span class="badge bg-info mb-2">Literatura</span>
                            <h5 class="card-title">Nuevo libro de autor local se convierte en bestseller</h5>
                            <p class="card-text">Breve descripción de la noticia cultural que aparecerá aquí como resumen.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                <small class="text-muted">Hace 6 horas</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card article-card h-100">
                        <img src="https://via.placeholder.com/400x250?text=Cultura+3" class="card-img-top" alt="Noticia cultural 3">
                        <div class="card-body">
                            <span class="badge bg-info mb-2">Cine</span>
                            <h5 class="card-title">Película nacional recibe premio internacional</h5>
                            <p class="card-text">Breve descripción de la noticia cultural que aparecerá aquí como resumen.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                <small class="text-muted">Ayer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card article-card h-100">
                        <img src="https://via.placeholder.com/400x250?text=Cultura+4" class="card-img-top" alt="Noticia cultural 4">
                        <div class="card-body">
                            <span class="badge bg-info mb-2">Teatro</span>
                            <h5 class="card-title">Nueva temporada de obras clásicas en el teatro municipal</h5>
                            <p class="card-text">Breve descripción de la noticia cultural que aparecerá aquí como resumen.</p>
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
                <h4>Agenda Cultural</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Exposición: Arte Contemporáneo</h6>
                            <small class="text-muted">Hasta el 30 Jun</small>
                        </div>
                        <small class="text-muted">Museo Nacional</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Concierto: Orquesta Sinfónica</h6>
                            <small class="text-muted">20 Jun, 19:30</small>
                        </div>
                        <small class="text-muted">Auditorio Municipal</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Teatro: Hamlet</h6>
                            <small class="text-muted">22-25 Jun, 20:00</small>
                        </div>
                        <small class="text-muted">Teatro Principal</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Festival: Gastronomía Local</h6>
                            <small class="text-muted">28-30 Jun</small>
                        </div>
                        <small class="text-muted">Plaza Central</small>
                    </a>
                </div>
            </div>
            
            <div class="bg-light-custom p-3 rounded mb-4">
                <h4>Críticas y Reseñas</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <span class="display-6 text-primary">4.5</span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0">"El Retorno" - Nueva exposición</h6>
                                <small class="text-muted">Museo de Arte Moderno</small>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <span class="display-6 text-primary">4.0</span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0">"Sueños" - Obra de teatro</h6>
                                <small class="text-muted">Teatro Nacional</small>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <span class="display-6 text-primary">4.8</span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0">Concierto de la Filarmónica</h6>
                                <small class="text-muted">Auditorio Nacional</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="bg-light-custom p-3 rounded">
                <h4>Artista del Mes</h4>
                <div class="card">
                    <img src="https://via.placeholder.com/300x200?text=Artista" class="card-img-top" alt="Artista destacado">
                    <div class="card-body">
                        <h5 class="card-title">Elena Torres</h5>
                        <p class="card-text">Pintora contemporánea con exposición internacional.</p>
                        <a href="#" class="btn btn-primary btn-sm">Ver entrevista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>