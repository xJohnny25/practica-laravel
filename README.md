# Práctica Laravel - Alumnos CRUD

## Requisitos
- PHP + Composer
- Base de datos (MySQL o PostgreSQL)

## 1) Crear proyecto
- `laravel new practica1`
  - Crea el proyecto Laravel desde cero.

## 2) Servidor local
- `composer install`
  - Instala todas las dependencias del proyecto definidas en `composer.json`.
- `php artisan key:generate`
  - Genera y guarda en `.env` la clave de aplicación (`APP_KEY`), necesaria para la encriptación y la seguridad de sesiones.
- `php artisan serve`
  - Arranca el servidor de desarrollo.

## 3) Migration tabla alumnos
- `php artisan make:migration create_alumnos_table`
  - Crea una migration para definir la estructura de la tabla.
- `php artisan migrate`
  - Ejecuta las migrations y crea la tabla en la base de datos.

## 4) Seeder
- `php artisan make:seeder AlumnoSeeder`
  - Crea un seeder para insertar datos de prueba.
- `php artisan db:seed`
  - Ejecuta los seeders.
- `php artisan migrate:fresh --seed`
  - Borra y recrea tablas y ejecuta seeders (ideal para reiniciar).

## 5) Modelo y Controller
- `php artisan make:model Alumno`
  - Crea el modelo Eloquent para la tabla alumnos.
- `php artisan make:controller AlumnoController`
  - Crea el controlador con la lógica CRUD.

## 6) Middleware
- `php artisan make:middleware AsegurarIdPositivo`
  - Crea un middleware para validar que el id de la ruta sea entero positivo.

## 7) Rutas
- Rutas definidas en `routes/web.php` para:
  - Obtener todos, obtener por id, crear, actualizar, borrar.

## 8) Pruebas (ejemplos)
- GET `/api/alumnos`
- GET `/api/alumnos/1`
- POST `/api/alumnos`
- PUT/PATCH `/api/alumnos/1`
- DELETE `/api/alumnos/1`