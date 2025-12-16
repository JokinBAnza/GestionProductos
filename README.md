# 🛒 Gestión de Productos

Bienvenido al sistema de **gestión de productos**, una aplicación sencilla para administrar productos, categorías y el almacén de tu negocio.

---

## 📋 Pestañas del proyecto

En este proyecto tienes acceso a **3 secciones principales**:

- **🛍️ Gestión de Productos**  
  Visualiza todos los productos existentes. Podrás:
  - Crear nuevos productos
  - Editar productos existentes
  - Eliminar productos

- **🏷️ Gestión de Categorías**  
  Visualiza todas las categorías disponibles. Podrás:
  - Crear nuevas categorías
  - Editar categorías
  - Eliminar categorías  
  ⚠️ *Nota: si una categoría contiene algún producto, no podrá ser borrada.*

- **📦 Almacén**  
  Muestra todas las categorías junto con sus productos correspondientes, permitiendo un control rápido del inventario.

---

## 🎨 Estilo de la interfaz

El proyecto utiliza un layout base (`layout.blade.php`) con estilos internos para mejorar la visualización:

```css
main {
    margin-left: 10px;
}
li {
    margin-left: 25px;
}

