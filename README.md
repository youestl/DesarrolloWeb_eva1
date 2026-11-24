# Sistema CRUD de Proyectos - Desarrollo Web

Aplicación web desarrollada con el framework **Laravel** basada en el patrón arquitectónico Modelo-Vista-Controlador (MVC), implementada como parte de la evaluación de la asignatura de Desarrollo Web.

---

## 🚀 Características Principales

* **Persistencia basada en Sesiones:** El sistema simula operaciones CRUD completas (Crear, Leer, Actualizar y Eliminar) sin utilizar una base de datos relacional, empleando arreglos estáticos gestionados mediante la clase `Session` nativa de Laravel.
* **Diseño Moderno con Tailwind CSS:** Interfaz limpia y responsiva adaptada a un tema oscuro (`slate-800`), utilizando componentes globales y vistas organizadas mediante el motor de plantillas **Blade**.
* **Formularios Globales en Layout:** Incorpora en el encabezado principal (`main.blade.php`) controles directos para la búsqueda y eliminación de registros por ID desde cualquier sección.
* **Componente de la UF:** Integración de un Componente de Clase de Laravel que consume en tiempo real la API de GAEL para mostrar el valor actualizado de la UF.

---

## 🛠️ Tecnologías y Herramientas Utilizadas

* **PHP:** Lenguaje base del backend.
* **Laravel:** Framework PHP para el desarrollo web.
* **Tailwind CSS:** Framework CSS para el diseño de la interfaz.
* **Blade:** Motor de plantillas para la modularidad de vistas.
* **Git & GitHub:** Control de versiones y trabajo colaborativo mediante ramas.

---

## 📁 Estructura del Proyecto


DesarrolloWeb_eva1/
├── app/
│   ├── Http/Controllers/   # Controladores encargados de la lógica del CRUD
│   └── Models/Proyecto.php # Modelo que gestiona los datos en Sesión
├── resources/
│   └── views/
│       ├── layouts/        # main.blade.php (Layout maestro)
│       └── proyectos/      # Vistas de listado, creación, edición y detalles
├── routes/
│   └── web.php             # Archivo de rutas principales
└── ...

## Instrucciones para levantar el proyecto localmente
Como el repositorio ignora la carpeta `vendor` y el archivo de entorno, al clonar el proyecto debes ejecutar lo siguiente en tu terminal:

1. Instalar dependencias: `composer install`
2. Crear archivo de entorno: Copiar `.env.example` y renombrarlo a `.env`
3. Generar llave de aplicación: `php artisan key:generate`
4. Iniciar servidor: `php artisan serve`
