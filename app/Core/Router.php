<?php
/**
 * Router
 * -------------------------------------------------------------
 * Mapea (método HTTP + ruta) -> Controlador@acción y despacha
 * la petición actual.
 */

declare(strict_types=1);

class Router
{
    /** @var array<string, array<string,string>> */
    private array $routes = ['GET' => [], 'POST' => []];

    public function get(string $path, string $handler): void
    {
        $this->routes['GET'][$this->normalize($path)] = $handler;
    }

    public function post(string $path, string $handler): void
    {
        $this->routes['POST'][$this->normalize($path)] = $handler;
    }

    /**
     * Resuelve la petición actual y ejecuta el controlador.
     */
    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $route  = $this->currentRoute();

        $handler = $this->routes[$method][$route] ?? null;

        if ($handler === null) {
            $this->notFound();
            return;
        }

        [$controllerName, $action] = explode('@', $handler);

        $file = APP_PATH . '/Controllers/' . $controllerName . '.php';
        if (!is_file($file)) {
            $this->notFound();
            return;
        }

        require_once $file;
        $controller = new $controllerName();
        $controller->{$action}();
    }

    /**
     * Determina la ruta solicitada a partir de la URL,
     * funciona tanto en dominio raíz como en subdirectorios.
     */
    private function currentRoute(): string
    {
        // Preferimos REQUEST_URI (más fiable que el parámetro url)
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
        $uri = urldecode($uri);

        // Quitar el subdirectorio base si existe
        if (BASE_PATH !== '' && strpos($uri, BASE_PATH) === 0) {
            $uri = substr($uri, strlen(BASE_PATH));
        }

        return $this->normalize($uri);
    }

    private function normalize(string $path): string
    {
        return trim($path, '/');
    }

    private function notFound(): void
    {
        http_response_code(404);
        $file = VIEW_PATH . '/errors/404.php';
        if (is_file($file)) {
            View::render('errors/404', ['titulo' => 'Página no encontrada']);
        } else {
            echo '<h1>404 - Página no encontrada</h1>';
        }
    }
}
