<?php
/**
 * Modelo Beneficio
 * -------------------------------------------------------------
 * Beneficios exclusivos para asociados de ATEMUP.
 */

declare(strict_types=1);

class Beneficio
{
    /**
     * @return array<int, array{icono:string, titulo:string, descripcion:string}>
     */
    public function todos(): array
    {
        return [
            [
                'icono'       => 'book',
                'titulo'      => 'Acceso a Recursos',
                'descripcion' => 'Biblioteca digital con documentos, guías técnicas e instrumentos de gestión municipal.',
            ],
            [
                'icono'       => 'graduation',
                'titulo'      => 'Capacitación Continua',
                'descripcion' => 'Programas de formación para funcionarios municipales, con certificación.',
            ],
            [
                'icono'       => 'users',
                'titulo'      => 'Red de Contactos',
                'descripcion' => 'Comunidad de alcaldes y funcionarios para compartir experiencias y buenas prácticas.',
            ],
            [
                'icono'       => 'briefcase',
                'titulo'      => 'Asesoría Profesional',
                'descripcion' => 'Acceso a especialistas en gestión municipal, finanzas y administración local.',
            ],
            [
                'icono'       => 'chart',
                'titulo'      => 'Comparativo de Desempeño',
                'descripcion' => 'Comparación del desempeño municipal con indicadores técnicos.',
            ],
            [
                'icono'       => 'tag',
                'titulo'      => 'Descuentos Especiales',
                'descripcion' => 'Tarifas preferenciales en servicios de consultoría y auditoría.',
            ],
        ];
    }
}
