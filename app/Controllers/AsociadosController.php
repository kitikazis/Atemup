<?php
/**
 * AsociadosController - Página de asociados / beneficios.
 */

declare(strict_types=1);

class AsociadosController extends Controller
{
    public function index(): void
    {
        $beneficioModel = $this->model('Beneficio');

        $this->view('asociados/index', [
            'titulo'      => 'Asociados - ' . SITE_NAME,
            'paginaCss'   => 'asociados',
            'navActivo'   => 'asociados',
            'beneficios'  => $beneficioModel->todos(),
        ]);
    }
}
