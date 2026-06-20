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
                'icono'       => '📚',
                'titulo'      => 'Acceso a Recursos',
                'descripcion' => 'Biblioteca digital con documentos, guías técnicas e instrumentos de gestión municipal.',
            ],
            [
                'icono'       => '🎓',
                'titulo'      => 'Capacitación Continua',
                'descripcion' => 'Programas de formación para funcionarios municipales, con certificación.',
            ],
            [
                'icono'       => '🤝',
                'titulo'      => 'Red de Contactos',
                'descripcion' => 'Comunidad de alcaldes y funcionarios para compartir experiencias y buenas prácticas.',
            ],
            [
                'icono'       => '💼',
                'titulo'      => 'Asesoría Profesional',
                'descripcion' => 'Acceso a especialistas en gestión municipal, finanzas y administración local.',
            ],
            [
                'icono'       => '📊',
                'titulo'      => 'Comparativo de Desempeño',
                'descripcion' => 'Comparación del desempeño municipal con indicadores técnicos.',
            ],
            [
                'icono'       => '🎯',
                'titulo'      => 'Descuentos Especiales',
                'descripcion' => 'Tarifas preferenciales en servicios de consultoría y auditoría.',
            ],
        ];
    }
}
