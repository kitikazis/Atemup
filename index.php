<?php
/**
 * ATEMUP - Front Controller
 * -------------------------------------------------------------
 * Punto de entrada único de la aplicación. Todas las peticiones
 * (gracias al .htaccess) pasan por aquí, se resuelve la ruta y
 * se delega al controlador correspondiente (patrón MVC).
 */

declare(strict_types=1);

// 1) Configuración global y constantes (rutas, BASE_URL, errores...)
require __DIR__ . '/config/config.php';

// 1.1) Caché del documento HTML:
//   El HTML NO se cachea, así el navegador siempre pide la última versión
//   de la página y ve los enlaces de CSS/JS/imágenes con su ?v=<fecha>
//   actualizado. Los archivos estáticos sí se cachean (con cache-busting),
//   por lo que el usuario siempre recibe lo último sin limpiar nada.
if (!headers_sent()) {
    header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
    header('Pragma: no-cache');
    header('Expires: 0');
}

// 2) Núcleo MVC (autoload sencillo + helpers)
require APP_PATH . '/Core/helpers.php';
require APP_PATH . '/Core/View.php';
require APP_PATH . '/Core/Controller.php';
require APP_PATH . '/Core/Router.php';

// 3) Definición de rutas de la aplicación
$router = new Router();

$router->get('',             'HomeController@index');
$router->get('servicios',    'ServiciosController@index');
$router->get('noticias',     'NoticiasController@index');
$router->get('asociados',    'AsociadosController@index');
$router->get('contacto',     'ContactoController@index');
$router->post('contacto',    'ContactoController@store');

// 4) Resolver la petición actual
$router->dispatch();
