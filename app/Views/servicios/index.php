<?php /** Vista: Servicios. Variable: $servicios (array) */ ?>
<section class="hero-servicios" id="servicios">
    <div class="hero-servicios-content">
        <div class="hero-servicios-subtitle">Nuestras Soluciones</div>
        <h1 class="hero-servicios-title">
            Servicios Técnicos<br>
            para <span class="highlight">Municipalidades</span>
        </h1>
        <p class="hero-servicios-desc">
            Te acompañamos con criterio técnico y cumplimiento de la normativa vigente.
        </p>
    </div>
</section>

<section class="servicios-section">
    <div class="servicios-grid">
        <?php foreach ($servicios as $servicio): ?>
            <div class="service-card">
                <div class="service-icon"><?= icon($servicio['icono']) ?></div>
                <h3><?= e($servicio['titulo']) ?></h3>
                <p><?= e($servicio['descripcion']) ?></p>
                <a href="<?= url('contacto') ?>" class="service-link">Conocer más →</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
