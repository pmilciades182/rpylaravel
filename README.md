# Recetas Paraguayas 🇵🇾

Una aplicación web desarrollada en Laravel para preservar y compartir las recetas tradicionales paraguayas.

## Descripción

**Recetas Paraguayas** es una plataforma web que permite a los usuarios crear, administrar y compartir recetas de la rica gastronomía paraguaya. La aplicación está construida con Laravel y utiliza Firebase como base de datos para almacenar las recetas.

## Características

- ✅ **Gestión completa de recetas**: Crear, editar, ver y eliminar recetas
- 🔥 **Integración con Firebase**: Almacenamiento en tiempo real con Google Cloud Firestore
- 🎨 **Diseño moderno**: Interfaz responsive con Fluent Design System
- 📱 **Multiplataforma**: Compatible con dispositivos móviles y escritorio
- 🇵🇾 **Enfoque cultural**: Dedicado específicamente a la gastronomía paraguaya

## Tecnologías Utilizadas

- **Backend**: Laravel 12.0, PHP 8.2+
- **Base de datos**: Google Cloud Firestore
- **Frontend**: Blade Templates, CSS3, JavaScript
- **Herramientas**: Composer, NPM, Vite

## Instalación

### Requisitos previos

- PHP 8.2 o superior
- Composer
- Node.js y NPM
- Cuenta de Google Cloud con Firestore habilitado

### Pasos de instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/tuusuario/recetasparaguayas.git
   cd recetasparaguayasLaravel
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Instalar dependencias de Node.js**
   ```bash
   npm install
   ```

4. **Configurar variables de entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configurar Firebase**
   - Coloca tu archivo de credenciales de Firebase en `storage/app/firebase/`
   - Actualiza la configuración en `config/services.php`

6. **Ejecutar migraciones**
   ```bash
   php artisan migrate
   ```

7. **Compilar assets**
   ```bash
   npm run dev
   ```

8. **Iniciar el servidor**
   ```bash
   php artisan serve
   ```

## Uso

### Desarrollo

Para desarrollo con recarga automática:
```bash
composer run dev
```

Este comando inicia simultáneamente:
- Servidor PHP
- Queue worker
- Logs en tiempo real
- Vite para assets

### Pruebas

```bash
composer run test
```

## Estructura del Proyecto

```
├── app/
│   ├── Http/Controllers/
│   │   └── RecetaController.php    # Controlador principal
│   ├── Models/
│   │   └── Receta.php              # Modelo de receta
│   └── Services/
│       └── FirebaseService.php     # Servicio de Firebase
├── resources/
│   ├── views/
│   │   └── recetas/                # Vistas de recetas
│   └── css/
│       └── fluent/                 # Estilos Fluent Design
└── docs/
    └── FLUENT_DESIGN_GUIDE.md     # Guía de diseño
```

## Contribuir

Las contribuciones son bienvenidas. Para contribuir:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/NuevaCaracteristica`)
3. Commit tus cambios (`git commit -m 'Añade nueva característica'`)
4. Push a la rama (`git push origin feature/NuevaCaracteristica`)
5. Abre un Pull Request

## Licencia

Este proyecto está licenciado bajo la [Licencia MIT](https://opensource.org/licenses/MIT).

## Contacto

Para preguntas o sugerencias, puedes contactar al equipo de desarrollo.

---

*Desarrollado con ❤️ para preservar la cultura culinaria paraguaya*
