@extends('layout')

@section('title', 'Recetas Paraguayas')

@section('content')
<div class="fluent-section">
    <div class="fluent-d-flex fluent-justify-between fluent-align-center fluent-mb-lg">
        <h1 class="fluent-fade-in">
            <i class="fluent-icon fluent-icon-32 fluent-icon-recipe fluent-icon-success"></i>
            Recetas Paraguayas
        </h1>
        <a href="{{ route('recetas.create') }}" class="fluent-button fluent-button-primary fluent-hover-lift">
            <i class="fluent-icon fluent-icon-16 fluent-icon-add"></i>
            Nueva Receta
        </a>
    </div>

    @if(empty($recetas))
        <div class="fluent-text-center fluent-p-xl fluent-fade-in">
            <i class="fluent-icon fluent-icon-48 fluent-icon-recipe fluent-icon-tertiary fluent-mb-md"></i>
            <h3 class="fluent-mb-sm">No hay recetas aún</h3>
            <p class="fluent-mb-lg">¡Agrega tu primera receta paraguaya!</p>
            <a href="{{ route('recetas.create') }}" class="fluent-button fluent-button-primary fluent-button-large fluent-hover-lift">
                <i class="fluent-icon fluent-icon-20 fluent-icon-add"></i>
                Crear Primera Receta
            </a>
        </div>
    @else
        <div class="fluent-d-flex fluent-flex-column fluent-gap-lg">
            @foreach($recetas as $receta)
                <div class="fluent-card fluent-card-interactive fluent-hover-lift fluent-slide-up">
                    <div class="fluent-card-header">
                        <div class="fluent-d-flex fluent-justify-between fluent-align-center">
                            <h3 class="fluent-card-title">
                                <i class="fluent-icon fluent-icon-20 fluent-icon-recipe fluent-icon-success"></i>
                                {{ $receta->nombre }}
                            </h3>
                            <div class="fluent-d-flex fluent-gap-sm">
                                <span class="fluent-badge fluent-badge-success">
                                    <i class="fluent-icon fluent-icon-12 fluent-icon-clock"></i>
                                    {{ $receta->tiempo_preparacion }}
                                </span>
                                <span class="fluent-badge fluent-badge-primary">
                                    <i class="fluent-icon fluent-icon-12 fluent-icon-star"></i>
                                    {{ $receta->dificultad }}
                                </span>
                                <span class="fluent-badge fluent-badge-default">
                                    <i class="fluent-icon fluent-icon-12 fluent-icon-tag"></i>
                                    {{ $receta->categoria }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="fluent-card-body">
                        <p class="fluent-mb-sm">
                            <strong>Ingredientes:</strong> {{ count($receta->ingredientes) }} ingredientes
                        </p>
                        @if(isset($receta->descripcion))
                            <p class="fluent-mb-0">{{ Str::limit($receta->descripcion, 150) }}</p>
                        @endif
                    </div>
                    <div class="fluent-card-footer">
                        <div class="fluent-d-flex fluent-gap-sm">
                            <a href="{{ route('recetas.show', $receta->id) }}" class="fluent-button fluent-button-primary">
                                <i class="fluent-icon fluent-icon-16 fluent-icon-visibility"></i>
                                Ver Receta
                            </a>
                            <a href="{{ route('recetas.edit', $receta->id) }}" class="fluent-button fluent-button-ghost">
                                <i class="fluent-icon fluent-icon-16 fluent-icon-edit"></i>
                                Editar
                            </a>
                            <form method="POST" action="{{ route('recetas.destroy', $receta->id) }}" 
                                  style="display: inline-block;" 
                                  onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta receta?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fluent-button fluent-button-error">
                                    <i class="fluent-icon fluent-icon-16 fluent-icon-delete"></i>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    // Animate cards on scroll
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationDelay = '0.1s';
                    entry.target.classList.add('fluent-slide-up');
                }
            });
        });
        
        document.querySelectorAll('.fluent-card').forEach(card => {
            observer.observe(card);
        });
    });
</script>
@endsection