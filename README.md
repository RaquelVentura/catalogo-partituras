<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Partituras

Aplicación Laravel para **consultar** un catálogo de partituras (autores, categorías, audios y documentos asociados) almacenado en una base de datos PostgreSQL ya existente.

> **Nota:** esta app es solo de lectura/consulta. No incluye formularios para crear, editar o eliminar registros — asume que la base de datos ya está cargada con los datos.

## Requisitos

- PHP 8.2+
- Composer
- PostgreSQL con la base de datos ya creada y poblada

## Instalación

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Edita `.env` y configura la conexión a tu base de datos PostgreSQL existente:

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nombre_de_tu_bd
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

## Uso

```bash
php artisan serve
```

Visita `http://localhost:8000/partituras` para ver el listado de partituras con su autor, categoría, audio y documento asociados.

## Estructura

- `app/Models`: `Partitura`, `Autor`, `Categoria`, `Audio`, `Documento`
- `app/Http/Controllers/PartituraController.php`: controlador de solo lectura que trae el listado con sus relaciones
- `resources/views/partituras/index.blade.php`: vista del listado

## Licencia

Este proyecto está construido sobre el framework [Laravel](https://laravel.com), licenciado bajo [MIT](https://opensource.org/licenses/MIT).
