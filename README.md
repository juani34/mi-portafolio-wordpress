# mi-portafolio-wordpress
# E-commerce con API de Clima  

## Tecnologías usadas  
- WordPress + GeneratePress  
- PHP (plugin custom)  
- WooCommerce  

## Cómo probarlo localmente  
1. Clona este repositorio.  
2. Copia `plugin-clima.php` a `/wp-content/plugins/`.  
3. Activa el plugin en WordPress.  
# 🚀 Landing Page con Popup de Leads (WordPress)

**Propósito**: Captura de emails mediante popup inteligente con AJAX para evitar recargas.

## 🔧 Tecnologías utilizadas
- **WordPress** + GeneratePress (tema hijo)
- **PHP**: Procesamiento seguro de datos en servidor
- **jQuery/AJAX**: Envío asíncrono de formularios
- **CSS3**: Animaciones y diseño responsive

## 🛠️ Funcionalidades clave
1. **Popup inteligente**:
   - Se muestra tras 3 segundos o al intentar salir (exit-intent)
   - Diseño personalizado con CSS puro
2. **Sistema AJAX**:
   - Guarda leads en tabla `wp_leads` sin recargar
   - Validación de email en frontend/backend
3. **Seguridad**:
   - Sanitización de datos con `sanitize_email()`
   - Nonce de WordPress para protección CSRF

## 📦 Instalación
1. Copiar a `wp-content/themes/generatepress-child/`:
   - `functions.php` (código del popup)
   - `assets/js/popup.js` (lógica AJAX)
2. Crear tabla en DB (ejecutar en phpMyAdmin):
   ```sql
   CREATE TABLE wp_leads (
       id INT AUTO_INCREMENT PRIMARY KEY,
       email VARCHAR(100) NOT NULL,
       fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
