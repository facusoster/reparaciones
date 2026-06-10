Trabajo Practico Parcial N° 2 - Sistema de Gestión de Reparaciones de Celulares

Profesor: Calderón Nicolás Ariel.

Miércoles 19-21hs.

Repositorio Github:

[https://github.com/facusoster/reparaciones](https://github.com/facusoster/reparaciones)

Alumnos:

Julián Verdirame

Facundo Soster

---

Objetivo

Desarrollar una aplicación web utilizando Laravel para administrar los equipos que ingresan a un servicio técnico de celulares. El trabajo deberá aplicar los conceptos de arquitectura MVC, Blade Templates, Eloquent ORM y operaciones CRUD sobre una base de datos.

Requerimientos

Cada reparación deberá almacenar la siguiente información:

- Nombre del cliente
- Marca del celular
- Modelo del celular
- Descripción de la falla
- Fecha de ingreso
- Estado de la reparación

Los estados posibles serán:

- Ingresado
- En reparación
- Reparado
- Entregado

Funcionalidades obligatorias

1. Listado de reparaciones
	- La aplicación deberá mostrar un listado con todas las reparaciones registradas.
	- Como mínimo deberá visualizarse: Cliente, Marca, Modelo, Estado y Acciones disponibles.

2. Registrar una nueva reparación
	- Se deberá implementar un formulario que permita cargar una nueva reparación.
	- Validaciones mínimas:
	  - Todos los campos son obligatorios.
	  - La fecha de ingreso debe ser válida.
	  - El estado debe seleccionarse de una lista desplegable.

3. Modificar una reparación
	- El usuario deberá poder editar cualquier dato de una reparación existente.

4. Eliminar una reparación
	- El sistema deberá permitir eliminar registros de la base de datos.

5. Ver detalle de una reparación
	- Se deberá crear una vista que muestre toda la información registrada de una reparación específica.

Requisitos técnicos

El trabajo deberá cumplir obligatoriamente con los siguientes puntos:

- Utilizar Laravel.
- Implementar arquitectura MVC.
- Utilizar Eloquent ORM.
- Crear migraciones para la base de datos.
- Utilizar Blade Templates.
- Utilizar rutas nombradas.
- Implementar validaciones del lado del servidor.
- Utilizar Bootstrap o CSS propio para mejorar la interfaz.

Estructura sugerida

Modelo:

- `Reparacion`

Controlador:

- `ReparacionController`

Tabla:

- `reparaciones`

Vistas mínimas:

- `index.blade.php`
- `create.blade.php`
- `edit.blade.php`
- `show.blade.php`

---

Breve ejecución local (XAMPP)

1. Clonar el repositorio en `C:/xampp/htdocs/` o la ruta deseada.
2. Crear la base de datos `reparaciones_db` en phpMyAdmin.
3. Copiar `.env.example` a `.env` y ajustar credenciales (por defecto `DB_USERNAME=root`, `DB_PASSWORD=`).
4. Instalar dependencias y ejecutar migraciones:

```bash
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Contacto

Para consultas, abrir un issue en el repositorio o contactar a los alumnos listados.
