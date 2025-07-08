@extends('layout')

@section('title', $receta->nombre)

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h2><i class="fas fa-utensils"></i> {{ $receta->nombre }}</h2>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <p><strong><i class="fas fa-clock text-primary"></i> Tiempo:</strong><br>
                        {{ $receta->tiempo_preparacion }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong><i class="fas fa-signal text-warning"></i> Dificultad:</strong><br>
                        {{ $receta->dificultad }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong><i class="fas fa-tag text-info"></i> Categoría:</strong><br>
                        {{ $receta->categoria }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="text-success"><i class="fas fa-list"></i> Ingredientes</h4>
                    <ul class="list-group">
                        @foreach($receta->ingredientes as $ingrediente)
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>{{ $ingrediente }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-4">
                    <h4 class="text-success"><i class="fas fa-clipboard-list"></i> Instrucciones</h4>
                    <div class="card">
                        <div class="card-body">
                            {!! nl2br(e($receta->instrucciones)) !!}
                        </div>
                    </div>
                </div>

                <div class="text-muted">
                    <small>
                        <i class="fas fa-calendar-plus"></i> Creado: {{ $receta->created_at }}
                        @if($receta->updated_at != $receta->created_at)
                            <br><i class="fas fa-calendar-edit"></i> Actualizado: {{ $receta->updated_at }}
                        @endif
                    </small>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-light">
                <h5><i class="fas fa-cogs"></i> Acciones</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('recetas.edit', $receta->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar Receta
                    </a>
                    
                    <form method="POST" action="{{ route('recetas.destroy', $receta->id) }}" 
                          onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta receta?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash"></i> Eliminar Receta
                        </button>
                    </form>
                    
                    <a href="{{ route('recetas.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver a Recetas
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection