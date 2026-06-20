<?php
/**
 * HomeController - Página de inicio.
 */

declare(strict_types=1);

class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home/index', [
            'titulo'     => SITE_NAME . ' - Asociación Técnica de Municipalidades',
            'paginaCss'  => 'home',
            'navActivo'  => 'inicio',
        ]);
    }
}
