<?php
/**
 * Modelo Mensaje
 * -------------------------------------------------------------
 * Representa un mensaje enviado desde el formulario de contacto.
 * Se encarga de validar los datos, guardarlos en /storage y
 * (opcionalmente) enviar un correo al destinatario configurado.
 */

declare(strict_types=1);

class Mensaje
{
    /** @var array<string, string> Errores de validación (campo => mensaje) */
    private array $errores = [];

    /**
     * Valida los datos del formulario.
     *
     * @param array<string, mixed> $datos
     * @return bool  true si no hay errores
     */
    public function validar(array $datos): bool
    {
        $this->errores = [];

        $nombres   = trim((string) ($datos['nombres']   ?? ''));
        $apellidos = trim((string) ($datos['apellidos'] ?? ''));
        $email     = trim((string) ($datos['email']     ?? ''));
        $celular   = trim((string) ($datos['celular']   ?? ''));
        $mensaje   = trim((string) ($datos['mensaje']   ?? ''));
        $robot     = $datos['robot'] ?? null;

        if ($nombres === '') {
            $this->errores['nombres'] = 'Ingresa tus nombres.';
        }
        if ($apellidos === '') {
            $this->errores['apellidos'] = 'Ingresa tus apellidos.';
        }
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errores['email'] = 'Ingresa un email válido.';
        }
        if ($celular === '') {
            $this->errores['celular'] = 'Ingresa tu número de celular.';
        }
        if ($mensaje === '') {
            $this->errores['mensaje'] = 'Escribe tu mensaje.';
        } elseif (mb_strlen($mensaje) > 2000) {
            $this->errores['mensaje'] = 'El mensaje no puede superar los 2000 caracteres.';
        }
        if (!$robot) {
            $this->errores['robot'] = 'Confirma que no eres un robot.';
        }

        return empty($this->errores);
    }

    /**
     * @return array<string, string>
     */
    public function errores(): array
    {
        return $this->errores;
    }

    /**
     * Guarda el mensaje en un archivo dentro de /storage y trata
     * de enviar un correo. Devuelve true si se pudo guardar.
     *
     * @param array<string, mixed> $datos
     */
    public function guardar(array $datos): bool
    {
        $registro = [
            'fecha'     => date('Y-m-d H:i:s'),
            'nombres'   => trim((string) $datos['nombres']),
            'apellidos' => trim((string) $datos['apellidos']),
            'email'     => trim((string) $datos['email']),
            'celular'   => trim((string) $datos['celular']),
            'mensaje'   => trim((string) $datos['mensaje']),
            'ip'        => $_SERVER['REMOTE_ADDR'] ?? '',
        ];

        $guardado = $this->guardarEnArchivo($registro);
        $this->enviarCorreo($registro); // si el hosting no tiene mail(), simplemente se ignora

        return $guardado;
    }

    /**
     * Persiste el mensaje en storage/mensajes.log (formato JSON por línea).
     *
     * @param array<string, string> $registro
     */
    private function guardarEnArchivo(array $registro): bool
    {
        if (!is_dir(STORAGE_PATH)) {
            @mkdir(STORAGE_PATH, 0775, true);
        }

        $linea = json_encode($registro, JSON_UNESCAPED_UNICODE) . PHP_EOL;
        return @file_put_contents(STORAGE_PATH . '/mensajes.log', $linea, FILE_APPEND | LOCK_EX) !== false;
    }

    /**
     * Envía el mensaje por correo al destinatario configurado.
     *
     * @param array<string, string> $registro
     */
    private function enviarCorreo(array $registro): bool
    {
        if (!function_exists('mail')) {
            return false;
        }

        $asunto = 'Nuevo mensaje de contacto - ' . SITE_NAME;

        $cuerpo  = "Has recibido un nuevo mensaje desde el sitio web:\n\n";
        $cuerpo .= "Nombres:   {$registro['nombres']} {$registro['apellidos']}\n";
        $cuerpo .= "Email:     {$registro['email']}\n";
        $cuerpo .= "Celular:   {$registro['celular']}\n";
        $cuerpo .= "Fecha:     {$registro['fecha']}\n\n";
        $cuerpo .= "Mensaje:\n{$registro['mensaje']}\n";

        $headers  = 'From: ' . SITE_NAME . ' <no-reply@' . ($_SERVER['SERVER_NAME'] ?? 'localhost') . ">\r\n";
        $headers .= 'Reply-To: ' . $registro['email'] . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        return @mail(CONTACT_RECIPIENT, $asunto, $cuerpo, $headers);
    }
}
