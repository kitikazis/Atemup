<?php
/**
 * Modelo Noticia
 * -------------------------------------------------------------
 * Noticias agrupadas por categoría. Las categorías sin noticias
 * muestran un "estado vacío" en la vista.
 */

declare(strict_types=1);

class Noticia
{
    /**
     * Categorías disponibles (clave => etiqueta visible).
     *
     * @return array<string, string>
     */
    public function categorias(): array
    {
        return [
            'editorial'     => 'Editorial ATEMUP',
            'normativas'    => 'Normas Legales',
            'nacional'      => 'Nacional',
            'local'         => 'Local',
            'internacional' => 'Internacional',
        ];
    }

    /**
     * Noticias agrupadas por categoría.
     *
     * @return array<string, array<int, array{icono:string, fecha:string, titulo:string, extracto:string}>>
     */
    public function porCategoria(): array
    {
        return [
            'editorial'  => [],
            'normativas' => [
                [
                    'icono'    => '📋',
                    'fecha'    => '15 de junio, 2024',
                    'titulo'   => 'Nueva Normativa de Gestión Municipal 2024',
                    'extracto' => 'Se ha establecido nuevas directrices para la gestión administrativa en municipalidades del país.',
                ],
            ],
            'nacional' => [
                [
                    'icono'    => '🏛️',
                    'fecha'    => '12 de junio, 2024',
                    'titulo'   => 'Conferencia Nacional de Municipalidades',
                    'extracto' => 'Se realizó exitosa conferencia con asistencia de representantes de municipios del país.',
                ],
                [
                    'icono'    => '📊',
                    'fecha'    => '10 de junio, 2024',
                    'titulo'   => 'Informe de Desempeño Municipal Semestral',
                    'extracto' => 'Se presentó el informe de evaluación de municipalidades a nivel nacional.',
                ],
            ],
            'local'         => [],
            'internacional' => [],
        ];
    }
}
