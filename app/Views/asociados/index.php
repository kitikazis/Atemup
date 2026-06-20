<?php /** Vista: Asociados. Variable: $beneficios (array) */ ?>
<section class="hero-asociados" id="asociados">
    <div class="hero-asociados-content">
        <h1 class="hero-asociados-title">
            Tus beneficios ATEMUP en un solo lugar
        </h1>
        <p class="hero-asociados-subtitle">
            Exclusivo para asociados
        </p>
        <div class="hero-asociados-cta">
            <a class="btn-primary" href="#beneficios">Conoce tus beneficios</a>
            <a class="btn-secondary" href="<?= url('contacto') ?>">Conviértete en asociado</a>
        </div>
    </div>

    <div class="hero-asociados-image">
        <div class="image-placeholder"><?= icon('globe') ?></div>
    </div>
</section>

<section class="beneficios-section" id="beneficios">
    <div class="section-title">
        <h2>Beneficios Exclusivos</h2>
        <p>Servicios y oportunidades de contacto pensados para nuestros asociados</p>
    </div>

    <div class="beneficios-grid">
        <?php foreach ($beneficios as $beneficio): ?>
            <div class="benefit-card">
                <div class="benefit-icon"><?= icon($beneficio['icono']) ?></div>
                <h3><?= e($beneficio['titulo']) ?></h3>
                <p><?= e($beneficio['descripcion']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<div class="banner-sticky">
    <span class="banner-text">Afíliate y obtén 10% de descto. En tu membresía</span>
    <span class="banner-text">Afíliate y obtén 10% de descto. En tu membresía</span>
    <span class="banner-text">Afíliate y obtén 10% de descto. En tu membresía</span>
</div>
