# ATEMUP - Sitio web en PHP (MVC)

Sitio institucional de ATEMUP (Asociación Técnica de Municipalidades),
hecho en PHP con arquitectura MVC (Modelo-Vista-Controlador) y listo para
subir a un hosting cPanel.

No necesita base de datos ni Composer: funciona tal cual.

## Estructura del proyecto

```
atemup-php/
├── index.php            Front controller (único punto de entrada)
├── .htaccess            URLs amigables + seguridad (Apache)
├── config/
│   └── config.php       Datos del sitio, correo, entorno (dev/prod)
├── app/
│   ├── Core/            Router, Controller, View, helpers
│   ├── Controllers/     Un controlador por página
│   ├── Models/          Datos: Servicio, Beneficio, Noticia, Mensaje
│   └── Views/
│       ├── layouts/     Plantilla principal (main.php)
│       ├── partials/    Nav, footer, botón WhatsApp
│       ├── home/  servicios/  noticias/  asociados/  contacto/
│       └── errors/      Página 404
├── assets/
│   ├── css/             global.css + un .css por página
│   └── js/main.js       Tabs, contador de caracteres, "volver arriba"
└── storage/             Mensajes del formulario (mensajes.log)
```

### Rutas disponibles

| URL          | Página     |
|--------------|------------|
| `/`          | Inicio     |
| `/servicios` | Servicios  |
| `/noticias`  | Noticias   |
| `/asociados` | Asociados  |
| `/contacto`  | Contacto (formulario funcional) |

## Probar en local

Con PHP instalado, desde la carpeta `atemup-php`:

```bash
php -S localhost:8000
```

Abre http://localhost:8000 en el navegador.

El servidor embebido de PHP no lee `.htaccess`, pero el router también
resuelve las rutas por `REQUEST_URI`, así que todo funciona igual.

## Subir a cPanel (paso a paso)

1. Comprime el contenido de la carpeta `atemup-php` en un `.zip`
   (que el `.zip` contenga `index.php` en la raíz, no la carpeta envolvente).
2. En cPanel entra a Administrador de archivos y abre la carpeta `public_html`.
   - Si el sitio será el principal del dominio: súbelo dentro de `public_html`.
   - Si va en un subdominio o subcarpeta: créala y súbelo ahí.
3. Pulsa Cargar (Upload) y sube el `.zip`.
4. Clic derecho sobre el `.zip` y elige Extract / Extraer.
5. Borra el `.zip` una vez extraído.
6. En PHP Selector / MultiPHP Manager elige PHP 7.4 o superior.
7. Da permisos de escritura a la carpeta `storage/` (normalmente 755).
8. Edita `config/config.php`:
   - Cambia `APP_ENV` de `'dev'` a `'prod'` (oculta errores).
   - Ajusta `CONTACT_RECIPIENT` al correo donde quieres recibir los mensajes.
   - Revisa teléfono, dirección y `WHATSAPP_URL`.

Listo. El sitio queda disponible en tu dominio.

### Si lo instalas en una subcarpeta

El `BASE_URL` se calcula solo, así que los enlaces y assets funcionan igual.
Si usaras reglas de reescritura personalizadas, puedes activar `RewriteBase`
en el `.htaccess`.

## Formulario de contacto

- Valida los campos en el servidor (nombres, apellidos, email, celular, mensaje).
- Guarda cada envío en `storage/mensajes.log` (un JSON por línea).
- Intenta enviar un correo a `CONTACT_RECIPIENT` con la función `mail()` de PHP
  (disponible en la mayoría de hostings cPanel).

Si tu hosting no permite `mail()`, los mensajes igualmente quedan guardados en
`storage/mensajes.log` para consultarlos.

## Cómo crecer (opcional)

- Base de datos: los modelos (`app/Models`) hoy devuelven arreglos. Para usar
  MySQL, crea la BD en cPanel y reemplaza el contenido de los métodos por
  consultas PDO. Las vistas y controladores no cambian.
- Nueva página: crea un controlador en `app/Controllers`, su vista en
  `app/Views` y registra la ruta en `index.php`:

```php
$router->get('nosotros', 'NosotrosController@index');
```
