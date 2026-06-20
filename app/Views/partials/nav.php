<?php
/**
 * Barra de navegación.
 * Variable: $navActivo (inicio|servicios|noticias|asociados|contacto)
 */
$activo = $navActivo ?? '';
?>
<nav>
    <a class="logo" href="<?= url() ?>">
        <img class="logo-img" src="<?= asset('img/atemup_white.png') ?>" alt="<?= e(SITE_NAME . ' - ' . SITE_TAGLINE) ?>">
    </a>

    <ul class="nav-menu">
        <li><a href="<?= url() ?>" class="<?= $activo === 'inicio' ? 'active' : '' ?>">INICIO</a></li>
        <li><a href="<?= url('servicios') ?>#institucional">INSTITUCIONAL <span class="dropdown-arrow">▼</span></a></li>
        <li><a href="<?= url('servicios') ?>" class="<?= $activo === 'servicios' ? 'active' : '' ?>">SERVICIOS</a></li>
        <li><a href="<?= url('noticias') ?>" class="<?= $activo === 'noticias' ? 'active' : '' ?>">NOTICIAS</a></li>
        <li><a href="<?= url('asociados') ?>" class="<?= $activo === 'asociados' ? 'active' : '' ?>">ASOCIADOS</a></li>
        <li><a href="<?= url('contacto') ?>" class="<?= $activo === 'contacto' ? 'active' : '' ?>">CONTACTO</a></li>
    </ul>

    <div class="nav-right">
        <a class="btn-afiliate" href="<?= url('asociados') ?>">QUIERO AFILIARME →</a>
        <a class="btn-consult" href="<?= url('contacto') ?>">Agendar Consultoría</a>
    </div>
</nav>
