<?php
/**
 * Layout principal.
 * Variables esperadas:
 *   $titulo     string
 *   $paginaCss  string  (nombre del css específico de la página, sin extensión)
 *   $navActivo  string  (sección activa del menú)
 *   $content    string  (HTML de la vista, ya renderizado)
 */
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($titulo ?? SITE_NAME) ?></title>
    <link rel="icon" type="image/svg+xml" href="<?= asset('favicon.svg') ?>">
    <link rel="mask-icon" href="<?= asset('favicon.svg') ?>" color="#ef4444">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/global.css') ?>">
    <?php if (!empty($paginaCss)): ?>
        <link rel="stylesheet" href="<?= asset('css/' . $paginaCss . '.css') ?>">
    <?php endif; ?>
</head>
<body>

<!-- Preloader / transición entre páginas -->
<div id="preloader" class="preloader">
    <img class="preloader-logo" src="<?= asset('img/atemup_white.png') ?>" alt="ATEMUP">
    <span class="preloader-spinner"></span>
</div>
<noscript><style>.preloader{display:none !important;}</style></noscript>

<?= View::partial('partials/nav', ['navActivo' => $navActivo ?? '']) ?>

<?= $content ?>

<?= View::partial('partials/footer') ?>

<?= View::partial('partials/whatsapp') ?>

<script src="<?= asset('js/main.js') ?>"></script>
</body>
</html>
