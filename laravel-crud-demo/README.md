# CRUD de Tareas — Laravel 8 + GitHub Actions

Proyecto de ejemplo listo para probar: un CRUD completo (Crear, Leer, Actualizar, Eliminar)
de **Tareas**, construido sobre el esqueleto oficial de Laravel 8, con una GitHub Action
(`.github/workflows/reporte-trabajo.yml`) que genera un reporte automático en cada
Pull Request y en cada push a `main`/`dev`.

## 📁 Qué incluye

- `app/Models/Tarea.php` — Modelo Eloquent.
- `app/Http/Controllers/TareaController.php` — Controlador con las 7 acciones REST (`index`, `create`, `store`, `show`, `edit`, `update`, `destroy`).
- `database/migrations/2024_01_01_000000_create_tareas_table.php` — Migración de la tabla `tareas`.
- `database/factories/TareaFactory.php` y `database/seeders/TareaSeeder.php` — Datos de ejemplo (15 tareas falsas).
- `resources/views/tareas/*.blade.php` — Vistas con Bootstrap 5 (listado paginado, crear, editar, ver detalle).
- `routes/web.php` — Rutas con `Route::resource('tareas', TareaController::class)`.
- `.github/workflows/reporte-trabajo.yml` — Tu GitHub Action, ya integrada al repo.
- `.env.example` — Preconfigurado con **SQLite** para que no necesites instalar MySQL para probarlo.

No toqué nada del esqueleto base de Laravel: autenticación, paquetes, etc. son los que trae `laravel/laravel` 8.x de fábrica.

## ✅ Cómo probarlo (sin cambiar nada)

Requisitos: PHP 8.0+ con extensión `sqlite3`/`pdo_sqlite`, y Composer instalado.

```bash
# 1. Instalar dependencias
composer install

# 2. Copiar el archivo de entorno y generar la clave de la app
cp .env.example .env
php artisan key:generate

# 3. La base de datos SQLite ya viene creada vacía en database/database.sqlite
#    (si no existiera, créala con: touch database/database.sqlite)

# 4. Ejecutar migraciones y sembrar datos de ejemplo
php artisan migrate --seed

# 5. Levantar el servidor
php artisan serve
```

Abre **http://127.0.0.1:8000** en tu navegador y verás el listado de tareas
(redirige automáticamente a `/tareas`). Desde ahí puedes crear, ver, editar y
eliminar tareas.

## 🔧 Rutas generadas

| Verbo  | URI              | Acción  | Nombre de ruta   |
|--------|------------------|---------|------------------|
| GET    | /tareas          | index   | tareas.index     |
| GET    | /tareas/create   | create  | tareas.create    |
| POST   | /tareas          | store   | tareas.store     |
| GET    | /tareas/{tarea}  | show    | tareas.show      |
| GET    | /tareas/{tarea}/edit | edit | tareas.edit     |
| PUT    | /tareas/{tarea}  | update  | tareas.update    |
| DELETE | /tareas/{tarea}  | destroy | tareas.destroy   |

## 🚀 Cómo probar la GitHub Action

1. Sube este proyecto a un repositorio nuevo en GitHub (puede ser público o privado):

   ```bash
   git init
   git add .
   git commit -m "Proyecto inicial: CRUD de tareas en Laravel 8"
   git branch -M main
   git remote add origin https://github.com/TU-USUARIO/TU-REPO.git
   git push -u origin main
   ```

2. La action se dispara automáticamente:
   - En cada **push** a `main` o `dev`.
   - En cada **Pull Request** (abierto, sincronizado o reabierto).

3. Para verla en acción con un PR:

   ```bash
   git checkout -b feature/demo
   echo "// cambio de prueba" >> app/Http/Controllers/TareaController.php
   git add . && git commit -m "feat: cambio de prueba para disparar la action"
   git push -u origin feature/demo
   ```

   Abre un Pull Request de `feature/demo` hacia `main` en GitHub. En unos segundos verás:
   - Un **comentario automático** en el PR con el reporte (autor, commit, métricas, archivos modificados).
   - El mismo reporte en la pestaña **Summary** del job, dentro de la pestaña *Actions*.

No necesitas tocar el archivo `.github/workflows/reporte-trabajo.yml`: ya está
configurado con los permisos necesarios (`contents: read`, `pull-requests: write`)
para poder comentar en el PR usando el `GITHUB_TOKEN` que GitHub provee automáticamente.

## 🗒️ Notas

- Si prefieres MySQL en lugar de SQLite, cambia `DB_CONNECTION=mysql` en `.env` y
  descomenta/ajusta las variables `DB_HOST`, `DB_DATABASE`, etc. (ya vienen comentadas en `.env.example`).
- El proyecto no incluye la carpeta `vendor/` (dependencias de Composer) ni `node_modules/`,
  igual que cualquier proyecto Laravel real: se generan con `composer install`.
