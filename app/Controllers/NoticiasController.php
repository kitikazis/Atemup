<?php
/**
 * NoticiasController - Página de noticias.
 */

declare(strict_types=1);

class NoticiasController extends Controller
{
    public function index(): void
    {
        $noticiaModel = $this->model('Noticia');

        $this->view('noticias/index', [
            'titulo'        => 'Noticias - ' . SITE_NAME,
            'paginaCss'     => 'noticias',
            'navActivo'     => 'noticias',
            'categorias'    => $noticiaModel->categorias(),
            'noticias'      => $noticiaModel->porCategoria(),
        ]);
    }
}
