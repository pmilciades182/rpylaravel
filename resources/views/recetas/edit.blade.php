@extends('layout')

@section('title', 'Editar Receta')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-warning text-white">
                <h3><i class="fas fa-edit"></i> Editar Receta</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('recetas.update', $receta->id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la Receta</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre', $receta->nombre) }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select class="form-select @error('categoria') is-invalid @enderror" 
                                id="categoria" name="categoria" required>
                            <option value="">Seleccionar categoría</option>
                            <option value="Plato Principal" {{ old('categoria', $receta->categoria) == 'Plato Principal' ? 'selected' : '' }}>Plato Principal</option>
                            <option value="Entrada" {{ old('categoria', $receta->categoria) == 'Entrada' ? 'selected' : '' }}>Entrada</option>
                            <option value="Postre" {{ old('categoria', $receta->categoria) == 'Postre' ? 'selected' : '' }}>Postre</option>
                            <option value="Bebida" {{ old('categoria', $receta->categoria) == 'Bebida' ? 'selected' : '' }}>Bebida</option>
                            <option value="Sopa" {{ old('categoria', $receta->categoria) == 'Sopa' ? 'selected' : '' }}>Sopa</option>
                        </select>
                        @error('categoria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tiempo_preparacion" class="form-label">Tiempo de Preparación</label>
                        <input type="text" class="form-control @error('tiempo_preparacion') is-invalid @enderror" 
                               id="tiempo_preparacion" name="tiempo_preparacion" 
                               value="{{ old('tiempo_preparacion', $receta->tiempo_preparacion) }}" 
                               placeholder="Ej: 30 minutos" required>
                        @error('tiempo_preparacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="dificultad" class="form-label">Dificultad</label>
                        <select class="form-select @error('dificultad') is-invalid @enderror" 
                                id="dificultad" name="dificultad" required>
                            <option value="">Seleccionar dificultad</option>
                            <option value="Fácil" {{ old('dificultad', $receta->dificultad) == 'Fácil' ? 'selected' : '' }}>Fácil</option>
                            <option value="Intermedio" {{ old('dificultad', $receta->dificultad) == 'Intermedio' ? 'selected' : '' }}>Intermedio</option>
                            <option value="Difícil" {{ old('dificultad', $receta->dificultad) == 'Difícil' ? 'selected' : '' }}>Difícil</option>
                        </select>
                        @error('dificultad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ingredientes</label>
                        <div id="ingredientes-container">
                            @php
                                $ingredientes = old('ingredientes', $receta->ingredientes);
                            @endphp
                            @foreach($ingredientes as $ingrediente)
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="ingredientes[]" 
                                           value="{{ $ingrediente }}" placeholder="Ingrediente" required>
                                    <button type="button" class="btn btn-outline-danger" onclick="removeIngrediente(this)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            @endforeach
                            @if(empty($ingredientes))
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="ingredientes[]" 
                                           placeholder="Ingrediente" required>
                                    <button type="button" class="btn btn-outline-danger" onclick="removeIngrediente(this)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <button type="button" class="btn btn-outline-success" onclick="addIngrediente()">
                            <i class="fas fa-plus"></i> Agregar Ingrediente
                        </button>
                        @error('ingredientes')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="instrucciones" class="form-label">Instrucciones</label>
                        <textarea class="form-control @error('instrucciones') is-invalid @enderror" 
                                  id="instrucciones" name="instrucciones" rows="8" required>{{ old('instrucciones', $receta->instrucciones) }}</textarea>
                        @error('instrucciones')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('recetas.show', $receta->id) }}" class="btn btn-secondary me-md-2">
                            <i class="fas fa-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Actualizar Receta
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
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" class="form-control" name="ingredientes[]" placeholder="Ingrediente" required>
        <button type="button" class="btn btn-outline-danger" onclick="removeIngrediente(this)">
            <i class="fas fa-minus"></i>
        </button>
    `;
    container.appendChild(div);
}

function removeIngrediente(button) {
    const container = document.getElementById('ingredientes-container');
    if (container.children.length > 1) {
        button.parentElement.remove();
    }
}
</script>
@endsection