# Microsoft Fluent Design System - Guía de Implementación

## Introducción

Este documento describe las pautas y estándares para implementar Microsoft Fluent Design System en el proyecto Recetas Paraguayas Laravel. Fluent Design System es el sistema de diseño oficial de Microsoft que proporciona una experiencia cohesiva y moderna.

## Principios Fundamentales

### 1. Light (Luz)
- Uso de luz sutil para crear profundidad y jerarquía
- Efectos de iluminación en bordes y superficies
- Sombras sutiles para elevación

### 2. Depth (Profundidad)
- Capas visuales para crear jerarquía de información
- Uso de z-index y elevación para componentes
- Paralaje sutil en interacciones

### 3. Motion (Movimiento)
- Transiciones suaves y naturales
- Animaciones con propósito funcional
- Easing curves que se sienten naturales

### 4. Material (Material)
- Superficies translúcidas y semitransparentes
- Efecto de vidrio esmerilado (acrylic)
- Texturas sutiles

### 5. Scale (Escala)
- Adaptabilidad a diferentes tamaños de pantalla
- Componentes escalables y responsivos
- Tipografía que se adapta al contexto

## Recursos Implementados

### Fuentes
- **Segoe UI Variable**: Fuente principal del sistema
- **Segoe Fluent Icons**: Iconografía oficial de Microsoft
- Tamaños recomendados: 16, 20, 24, 32, 40, 48, 64px

### Iconos
- Fluent UI System Icons (4000+ iconos)
- Estilo redondeado y moderno
- Disponible en versiones filled y outlined
- Consistencia en ancho y altura

### Colores Pastel - Paleta Fluent

#### Neutrals (Grises)
- `--fluent-neutral-lightest`: #fafafa
- `--fluent-neutral-light`: #f3f2f1
- `--fluent-neutral-medium`: #edebe9
- `--fluent-neutral-dark`: #d2d0ce
- `--fluent-neutral-darker`: #8a8886

#### Brand Colors (Colores de Marca)
- `--fluent-blue-light`: #deecf9
- `--fluent-blue-medium`: #c7e0f4
- `--fluent-blue-dark`: #106ebe
- `--fluent-purple-light`: #e1d7f0
- `--fluent-purple-medium`: #c1a8dd
- `--fluent-purple-dark`: #8764b8

#### Accent Colors (Colores de Acento)
- `--fluent-green-light`: #dff6dd
- `--fluent-green-medium`: #9fd89e
- `--fluent-green-dark`: #107c10
- `--fluent-orange-light`: #fde7d9
- `--fluent-orange-medium`: #f8c49c
- `--fluent-orange-dark`: #d83b01

#### Semantic Colors (Colores Semánticos)
- `--fluent-success`: #92c5f7
- `--fluent-warning`: #ffb900
- `--fluent-error`: #d13438
- `--fluent-info`: #0078d4

## Componentes Fluent

### Botones
```css
.fluent-button {
    background: var(--fluent-neutral-light);
    border: 1px solid var(--fluent-neutral-medium);
    border-radius: 4px;
    padding: 8px 16px;
    font-family: 'Segoe UI Variable', system-ui;
    font-weight: 400;
    transition: all 0.2s ease;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.fluent-button:hover {
    background: var(--fluent-neutral-medium);
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.fluent-button-primary {
    background: var(--fluent-blue-dark);
    color: white;
    border: none;
}
```

### Cards
```css
.fluent-card {
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(10px);
    border: 1px solid var(--fluent-neutral-medium);
    border-radius: 8px;
    padding: 24px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.fluent-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 32px rgba(0,0,0,0.15);
}
```

### Formularios
```css
.fluent-input {
    background: var(--fluent-neutral-lightest);
    border: 2px solid var(--fluent-neutral-medium);
    border-radius: 4px;
    padding: 12px 16px;
    font-family: 'Segoe UI Variable', system-ui;
    transition: all 0.2s ease;
}

.fluent-input:focus {
    border-color: var(--fluent-blue-dark);
    outline: none;
    box-shadow: 0 0 0 3px rgba(16, 110, 190, 0.1);
}
```

### Navegación
```css
.fluent-nav {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-bottom: 1px solid var(--fluent-neutral-medium);
    padding: 16px 0;
}

.fluent-nav-item {
    padding: 8px 16px;
    border-radius: 4px;
    transition: all 0.2s ease;
    color: var(--fluent-neutral-darker);
}

.fluent-nav-item:hover {
    background: var(--fluent-neutral-light);
    color: var(--fluent-blue-dark);
}
```

