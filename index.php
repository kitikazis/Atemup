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
