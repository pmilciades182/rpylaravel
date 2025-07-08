@extends('layout')

@section('title', 'Nueva Receta')

@section('content')
<div class="fluent-d-flex fluent-justify-center">
    <div style="width: 100%; max-width: 800px;">
        <div class="fluent-card fluent-card-elevated fluent-fade-in">
            <div class="fluent-card-header">
                <h2 class="fluent-card-title">
                    <i class="fluent-icon fluent-icon-24 fluent-icon-add fluent-icon-primary"></i>
                    Nueva Receta
                </h2>
                <p class="fluent-card-subtitle">Comparte tu receta paraguaya favorita</p>
            </div>
            <div class="fluent-card-body">
                <form method="POST" action="{{ route('recetas.store') }}" class="fluent-d-flex fluent-flex-column fluent-gap-lg">
                    @csrf
                    
                    <div class="fluent-form-group">
                        <label for="nombre" class="fluent-label">
                            <i class="fluent-icon fluent-icon-16 fluent-icon-recipe"></i>
                            Nombre de la Receta
                        </label>
                        <input type="text" class="fluent-input fluent-focus-ring @error('nombre') fluent-input-error @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre') }}" 
                               placeholder="Ej: Sopa Paraguaya" required>
                        @error('nombre')
                            <div class="fluent-form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="fluent-form-group">
                        <label for="categoria" class="fluent-label">
                            <i class="fluent-icon fluent-icon-16 fluent-icon-tag"></i>
                            Categoría
                        </label>
                        <select class="fluent-input fluent-select fluent-focus-ring @error('categoria') fluent-input-error @enderror" 
                                id="categoria" name="categoria" required>
                            <option value="">Seleccionar categoría</option>
                            <option value="Plato Principal" {{ old('categoria') == 'Plato Principal' ? 'selected' : '' }}>Plato Principal</option>
                            <option value="Entrada" {{ old('categoria') == 'Entrada' ? 'selected' : '' }}>Entrada</option>
                            <option value="Postre" {{ old('categoria') == 'Postre' ? 'selected' : '' }}>Postre</option>
                            <option value="Bebida" {{ old('categoria') == 'Bebida' ? 'selected' : '' }}>Bebida</option>
                            <option value="Sopa" {{ old('categoria') == 'Sopa' ? 'selected' : '' }}>Sopa</option>
                        </select>
                        @error('categoria')
                            <div class="fluent-form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="fluent-form-group">
                        <label for="tiempo_preparacion" class="fluent-label">
                            <i class="fluent-icon fluent-icon-16 fluent-icon-clock"></i>
                            Tiempo de Preparación
                        </label>
                        <input type="text" class="fluent-input fluent-focus-ring @error('tiempo_preparacion') fluent-input-error @enderror" 
                               id="tiempo_preparacion" name="tiempo_preparacion" 
                               value="{{ old('tiempo_preparacion') }}" 
                               placeholder="Ej: 30 minutos" required>
                        @error('tiempo_preparacion')
                            <div class="fluent-form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="fluent-form-group">
                        <label for="dificultad" class="fluent-label">
                            <i class="fluent-icon fluent-icon-16 fluent-icon-star"></i>
                            Dificultad
                        </label>
                        <select class="fluent-input fluent-select fluent-focus-ring @error('dificultad') fluent-input-error @enderror" 
                                id="dificultad" name="dificultad" required>
                            <option value="">Seleccionar dificultad</option>
                            <option value="Fácil" {{ old('dificultad') == 'Fácil' ? 'selected' : '' }}>Fácil</option>
                            <option value="Intermedio" {{ old('dificultad') == 'Intermedio' ? 'selected' : '' }}>Intermedio</option>
                            <option value="Difícil" {{ old('dificultad') == 'Difícil' ? 'selected' : '' }}>Difícil</option>
                        </select>
                        @error('dificultad')
                            <div class="fluent-form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="fluent-form-group">
                        <label class="fluent-label">
                            <i class="fluent-icon fluent-icon-16 fluent-icon-ingredients"></i>
                            Ingredientes
                        </label>
                        <div id="ingredientes-container" class="fluent-d-flex fluent-flex-column fluent-gap-sm">
                            <div class="fluent-d-flex fluent-gap-sm">
                                <input type="text" class="fluent-input fluent-focus-ring" name="ingredientes[]" 
                                       placeholder="Ingrediente" required style="flex: 1;">
                                <button type="button" class="fluent-button fluent-button-error" onclick="removeIngrediente(this)">
                                    <i class="fluent-icon fluent-icon-16 fluent-icon-delete"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="fluent-button fluent-button-ghost fluent-mt-sm" onclick="addIngrediente()">
                            <i class="fluent-icon fluent-icon-16 fluent-icon-add"></i>
                            Agregar Ingrediente
                        </button>
                        @error('ingredientes')
                            <div class="fluent-form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="fluent-form-group">
                        <label for="instrucciones" class="fluent-label">
                            <i class="fluent-icon fluent-icon-16 fluent-icon-document"></i>
                            Instrucciones
                        </label>
                        <textarea class="fluent-input fluent-textarea fluent-focus-ring @error('instrucciones') fluent-input-error @enderror" 
                                  id="instrucciones" name="instrucciones" rows="8" 
                                  placeholder="Escribe las instrucciones paso a paso..." required>{{ old('instrucciones') }}</textarea>
                        @error('instrucciones')
                            <div class="fluent-form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="fluent-d-flex fluent-justify-end fluent-gap-sm fluent-mt-lg">
                        <a href="{{ route('recetas.index') }}" class="fluent-button fluent-button-ghost">
                            <i class="fluent-icon fluent-icon-16 fluent-icon-back"></i>
                            Volver
                        </a>
                        <button type="submit" class="fluent-button fluent-button-primary fluent-hover-lift">
                            <i class="fluent-icon fluent-icon-16 fluent-icon-save"></i>
                            Guardar Receta
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function addIngrediente() {
    const container = document.getElementById('ingredientes-container');
    const div = document.createElement('div');
    div.className = 'fluent-d-flex fluent-gap-sm';
    div.innerHTML = `
        <input type="text" class="fluent-input fluent-focus-ring" name="ingredientes[]" 
               placeholder="Ingrediente" required style="flex: 1;">
        <button type="button" class="fluent-button fluent-button-error" onclick="removeIngrediente(this)">
            <i class="fluent-icon fluent-icon-16 fluent-icon-delete"></i>
        </button>
    `;
    container.appendChild(div);
    
    // Add animation
    div.style.opacity = '0';
    div.style.transform = 'translateY(-10px)';
    setTimeout(() => {
        div.style.transition = 'all 0.3s ease';
        div.style.opacity = '1';
        div.style.transform = 'translateY(0)';
    }, 10);
}

function removeIngrediente(button) {
    const container = document.getElementById('ingredientes-container');
    if (container.children.length > 1) {
        const div = button.parentElement;
        div.style.transition = 'all 0.3s ease';
        div.style.opacity = '0';
        div.style.transform = 'translateY(-10px)';
        setTimeout(() => {
            div.remove();
        }, 300);
    }
}

// Form validation and enhancement
document.addEventListener('DOMContentLoaded', function() {
    // Auto-resize textarea
    const textarea = document.getElementById('instrucciones');
    textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });
    
    // Form submission loading state
    const form = document.querySelector('form');
    form.addEventListener('submit', function() {
        const submitButton = form.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fluent-icon fluent-icon-16 fluent-icon-spin"></i> Guardando...';
    });
});
</script>
@endsection