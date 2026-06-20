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
     */
    function asset(string $path): string
    {
        return BASE_URL . 'assets/' . ltrim($path, '/');
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
