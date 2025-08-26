<?php
// Módulo de noticias deportivas
?>
<section class="news-section">
    <h2 class="section-title mb-4">Deportes</h2>
    <div class="row">
        <div class="col-md-8">
            <!-- Noticia principal deportiva -->
            <div class="card mb-4">
                <img src="https://via.placeholder.com/800x400?text=Noticia+Deportiva+Principal" class="card-img-top" alt="Noticia deportiva principal">
                <div class="card-body">
                    <span class="badge bg-warning mb-2">Fútbol</span>
                    <h3 class="card-title">Gran victoria del equipo local en el clásico</h3>
                    <p class="card-text"><small class="text-muted">Publicado el <?php echo date('d/m/Y'); ?> | Por: Pedro González</small></p>
                    <p class="card-text">Crónica completa del partido. Análisis de las jugadas más importantes, goles y desempeño de los jugadores. Resumen de la temporada y perspectivas para los próximos encuentros.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="btn btn-primary">Seguir leyendo</a>
                        <div>
                            <button class="btn btn-outline-secondary btn-sm me-2"><i class="fas fa-share-alt"></i></button>
                            <button class="btn btn-outline-secondary btn-sm"><i class="far fa-bookmark"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Grid de noticias deportivas -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card article-card h-100">
                        <img src="https://via.placeholder.com/400x250?text=Deportes+1" class="card-img-top" alt="Noticia deportiva 1">
                        <div class="card-body">
                            <span class="badge bg-warning mb-2">Baloncesto</span>
                            <h5 class="card-title">El equipo nacional se prepara para el mundial</h5>
                            <p class="card-text">Breve descripción de la noticia deportiva que aparecerá aquí como resumen.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                <small class="text-muted">Hace 2 horas</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card article-card h-100">
                        <img src="https://via.placeholder.com/400x250?text=Deportes+2" class="card-img-top" alt="Noticia deportiva 2">
                        <div class="card-body">
                            <span class="badge bg-warning mb-2">Tenis</span>
                            <h5 class="card-title">Nuevo talento nacional gana torneo internacional</h5>
                            <p class="card-text">Breve descripción de la noticia deportiva que aparecerá aquí como resumen.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                <small class="text-muted">Hace 4 horas</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card article-card h-100">
                        <img src="https://via.placeholder.com/400x250?text=Deportes+3" class="card-img-top" alt="Noticia deportiva 3">
                        <div class="card-body">
                            <span class="badge bg-warning mb-2">Automovilismo</span>
                            <h5 class="card-title">Gran premio: resultados y análisis</h5>
                            <p class="card-text">Breve descripción de la noticia deportiva que aparecerá aquí como resumen.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                                <small class="text-muted">Ayer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card article-card h-100">
                        <img src="https://via.placeholder.com/400x250?text=Deportes+4" class="card-img-top" alt="Noticia deportiva 4">
                        <div class="card-body">
                            <span class="badge bg-warning mb-2">Atletismo</span>
                            <h5 class="card-title">Récord nacional en maratón</h5>
                            <p class="card-text">Breve descripción de la noticia deportiva que aparecerá aquí como resumen.</p>
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
                <h4>Próximos Eventos</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Fútbol: Local vs Visitante</h6>
                            <small class="text-muted">Hoy, 20:00</small>
                        </div>
                        <small class="text-muted">Estadio Nacional</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Baloncesto: Semifinal</h6>
                            <small class="text-muted">Mañana, 18:30</small>
                        </div>
                        <small class="text-muted">Polideportivo Municipal</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Tenis: Final del Abierto</h6>
                            <small class="text-muted">15 Jun, 16:00</small>
                        </div>
                        <small class="text-muted">Canchas Centrales</small>
                    </a>
                </div>
            </div>
            
            <div class="bg-light-custom p-3 rounded mb-4">
                <h4>Clasificaciones</h4>
                <ul class="nav nav-tabs" id="sportsTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="football-tab" data-bs-toggle="tab" data-bs-target="#football" type="button" role="tab">Fútbol</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="basketball-tab" data-bs-toggle="tab" data-bs-target="#basketball" type="button" role="tab">Baloncesto</button>
                    </li>
                </ul>
                <div class="tab-content p-2" id="sportsTabContent">
                    <div class="tab-pane fade show active" id="football" role="tabpanel">
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Equipo A
                                <span class="badge bg-primary rounded-pill">42 pts</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Equipo B
                                <span class="badge bg-primary rounded-pill">38 pts</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Equipo C
                                <span class="badge bg-primary rounded-pill">35 pts</span>
                            </li>
                        </ol>
                    </div>
                    <div class="tab-pane fade" id="basketball" role="tabpanel">
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Equipo X
                                <span class="badge bg-primary rounded-pill">15 victorias</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Equipo Y
                                <span class="badge bg-primary rounded-pill">12 victorias</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Equipo Z
                                <span class="badge bg-primary rounded-pill">10 victorias</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            
            <div class="bg-light-custom p-3 rounded">
                <h4>Destacado Deportivo</h4>
                <div class="card">
                    <img src="https://via.placeholder.com/300x200?text=Atleta" class="card-img-top" alt="Atleta destacado">
                    <div class="card-body">
                        <h5 class="card-title">Juan Martínez</h5>
                        <p class="card-text">Atleta del mes con mejores marcas en la temporada.</p>
                        <a href="#" class="btn btn-primary btn-sm">Ver perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>