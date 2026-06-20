<?php
/**
 * ContactoController - Página de contacto y procesamiento del formulario.
 */

declare(strict_types=1);

class ContactoController extends Controller
{
    /**
     * Muestra el formulario de contacto (GET).
     */
    public function index(): void
    {
        // Recuperar mensajes flash y datos antiguos de la sesión
        $exito   = $_SESSION['flash_exito']   ?? null;
        $errores = $_SESSION['flash_errores'] ?? [];

        unset($_SESSION['flash_exito'], $_SESSION['flash_errores']);

        $this->view('contacto/index', [
            'titulo'    => 'Contacto - ' . SITE_NAME,
            'paginaCss' => 'contacto',
            'navActivo' => 'contacto',
            'exito'     => $exito,
            'errores'   => $errores,
        ]);

        // Limpiar datos antiguos una vez renderizado
        unset($_SESSION['old']);
    }

    /**
     * Procesa el envío del formulario (POST).
     */
    public function store(): void
    {
        $mensaje = $this->model('Mensaje');

        // Conservar lo escrito por si hay errores
        $_SESSION['old'] = [
            'nombres'   => $_POST['nombres']   ?? '',
            'apellidos' => $_POST['apellidos'] ?? '',
            'email'     => $_POST['email']     ?? '',
            'celular'   => $_POST['celular']   ?? '',
            'mensaje'   => $_POST['mensaje']   ?? '',
        ];

        if (!$mensaje->validar($_POST)) {
            $_SESSION['flash_errores'] = $mensaje->errores();
            redirect('contacto');
        }

        $mensaje->guardar($_POST);

        unset($_SESSION['old']);
        $_SESSION['flash_exito'] = '¡Gracias! Tu mensaje fue enviado correctamente. Te contactaremos pronto.';
        redirect('contacto');
    }
}
