<?php
/**
 * Pie de página común a todas las páginas.
 */
?>
<footer>
    <div class="footer-content">
        <div class="footer-section">
            <div class="logo" style="margin-bottom: 20px;">
                <div class="logo-text">
                    <span style="color: white;"><?= e(SITE_NAME) ?></span>
                    <span style="color: #cbd5e1; font-size: 11px;"><?= e(SITE_TAGLINE) ?></span>
                </div>
            </div>
        </div>

        <div class="footer-section">
            <h3>Contacto</h3>
            <ul>
                <li><a href="tel:<?= preg_replace('/\s+/', '', SITE_PHONE) ?>"><?= icon('phone', 'icon-inline') ?> <?= e(SITE_PHONE) ?></a></li>
                <li><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= icon('mail', 'icon-inline') ?> <?= e(SITE_EMAIL) ?></a></li>
                <li><a href="<?= url('contacto') ?>"><?= icon('pin', 'icon-inline') ?> <?= e(SITE_ADDRESS) ?></a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Otros</h3>
            <ul>
                <li><a href="#">Marco Normativo Municipal</a></li>
                <li><a href="#">Instrumentos de Gestión Municipal</a></li>
                <li><a href="#">Cumpleaños Alcaldes</a></li>
                <li><a href="#">Aniversarios Municipalidades</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© <?= date('Y') ?> <?= e(SITE_NAME) ?>. Todos los derechos reservados.</p>
        <div class="footer-links">
            <a href="#">Política de Privacidad</a>
            <a href="#">Términos y Condiciones</a>
        </div>
    </div>
</footer>
