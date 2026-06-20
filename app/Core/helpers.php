<?php
/**
 * Funciones de ayuda globales.
 */

declare(strict_types=1);

if (!function_exists('e')) {
    /**
     * Escapa una cadena para imprimirla con seguridad en HTML.
     */
    function e(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('url')) {
    /**
     * Construye una URL interna respetando el BASE_URL.
     *   url('servicios') -> /servicios  (o /subdir/servicios)
     */
    function url(string $path = ''): string
    {
        return BASE_URL . ltrim($path, '/');
    }
}

if (!function_exists('asset')) {
    /**
     * Construye la URL de un recurso estático (css, js, img).
     *
     * Añade un parámetro ?v=<fecha de modificación> (cache-busting):
     * cuando cambias un CSS/JS y subes la web, la URL cambia sola y el
     * navegador descarga la versión nueva sin que el usuario tenga que
     * limpiar la caché ni entrar en modo incógnito.
     */
    function asset(string $path): string
    {
        $rel = ltrim($path, '/');
        $url = BASE_URL . 'assets/' . $rel;

        if (defined('ROOT_PATH')) {
            $file = ROOT_PATH . '/assets/' . $rel;
            if (is_file($file)) {
                $url .= '?v=' . filemtime($file);
            }
        }

        return $url;
    }
}

if (!function_exists('icon')) {
    /**
     * Devuelve un ícono SVG de línea (sin emojis) por nombre.
     * Hereda el color del contenedor (stroke: currentColor) y se
     * dimensiona desde el CSS.
     */
    function icon(string $name, string $class = 'icon'): string
    {
        static $lib = [
            'clipboard'  => '<rect x="8" y="2" width="8" height="4" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M9 14l2 2 4-4"/>',
            'building'   => '<path d="M3 21h18"/><path d="M5 21V7l7-4 7 4v14"/><path d="M9 21v-5h6v5"/><path d="M9 10h.01"/><path d="M15 10h.01"/>',
            'briefcase'  => '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
            'chart'      => '<line x1="6" y1="20" x2="6" y2="14"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="18" y1="20" x2="18" y2="10"/>',
            'graduation' => '<path d="M22 10L12 5 2 10l10 5 10-5z"/><path d="M6 12v5c0 1 2.7 3 6 3s6-2 6-3v-5"/>',
            'scale'      => '<line x1="12" y1="3" x2="12" y2="21"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="4" y1="7" x2="20" y2="7"/><path d="M4 7l-2.5 6h5z"/><path d="M20 7l-2.5 6h5z"/>',
            'book'       => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>',
            'users'      => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
            'tag'        => '<path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/>',
            'file'       => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>',
            'calendar'   => '<rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>',
            'pin'        => '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>',
            'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
            'mail'       => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 6l-10 7L2 6"/>',
            'globe'      => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>',
            'compass'    => '<circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>',
            'pen'        => '<path d="M12 19l7-7 3 3-7 7-3-3z"/><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="M2 2l7.586 7.586"/><circle cx="11" cy="11" r="2"/>',
            'tool'       => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
        ];

        $inner = $lib[$name] ?? '<circle cx="12" cy="12" r="9"/>';
        $safeClass = htmlspecialchars($class, ENT_QUOTES, 'UTF-8');

        return '<svg class="' . $safeClass . '" viewBox="0 0 24 24" fill="none" '
             . 'stroke="currentColor" stroke-width="1.8" stroke-linecap="round" '
             . 'stroke-linejoin="round" aria-hidden="true" focusable="false">'
             . $inner . '</svg>';
    }
}

if (!function_exists('old')) {
    /**
     * Recupera un valor antiguo del formulario (tras un error de validación).
     */
    function old(string $key, string $default = ''): string
    {
        return e($_SESSION['old'][$key] ?? $default);
    }
}

if (!function_exists('redirect')) {
    /**
     * Redirige a una ruta interna y detiene la ejecución.
     */
    function redirect(string $path = ''): void
    {
        header('Location: ' . url($path));
        exit;
    }
}
