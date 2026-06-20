<?php
/**
 * ServiciosController - Página de servicios.
 */

declare(strict_types=1);

class ServiciosController extends Controller
{
    public function index(): void
    {
        $servicioModel = $this->model('Servicio');

        $this->view('servicios/index', [
            'titulo'     => 'Servicios - ' . SITE_NAME,
            'paginaCss'  => 'servicios',
            'navActivo'  => 'servicios',
            'servicios'  => $servicioModel->todos(),
        ]);
    }
}
