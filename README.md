# 🛒 Gestión de Productos

Bienvenido al sistema de **gestión de productos**, una aplicación sencilla para administrar productos, categorías y el almacén de tu negocio.

En este proyecto tienes acceso a **3 secciones principales**:

🛍️ **Gestión de Productos**  
Visualiza todos los productos existentes. Podrás:  
- Crear nuevos productos  
- Editar productos existentes  
- Eliminar productos  

🏷️ **Gestión de Categorías**  
Visualiza todas las categorías disponibles. Podrás:  
- Crear nuevas categorías  
- Editar categorías  
- Eliminar categorías  

⚠️ *Nota: si una categoría contiene algún producto, no podrá ser borrada.*  

📦 **Almacén**  
Muestra todas las categorías junto con sus productos correspondientes, permitiendo un control rápido del inventario.

## 🚀 Cómo usar

1️⃣ **Clonar el repositorio**  

```bash
git clone https://github.com/tu-usuario/gestion-productos.git
cd gestion-productos
```

2️⃣ **Levantar el proyecto con Docker** (se asume que tienes Docker y Docker Compose instalados)  

```bash
docker compose up -d
```

Esto levantará los servicios necesarios: **PHP + Apache** para Laravel y **MySQL** como base de datos.  

Luego copia el archivo de ejemplo `.env.example` a `.env`:

```bash
cp .env.example .env
```

Actualiza los datos de la base de datos según tu contenedor MySQL (usuario, contraseña, nombre de BD).  

Instala dependencias de PHP/Laravel, genera la clave de la aplicación y ejecuta las migraciones:

```bash
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

3️⃣ **Acceder a la aplicación**  

Abre tu navegador y entra a `http://localhost:8000`. Ahora podrás usar todas las secciones del sistema.

## 📌 Recomendaciones

- Siempre verifica que una categoría no tenga productos antes de eliminarla.  
- Mantén tus datos organizados para facilitar la gestión del inventario.
