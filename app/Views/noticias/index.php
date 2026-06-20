<?php /** Vista: Noticias. Variables: $categorias (array), $noticias (array agrupado) */ ?>
<section class="hero-noticias" id="noticias">
    <div class="hero-noticias-content">
        <div class="hero-noticias-subtitle">Manténte Informado</div>
        <h1 class="hero-noticias-title">
            <span class="highlight">Noticias</span> y Actualidades
        </h1>
    </div>
</section>

<div class="tabs-container">
    <div class="tabs-wrapper">
        <ul class="tabs-list">
            <?php $primera = true; foreach ($categorias as $clave => $etiqueta): ?>
                <li class="tab-item">
                    <a href="#" class="<?= $primera ? 'active' : '' ?>" data-tab="<?= e($clave) ?>"><?= e($etiqueta) ?></a>
                </li>
                <?php $primera = false; endforeach; ?>
        </ul>
    </div>
</div>

<div class="content-section">
    <?php $primera = true; foreach ($categorias as $clave => $etiqueta): ?>
        <div id="<?= e($clave) ?>" class="tab-content" style="<?= $primera ? '' : 'display: none;' ?>">
            <?php $items = $noticias[$clave] ?? []; ?>
            <?php if (empty($items)): ?>
                <div class="empty-state">
                    <p class="empty-state-text">No hay noticias publicadas en la categoría <?= e($etiqueta) ?> en este momento.</p>
                </div>
            <?php else: ?>
                <div class="news-grid">
                    <?php foreach ($items as $noticia): ?>
                        <div class="news-card">
                            <div class="news-image"><?= e($noticia['icono']) ?></div>
                            <div class="news-content">
                                <div class="news-date">📅 <?= e($noticia['fecha']) ?></div>
                                <h3 class="news-title"><?= e($noticia['titulo']) ?></h3>
                                <p class="news-excerpt"><?= e($noticia['extracto']) ?></p>
                                <a href="#" class="news-link">Leer más →</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php $primera = false; endforeach; ?>
</div>

<div class="scroll-top" id="scrollTop">↑</div>
