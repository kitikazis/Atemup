<?php
/**
 * Configuración global de la aplicación ATEMUP
 * -------------------------------------------------------------
 * Aquí se define todo lo que cambia según el entorno
 * (rutas internas, datos de contacto, correo, etc.).
 */

declare(strict_types=1);

/* -----------------------------------------------------------
 |  Entorno
 |  'dev'  -> muestra errores en pantalla
 |  'prod' -> oculta errores (úsalo en cPanel)
 * ----------------------------------------------------------- */
define('APP_ENV', 'dev');

if (APP_ENV === 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

/* -----------------------------------------------------------
 |  Rutas internas (sistema de archivos)
 * ----------------------------------------------------------- */
define('ROOT_PATH',    __DIR__ . '/..');
define('APP_PATH',     ROOT_PATH . '/app');
define('VIEW_PATH',    APP_PATH . '/Views');
define('STORAGE_PATH', ROOT_PATH . '/storage');

/* -----------------------------------------------------------
 |  BASE_URL  (se calcula solo: funciona en dominio raíz
 |  o en un subdirectorio sin tocar nada)
 * ----------------------------------------------------------- */
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$scriptDir = rtrim($scriptDir, '/');
define('BASE_PATH', $scriptDir);          // '' en dominio raíz, '/carpeta' en subdir
define('BASE_URL',  BASE_PATH . '/');     // siempre termina en '/'

/* -----------------------------------------------------------
 |  Datos del sitio (se usan en las vistas)
 * ----------------------------------------------------------- */
define('SITE_NAME',     'ATEMUP');
define('SITE_TAGLINE',  'ASOCIACIÓN TÉCNICA DE MUNICIPALIDADES');
define('SITE_EMAIL',    'info@atemup.com');
define('SITE_PHONE',    '+51 908 915 408');
define('SITE_PHONE_2',  '+51 990 999 111');
define('SITE_ADDRESS',  'Los Angeles #148 Piso 2 Of. 4');
define('SITE_CITY',     'Lima - Perú');
define('WHATSAPP_URL',  'https://wa.me/51908915408');

/* -----------------------------------------------------------
 |  Correo donde llegan los mensajes del formulario
 * ----------------------------------------------------------- */
define('CONTACT_RECIPIENT', 'info@atemup.com');

/* -----------------------------------------------------------
 |  Sesión (para mensajes flash del formulario)
 * ----------------------------------------------------------- */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
