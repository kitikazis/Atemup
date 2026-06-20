<?php
/**
 * View
 * -------------------------------------------------------------
 * Renderiza una plantilla PHP envuelta en el layout principal
 * (cabecera/nav + contenido + pie de página).
 */

declare(strict_types=1);

class View
{
    /**
     * Renderiza una vista dentro del layout por defecto.
     *
     * @param string $view  Ruta de la vista relativa a /app/Views (ej: 'home/index')
     * @param array  $data  Variables disponibles dentro de la vista
     */
    public static function render(string $view, array $data = []): void
    {
        // Las claves del array pasan a ser variables ($titulo, $servicios, ...)
        extract($data, EXTR_SKIP);

        $viewFile = VIEW_PATH . '/' . $view . '.php';
        if (!is_file($viewFile)) {
            http_response_code(500);
            exit('Vista no encontrada: ' . e($view));
        }

        // El contenido de la vista se captura en $content y se inyecta en el layout
        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        require VIEW_PATH . '/layouts/main.php';
    }

    /**
     * Renderiza un parcial (componente reutilizable) y devuelve el HTML.
     */
    public static function partial(string $partial, array $data = []): string
    {
        extract($data, EXTR_SKIP);
        ob_start();
        require VIEW_PATH . '/' . $partial . '.php';
        return ob_get_clean();
    }
}
