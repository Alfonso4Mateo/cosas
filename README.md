# Proyecto Laravel: Cosas

## Descripción del proyecto
Este proyecto es una aplicación web desarrollada con el framework **Laravel**.

**Resumen:** El objetivo principal de la aplicación es la gestión de proveedores y sus productos junto a la gestión de los clientes, permitiendo a su vez la posibilidad de administrar la plantilla y sus nóminas.

La aplicación ofrece funcionalidades típicas de una plataforma administrativa: operaciones CRUD (Crear, Leer, Actualizar y Borrar) sobre recursos, gestión de usuarios y autenticación.

## Requisitos para ejecutarlo
Asegúrate de tener instaladas las siguientes herramientas en tu sistema:

* **PHP**: 8.2 o superior
* **Composer**: para dependencias PHP
* **Base de datos**: MySQL o MariaDB
* **Node.js y NPM**: para gestionar y compilar los assets (Vite)
* **Git**: para clonar el repositorio
* **XAMPP / WAMP / MAMP (opcional)**: recomendados en entornos Windows para servir PHP y MySQL

## Pasos básicos de instalación (Despliegue)
Sigue estos pasos para poner el proyecto en marcha en local:

1. **Clonar el repositorio**

    git clone [https://github.com/Alfonso4Mateo/cosas.git]
    cd cosas

2. **Instalar dependencias de PHP**

    composer install

3. **Configurar el entorno (.env)**
Copia el archivo de ejemplo y edita las credenciales de la base de datos:

- En Linux / macOS / PowerShell:
    cp .env.example .env

- En CMD (Windows):
    copy .env.example .env

Edita el archivo `.env` y ajusta las variables de conexión:
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=root
    DB_PASSWORD=

4. **Generar la clave de la aplicación**

    php artisan key:generate

5. **Migraciones y datos de prueba (seeders)**
Crea las tablas y rellena datos de ejemplo:

    php artisan migrate --seed

6. **Instalar dependencias de frontend y compilar assets**

    npm install
    npm run dev

7. **Ejecutar la aplicación**

    php artisan serve

La aplicación estará disponible en: http://localhost:8000

## Usuario y contraseña de prueba
Los seeders incluyen un usuario de prueba para acceder a áreas protegidas:

* **Email:** admin@admin.es
* **Contraseña:** Australopitecus4!

---

## Guía de Comandos del Proyecto
A continuación se detallan los comandos útiles para el desarrollo diario y los comandos que se utilizaron para la construcción inicial de la arquitectura.

### Comandos de Desarrollo y Mantenimiento
Utiliza estos comandos para trabajar en el proyecto:

    # Ejecuta el servidor local
    php artisan serve

    # Instala paquetes npm (frontend)
    npm install

    # Compila assets (CSS/JS) en modo desarrollo
    npm run dev

    # Crea un nuevo modelo (puedes añadir -m para migración y -c para controlador)
    php artisan make:model "Nombre"

    # Limpiar caché (Útil si cambias .env o rutas y no ves los cambios)
    php artisan config:cache
    php artisan route:clear
    php artisan view:clear

### Referencia de Construcción (Stack Tecnológico)
Estos comandos documentan cómo se instalaron las librerías base (Bootstrap y AdminLTE). **No es necesario ejecutarlos tras clonar el repositorio**, pero se dejan como referencia de la configuración:

    # Crea proyecto Laravel base
    composer create-project laravel/laravel nombre-proyecto

    # Instala Bootstrap (UI)
    composer require laravel/ui

    # Genera vistas de autenticación con Bootstrap
    php artisan ui Bootstrap --auth

    # Instala AdminLTE (Panel administrativo)
    composer require jeroennoten/laravel-adminlte

    # Instala AdminLTE con todas las vistas, assets y autenticación
    php artisan adminlte:install --type=full

---

### Backup SQL
Se incluye un archivo de respaldo de la base de datos con tablas y datos de prueba en: Dump20260130.sql.