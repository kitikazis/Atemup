<?php
/**
 * Controller (base)
 * -------------------------------------------------------------
 * Clase padre de todos los controladores. Ofrece utilidades
 * comunes como cargar modelos y renderizar vistas.
 */

declare(strict_types=1);

abstract class Controller
{
    /**
     * Carga (require) e instancia un modelo de /app/Models.
     */
    protected function model(string $name)
    {
        $file = APP_PATH . '/Models/' . $name . '.php';
        if (!is_file($file)) {
            throw new RuntimeException("Modelo no encontrado: {$name}");
        }
        require_once $file;
        return new $name();
    }

    /**
     * Renderiza una vista con el layout principal.
     */
    protected function view(string $view, array $data = []): void
    {
        View::render($view, $data);
    }
}
