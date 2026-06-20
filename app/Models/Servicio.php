<?php
/**
 * Modelo Servicio
 * -------------------------------------------------------------
 * Fuente de datos de los servicios que ofrece ATEMUP.
 * Hoy devuelve un arreglo fijo; en el futuro puede leer de una
 * base de datos MySQL sin cambiar los controladores ni las vistas.
 */

declare(strict_types=1);

class Servicio
{
    /**
     * @return array<int, array{icono:string, titulo:string, descripcion:string}>
     */
    public function todos(): array
    {
        return [
            [
                'icono'       => 'clipboard',
                'titulo'      => 'Auditoría Técnica',
                'descripcion' => 'Revisamos los procesos de tu municipalidad para verificar que cumplan con la normativa vigente.',
            ],
            [
                'icono'       => 'building',
                'titulo'      => 'Infraestructura',
                'descripcion' => 'Diseñamos, supervisamos y evaluamos proyectos de infraestructura pública con respaldo técnico.',
            ],
            [
                'icono'       => 'briefcase',
                'titulo'      => 'Gestión Administrativa',
                'descripcion' => 'Ordenamos y modernizamos los procesos administrativos de la municipalidad.',
            ],
            [
                'icono'       => 'chart',
                'titulo'      => 'Asesoría Financiera',
                'descripcion' => 'Te asesoramos en la planificación del presupuesto y el control de los recursos públicos.',
            ],
            [
                'icono'       => 'graduation',
                'titulo'      => 'Capacitación',
                'descripcion' => 'Capacitamos a los funcionarios municipales en temas técnicos y normativos.',
            ],
            [
                'icono'       => 'scale',
                'titulo'      => 'Asesoría Legal',
                'descripcion' => 'Orientación legal en normativa municipal y gestión pública.',
            ],
        ];
    }
}
