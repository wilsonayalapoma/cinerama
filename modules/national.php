<?php
// Módulo de noticias nacionales
?>
<section class="news-section">
    <h2 class="section-title mb-4">Noticias Nacionales</h2>
    <div class="row">
        <div class="col-md-8">
            <?php if (!empty($noticias)): ?>
                <?php foreach ($noticias as $noticia): ?>
                <div class="card mb-4">
                    <img src="<?php echo $noticia['imagen'] ?: 'https://via.placeholder.com/800x400?text=Noticia'; ?>" 
                         class="card-img-top" alt="<?php echo $noticia['titulo']; ?>">
                    <div class="card-body">
                        <span class="badge bg-primary mb-2"><?php echo $noticia['categoria_nombre']; ?></span>
                        <h3 class="card-title"><?php echo $noticia['titulo']; ?></h3>
                        <p class="card-text"><?php echo $noticia['resumen']; ?></p>
                        <a href="#" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-info">No hay noticias nacionales disponibles.</div>
            <?php endif; ?>
        </div>
        
        <div class="col-md-4">
            <!-- Sidebar content -->
        </div>
    </div>
</section>