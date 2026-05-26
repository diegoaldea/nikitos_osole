# Nikitos Snacks

Sitio web institucional de Nikitos Snacks con panel de administración. Versión funcional desarrollada a partir del diseño de Figma y del sitio publicado.

## Stack

- **Backend:** Laravel 10 + PHP 8.2
- **Frontend:** Vue 3 + Inertia.js + Tailwind CSS
- **Base de datos:** MySQL
- **Build:** Vite
- **Auth:** Laravel Breeze
- **Imágenes:** Intervention Image v3 (redimensionado + conversión a WebP)
- **Mapas:** Leaflet

## Requisitos

- **PHP 8.2** o superior — instalar vía [XAMPP](https://www.apachefriends.org/download.html)
- **Composer 2** — [descargar](https://getcomposer.org/download/)
- **Node.js 18+** y npm — [descargar](https://nodejs.org/en/download)
- **MySQL 5.7+** — incluido en XAMPP
- **Extensiones de PHP requeridas:** `gd`, `pdo_mysql`, `mbstring`, `openssl`, `fileinfo`, `tokenizer`
  - En XAMPP: abrir `C:\xampp\php\php.ini`, descomentar las líneas `;extension=gd`, etc. (quitar el `;`) y reiniciar Apache.

## Instalación

Posicionarse en la carpeta `nikitos/` del repositorio y seguir los pasos:

### 1. Clonar el repositorio

```bash
git clone https://github.com/diegoaldea/nikitos_osole.git
cd nikitos_osole/nikitos
```

### 2. Instalar dependencias

```bash
composer install
npm install
```

### 3. Configurar el entorno

```bash
cp .env.example .env
php artisan key:generate
```

Editar el archivo `.env` y completar los datos de la base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nikitos
DB_USERNAME=root
DB_PASSWORD=
```

> Crear la base de datos `nikitos`.

### 4. Migrar y sembrar la base de datos

```bash
php artisan migrate --seed
```

Esto crea las tablas y carga datos de prueba: usuario admin, categorías, productos, recetas, ubicaciones y contenidos del sitio.

### 5. Crear el enlace simbólico de storage

```bash
php artisan storage:link
```

Necesario para que las imágenes subidas desde el admin sean accesibles públicamente.

### 6. Compilar los assets

Para producción:

```bash
npm run build
```

Para desarrollo (con hot reload):

```bash
npm run dev
```

### 7. Levantar el servidor

```bash
php artisan serve
```

El sitio queda disponible en [http://localhost:8000](http://localhost:8000).

## Acceso al panel de administración

URL: [http://localhost:8000/admin](http://localhost:8000/admin)

| Email | Contraseña |
| --- | --- |
| `admin@nikitos.com.ar` | `password` |
