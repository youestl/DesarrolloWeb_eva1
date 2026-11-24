# Sistema de Gestión de Proyectos — API REST & JWT

Aplicación web desarrollada con **Laravel**, **MySQL** y **JWT** basada en el patrón Modelo-Vista-Controlador (MVC) y arquitectura de controladores de acción única. Permite gestionar proyectos mediante un CRUD completo, incorporando registro de usuarios con cifrado de contraseñas, autenticación por tokens JWT y consulta del valor de la UF en tiempo real.

---

## Características Principales

* **Base de Datos Relacional y ORM (Eloquent):** Persistencia en **MySQL** (`desarrollo_software_1`) con migraciones limpias para las tablas `usuarios` y `proyectos`, vinculadas mediante la llave foránea `created_by`.
* **Autenticación y Autorización con JWT:** Implementación de registro e inicio de sesión mediante `tymon/jwt-auth`, generando tokens JWT firmados (`HS256`) y protegiendo endpoints mediante middleware con cabecera `Authorization: Bearer <token>`.
* **Cifrado de Contraseñas:** Almacenamiento seguro de credenciales cifradas con `Hash::make()` antes de persistir en la base de datos.
  
* **Vistas de Autenticación Conectadas:** Formularios de registro (`registro.blade.php`) e inicio de sesión (`login.blade.php`) construidos con **Tailwind CSS**, conectados a la API con `fetch()`, persistencia del token en `localStorage` y redirección automática al listado de proyectos (`/proyectos`).
* **CRUD de Proyectos:** Listado, creación, visualización, edición y eliminación de registros gestionados por controladores de acción única, además de búsqueda y eliminación rápida por ID desde el layout principal (`main.blade.php`).
* **Indicador de UF en Tiempo Real:** Componente de clase (`ValorUf`) conectado a la API pública de GAEL (`https://api.gael.cloud/general/public/monedas/UF`).

---

## Tecnologías Utilizadas

* **Backend:** PHP 8.x, Laravel, Eloquent ORM
* **Base de Datos:** MySQL / MariaDB
* **Seguridad:** JWT (`tymon/jwt-auth`), Hash (Bcrypt)
* **Frontend:** Blade, Tailwind CSS, JavaScript (`fetch` API)
* **Control de Versiones:** Git & GitHub

---

## Rutas y Endpoints Principales

### API de Autenticación

| Método | Endpoint | Controlador / Acción | Descripción |
| :--- | :--- | :--- | :--- |
| `POST` | `/api/registro` | `AuthController@registro` | Registra un usuario y cifra su clave |
| `POST` | `/api/login` | `AuthController@login` | Valida credenciales y retorna el token JWT |
| `GET` | `/api/perfil` | Middleware JWT | Retorna los datos del usuario autenticado (requiere Bearer Token) |

### Vistas Web y CRUD de Proyectos

| Método | Ruta | Descripción |
| :--- | :--- | :--- |
| `GET` | `/` | Redirige automáticamente a `/login` |
| `GET` | `/login` | Vista de inicio de sesión |
| `GET` | `/registro` | Vista de registro de usuarios |
| `GET` | `/proyectos` | Listado general de proyectos |
| `GET` / `POST` | `/proyectos/crear` · `/proyectos` | Formulario y almacenamiento de nuevo proyecto |
| `GET` / `POST` | `/proyectos/{id}` · `/proyectos/buscar` | Detalle y búsqueda de proyecto por ID |
| `GET` / `PUT` | `/proyectos/{id}/editar` · `/proyectos/{id}` | Formulario y actualización de proyecto |
| `GET` / `DELETE` | `/proyectos/{id}/borrar` · `/proyectos/{id}` | Confirmación y eliminación de proyecto |

---

## Estructura del Proyecto

```text
DesarrolloWeb_eva1/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── ListarProyectosController.php
│   │   │   ├── VerProyectoController.php
│   │   │   ├── CrearProyectoController.php
│   │   │   ├── ActualizarProyectoController.php
│   │   │   └── EliminarProyectoController.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── Usuario.php
│   │   └── Proyecto.php
│   └── View/Components/
│       └── ValorUf.php
├── database/
│   └── migrations/
│       ├── ..._create_usuarios_table.php
│       └── ..._create_proyectos_table.php
├── resources/views/
│   ├── layouts/main.blade.php
│   ├── proyectos/
│   ├── login.blade.php
│   └── registro.blade.php
└── routes/
    ├── api.php
    └── web.php
