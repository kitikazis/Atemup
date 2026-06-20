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