## Animaciones y Transiciones

### Timing Functions
```css
:root {
    --fluent-ease-in: cubic-bezier(0.1, 0.9, 0.2, 1);
    --fluent-ease-out: cubic-bezier(0.8, 0, 0.9, 0.1);
    --fluent-ease-in-out: cubic-bezier(0.645, 0.045, 0.355, 1);
}
```

### Durations
- Micro-interacciones: 150ms
- Transiciones pequeñas: 300ms
- Transiciones medianas: 500ms
- Transiciones complejas: 800ms

## Tipografía

### Jerarquía
```css
.fluent-title-large {
    font-size: 40px;
    font-weight: 600;
    line-height: 1.2;
}

.fluent-title-medium {
    font-size: 28px;
    font-weight: 600;
    line-height: 1.3;
}

.fluent-subtitle {
    font-size: 20px;
    font-weight: 500;
    line-height: 1.4;
}

.fluent-body-large {
    font-size: 16px;
    font-weight: 400;
    line-height: 1.5;
}

.fluent-body-medium {
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
}

.fluent-caption {
    font-size: 12px;
    font-weight: 400;
    line-height: 1.4;
}
```

## Espaciado

### Sistema de Espaciado
```css
:root {
    --fluent-space-xs: 4px;
    --fluent-space-sm: 8px;
    --fluent-space-md: 16px;
    --fluent-space-lg: 24px;
    --fluent-space-xl: 32px;
    --fluent-space-xxl: 48px;
}
```

## Responsividad

### Breakpoints
```css
:root {
    --fluent-breakpoint-xs: 480px;
    --fluent-breakpoint-sm: 768px;
    --fluent-breakpoint-md: 1024px;
    --fluent-breakpoint-lg: 1366px;
    --fluent-breakpoint-xl: 1920px;
}
```

## Modo Oscuro

### Colores para Modo Oscuro
```css
[data-theme="dark"] {
    --fluent-neutral-lightest: #1b1a19;
    --fluent-neutral-light: #201f1e;
    --fluent-neutral-medium: #292827;
    --fluent-neutral-dark: #3b3a39;
    --fluent-neutral-darker: #ffffff;
    
    --fluent-blue-light: #004578;
    --fluent-blue-medium: #0078d4;
    --fluent-blue-dark: #479ef5;
}
```

## Mejores Prácticas

### 1. Consistencia
- Usar siempre variables CSS definidas
- Mantener espaciado consistente
- Aplicar la misma tipografía en toda la aplicación

### 2. Accesibilidad
- Contraste mínimo de 4.5:1 para texto normal
- Contraste mínimo de 3:1 para texto grande
- Navegación por teclado funcional
- Etiquetas aria apropiadas

### 3. Performance
- Usar transform para animaciones
- Evitar animaciones de propiedades que causan reflow
- Optimizar imágenes y recursos

### 4. Escalabilidad
- Usar unidades relativas (rem, em, %)
- Implementar breakpoints consistentes
- Diseño mobile-first

## Implementación en Laravel

### Estructura de Archivos
```
resources/
├── css/
│   ├── fluent/
│   │   ├── variables.css
│   │   ├── components.css
│   │   ├── utilities.css
│   │   └── animations.css
│   └── app.css
├── js/
│   └── fluent-theme.js
└── views/
    └── layouts/
        └── fluent-layout.blade.php
```

### Configuración en Vite
```javascript
// vite.config.js
export default {
    css: {
        preprocessorOptions: {
            css: {
                additionalData: `@import "resources/css/fluent/variables.css";`
            }
        }
    }
}
```

## Recursos Adicionales

- [Fluent UI Official Documentation](https://developer.microsoft.com/en-us/fluentui)
- [Fluent 2 Design System](https://fluent2.microsoft.design/)
- [Fluent UI System Icons](https://github.com/microsoft/fluentui-system-icons)
- [Segoe Fluent Icons Font](https://learn.microsoft.com/en-us/windows/apps/design/style/segoe-fluent-icons-font)

## Mantenimiento

Este documento debe actualizarse cuando:
- Se agreguen nuevos componentes
- Se modifiquen colores o tipografía
- Se actualicen las especificaciones de Microsoft Fluent Design
- Se implementen nuevas funcionalidades

---

*Última actualización: Enero 2025*