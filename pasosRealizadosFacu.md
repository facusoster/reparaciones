# Sistema de Gestión de Reparaciones de Celulares
## Backend – Laravel

## 1. Inicialización del Proyecto

Se creó el proyecto Laravel dentro de la carpeta:

C:\xampp\htdocs\reparaciones\tp_reparaciones

Se configuró el entorno utilizando:

- XAMPP (Apache + MySQL)
- Composer
- Laravel

---

## 2. Configuración de Base de Datos

Se creó la base de datos en phpMyAdmin:

reparaciones_db

Se configuró el archivo `.env` con los siguientes datos:

DB_DATABASE=reparaciones_db  
DB_USERNAME=root  
DB_PASSWORD=

---

## 3. Creación del Modelo y Migración

Se ejecutó el siguiente comando:

php artisan make:model Reparacion -m

Esto generó:

- Modelo: app/Models/Reparacion.php
- Migración: database/migrations/create_reparaciones_table.php

---

## 4. Definición de la Migración

Se definieron los campos requeridos en la tabla `reparaciones`:

- cliente (string)
- marca (string)
- modelo (string)
- descripcion_falla (text)
- fecha_ingreso (date)
- estado (string)
- timestamps (created_at, updated_at)

Se ejecutó:

php artisan migrate:fresh

Esto creó correctamente la tabla en la base de datos.

---

## 5. Configuración del Modelo

Archivo:

app/Models/Reparacion.php

Se configuró el modelo con:

- Nombre de la tabla
- Campos asignables (fillable)

Campos definidos en fillable:

- cliente
- marca
- modelo
- descripcion_falla
- fecha_ingreso
- estado

Esto permite operaciones CRUD seguras mediante Eloquent.

---

## 6. Verificación del Modelo

Se utilizó Tinker para validar el funcionamiento del modelo:

php artisan tinker

Se ejecutó una inserción de prueba:

Reparacion::create([...])

Resultado:

- Registro insertado correctamente
- Sin errores de Mass Assignment
- Confirmación en base de datos

---

## 7. Creación del Controlador

Se generó el controlador tipo resource:

php artisan make:controller ReparacionController --resource

Archivo generado:

app/Http/Controllers/ReparacionController.php

---

## 8. Implementación del CRUD

Se implementaron los siguientes métodos:

- index() → listar reparaciones
- create() → mostrar formulario
- store() → guardar nueva reparación
- show() → ver detalle
- edit() → mostrar formulario de edición
- update() → actualizar reparación
- destroy() → eliminar reparación

---

## 9. Validaciones

Se implementaron validaciones en:

- store()
- update()

Reglas:

- Todos los campos obligatorios
- fecha_ingreso debe ser una fecha válida
- estado obligatorio

---

## 10. Configuración de Rutas

Archivo:

routes/web.php

Se definió la ruta resource:

Route::resource('reparaciones', ReparacionController::class);

Esto genera automáticamente todas las rutas CRUD:

- reparaciones.index
- reparaciones.create
- reparaciones.store
- reparaciones.show
- reparaciones.edit
- reparaciones.update
- reparaciones.destroy

---

## 11. Estado Actual del Backend

El backend actualmente permite:

- Crear reparaciones
- Listar reparaciones
- Ver detalle de reparación
- Editar registros
- Eliminar registros

Todo utilizando:

- Laravel MVC
- Eloquent ORM
- Validaciones del lado del servidor

---

## 12. Próximos pasos

- Implementación de vistas (Blade)
- Integración con frontend
- Estilizado con Bootstrap